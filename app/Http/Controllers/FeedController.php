<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SetLocale;
use App\Models\Product;
use App\Support\GoogleShoppingFeed;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FeedController extends Controller
{
    /**
     * Google Merchant Center product feed (RSS 2.0 + g: namespace).
     *
     * Used two ways:
     * - "Add feed by URL" / scheduled fetch in Merchant Center: point it at
     *   this route directly, Google re-fetches it on its own schedule.
     * - Manual "upload a file": hit the same route with ?download=1 (or the
     *   dedicated /flujo-productos/descargar route) to save it as a .xml
     *   file and upload it by hand.
     */
    public function googleShopping(Request $request): Response
    {
        return $this->buildFeed(
            $request->query('locale', SetLocale::DEFAULT_LOCALE),
            $request->boolean('download'),
        );
    }

    public function googleShoppingDownload(Request $request): Response
    {
        return $this->buildFeed($request->query('locale', SetLocale::DEFAULT_LOCALE), true);
    }

    /**
     * One feed per locale, for markets that want a dedicated Merchant Center
     * feed per language instead of the single default-locale feed above.
     */
    public function google(Request $request, string $locale): Response
    {
        if (! in_array($locale, SetLocale::SUPPORTED_LOCALES, true)) {
            throw new NotFoundHttpException;
        }

        return $this->buildFeed($locale, $request->boolean('download'));
    }

    private function buildFeed(string $locale, bool $download): Response
    {
        $products = Product::query()
            ->with('category')
            ->whereHas('category', fn ($query) => $query->where('is_visible', true))
            ->get()
            ->filter(fn (Product $product) => $product->price > 0)
            ->values();

        $xml = view('feeds.google-shopping', [
            'items' => (new GoogleShoppingFeed)->items($products, $locale),
            'locale' => $locale,
        ])->render();

        $headers = ['Content-Type' => 'application/xml; charset=UTF-8'];

        if ($download) {
            $headers['Content-Disposition'] = 'attachment; filename="'.Str::slug(config('app.name')).'-google-shopping-feed-'.$locale.'.xml"';
        }

        return response($xml, 200, $headers);
    }
}
