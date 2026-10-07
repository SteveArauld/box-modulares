@extends('layouts.app')

@section('title', $title . ' | Box Modulares')
@section('body_class', 'archive post-type-archive post-type-archive-product woocommerce-shop')

@section('content')
    <div class="wd-page-title title-size-default">
        <div class="container">
            <h1 class="title">{{ $title }}</h1>
            <nav class="wd-breadcrumbs" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Inicio</a>
                <span class="wd-delimiter">•</span>
                <span class="wd-last">{{ $title }}</span>
            </nav>
        </div>
    </div>

    <div class="wd-content-layout container">
        <div class="wd-content-area site-content">
            @if(isset($category) && $category->translatedValue('description', app()->getLocale(), 'es'))
                <div class="term-description wd-entry-content">{!! $category->translatedValue('description', app()->getLocale(), 'es') !!}</div>
            @endif

            <div class="wd-shop-tools">
                <form method="GET" action="{{ isset($category) ? route('category', $category->translatedValue('slug', app()->getLocale(), 'es')) : route('shop') }}" class="searchform wd-style-default">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar productos" aria-label="Buscar productos">
                    <button type="submit" class="searchsubmit" aria-label="Buscar"></button>
                </form>
                <form method="GET" action="{{ url()->current() }}" class="woocommerce-ordering wd-style-underline">
                    @if(request('q'))<input type="hidden" name="q" value="{{ request('q') }}">@endif
                    <select name="orderby" aria-label="Ordenar productos" onchange="this.form.submit()">
                        <option value="default" @selected(request('orderby') === 'default')>Orden predeterminado</option>
                        <option value="price" @selected(request('orderby') === 'price')>Precio: menor a mayor</option>
                        <option value="price-desc" @selected(request('orderby') === 'price-desc')>Precio: mayor a menor</option>
                    </select>
                </form>
            </div>

            <div class="wd-products-element">
                <div class="products wd-products grid-masonry wd-grid-f-col grid-columns-4 elements-grid pagination-pagination wd-loop-builder-off wd-products-with-bg" data-source="main_loop" data-columns="4" style="--wd-col-lg:4;--wd-col-md:4;--wd-col-sm:2;--wd-gap-lg:30px;--wd-gap-sm:10px;">
                    @forelse($products as $product)
                        @include('partials.product-card', ['product' => $product])
                    @empty
                        <p>No se encontraron productos.</p>
                    @endforelse
                </div>
            </div>
            <div class="wd-loop-footer">{{ $products->links() }}</div>
        </div>
    </div>
@endsection
