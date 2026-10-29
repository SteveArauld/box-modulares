<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">
<channel>
    <title>{{ config('app.name') }} ({{ $locale }})</title>
    <link>{{ url('/'.$locale) }}</link>
    <description>{{ config('app.name') }} — {{ $locale }}</description>
@foreach ($items as $item)
    <item>
        <g:id>{{ $item['id'] }}</g:id>
        <title>{{ $item['title'] }}</title>
        <description>{{ $item['description'] }}</description>
        <link>{{ $item['link'] }}</link>
        <g:image_link>{{ $item['image_link'] }}</g:image_link>
        @foreach ($item['additional_image_links'] as $image)
        <g:additional_image_link>{{ $image }}</g:additional_image_link>
        @endforeach
        <g:availability>{{ $item['availability'] }}</g:availability>
        <g:condition>{{ $item['condition'] }}</g:condition>
        <g:price>{{ $item['price'] }}</g:price>
        @if ($item['sale_price'])
        <g:sale_price>{{ $item['sale_price'] }}</g:sale_price>
        @endif
        <g:brand>{{ $item['brand'] }}</g:brand>
        @if ($item['mpn'])
        <g:mpn>{{ $item['mpn'] }}</g:mpn>
        @endif
        @if ($item['gtin'])
        <g:gtin>{{ $item['gtin'] }}</g:gtin>
        @else
        <g:identifier_exists>no</g:identifier_exists>
        @endif
        @if ($item['product_type'])
        <g:product_type>{{ $item['product_type'] }}</g:product_type>
        @endif
        @if ($item['google_product_category'])
        <g:google_product_category>{{ $item['google_product_category'] }}</g:google_product_category>
        @endif
        @foreach (\App\Support\GoogleShoppingFeed::SHIPPING_COUNTRIES as $country)
        <g:shipping>
            <g:country>{{ $country }}</g:country>
            <g:service>Standard</g:service>
            <g:price>{{ \App\Support\GoogleShoppingFeed::SHIPPING_PRICE }}</g:price>
            <g:min_handling_time>1</g:min_handling_time>
            <g:max_handling_time>3</g:max_handling_time>
            <g:min_transit_time>3</g:min_transit_time>
            <g:max_transit_time>7</g:max_transit_time>
        </g:shipping>
        @endforeach
    </item>
@endforeach
</channel>
</rss>
