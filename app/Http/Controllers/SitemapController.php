<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * XML sitemap for every indexable public page, with hreflang alternates
     * for each supported language using the "?lang=" convention SetLocale
     * understands statelessly (see resources/views/layouts/app.blade.php).
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

        $urls = collect($staticRoutes)->map(fn (string $name) => route($name));

        $urls = $urls->merge(
            Category::query()
                ->where('is_visible', true)
                ->get()
                ->map(fn (Category $category) => route('category', $category->translatedValue('slug')))
        );

        $urls = $urls->merge(
            Product::query()
                ->get()
                ->map(fn (Product $product) => route('product', $product->translatedValue('slug')))
        );

        $xml = view('feeds.sitemap', ['urls' => $urls->unique()->values()])->render();

        return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }
}
