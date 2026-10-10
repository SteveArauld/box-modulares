<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Menu labels used in the scraped navigation that don't map 1:1 to a
     * category name (either a parent grouping label with no catalog record
     * of its own, or a stale/orphan sub-item). Each falls back to the
     * nearest real category so every nav link still leads somewhere useful.
     */
    private const NAV_LABEL_FALLBACKS = [
        'Generadores y Energía' => 'Generadores de apoyo solar',
        'Jardín y Exterior' => 'Barbacoas',
        'Calefacción' => 'Palet de leña',
        'Maquinaria y Transporte' => 'Minidumpers',
        'Nuestros remolques' => 'Remolque de Equipaje',
        'Grupos' => 'Generadores Eléctricos',
    ];

    private const LOCALE_LABELS = [
        'es' => 'ES',
        'it' => 'IT',
        'de' => 'DE',
        'pt' => 'PT',
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['partials.header', 'partials.footer'], function ($view): void {
            $categories = Category::query()->where('is_visible', true)->withCount('products')->orderBy('name->es')->get();

            $slugByName = $categories->mapWithKeys(fn (Category $category) => [
                $category->translatedValue('name') => $category->translatedValue('slug'),
            ]);

            $categoryHref = $slugByName->map(fn (string $slug) => route('category', $slug));

            foreach (self::NAV_LABEL_FALLBACKS as $label => $fallbackName) {
                if (! $categoryHref->has($label) && $slugByName->has($fallbackName)) {
                    $categoryHref->put($label, route('category', $slugByName->get($fallbackName)));
                }
            }

            $currentCategory = request()->route('slug') && request()->routeIs('category')
                ? $categories->first(fn (Category $category) => $category->translatedValue('slug') === request()->route('slug'))
                : null;

            $view->with('navCategories', $categories);
            $view->with('categoryHref', $categoryHref);
            $view->with('currentCategoryName', $currentCategory?->translatedValue('name'));
            $view->with('availableLocales', self::LOCALE_LABELS);
            $view->with('currentLocale', app()->getLocale());
        });
    }
}
