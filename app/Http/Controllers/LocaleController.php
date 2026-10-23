<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SetLocale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switch(Request $request, string $locale): RedirectResponse
    {
        if (in_array($locale, SetLocale::SUPPORTED_LOCALES, true)) {
            $request->session()->put('locale', $locale);
        }

        return redirect()->to($this->safeRedirectTarget($request));
    }

    /**
     * redirect()->back() blindly trusts the Referer header. Without one
     * (direct link, strict Referrer-Policy, a bot) it falls back to the
     * app URL, which is harmless — but if the Referer itself is another
     * "idioma/{locale}" switch link (e.g. two switcher clicks in a row,
     * or a crawler following them in sequence), back-and-forth navigation
     * between two switch URLs becomes an infinite redirect loop. Falling
     * back to the home page whenever the referrer is a switch URL itself
     * breaks that loop.
     */
    private function safeRedirectTarget(Request $request): string
    {
        $referer = $request->headers->get('referer');

        if (! $referer || str_contains($referer, '/idioma/')) {
            return route('home');
        }

        return $referer;
    }
}
