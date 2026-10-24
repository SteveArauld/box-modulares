<?php

namespace App\Support;

/**
 * Every content route's translated path word, per locale. Each entry's key
 * is both the route's name and the name of its dynamic "{xSegment}" route
 * parameter (so app()->getLocale() and this map are enough to fill in every
 * route() call across the app via URL::defaults() — see SetLocale).
 *
 * Product and category slugs are not listed here: they already carry their
 * own per-locale value on the model (Product::translatedValue('slug')) and
 * are passed explicitly wherever route('product', ...) is called.
 */
class LocalizedSegments
{
    /**
     * @var array<string, array{param: string, es: string, it: string, de: string, pt: string}>
     */
    public const MAP = [
        'shop.index' => ['param' => 'indexSegment', 'es' => 'tienda', 'it' => 'negozio', 'de' => 'shop', 'pt' => 'loja'],
        'shop.search' => ['param' => 'searchSegment', 'es' => 'buscar', 'it' => 'cerca', 'de' => 'suche', 'pt' => 'pesquisar'],
        'product' => ['param' => 'productSegment', 'es' => 'producto', 'it' => 'prodotto', 'de' => 'produkt', 'pt' => 'produto'],
        'category' => ['param' => 'categorySegment', 'es' => 'categoria-producto', 'it' => 'categoria-prodotto', 'de' => 'produktkategorie', 'pt' => 'categoria-produto'],
        'shop.contact' => ['param' => 'contactSegment', 'es' => 'contactanos', 'it' => 'contattaci', 'de' => 'kontakt', 'pt' => 'contacte-nos'],
        'shop.shipping-policy' => ['param' => 'shippingPolicySegment', 'es' => 'politica-de-envios', 'it' => 'politica-di-spedizione', 'de' => 'versandrichtlinie', 'pt' => 'politica-de-envio'],
        'shop.return-policy' => ['param' => 'returnPolicySegment', 'es' => 'politica-de-devoluciones-y-reembolsos', 'it' => 'politica-di-reso-e-rimborso', 'de' => 'rueckgabe-und-erstattungsrichtlinie', 'pt' => 'politica-de-devolucao-e-reembolso'],
        'shop.payment-policy' => ['param' => 'paymentPolicySegment', 'es' => 'politica-de-pago', 'it' => 'politica-di-pagamento', 'de' => 'zahlungsrichtlinie', 'pt' => 'politica-de-pagamento'],
        'shop.legal-notice' => ['param' => 'legalNoticeSegment', 'es' => 'aviso-legal', 'it' => 'note-legali', 'de' => 'impressum', 'pt' => 'aviso-legal'],
        'shop.terms-of-use' => ['param' => 'termsOfUseSegment', 'es' => 'condiciones-generales-de-uso-cgu', 'it' => 'condizioni-generali-duso', 'de' => 'allgemeine-nutzungsbedingungen', 'pt' => 'condicoes-gerais-de-utilizacao'],
        'shop.terms-of-sale' => ['param' => 'termsOfSaleSegment', 'es' => 'condiciones-generales-de-venta', 'it' => 'condizioni-generali-di-vendita', 'de' => 'allgemeine-verkaufsbedingungen', 'pt' => 'condicoes-gerais-de-venda'],
        'shop.privacy-policy' => ['param' => 'privacyPolicySegment', 'es' => 'politica-de-privacidad', 'it' => 'informativa-sulla-privacy', 'de' => 'datenschutzerklaerung', 'pt' => 'politica-de-privacidade'],
        'shop.cookie-policy' => ['param' => 'cookiePolicySegment', 'es' => 'politica-de-cookies', 'it' => 'politica-sui-cookie', 'de' => 'cookie-richtlinie', 'pt' => 'politica-de-cookies'],
        'shop.my-account' => ['param' => 'myAccountSegment', 'es' => 'mi-cuenta', 'it' => 'il-mio-account', 'de' => 'mein-konto', 'pt' => 'a-minha-conta'],
        'shop.lost-password' => ['param' => 'lostPasswordSegment', 'es' => 'contrasena-olvidada', 'it' => 'password-dimenticata', 'de' => 'passwort-vergessen', 'pt' => 'palavra-passe-esquecida'],
        'password.reset' => ['param' => 'resetPasswordSegment', 'es' => 'restablecer-contrasena', 'it' => 'reimposta-password', 'de' => 'passwort-zuruecksetzen', 'pt' => 'redefinir-palavra-passe'],
        'shop.carrito' => ['param' => 'cartSegment', 'es' => 'carrito', 'it' => 'carrello', 'de' => 'warenkorb', 'pt' => 'carrinho'],
        'shop.checkout' => ['param' => 'checkoutSegment', 'es' => 'finalizar-compra', 'it' => 'completa-ordine', 'de' => 'kasse', 'pt' => 'finalizar-compra'],
        'shop.order-confirmation' => ['param' => 'orderConfirmationSegment', 'es' => 'pedido-recibido', 'it' => 'ordine-ricevuto', 'de' => 'bestellung-erhalten', 'pt' => 'pedido-recebido'],
    ];

    /**
     * @return array<string, string> param name => translated word, for every
     *                               route in MAP, in the given locale
     */
    public static function defaultsFor(string $locale): array
    {
        $defaults = [];

        foreach (self::MAP as $entry) {
            $defaults[$entry['param']] = $entry[$locale];
        }

        return $defaults;
    }

    public static function segment(string $routeName, string $locale): string
    {
        return self::MAP[$routeName][$locale];
    }

    public static function paramName(string $routeName): string
    {
        return self::MAP[$routeName]['param'];
    }

    /**
     * @return array<int, string> every translated word for this route name,
     *                            used to build the route's where() regex
     */
    public static function alternatives(string $routeName): array
    {
        $entry = self::MAP[$routeName];

        return [$entry['es'], $entry['it'], $entry['de'], $entry['pt']];
    }

    /**
     * The current page's equivalent URL in every supported locale: used by
     * the language switcher and by the layout's hreflang alternates. Built
     * from the current route's name + bound parameters rather than a
     * hardcoded path, so a product or category page lands on the *same*
     * item, just translated, instead of bouncing to the homepage.
     *
     * @return array<string, string> locale => absolute URL
     */
    public static function urlsForOtherLocales(): array
    {
        $route = request()->route();

        if (! $route || ! $route->getName()) {
            return [];
        }

        $name = $route->getName();
        $params = $route->parameters();

        $owningRouteByParam = [];
        foreach (self::MAP as $routeName => $entry) {
            $owningRouteByParam[$entry['param']] = $routeName;
        }

        $urls = [];

        foreach (['es', 'it', 'de', 'pt'] as $locale) {
            $targetParams = $params;
            $targetParams['locale'] = $locale;

            foreach (array_keys($params) as $paramName) {
                if (isset($owningRouteByParam[$paramName])) {
                    $targetParams[$paramName] = self::segment($owningRouteByParam[$paramName], $locale);
                }
            }

            try {
                $urls[$locale] = route($name, $targetParams);
            } catch (\Throwable) {
                $urls[$locale] = route('home', ['locale' => $locale]);
            }
        }

        return $urls;
    }
}
