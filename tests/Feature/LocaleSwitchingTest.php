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
}
