<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SitemapController;
use App\Http\Middleware\SetLocale;
use App\Support\LocalizedSegments;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

// Every content page lives under "/{locale}/...", with the locale segment
// AND the following path word both translated — so a product page, a
// legal page, the cart... all get a real, distinct, shareable URL per
// language (see app/Support/LocalizedSegments.php for the word list).
// Sending someone "/it/informativa-sulla-privacy" gets them the Italian
// privacy policy; "/pt/politica-de-privacidade" gets the Portuguese one.
$locales = implode('|', SetLocale::SUPPORTED_LOCALES);

// "/" has no language in it yet, so it isn't one of the pages above — it
// just sends a first-time visitor to the site's default language.
Route::get('/', fn () => redirect(URL::to('/'.SetLocale::DEFAULT_LOCALE)))->name('root');

Route::get('/{locale}', [ShopController::class, 'home'])
    ->where('locale', $locales)
    ->name('home');

Route::middleware(SetLocale::class)->where(['locale' => $locales])->group(function () {
    foreach (LocalizedSegments::MAP as $routeName => $entry) {
        $param = $entry['param'];
        $alternatives = implode('|', array_map('preg_quote', LocalizedSegments::alternatives($routeName)));

        match ($routeName) {
            'shop.index' => Route::get("{locale}/{{$param}}", [ShopController::class, 'shopIndex'])
                ->where($param, $alternatives)->name($routeName),
            'shop.search' => Route::get("{locale}/{{$param}}", [ShopController::class, 'search'])
                ->where($param, $alternatives)->name($routeName),
            'product' => Route::get("{locale}/{{$param}}/{slug}", [ShopController::class, 'shop'])
                ->where($param, $alternatives)->name($routeName),
            'category' => Route::get("{locale}/{{$param}}/{slug}", [ShopController::class, 'category'])
                ->where($param, $alternatives)->name($routeName),
            'shop.contact' => (function () use ($param, $alternatives): void {
                Route::get("{locale}/{{$param}}", [ShopController::class, 'contact'])
                    ->where($param, $alternatives)->name('shop.contact');
                Route::post("{locale}/{{$param}}", [ContactController::class, 'send'])
                    ->where($param, $alternatives)->name('shop.contact.send');
            })(),
            'shop.shipping-policy' => Route::get("{locale}/{{$param}}", [ShopController::class, 'shippingPolicy'])
                ->where($param, $alternatives)->name($routeName),
            'shop.return-policy' => Route::get("{locale}/{{$param}}", [ShopController::class, 'returnPolicy'])
                ->where($param, $alternatives)->name($routeName),
            'shop.payment-policy' => Route::get("{locale}/{{$param}}", [ShopController::class, 'paymentPolicy'])
                ->where($param, $alternatives)->name($routeName),
            'shop.legal-notice' => Route::get("{locale}/{{$param}}", [ShopController::class, 'legalNotice'])
                ->where($param, $alternatives)->name($routeName),
            'shop.terms-of-use' => Route::get("{locale}/{{$param}}", [ShopController::class, 'termsOfUse'])
                ->where($param, $alternatives)->name($routeName),
            'shop.terms-of-sale' => Route::get("{locale}/{{$param}}", [ShopController::class, 'termsOfSale'])
                ->where($param, $alternatives)->name($routeName),
            'shop.privacy-policy' => Route::get("{locale}/{{$param}}", [ShopController::class, 'privacyPolicy'])
                ->where($param, $alternatives)->name($routeName),
            'shop.cookie-policy' => Route::get("{locale}/{{$param}}", [ShopController::class, 'cookiePolicy'])
                ->where($param, $alternatives)->name($routeName),
            'shop.my-account' => Route::get("{locale}/{{$param}}", [ShopController::class, 'myAccount'])
                ->where($param, $alternatives)->name($routeName),
            'shop.lost-password' => (function () use ($param, $alternatives): void {
                $myAccount = LocalizedSegments::paramName('shop.my-account');
                $myAccountAlts = implode('|', array_map('preg_quote', LocalizedSegments::alternatives('shop.my-account')));

                Route::get("{locale}/{{$myAccount}}/{{$param}}", [ShopController::class, 'lostPassword'])
                    ->where([$myAccount => $myAccountAlts, $param => $alternatives])->name('shop.lost-password');
                Route::post("{locale}/{{$myAccount}}/{{$param}}", [ShopController::class, 'sendLostPassword'])
                    ->where([$myAccount => $myAccountAlts, $param => $alternatives])->name('shop.lost-password.send');
            })(),
            'password.reset' => (function () use ($param, $alternatives): void {
                $myAccount = LocalizedSegments::paramName('shop.my-account');
                $myAccountAlts = implode('|', array_map('preg_quote', LocalizedSegments::alternatives('shop.my-account')));

                Route::get("{locale}/{{$myAccount}}/{{$param}}/{token}", [AuthController::class, 'showResetForm'])
                    ->where([$myAccount => $myAccountAlts, $param => $alternatives])->name('password.reset');
                Route::post("{locale}/{{$myAccount}}/{{$param}}", [AuthController::class, 'resetPassword'])
                    ->where([$myAccount => $myAccountAlts, $param => $alternatives])->name('password.reset.update');
            })(),
            'shop.carrito' => Route::get("{locale}/{{$param}}", [ShopController::class, 'carrito'])
                ->where($param, $alternatives)->name($routeName),
            'shop.checkout' => (function () use ($param, $alternatives): void {
                Route::get("{locale}/{{$param}}", [ShopController::class, 'checkout'])
                    ->where($param, $alternatives)->name('shop.checkout');
                Route::post("{locale}/{{$param}}", [OrderController::class, 'store'])
                    ->where($param, $alternatives)->name('shop.checkout.store');
            })(),
            'shop.order-confirmation' => (function () use ($param, $alternatives): void {
                $checkout = LocalizedSegments::paramName('shop.checkout');
                $checkoutAlts = implode('|', array_map('preg_quote', LocalizedSegments::alternatives('shop.checkout')));

                Route::get("{locale}/{{$checkout}}/{{$param}}/{orderNumber}", [ShopController::class, 'orderConfirmation'])
                    ->where([$checkout => $checkoutAlts, $param => $alternatives])->name('shop.order-confirmation');
            })(),
            default => null,
        };
    }

    // Not content pages (no shareable/SEO value), so their path word stays
    // literal in every language — only the "{locale}" prefix is translated.
    Route::post('{locale}/login', [AuthController::class, 'login'])->name('login');
    Route::post('{locale}/register', [AuthController::class, 'register'])->name('register');
    Route::post('{locale}/logout', [AuthController::class, 'logout'])->name('logout');
});

// --- Google Merchant Center product feed --- (not locale-prefixed: a feed
// URL is a machine endpoint pasted once into Merchant Center, not a page a
// person browses or shares; its own "locale" query/path param already
// selects which language's content it returns — see FeedController).
// "flujo-productos.xml": URL stable à coller dans Merchant Center
// (Produits > Flux > Ajouter un flux > Planification > "Récupérer maintenant/plus tard"),
// Google revient la chercher tout seul selon la fréquence choisie.
Route::get('/flujo-productos.xml', [FeedController::class, 'googleShopping'])->name('feed.google-shopping');
// Même contenu, mais forcé en téléchargement (pour l'import manuel "Charger un fichier").
Route::get('/flujo-productos/descargar', [FeedController::class, 'googleShoppingDownload'])->name('feed.google-shopping.download');
// Un flux par langue (es/it/de/pt), pour les marchés Merchant Center séparés par pays/langue.
Route::get('/feeds/google-{locale}.xml', [FeedController::class, 'google'])
    ->where('locale', $locales)
    ->name('feed.google.locale');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Any URL that doesn't match a route above (e.g. an old pre-rebuild link
// like "/contactanos/", or a typo) ends up here. SetLocale never runs for
// a request that matches no route at all — it's only registered on the
// locale-prefixed route group, which a truly unmatched URL never enters —
// so without this, the 404 page itself would fail to render: it links to
// route('shop.search'), and that needs the "locale"/"searchSegment"
// URL::defaults() that only SetLocale sets up. This fallback sets them
// from the URL's first segment (if it's a supported locale) before
// raising the 404, so the error page always renders in a real language
// instead of crashing into a second, unrelated 500.
Route::fallback(function () {
    $firstSegment = request()->segment(1);
    $locale = in_array($firstSegment, SetLocale::SUPPORTED_LOCALES, true)
        ? $firstSegment
        : SetLocale::DEFAULT_LOCALE;

    app()->setLocale($locale);

    URL::defaults(array_merge(
        ['locale' => $locale],
        LocalizedSegments::defaultsFor($locale),
    ));

    abort(404);
});
