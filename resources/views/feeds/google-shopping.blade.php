<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">
<channel>
    <title>{{ config('app.name') }}</title>
    <link>{{ url('/') }}</link>
    <description>{{ __('Flujo de productos de :app para Google Merchant Center.', ['app' => config('app.name')]) }}</description>
@foreach ($products as $product)
    <item>
        <g:id>{{ $product->sku ?: $product->id }}</g:id>
        <title>{{ \Illuminate\Support\Str::limit($product->translatedValue('name', $locale), 150, '') }}</title>
        <description>{{ \Illuminate\Support\Str::limit(trim(strip_tags($product->translatedValue('description', $locale) ?: $product->translatedValue('short_description', $locale) ?: $product->translatedValue('name', $locale))), 5000, '') }}</description>
        <link>{{ route('product', $product->getTranslation('slug', 'es')) }}</link>
        @if ($product->coverImage)
        <g:image_link>{{ asset(ltrim($product->coverImage, '/')) }}</g:image_link>
        @endif
        <g:availability>in stock</g:availability>
        <g:condition>new</g:condition>
        <g:price>{{ number_format($product->regularPrice, 2, '.', '') }} {{ $product->prices['currency_code'] ?? 'EUR' }}</g:price>
        @if ($product->on_sale && $product->price < $product->regularPrice)
        <g:sale_price>{{ number_format($product->price, 2, '.', '') }} {{ $product->prices['currency_code'] ?? 'EUR' }}</g:sale_price>
        @endif
        <g:brand>{{ config('app.name') }}</g:brand>
        @if ($product->category)
        <g:product_type>{{ $product->category->translatedValue('name', $locale) }}</g:product_type>
        @endif
        <g:identifier_exists>no</g:identifier_exists>
    </item>
@endforeach
</channel>
</rss>
