<!DOCTYPE html>
<html lang="es">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <base href="{{ url('/') }}/">

    <title></title>


    <link rel='stylesheet' id='fluentform-elementor-widget-css'
        href='/wp-content/plugins/fluentform/assets/css/fluent-forms-elementor-widgetd7df.css' media='all' />

    <link rel='stylesheet' id='hostinger-reach-subscription-block-css'
        href='/wp-content/plugins/hostinger-reach/frontend/dist/blocks/subscription29b3.css' media='all' />

    <link rel='stylesheet' id='hero_styles-css'
        href='/wp-content/plugins/woocommerce-gateway-hero/assets/css/hero-stylesb95e.css' media='all' />


    <link rel='stylesheet' id='elementor-frontend-css'
        href='/wp-content/uploads/elementor/css/custom-frontend.min05b2.css' media='all' />

    <link rel='stylesheet' id='elementor-post-6-css' href='/wp-content/uploads/elementor/css/post-605b2.css'
        media='all' />
    <link rel='stylesheet' id='widget-image-css'
        href='/wp-content/plugins/elementor/assets/css/widget-image.min4189.css' media='all' />
    <link rel='stylesheet' id='elementor-post-120-css' href='/wp-content/uploads/elementor/css/post-1204eb8.css'
        media='all' />



    <link rel='stylesheet' id='base-desktop-css' href='/wp-content/uploads/elementor/css/base-desktopa49e.css'
        media='all' />
    <link rel='stylesheet' id='base-mobile-css' href='/wp-content/uploads/elementor/css/base-mobilea49e.css'
        media='(max-width:768px)' />
    <link rel='stylesheet' href='/wp-content/themes/woodmart/css/parts/base8833.css' media='all' />




    <script id="jquery-core-js" src="wp-includes/js/jquery/jquery.minf43b.js"></script>
    <script id="jquery-migrate-js" src="wp-includes/js/jquery/jquery-migrate.min5589.js"></script>


    <script data-wp-strategy="defer" defer src="/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min345d.js">
    </script>

    <link rel='stylesheet' href='/wp-content/uploads/2026/07/xts-theme_settings_default-17835068198833.css'
        media='all' />
    <link rel='stylesheet' href='{{ asset('assets/css/style.css') }}' media='all' />

</head>

<body
    class="home wp-singular page-template-default page page-id-120 wp-theme-woodmart
 theme-woodmart woocommerce-no-js wd wrapper-custom categories-accordion-on woodmart-ajax-shop-on 
 sticky-toolbar-on elementor-default elementor-kit-6 elementor-page elementor-page-120">


    <div class="wd-page-wrapper website-wrapper">
        <!-- //header -->

        @include('partials.header')

        <div class="wd-page-content main-page-wrapper">
            @yield('content')
        </div>

        <!-- //footer -->
        @include('partials.footer')


    </div>

</body>


</html>
