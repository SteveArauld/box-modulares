<?php

namespace App\Providers;

use App\Models\Category;
use App\Support\LocalizedSegments;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Top-level nav order, by Spanish slug. Mirrors the curated (non-alphabetical)
     * menu order on the reference site (box-modulares.es): categories not listed
     * here are appended alphabetically after these.
     *
     * @var list<string>
     */
    private const TOP_LEVEL_ORDER = [
        'generadores-y-energia',
        'jardin-y-exterior',
        'casas-m-viles-y-prefabricadas',
        'calefaccion',
        'maquinaria-y-transporte',
        'nuestros-remolques',
        'piscina',
        'astilladoras-de-le-a',
        'cortac-spedes-giro-cero',
        'tractores-cortac-sped',
        'trituradoras-semiprofesionales',
        'piscinas-desmontables',
    ];

    /**
     * Top-level categories whose nav item stays a flat link with no
     * dropdown, even though they have children: on the reference site,
     * "Nuestros remolques" links straight to its archive (which still
     * aggregates all its sub-categories' products), it just isn't nested
     * in the menu.
     *
     * @var list<string>
     */
    private const NAV_FLAT_DESPITE_CHILDREN = [
        'nuestros-remolques',
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
        $this->registerUnaccentLowerSqliteFunction();

        View::composer(['partials.header', 'partials.footer'], function ($view): void {
            $categories = Category::query()->where('is_visible', true)->withCount('products')->orderBy('name->es')->get();

            $currentCategory = request()->route('slug') && request()->routeIs('category')
                ? $categories->first(fn (Category $category) => $category->translatedValue('slug') === request()->route('slug'))
                : null;
            $currentCategoryName = $currentCategory?->translatedValue('name');

            $navTree = $this->buildNavTree($categories, $currentCategoryName);

            $view->with('navCategories', $categories);
            $view->with('navTree', $navTree);
            $view->with('currentCategoryName', $currentCategoryName);
            $view->with('availableLocales', self::LOCALE_LABELS);
            $view->with('currentLocale', app()->getLocale());
            $view->with('localizedUrls', LocalizedSegments::urlsForOtherLocales());
        });
    }

    /**
     * Build the nav entries shown in the header/footer menus from the real
     * parent/child category hierarchy: top-level categories (parent_id
     * null) ordered per TOP_LEVEL_ORDER, each with its visible children
     * (already alphabetical, matching the reference site).
     *
     * @param  Collection<int, Category>  $categories
     * @return Collection<int, array{label: string, href: string, active: bool, children: Collection<int, array{label: string, href: string, active: bool}>}>
     */
    private function buildNavTree(Collection $categories, ?string $currentCategoryName): Collection
    {
        $order = array_flip(self::TOP_LEVEL_ORDER);

        $topLevel = $categories
            ->filter(fn (Category $category) => $category->parent_id === null)
            ->sortBy(fn (Category $category) => $order[$category->translatedValue('slug', 'es')] ?? count($order))
            ->values();

        $flatDespiteChildren = self::NAV_FLAT_DESPITE_CHILDREN;

        return $topLevel->map(function (Category $category) use ($categories, $currentCategoryName, $flatDespiteChildren) {
            $name = $category->translatedValue('name');

            $children = in_array($category->translatedValue('slug', 'es'), $flatDespiteChildren, true)
                ? collect()
                : $categories
                    ->filter(fn (Category $child) => $child->parent_id === $category->id)
                    ->sortBy(fn (Category $child) => Str::lower(Str::ascii($child->translatedValue('name', 'es'))))
                    ->map(fn (Category $child) => [
                        'label' => $child->translatedValue('name'),
                        'href' => route('category', $child->translatedValue('slug')),
                        'active' => $child->translatedValue('name') === $currentCategoryName,
                    ])
                    ->values();

            return [
                'label' => $name,
                'href' => route('category', $category->translatedValue('slug')),
                'active' => $name === $currentCategoryName || $children->contains('active', true),
                'children' => $children,
            ];
        });
    }

    /**
     * SQLite's built-in LOWER() only folds ASCII A-Z, so accented capitals
     * (É, Ó, Á…) are left untouched and sort apart from their lowercase
     * equivalent. Several scraped product names are stored in ALL CAPS,
     * which would otherwise sort out of alphabetical order against the
     * same word written normally. Expose Str::ascii()+Str::lower() — the
     * same normalization already used for the nav's category order — as a
     * SQL function so product listings (ShopController) can sort by it.
     */
    private function registerUnaccentLowerSqliteFunction(): void
    {
        $connection = DB::connection();

        if ($connection->getDriverName() !== 'sqlite') {
            return;
        }

        $connection->getPdo()->sqliteCreateFunction(
            'UNACCENT_LOWER',
            fn (?string $value): string => Str::lower(Str::ascii((string) $value)),
            1,
        );
    }
}
