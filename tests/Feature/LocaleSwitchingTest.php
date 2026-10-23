<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class LocaleSwitchingTest extends TestCase
{
    use RefreshDatabase;

    public function test_switching_to_a_supported_locale_updates_the_session(): void
    {
        $this->get('/idioma/it');

        $this->assertSame('it', session('locale'));
    }

    #[DataProvider('unsupportedLocales')]
    public function test_switching_to_an_unsupported_locale_is_ignored(string $locale): void
    {
        $this->get('/idioma/'.$locale);

        $this->assertNotSame($locale, session('locale'));
    }

    public static function unsupportedLocales(): array
    {
        return [
            'english' => ['en'],
            'french' => ['fr'],
        ];
    }

    public function test_homepage_renders_in_each_supported_locale(): void
    {
        foreach (['es', 'it', 'de', 'pt'] as $locale) {
            $this->withSession(['locale' => $locale])
                ->get('/')
                ->assertStatus(200);
        }
    }

    public function test_switching_locale_without_a_referer_redirects_home_instead_of_looping(): void
    {
        $this->get('/idioma/it')->assertRedirect(route('home'));
    }

    public function test_switching_locale_twice_in_a_row_does_not_loop_between_switch_urls(): void
    {
        $this->withHeaders(['referer' => url('/idioma/es')])
            ->get('/idioma/it')
            ->assertRedirect(route('home'));
    }

    public function test_switching_locale_with_a_real_page_referer_returns_to_that_page(): void
    {
        $this->withHeaders(['referer' => url('/contactanos')])
            ->get('/idioma/de')
            ->assertRedirect(url('/contactanos'));
    }
}
