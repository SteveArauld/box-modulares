<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SetLocale;
use App\Models\Category;
use App\Models\Product;
use App\Support\LocalizedSegments;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * XML sitemap for every indexable public page. Each page now has a
     * genuinely distinct, real URL per language (see routes/web.php), so
     * the sitemap lists one <url> entry per language per page, each
     * carrying hreflang alternates to its sibling URLs in the other three
     * languages — the standard multi-URL sitemap pattern Google documents
     * for sites that don't share one URL across languages.
     * Transactional/private pages (cart, checkout, account, search,
     * order confirmation) are deliberately excluded.
     */
    public function index(): Response
    {
        $staticRoutes = [
            'home',
            'shop.index',
            'shop.contact',
            'shop.shipping-policy',
            'shop.return-policy',
            'shop.payment-policy',
            'shop.legal-notice',
            'shop.terms-of-use',
            'shop.terms-of-sale',
            'shop.privacy-policy',
            'shop.cookie-policy',
        ];

        $entries = collect($staticRoutes)->map(
            fn (string $name) => $this->urlsPerLocale($name)
        );

        $entries = $entries->merge(
            Category::query()
                ->where('is_visible', true)
                ->get()
                ->map(fn (Category $category) => $this->urlsPerLocale(
                    'category',
                    fn (string $locale) => $category->translatedValue('slug', $locale)
                ))
        );

        $entries = $entries->merge(
            Product::query()
                ->get()
                ->map(fn (Product $product) => $this->urlsPerLocale(
                    'product',
                    fn (string $locale) => $product->translatedValue('slug', $locale)
                ))
        );

        $xml = view('feeds.sitemap', ['entries' => $entries->values()])->render();

        return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    /**
     * @param  (callable(string): string)|null  $slugFor  resolves the item's
     *                                                    slug for a given locale (product/category only)
     * @return array<string, string> locale => absolute URL, for this one page
     */
    private function urlsPerLocale(string $routeName, ?callable $slugFor = null): array
    {
        $urls = [];

        foreach (SetLocale::SUPPORTED_LOCALES as $locale) {
            $params = ['locale' => $locale];

            if (isset(LocalizedSegments::MAP[$routeName])) {
                $params[LocalizedSegments::paramName($routeName)] = LocalizedSegments::segment($routeName, $locale);
            }

            if ($slugFor !== null) {
                $params['slug'] = $slugFor($locale);
            }

            $urls[$locale] = route($routeName, $params);
        }

        return $urls;
    }
}
