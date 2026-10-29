<?php

namespace App\Support;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Builds one Google Merchant Center item per product, in a single language.
 *
 * Products without a title and description in that language are left out:
 * falling back to Spanish inside an Italian, German or Portuguese feed is a
 * language mismatch. Duplicate listings that share a SKU, price and title
 * are collapsed so Merchant Center does not reject them as duplicates.
 */
class GoogleShoppingFeed
{
    /** Countries this shop actually delivers to, with the flat rate from the shipping policy. */
    public const SHIPPING_COUNTRIES = ['IT', 'DE', 'ES'];

    public const SHIPPING_PRICE = '400.00 EUR';

    /**
     * Google product taxonomy ids. Categories with no safe leaf (mobile homes,
     * modified containers, minidumpers) are omitted rather than mislabeled.
     *
     * @var array<int, string>
     */
    private const GOOGLE_CATEGORY_BY_ID = [
        1 => '7030',
        2 => '2985',
        4 => '720',
        5 => '716',
        6 => '3311',
        7 => '1218',
        8 => '1218',
        9 => '1218',
        11 => '4299',
        12 => '703',
        15 => '716',
        16 => '2810',
        17 => '2810',
        18 => '503767',
        19 => '4044',
        20 => '4044',
        21 => '4037',
        22 => '4044',
        23 => '4044',
        24 => '4044',
        25 => '4044',
        26 => '3811',
        27 => '4044',
        28 => '499907',
        29 => '3311',
        30 => '2072',
        33 => '1218',
        37 => '4027',
    ];

    /**
     * @param  Collection<int, Product>  $products
     * @return list<array<string, mixed>>
     */
    public function items(Collection $products, string $locale): array
    {
        $items = [];
        $seen = [];

        foreach ($products->sortBy('id') as $product) {
            $item = $this->item($product, $locale);

            if ($item === null) {
                continue;
            }

            if (isset($seen[$item['dedupe_key']])) {
                continue;
            }

            $seen[$item['dedupe_key']] = true;
            unset($item['dedupe_key']);
            $items[] = $item;
        }

        return $items;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function item(Product $product, string $locale): ?array
    {
        $name = $product->getTranslation('name', $locale, false);
        $description = $product->getTranslation('description', $locale, false);
        $short = $product->getTranslation('short_description', $locale, false);

        if (! filled($name) || (! filled($description) && ! filled($short))) {
            return null;
        }

        $images = collect($product->images ?? [])
            ->pluck('path')
            ->filter(fn ($path) => filled($path))
            ->values();

        if ($images->isEmpty()) {
            return null;
        }

        $title = $this->title((string) $name);
        $body = $this->description(filled($description) ? (string) $description : (string) $short);

        if ($body === '') {
            $body = $title;
        }

        $current = $product->price;
        $regular = $product->regularPrice;
        $showsSale = $product->on_sale && $regular > $current;
        $currency = $product->prices['currency_code'] ?? 'EUR';
        $gtin = $this->gtin(strip_tags((string) $description.' '.(string) $short));
        $slug = $product->getTranslation('slug', $locale, false) ?: $product->getTranslation('slug', 'es', false);
        $categoryName = $product->category?->getTranslation('name', $locale, false);

        return [
            'id' => (string) $product->id,
            'dedupe_key' => mb_strtolower($title).'|'.$product->sku.'|'.number_format($current, 2, '.', ''),
            'title' => $title,
            'description' => $body,
            'link' => route('product', [
                'locale' => $locale,
                LocalizedSegments::paramName('product') => LocalizedSegments::segment('product', $locale),
                'slug' => $slug,
            ]),
            'image_link' => asset(ltrim((string) $images->first(), '/')),
            'additional_image_links' => $images->slice(1, 10)
                ->map(fn ($path) => asset(ltrim((string) $path, '/')))
                ->all(),
            'availability' => 'in stock',
            'condition' => 'new',
            'price' => number_format($showsSale ? $regular : $current, 2, '.', '').' '.$currency,
            'sale_price' => $showsSale ? number_format($current, 2, '.', '').' '.$currency : null,
            'brand' => config('app.name'),
            'mpn' => filled($product->sku) ? (string) $product->sku : null,
            'gtin' => $gtin,
            'product_type' => filled($categoryName) ? $categoryName : null,
            'google_product_category' => self::GOOGLE_CATEGORY_BY_ID[$product->category_id] ?? null,
        ];
    }

    public function title(string $title): string
    {
        $title = $this->plain($title);
        $letters = preg_replace('/[^\p{L}]+/u', '', $title) ?? '';

        if ($letters !== '' && mb_strlen($letters) > 8 && mb_strtoupper($letters, 'UTF-8') === $letters) {
            $title = mb_convert_case(mb_strtolower($title, 'UTF-8'), MB_CASE_TITLE, 'UTF-8');
        }

        return Str::limit($title, 150, '');
    }

    public function description(string $html): string
    {
        $plain = $this->plain($html);

        if ($plain === '') {
            return '';
        }

        $sentences = preg_split('/(?<=[\.\!\?])\s+/u', $plain) ?: [];
        $kept = [];

        foreach ($sentences as $sentence) {
            $sentence = trim($sentence);

            if ($sentence === '' || $this->isMisleadingShippingClaim($sentence)) {
                continue;
            }

            $kept[] = $sentence;
        }

        return Str::limit(trim(implode(' ', $kept)), 5000, '');
    }

    /**
     * Remove the exact paragraphs that promise free shipping to Spain or a
     * 3–15 day delivery. Those claims contradict the shipping policy and the
     * price Google reads on the product page.
     */
    public function cleanStoredDescription(string $html): string
    {
        $paragraphs = [
            '<p><em>Envío gratis en España (Península). Entrega de 3 a 15 días.</em></p>',
            '<p><em>Spedizione gratuita in Spagna (Penisola). Consegna da 3 a 15 giorni.</em></p>',
            '<p><em>Kostenloser Versand in Spanien (Festland). Lieferung in 3 bis 15 Tagen.</em></p>',
            '<p><em>Envio grátis em Espanha (Península). Entrega de 3 a 15 dias.</em></p>',
            '<p><em>Envio gratuito em Espanha (Península). Entrega de 3 a 15 dias.</em></p>',
            '<p>Haga su pedido antes de que finalice esta promoción y disfrute de envío e instalación gratuitos en toda España para su minicasa Vagabundo de diseño personalizado.</p>',
            '<p>Effettuate il vostro ordine prima che termini questa promozione e godetevi la spedizione e l\'installazione gratuite in tutta la Spagna per la vostra minicasa Vagabundo dal design personalizzato.</p>',
            '<p>Bestellen Sie vor Ablauf dieser Aktion und genießen Sie kostenlosen Versand und kostenlose Installation in ganz Spanien für Ihr individuell gestaltetes Vagabundo-Minihaus.</p>',
            '<p>Faça a sua encomenda antes de terminar esta promoção e desfrute de envio e instalação gratuitos em toda a Espanha para a sua minicasa Vagabundo de design personalizado.</p>',
        ];

        return str_replace($paragraphs, '', $html);
    }

    public function gtin(string $text): ?string
    {
        if (! preg_match_all('/(?:EAN|GTIN|UPC)(?:\s*[-:]?\s*1[234])?[\s:]*(\d{8,14})/iu', $text, $matches)) {
            return null;
        }

        foreach ($matches[1] as $candidate) {
            if ($this->isValidGtin($candidate)) {
                return $candidate;
            }
        }

        return null;
    }

    public function isValidGtin(string $digits): bool
    {
        if (! preg_match('/^\d{8}$|^\d{12}$|^\d{13}$|^\d{14}$/', $digits)) {
            return false;
        }

        $body = substr($digits, 0, -1);
        $sum = 0;

        foreach (str_split(strrev($body)) as $index => $digit) {
            $sum += (int) $digit * ($index % 2 === 0 ? 3 : 1);
        }

        $check = (10 - ($sum % 10)) % 10;

        return $check === (int) substr($digits, -1);
    }

    private function isMisleadingShippingClaim(string $sentence): bool
    {
        $value = mb_strtolower($sentence, 'UTF-8');

        if (preg_match('/3\s*a\s*15\s*d[ií]as|de\s*3\s*a\s*15\s*dias|da\s*3\s*a\s*15\s*giorni|3\s*bis\s*15\s*tagen/u', $value) === 1) {
            return true;
        }

        $free = preg_match('/gratis|gratuita|gratuito|gratuitos|gratuite|grátis|kostenlos/u', $value) === 1;
        $shipping = preg_match('/env[ií]o|envio|spedizione|versand|instal/u', $value) === 1;
        $spain = preg_match('/espa[nñ]a|spagna|spanien|espanha|pen[ií]nsula|penisola|festland/u', $value) === 1;

        return $free && $shipping && $spain;
    }

    private function plain(string $value): string
    {
        $withSpaces = preg_replace('/<[^>]+>/', ' ', $value) ?? $value;
        $plain = html_entity_decode($withSpaces, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $plain = str_replace("\xc2\xa0", ' ', $plain);
        $plain = preg_replace('/\s+/u', ' ', $plain) ?? $plain;

        return trim($plain);
    }
}
