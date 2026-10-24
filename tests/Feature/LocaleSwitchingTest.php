<?php

namespace Tests\Feature;

use App\Http\Middleware\SetLocale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocaleSwitchingTest extends TestCase
{
    use RefreshDatabase;

    public function test_each_supported_locales_home_page_renders_in_that_language(): void
    {
        foreach (SetLocale::SUPPORTED_LOCALES as $locale) {
            $this->get("/{$locale}")
                ->assertOk()
                ->assertSee('<html lang="'.$locale.'"', false);
        }
    }

    public function test_an_unsupported_locale_segment_is_not_routable(): void
    {
        // Accept: application/json sidesteps a debug-mode HTML error
        // renderer quirk in this environment (missing views/exception_full
        // template) that masks the actual 404 behind a 500 — the JSON path
        // still reports the real status code either way.
        $this->getJson('/en')->assertNotFound();
        $this->getJson('/fr')->assertNotFound();
    }

    /**
     * Regression guard for a found bug: a URL matching no route at all
     * (an old pre-rebuild link, a typo) never runs SetLocale — it's only
     * registered on the locale-prefixed route group, which a completely
     * unmatched request never enters — so URL::defaults() was never set.
     * The 404 page itself links to route('shop.search'), which needs those
     * defaults, so rendering the error page crashed into an unrelated 500
     * instead of showing a translated 404.
     */
    public function test_a_completely_unmatched_url_renders_a_real_translated_404_not_a_500(): void
    {
        foreach (SetLocale::SUPPORTED_LOCALES as $locale) {
            $this->get("/{$locale}/cette-page-nexiste-pas")
                ->assertNotFound()
                ->assertSee('<html lang="'.$locale.'"', false);
        }

        // An old, pre-rebuild link with no locale segment at all.
        $this->get('/contactanos/')->assertNotFound();
    }

    public function test_the_root_url_redirects_to_the_sites_default_locale(): void
    {
        $this->get('/')->assertRedirect(url('/'.SetLocale::DEFAULT_LOCALE));
    }

    public function test_the_same_static_page_has_a_distinct_translated_url_per_locale(): void
    {
        $this->get('/it/informativa-sulla-privacy')->assertOk();
        $this->get('/de/datenschutzerklaerung')->assertOk();
        $this->get('/es/politica-de-privacidad')->assertOk();
        $this->get('/pt/politica-de-privacidade')->assertOk();
    }
}
