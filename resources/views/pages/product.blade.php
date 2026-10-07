@extends('layouts.app')

@section('title', 'Box Modulares | Materiales de Construcción, Jardín, Pérgolas, Piscinas y Equipamiento')
@section('body_class', 'home page page-id-120 elementor-page elementor-page-120')

@section('content')


<style>
    .pellets-delivery-badge {
        display: inline-block;
        width: 100%;
        box-sizing: border-box;
        border: 1.5px solid #7DA66A;
        border-radius: 7px;
        padding: 10px 14px;
        margin: 12px 0;
        background-color: #f0f7ec;
        font-size: 14px;
        line-height: 1.6;
    }

    .pellets-delivery-badge.pellets-delivery-cart {
        margin: 6px 0 2px;
        font-size: 12.5px;
        padding: 7px 11px;
    }

    .pellets-delivery-badge.pellets-delivery-checkout {
        margin: 0 0 16px;
        background-color: #eaf4e4;
    }

    .pellets-delivery-badge.pellets-delivery-thankyou {
        margin: 16px 0;
        background-color: #eaf4e4;
        border-color: #2F6B3A;
    }

    .pellets-del-shipping {
        color: #2F6B3A;
        font-weight: 700;
        margin-bottom: 3px;
    }

    .pellets-del-dates {
        color: #444;
    }

    .pellets-del-dates strong {
        color: #2F6B3A;
        font-weight: 700;
    }


    /* ── Bouton fiche produit ── */
    .pellets-wa-product-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 12px;
        padding: 13px 20px;
        background-color: #25D366;
        color: #ffffff !important;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none !important;
        border-radius: 6px;
        width: 100%;
        box-sizing: border-box;
        transition: background-color 0.2s ease, transform 0.15s ease;
    }

    .pellets-wa-product-btn:hover {
        background-color: #1ebe5d;
        color: #ffffff !important;
        transform: translateY(-1px);
    }

    .pellets-wa-product-btn:active {
        transform: translateY(0);
    }

    .pellets-wa-product-btn svg {
        flex-shrink: 0;
    }

    /* ── Bouton flottant ── */
    .pellets-wa-float {
        position: fixed;
        bottom: 28px;
        right: 28px;
        z-index: 9999;
        background-color: #25D366;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.28);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        text-decoration: none !important;
    }

    .pellets-wa-float:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.32);
    }

    .pellets-wa-float:hover .pellets-wa-tooltip {
        opacity: 1;
        transform: translateX(0);
    }

    /* Tooltip */
    .pellets-wa-tooltip {
        position: absolute;
        right: 70px;
        background: #1a1a1a;
        color: #fff;
        font-size: 13px;
        font-weight: 500;
        padding: 6px 12px;
        border-radius: 5px;
        white-space: nowrap;
        opacity: 0;
        transform: translateX(8px);
        transition: opacity 0.2s ease, transform 0.2s ease;
        pointer-events: none;
    }

    .pellets-wa-tooltip::after {
        content: "";
        position: absolute;
        left: 100%;
        top: 50%;
        transform: translateY(-50%);
        border: 5px solid transparent;
        border-left-color: #1a1a1a;
    }

    /*# sourceURL=wp-block-library-inline-css */
    div.quantity {
        --wd-form-height: 42px;
        display: inline-flex;
        vertical-align: top;
        white-space: nowrap
    }

    div.quantity input[type=number]::-webkit-inner-spin-button,
    div.quantity input[type=number]::-webkit-outer-spin-button,
    div.quantity input[type=number] {
        margin: 0;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none
    }

    div.quantity :is(input[type=number],
        input[type=text],
        input[type=button]) {
        display: inline-block;
        color: var(--wd-form-color);
        min-height: var(--wd-form-height);
        height: unset
    }

    div.quantity input[type=number] {
        width: 30px;
        border-radius: 0;
        border-right: none;
        border-left: none
    }

    div.quantity input[type=text] {
        width: var(--quantity-space, 80px);
        text-align: center
    }

    div.quantity input[type=button] {
        padding: 0 5px;
        min-width: 25px;
        border: var(--wd-form-brd-width) solid var(--wd-form-brd-color);
        background: var(--wd-form-bg);
        box-shadow: none
    }

    div.quantity input[type=button]:hover {
        color: #fff;
        background-color: var(--wd-primary-color);
        border-color: var(--wd-primary-color)
    }

    div.quantity .minus {
        border-start-start-radius: var(--wd-form-brd-radius);
        border-end-start-radius: var(--wd-form-brd-radius)
    }

    div.quantity .plus {
        border-start-end-radius: var(--wd-form-brd-radius);
        border-end-end-radius: var(--wd-form-brd-radius)
    }

    div.quantity.hidden {
        display: none !important
    }

    .form-style-underlined div.quantity input[type=number],
    .form-style-underlined div.quantity input[type=text] {
        border-top-style: solid
    }

    @-moz-document url-prefix() {
        div.quantity input[type=number] {
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            appearance: textfield
        }
    }

    /*# sourceURL=/wp-content/themes/woodmart/css/parts/woo-mod-quantity.css */
</style>


<main id="main-content" class="wd-content-layout content-layout-wrapper container wd-builder-on" role="main">
    <div class="wd-content-area site-content">
        <link rel="stylesheet" id="wd-woo-single-prod-builder-css" href="/wp-content/themes/woodmart/css/parts/woo-single-prod-builder.css?ver=8.5.2" type="text/css" media="all">
        <div id="product-6807" class="single-product-page entry-content product type-product post-6807 status-publish first instock product_cat-casa-movil-y-prefabricada has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
            <link rel="stylesheet" id="elementor-post-1824-css" href="/wp-content/uploads/elementor/css/post-1824.css?ver=1790099270" type="text/css" media="all">
            <div data-elementor-type="wp-post" data-elementor-id="1824" class="elementor elementor-1824">
                <div class="wd-negative-gap elementor-element elementor-element-e8dc27d e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="e8dc27d" data-element_type="container" data-e-type="container">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-4db3b22 wd-el-breadcrumbs text-left elementor-widget elementor-widget-wd_wc_breadcrumb" data-id="4db3b22" data-element_type="widget" data-e-type="widget" data-widget_type="wd_wc_breadcrumb.default">
                            <div class="elementor-widget-container">
                                <nav class="wd-breadcrumbs woocommerce-breadcrumb" aria-label="Breadcrumb"> <a href="https://domaine.it">
                                        Inicio </a>
                                    <span class="wd-delimiter">•</span> <a href="/categoria-producto/casa-movil-y-prefabricada/" class="wd-last-link">
                                        Casas Móviles y Prefabricadas </a>
                                    <span class="wd-delimiter">•</span> <span class="wd-last">
                                        Casa Movil Pro con dos dormitorio de 4 cama 57m² </span>
                                </nav>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3273d56 wd-single-nav text-left elementor-widget elementor-widget-wd_single_product_nav" data-id="3273d56" data-element_type="widget" data-e-type="widget" data-widget_type="wd_single_product_nav.default">
                            <div class="elementor-widget-container">
                                <link rel="stylesheet" id="wd-woo-single-prod-el-navigation-css" href="/wp-content/themes/woodmart/css/parts/woo-single-prod-el-navigation.css?ver=8.5.2" type="text/css" media="all">
                                <div class="wd-products-nav">
                                    <div class="wd-event-hover">
                                        <a class="wd-product-nav-btn wd-btn-prev" href="/producto/casa-movil-irm-hampton-residentiel/" aria-label="Producto anterior"></a>

                                        <div class="wd-dropdown">
                                            <a href="/producto/casa-movil-irm-hampton-residentiel/" class="wd-product-nav-thumb">
                                                <img width="150" height="150" src="/wp-content/uploads/2026/07/BE117FA0-2498-44B3-894D-014B58845050_720x-1-150x150.webp" class="attachment-thumbnail size-thumbnail" alt="Casa Movil IRM Hampton RESIDENTIEL" decoding="async"> </a>

                                            <div class="wd-product-nav-desc">
                                                <a href="/producto/casa-movil-irm-hampton-residentiel/" class="wd-entities-title">
                                                    Casa Movil IRM Hampton RESIDENTIEL </a>

                                                <span class="price">
                                                    <del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol" translate="no">€</span>9.795,00</bdi></span></del> <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol" translate="no">€</span>8.394,00</bdi></span></ins> </span>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="/tienda/" class="wd-product-nav-btn wd-btn-back wd-tooltip">
                                        <span>
                                            Volver a productos </span>
                                    </a>

                                    <div class="wd-event-hover">
                                        <a class="wd-product-nav-btn wd-btn-next" href="/producto/casa-movel-t2-residencia-express/" aria-label="Siguiente producto"></a>

                                        <div class="wd-dropdown">
                                            <a href="/producto/casa-movel-t2-residencia-express/" class="wd-product-nav-thumb">
                                                <img width="150" height="150" src="/wp-content/uploads/2026/07/E44873EA-AF96-4591-B0FC-F45512C5597B_720x-150x150.webp" class="attachment-thumbnail size-thumbnail" alt="CASA MOVEL T2 Residencia Express" decoding="async"> </a>

                                            <div class="wd-product-nav-desc">
                                                <a href="/producto/casa-movel-t2-residencia-express/" class="wd-entities-title">
                                                    CASA MOVEL T2 Residencia Express </a>

                                                <span class="price">
                                                    <del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol" translate="no">€</span>6.595,00</bdi></span></del> <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol" translate="no">€</span>4.694,00</bdi></span></ins> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wd-negative-gap elementor-element elementor-element-a36074d e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="a36074d" data-element_type="container" data-e-type="container">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-b03391e wd-wc-notices elementor-widget elementor-widget-wd_wc_notices" data-id="b03391e" data-element_type="widget" data-e-type="widget" data-widget_type="wd_wc_notices.default">
                            <div class="elementor-widget-container">
                                <link rel="stylesheet" id="wd-woo-el-notices-builder-css" href="/wp-content/themes/woodmart/css/parts/woo-el-notices-builder.css?ver=8.5.2" type="text/css" media="all">
                                <div class="woocommerce-notices-wrapper"></div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-95e239d e-con-full e-flex e-con e-child" data-id="95e239d" data-element_type="container" data-e-type="container">
                            <div class="elementor-element elementor-element-6a50c46 e-con-full e-flex e-con e-child" data-id="6a50c46" data-element_type="container" data-e-type="container">
                                <div class="elementor-element elementor-element-7150805 elementor-hidden-tablet elementor-hidden-mobile wd-single-gallery elementor-widget-theme-post-content elementor-widget elementor-widget-wd_single_product_gallery" data-id="7150805" data-element_type="widget" data-e-type="widget" data-widget_type="wd_single_product_gallery.default">
                                    <div class="elementor-widget-container">
                                        <link rel="stylesheet" id="wd-woo-single-prod-el-gallery-css" href="/wp-content/themes/woodmart/css/parts/woo-single-prod-el-gallery.css?ver=8.5.2" type="text/css" media="all">
                                        <link rel="stylesheet" id="wd-woo-single-prod-el-gallery-opt-thumb-grid-lg-css" href="/wp-content/themes/woodmart/css/parts/woo-single-prod-el-gallery-opt-thumb-grid.css?ver=8.5.2" type="text/css" media="(min-width: 1025px)">
                                        <link rel="stylesheet" id="wd-swiper-css" href="/wp-content/themes/woodmart/css/parts/lib-swiper.css?ver=8.5.2" type="text/css" media="all">
                                        <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images wd-has-thumb thumbs-grid-bottom_column images image-action-zoom" style="opacity: 1;">
                                            <div class="wd-carousel-container wd-gallery-images wd-off-lg">
                                                <div class="wd-carousel-inner">

                                                    <link rel="stylesheet" id="wd-woo-mod-product-labels-default-css" href="/wp-content/themes/woodmart/css/parts/woo-mod-product-labels-default.css?ver=8.5.2" type="text/css" media="all">
                                                    <link rel="stylesheet" id="wd-woo-mod-product-labels-css" href="/wp-content/themes/woodmart/css/parts/woo-mod-product-labels.css?ver=8.5.2" type="text/css" media="all">
                                                    <div class="product-labels labels-rounded-sm">
                                                        <span class="onsale product-label wd-shape-round-sm">-9%</span>
                                                    </div>

                                                    <figure class="woocommerce-product-gallery__wrapper wd-carousel wd-grid" style="--wd-col-lg:2;--wd-col-md:1;--wd-col-sm:1;">
                                                        <div class="wd-carousel-wrap">

                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/1-18-1-150x113.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 1" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;"><a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/1-18-1.webp"><img width="580" height="435" src="/wp-content/uploads/2026/07/1-18-1.webp" class="wp-post-image wp-post-image" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 1" title="1-18" data-caption="" data-src="/wp-content/uploads/2026/07/1-18-1.webp" data-large_image="/wp-content/uploads/2026/07/1-18-1.webp" data-large_image_width="580" data-large_image_height="435" decoding="async" fetchpriority="high" srcset="/wp-content/uploads/2026/07/1-18-1.webp 580w, /wp-content/uploads/2026/07/1-18-1-300x225.webp 300w, /wp-content/uploads/2026/07/1-18-1-150x113.webp 150w" sizes="(max-width: 580px) 100vw, 580px"></a><img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 1" src="/wp-content/uploads/2026/07/1-18-1.webp" class="zoomImg" style="position: absolute; top: -20.8283px; left: -30.1337px; opacity: 0; width: 580px; height: 435px; border: medium; max-width: none; max-height: none;"></figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 2" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 2" title="A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 3" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 3" title="A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 4" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 4" title="A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 5" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 5" title="A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 6" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 6" title="A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 7" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 7" title="A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 8" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 8" title="A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 9" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 9" title="A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 10" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 10" title="A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 11" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 11" title="A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 12" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 12" title="A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 13" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 13" title="A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 14" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 14" title="A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 15" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 15" title="A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 16" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 16" title="A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 17" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 17" title="A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 18" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 18" title="A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1-150x104.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 19" class="woocommerce-product-gallery__image">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1.webp">
                                                                        <img width="300" height="207" src="/wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 19" title="Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1" data-caption="" data-src="/wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1.webp" data-large_image="/wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1.webp" data-large_image_width="300" data-large_image_height="207" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1.webp 300w, /wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1-150x104.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </figure>

                                                    <link rel="stylesheet" id="wd-swiper-arrows-critical-css" href="/wp-content/themes/woodmart/css/parts/lib-swiper-arrows-critical.css?ver=8.5.2" type="text/css" media="all">
                                                    <div class="wd-nav-arrows wd-pos-sep wd-hover-1 wd-custom-style wd-icon-1">
                                                        <div class="wd-btn-arrow wd-prev wd-disabled">
                                                            <div class="wd-arrow-inner"></div>
                                                        </div>
                                                        <div class="wd-btn-arrow wd-next">
                                                            <div class="wd-arrow-inner"></div>
                                                        </div>
                                                    </div>

                                                    <div class="product-additional-galleries">
                                                        <div class="wd-show-product-gallery-wrap wd-action-btn wd-style-icon-bg-text wd-gallery-btn">
                                                            <a href="#" rel="nofollow" class="woodmart-show-product-gallery">
                                                                <span class="wd-action-icon"></span>
                                                                <span class="wd-action-text">
                                                                    Haga clic para ampliar </span>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-b6075ab e-con-full e-flex e-con e-child" data-id="b6075ab" data-element_type="container" data-e-type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-element elementor-element-2f22a65 wd-width-100 elementor-widget elementor-widget-wd_title" data-id="2f22a65" data-element_type="widget" data-e-type="widget" data-widget_type="wd_title.default">
                                        <div class="elementor-widget-container">
                                            <link rel="stylesheet" id="wd-section-title-css" href="/wp-content/themes/woodmart/css/parts/el-section-title.css?ver=8.5.2" type="text/css" media="all">
                                            <div class="title-wrapper wd-set-mb reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


                                                <div class="liner-continer">
                                                    <h4 class="woodmart-title-container title wd-fontsize-l">Descripción</h4>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-adb4929 wd-single-content elementor-widget elementor-widget-wd_single_product_content" data-id="adb4929" data-element_type="widget" data-e-type="widget" data-widget_type="wd_single_product_content.default">
                                        <div class="elementor-widget-container">
                                            <div>una casa prefabricada con estructura de acero, con posibilidad de ser utilizada como mobil home.</div>
                                            <div></div>
                                            <div>Acuerdo</div>
                                            <div>desde el baño, Dormitorio 1, Dormitorio 2/Oficina, Segundo baño.</div>
                                            <div></div>
                                            <div>Área de estar</div>
                                            <div>47,6 m².</div>
                                            <div></div>
                                            <div>Dimensiones</div>
                                            <div>Longitud: 13,20 m</div>
                                            <div>Ancho: 4,30 m</div>
                                            <div>Superficie total: 56,8 m²</div>
                                            <div></div>
                                            <div>Peso</div>
                                            <div>12.000 kilos.</div>
                                            <div></div>
                                            <div>Altura del techo</div>
                                            <div>2,50 metros.</div>
                                            <div></div>
                                            <div>Usos</div>
                                            <div>Alojamiento del personal, ubicación (hotel).</div>
                                            <div></div>
                                            <div>Número de pasos</div>
                                            <div>1.</div>
                                            <div></div>
                                            <div>Tipo de</div>
                                            <div>Techo Techo de chapa.</div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-f1a04a2 wd-single-attrs wd-layout-list wd-style-bordered elementor-widget elementor-widget-wd_single_product_additional_info_table" data-id="f1a04a2" data-element_type="widget" data-e-type="widget" data-widget_type="wd_single_product_additional_info_table.default">
                                        <div class="elementor-widget-container">
                                            <h4 class="wd-el-title title element-title">
                                                <span class="title-text">
                                                    Additional information​ </span>
                                            </h4>
                                            <link rel="stylesheet" id="wd-woo-mod-shop-attributes-builder-css" href="/wp-content/themes/woodmart/css/parts/woo-mod-shop-attributes-builder.css?ver=8.5.2" type="text/css" media="all">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <link rel="stylesheet" id="wd-int-elem-opt-sticky-column-css" href="/wp-content/themes/woodmart/css/parts/int-elem-opt-sticky-column.css?ver=8.5.2" type="text/css" media="all">
                            <div class="wd-sticky-container-lg wd-sticky-container-md-sm elementor-element elementor-element-032025e e-con-full e-flex e-con e-child" data-id="032025e" data-element_type="container" data-e-type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" style="">
                                <div class="elementor-element elementor-element-cd3f1cf wd-single-title text-left elementor-widget elementor-widget-wd_single_product_title" data-id="cd3f1cf" data-element_type="widget" data-e-type="widget" data-widget_type="wd_single_product_title.default">
                                    <div class="elementor-widget-container">

                                        <h1 class="product_title entry-title wd-entities-title">

                                            Casa Movil Pro con dos dormitorio de 4 cama 57m²
                                        </h1>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-ce6e343 elementor-hidden-desktop elementor-hidden-tablet wd-single-gallery elementor-widget-theme-post-content elementor-widget elementor-widget-wd_single_product_gallery" data-id="ce6e343" data-element_type="widget" data-e-type="widget" data-widget_type="wd_single_product_gallery.default">
                                    <div class="elementor-widget-container">
                                        <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images wd-has-thumb thumbs-grid-bottom_column images image-action-zoom" style="opacity: 1;">
                                            <div class="wd-carousel-container wd-gallery-images wd-off-lg">
                                                <div class="wd-carousel-inner">

                                                    <div class="product-labels labels-rounded-sm">
                                                        <span class="onsale product-label wd-shape-round-sm">-9%</span>
                                                    </div>

                                                    <figure class="woocommerce-product-gallery__wrapper wd-carousel wd-grid" style="--wd-col-lg:2;--wd-col-md:1;--wd-col-sm:1;">
                                                        <div class="wd-carousel-wrap">

                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/1-18-1-150x113.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 1" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;"><a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/1-18-1.webp"><img width="580" height="435" src="/wp-content/uploads/2026/07/1-18-1.webp" class="wp-post-image wp-post-image" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 1" title="1-18" data-caption="" data-src="/wp-content/uploads/2026/07/1-18-1.webp" data-large_image="/wp-content/uploads/2026/07/1-18-1.webp" data-large_image_width="580" data-large_image_height="435" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/1-18-1.webp 580w, /wp-content/uploads/2026/07/1-18-1-300x225.webp 300w, /wp-content/uploads/2026/07/1-18-1-150x113.webp 150w" sizes="auto, (max-width: 580px) 100vw, 580px"></a><img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 1" src="/wp-content/uploads/2026/07/1-18-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 580px; height: 435px; border: medium; max-width: none; max-height: none;"></figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 2" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 2" title="A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 2" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-1-1-580x387-1-300x300-1-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 3" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 3" title="A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 3" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-1-580x387-1-300x300-1-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 4" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 4" title="A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 4" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-2-580x387-1-300x300-1-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 5" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 5" title="A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 5" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-3-1-580x387-1-300x300-1-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 6" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 6" title="A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 6" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-4-1-580x387-1-300x300-1-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 7" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 7" title="A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 7" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-7-1-580x387-1-300x300-1-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 8" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 8" title="A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 8" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-9-580x387-1-300x300-1-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 9" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 9" title="A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 9" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-10-580x387-1-300x300-1-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 10" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 10" title="A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 10" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-12-580x387-1-300x300-1-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 11" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 11" title="A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 11" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-13-580x387-1-300x300-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 12" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 12" title="A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 12" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-14-580x387-1-300x300-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 13" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 13" title="A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 13" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-15-580x387-1-300x300-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 14" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 14" title="A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 14" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-16-580x387-1-300x300-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 15" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 15" title="A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 15" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-17-580x387-1-300x300-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 16" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 16" title="A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 16" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-18-580x387-1-300x300-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 17" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 17" title="A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 17" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Innen-Januar-19-580x387-1-300x300-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1-150x150.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 18" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1.webp">
                                                                        <img width="300" height="300" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 18" title="A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1" data-caption="" data-src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1.webp" data-large_image="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1.webp" data-large_image_width="300" data-large_image_height="300" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1.webp 300w, /wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1-150x150.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 18" src="/wp-content/uploads/2026/07/A-Letniskowo-Twins-Neohome-Aussen-20240418_113853-edited-580x435-1-300x300-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 300px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                            <div class="wd-carousel-item">
                                                                <figure data-thumb="/wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1-150x104.webp" data-thumb-alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 19" class="woocommerce-product-gallery__image" style="position: relative; overflow: hidden;">
                                                                    <a data-elementor-open-lightbox="no" href="/wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1.webp">
                                                                        <img width="300" height="207" src="/wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1.webp" class="" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 19" title="Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1" data-caption="" data-src="/wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1.webp" data-large_image="/wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1.webp" data-large_image_width="300" data-large_image_height="207" decoding="async" loading="lazy" srcset="/wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1.webp 300w, /wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1-150x104.webp 150w" sizes="auto, (max-width: 300px) 100vw, 300px"> </a>
                                                                    <img role="presentation" alt="Casa Movil Pro con dos dormitorio de 4 cama 57m² - Imagen 19" src="/wp-content/uploads/2026/07/Letniskowo-Twins-Visualisierung-Grundriss-v3-580x207-1-300x207-1.webp" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 300px; height: 207px; border: medium; max-width: none; max-height: none;">
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </figure>

                                                    <div class="wd-nav-arrows wd-pos-sep wd-hover-1 wd-custom-style wd-icon-1">
                                                        <div class="wd-btn-arrow wd-prev wd-disabled">
                                                            <div class="wd-arrow-inner"></div>
                                                        </div>
                                                        <div class="wd-btn-arrow wd-next">
                                                            <div class="wd-arrow-inner"></div>
                                                        </div>
                                                    </div>

                                                    <div class="product-additional-galleries">
                                                        <div class="wd-show-product-gallery-wrap wd-action-btn wd-style-icon-bg-text wd-gallery-btn">
                                                            <a href="#" rel="nofollow" class="woodmart-show-product-gallery">
                                                                <span class="wd-action-icon"></span>
                                                                <span class="wd-action-text">
                                                                    Haga clic para ampliar </span>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-48be7f7 wd-single-price text-left elementor-widget elementor-widget-wd_single_product_price" data-id="48be7f7" data-element_type="widget" data-e-type="widget" data-widget_type="wd_single_product_price.default">
                                    <div class="elementor-widget-container">
                                        <p class="price"><del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol" translate="no">€</span>11.995,00</bdi></span></del> <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol" translate="no">€</span>10.895,00</bdi></span></ins></p>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-74225da wd-btn-design-full wd-single-add-cart text-left wd-atc-btn-style-default wd-bn-btn-style-default wd-design-default wd-swatch-layout-default elementor-widget elementor-widget-wd_single_product_add_to_cart" data-id="74225da" data-element_type="widget" data-e-type="widget" data-widget_type="wd_single_product_add_to_cart.default">
                                    <div class="elementor-widget-container">


                                        <form class="cart" action="/producto/casa-movil-pro-con-dos-dormitorio-de-4-cama-57m%c2%b2/" method="post" enctype="multipart/form-data">


                                            <div class="quantity">

                                                <input type="button" value="-" class="minus btn" aria-label="Disminuir cantidad">

                                                <label class="screen-reader-text" for="quantity_6ac4b81f50b53">Casa Movil Pro con dos dormitorio de 4 cama 57m² cantidad</label>
                                                <input type="number" id="quantity_6ac4b81f50b53" class="input-text qty text" value="1" aria-label="Cantidad de productos" min="1" name="quantity" step="1" placeholder="" inputmode="numeric" autocomplete="off">

                                                <input type="button" value="+" class="plus btn" aria-label="Aumentar cantidad">

                                            </div>

                                            <button type="submit" name="add-to-cart" value="6807" class="single_add_to_cart_button button alt">Añadir al carrito</button>

                                            <button id="wd-add-to-cart" type="submit" name="wd-add-to-cart" value="6807" class="wd-buy-now-btn btn button alt btn-accent">
                                                Comprar ahora </button>
                                            <a href="https://wa.me/34603547522?text=%C2%A1Hola%21%20Me%20interesa%20el%20producto%3A%20Casa%20Movil%20Pro%20con%20dos%20dormitorio%20de%204%20cama%2057m%C2%B2.%20%C2%BFPod%C3%A9is%20darme%20m%C3%A1s%20informaci%C3%B3n%3F" target="_blank" rel="noopener noreferrer" class="pellets-wa-product-btn" aria-label="Consultar por WhatsApp"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20" aria-hidden="true">
                                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"></path>
                                                    <path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.116 1.526 5.845L.057 23.926a.5.5 0 0 0 .612.612l6.081-1.469A11.934 11.934 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.9a9.878 9.878 0 0 1-5.031-1.374l-.36-.214-3.733.902.918-3.646-.235-.375A9.867 9.867 0 0 1 2.1 12C2.1 6.534 6.534 2.1 12 2.1S21.9 6.534 21.9 12 17.466 21.9 12 21.9z"></path>
                                                </svg><span>Consultar por WhatsApp</span></a>
                                        </form>


                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-de5be03 elementor-widget elementor-widget-wd_accordion" data-id="de5be03" data-element_type="widget" data-e-type="widget" data-widget_type="wd_accordion.default">
                                    <div class="elementor-widget-container">
                                        <link rel="stylesheet" id="wd-accordion-css" href="/wp-content/themes/woodmart/css/parts/el-accordion.css?ver=8.5.2" type="text/css" media="all">
                                        <link rel="stylesheet" id="wd-accordion-elem-wpb-css" href="/wp-content/themes/woodmart/css/parts/el-accordion-wpb-elem.css?ver=8.5.2" type="text/css" media="all">
                                        <div class="wd-accordion wd-style-shadow wd-titles-left wd-opener-pos-right wd-opener-style-plus" data-state="all_closed">

                                            <div class="wd-accordion-item">
                                                <div class="wd-accordion-title wd-role-btn" data-accordion-index="0" tabindex="0">
                                                    <div class="wd-accordion-title-text">
                                                        <span>
                                                            Garantía de calidad </span>
                                                    </div>
                                                    <span class="wd-accordion-opener"></span>
                                                </div>

                                                <div class="wd-accordion-content wd-entry-content" data-accordion-index="0">

                                                    <p>Todos nuestros productos están cubiertos por la garantía legal vigente. Si recibe un artículo defectuoso o que no corresponde con su pedido, nuestro equipo le ofrecerá una solución rápida, ya sea mediante reparación, sustitución o reembolso, según corresponda.</p>
                                                </div>
                                            </div>

                                            <div class="wd-accordion-item">
                                                <div class="wd-accordion-title wd-role-btn" data-accordion-index="1" tabindex="0">
                                                    <div class="wd-accordion-title-text">
                                                        <span>
                                                            Envío gratuito y devoluciones sencillas </span>
                                                    </div>
                                                    <span class="wd-accordion-opener"></span>
                                                </div>

                                                <div class="wd-accordion-content wd-entry-content" data-accordion-index="1">

                                                    <p>Ofrecemos <strong>envío gratuito</strong> en todos los pedidos. Si desea devolver un producto, dispone de <strong>14 días naturales</strong> desde su recepción para ejercer su derecho de desistimiento, siempre que el artículo se encuentre en su estado original y cumpla las condiciones de devolución.</p>
                                                </div>
                                            </div>

                                            <div class="wd-accordion-item">
                                                <div class="wd-accordion-title wd-role-btn" data-accordion-index="2" tabindex="0">
                                                    <div class="wd-accordion-title-text">
                                                        <span>
                                                            Reembolso rápido y seguro </span>
                                                    </div>
                                                    <span class="wd-accordion-opener"></span>
                                                </div>

                                                <div class="wd-accordion-content wd-entry-content" data-accordion-index="2">

                                                    <p>Una vez recibida e inspeccionada la devolución, el reembolso se efectuará utilizando el mismo método de pago empleado en la compra. El proceso se realizará dentro de los plazos establecidos por la legislación vigente.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" id="wd-widget-collapse-css" href="/wp-content/themes/woodmart/css/parts/opt-widget-collapse.css?ver=8.5.2" type="text/css" media="all">
</main>





@endsection