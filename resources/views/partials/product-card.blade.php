@php
    $productName = $product->translatedValue('name', app()->getLocale(), 'es') ?? 'Producto';
    $productSlug = $product->translatedValue('slug', app()->getLocale(), 'es') ?? '';
    $productImage = $product->cover_image ?: $product->gallery->first()?->path;
    $productCategory = $product->categories->first();
@endphp
<div class="wd-product wd-col wd-hover-standard product-grid-item product type-product {{ $product->is_in_stock ? 'instock' : 'outofstock' }} {{ $product->is_purchasable ? 'purchasable' : '' }} product-type-simple" data-id="{{ $product->source_id }}">
    <div class="wd-product-wrapper product-wrapper">
        <div class="wd-product-thumb product-element-top wd-quick-shop">
            <a href="{{ route('product', $productSlug) }}" class="wd-product-img-link product-image-link" tabindex="-1" aria-label="{{ $productName }}">
                <img loading="lazy" decoding="async" src="{{ $productImage ? asset($productImage) : asset('/wp-content/uploads/2026/07/banner-side-1024x683.png') }}" class="attachment-large size-large" alt="{{ $productName }}">
            </a>
            @if($product->gallery->count() > 1)
                <div class="wd-product-img-hover hover-img"><img loading="lazy" decoding="async" src="{{ asset($product->gallery->skip(1)->first()->path) }}" class="attachment-large size-large" alt="{{ $productName }}"></div>
            @endif
            @if($product->on_sale)<div class="product-labels"><span class="product-label sale">Oferta</span></div>@endif
            <div class="wd-buttons wd-pos-r-t"></div>
        </div>
        <div class="product-element-bottom">
            <h3 class="wd-entities-title"><a href="{{ route('product', $productSlug) }}">{{ $productName }}</a></h3>
            @if($productCategory)
                <div class="wd-product-cats"><a href="{{ route('category', $productCategory->translatedValue('slug', app()->getLocale(), 'es')) }}" rel="tag">{{ $productCategory->translatedValue('name', app()->getLocale(), 'es') }}</a></div>
            @endif
            <span class="price">
                @if($product->on_sale && $product->regular_price > $product->price)<del><span class="woocommerce-Price-amount amount">{{ number_format((float) $product->regular_price, 2, ',', '.') }} €</span></del> <ins>@endif
                <span class="woocommerce-Price-amount amount"><bdi>{{ number_format((float) $product->price, 2, ',', '.') }} €</bdi></span>
                @if($product->on_sale && $product->regular_price > $product->price)</ins>@endif
            </span>
            <div class="wd-add-btn wd-add-btn-replace"><a href="{{ route('product', $productSlug) }}" class="button product_type_simple"><span class="wd-action-icon"></span><span class="wd-action-text">Ver producto</span></a></div>
        </div>
    </div>
</div>
