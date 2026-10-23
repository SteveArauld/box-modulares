<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public const SUPPORTED_LOCALES = ['es', 'it', 'de', 'pt'];

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
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // A "?lang=" query parameter takes priority over the session when
        // present. The language switcher itself never needs it (it already
        // persists to the session), but it gives every page a second,
        // stateless way to request a specific language — the one hreflang
        // alternates use, since Googlebot does not carry session cookies
        // between crawls and would otherwise see the same locale on every
        // alternate URL.
        $queryLocale = $request->query('lang');

        if (is_string($queryLocale) && in_array($queryLocale, self::SUPPORTED_LOCALES, true)) {
            $request->session()->put('locale', $queryLocale);
            app()->setLocale($queryLocale);

            return $next($request);
        }

        $locale = $request->session()->get('locale');

        if (is_string($locale) && in_array($locale, self::SUPPORTED_LOCALES, true)) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
