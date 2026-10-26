<?php

namespace App\Http\Middleware;

use App\Support\LocalizedSegments;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * ES, IT, PT and DE are active. See app/Support/LocalizedSegments.php
     * for the full per-locale route-word map this list draws from.
     */
    public const SUPPORTED_LOCALES = ['es', 'it', 'pt', 'de'];

    /**
     * The site's actual default language (APP_LOCALE), kept as a constant
     * rather than read back from config('app.locale') at render time:
     * Illuminate\Foundation\Application::setLocale() overwrites that config
     * key with whatever locale is active for the current request, so by the
     * time a view asks for "the default locale" it would actually get the
     * current one instead.
     */
    public const DEFAULT_LOCALE = 'it';

    /**
     * Handle an incoming request.
     *
     * Every content route starts with a "{locale}" segment (see
     * routes/web.php), so the active language is read from there rather
     * than a session cookie — each language now lives at its own URL. This
     * also fills in every route()'s "{xSegment}" translated-path parameter
     * via URL::defaults(), so existing route('shop.privacy-policy') calls
     * across the app keep working unchanged: Laravel silently supplies
     * "locale" and "privacyPolicySegment" from these defaults whenever a
     * call doesn't pass them explicitly.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');

        if (! is_string($locale) || ! in_array($locale, self::SUPPORTED_LOCALES, true)) {
            $locale = self::DEFAULT_LOCALE;
        }

        app()->setLocale($locale);

        URL::defaults(array_merge(
            ['locale' => $locale],
            LocalizedSegments::defaultsFor($locale),
        ));

        return $next($request);
    }
}
