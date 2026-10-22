<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

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
        $locale = $request->query('locale', config('app.locale'));

        $products = Product::query()
            ->with('category')
            ->whereHas('category', fn ($query) => $query->where('is_visible', true))
            ->get();

        $xml = view('feeds.google-shopping', [
            'products' => $products,
            'locale' => $locale,
        ])->render();

        $headers = ['Content-Type' => 'application/xml; charset=UTF-8'];

        if ($request->boolean('download')) {
            $headers['Content-Disposition'] = 'attachment; filename="'.Str::slug(config('app.name')).'-google-shopping-feed.xml"';
        }

        return response($xml, 200, $headers);
    }

    public function googleShoppingDownload(Request $request): Response
    {
        $request->merge(['download' => true]);

        return $this->googleShopping($request);
    }
}
