@extends('layouts.app')

@section('title', __('Política de Envíos').' | '.config('app.name'))


@section('content')
<div class="wd-page-content main-page-wrapper">

			<link rel="stylesheet" id="wd-page-title-css"
				href="{{ asset('/wp-content/themes/woodmart/css/parts/page-title8833.css') }}" type="text/css"
				media="all" />
			<div class="wd-page-title page-title  page-title-default title-size-small title-design-default color-scheme-light"
				style="">
				<div class="wd-page-title-bg wd-fill">
					<img width="1920" height="410" src="/wp-content/uploads/2026/04/edc-hero-section-bg.jpg"
						class="attachment-full size-full" alt="" decoding="async" fetchpriority="high" />
				</div>
				<div class="container">
					<h1 class="entry-title title">{{ __('Política de Envíos') }}</h1>

					<nav class="wd-breadcrumbs"><a href="{{ route('home') }}">{{ __('Inicio') }}</a><span
							class="wd-delimiter">•</span><span class="wd-last">{{ __('Política de Envíos') }}</span></nav>
				</div>
			</div>

			<main id="main-content" class="wd-content-layout content-layout-wrapper container" role="main">

				<div class="wd-content-area site-content">
					<article id="post-shipping-policy" class="entry-content post-shipping-policy page type-page status-publish hentry">
						<div class="elementor elementor-shipping-policy">
							<div class="e-con-inner">
								<div class="elementor-element color-scheme-inherit text-left elementor-widget elementor-widget-text-editor">

									<h2>{{ __('Política de Envíos – Tec Container Srl') }}</h2>

									<h3>{{ __('Países servidos') }}</h3>
									<p>{{ __('Tec Container Srl envía actualmente solo a los siguientes países:') }}</p>
									<ul>
										<li>{{ __('Italia (península e islas mayores)') }}</li>
										<li>{{ __('Alemania') }}</li>
										<li>{{ __('España (península e islas mayores)') }}</li>
									</ul>
									<p>{{ __('Ningún otro país está actualmente servido. Para cualquier otro destino, contáctenos antes de la compra: comprobaremos si es posible organizar un envío especial bajo presupuesto.') }}</p>

									<h3>{{ __('Plazos de entrega') }}</h3>
									<ul>
										<li><strong>{{ __('Tiempo de preparación del pedido:') }}</strong> {{ __('de 1 a 3 días laborables, a partir de la confirmación del pago.') }}</li>
										<li><strong>{{ __('Tiempo de transporte:') }}</strong> {{ __('de 3 a 7 días laborables después de la entrega al transportista.') }}</li>
										<li><strong>{{ __('Tiempo total estimado:') }}</strong> {{ __('de 4 a 10 días laborables, suma de la preparación y del transporte.') }}</li>
									</ul>
									<p>{{ __('Estos plazos son estimaciones y no constituyen una garantía absoluta: pueden variar en función de:') }}</p>
									<ul>
										<li>{{ __('Disponibilidad del producto') }}</li>
										<li>{{ __('País y zona de destino (islas menores, zonas remotas o de difícil acceso)') }}</li>
										<li>{{ __('Volumen y peso del pedido') }}</li>
										<li>{{ __('Condiciones meteorológicas o logísticas excepcionales') }}</li>
									</ul>

									<h3>{{ __('Gastos de envío') }}</h3>
									<p>{{ __('El envío estándar tiene un coste de') }} <strong>400 €</strong> {{ __('para los pedidos destinados a Italia, Alemania y España, salvo condiciones comerciales específicas indicadas expresamente en la ficha del producto. El coste de envío aplicable se muestra siempre claramente en el carrito, antes de la confirmación del pedido, y nunca se añade por sorpresa en un paso posterior.') }}</p>
									<p>{{ __('Recibirá el número de seguimiento en cuanto el paquete se entregue al transportista.') }}</p>
									<p>{{ __('La entrega se realiza en la dirección indicada en el momento del pedido. Es responsabilidad del cliente asegurarse de que alguien esté presente para la recepción, en particular para bultos voluminosos o pesados.') }}</p>

									<h3>{{ __('Entrega con grúa e instalación') }}</h3>
									<p>{{ __('La tarifa de envío estándar indicada arriba') }} <strong>{{ __('no incluye') }}</strong> {{ __('la eventual entrega con grúa ni la instalación del producto. Estos dos servicios son distintos del envío estándar:') }}</p>
									<ul>
										<li><strong>{{ __('Envío estándar:') }}</strong> {{ __('entrega del producto embalado en la dirección indicada, al coste fijo indicado arriba.') }}</li>
										<li><strong>{{ __('Entrega con grúa:') }}</strong> {{ __('necesaria para algunos productos voluminosos o para accesos difíciles; disponible bajo presupuesto personalizado, calculado según la ciudad, la dirección y las condiciones de acceso.') }}</li>
										<li><strong>{{ __('Instalación:') }}</strong> {{ __('servicio opcional, disponible bajo presupuesto personalizado según el producto y el lugar de instalación.') }}</li>
									</ul>
									<p>{{ __('Para solicitar un presupuesto de entrega con grúa o de instalación, contacte con nuestro servicio de atención al cliente antes de confirmar el pedido, indicando la ciudad, la dirección y las condiciones de acceso. Recibirá la información tarifaria aplicable antes de comprometerse definitivamente con la compra.') }}</p>

									<h3>{{ __('Zonas excluidas o con plazos distintos') }}</h3>
									<p>{{ __('Para zonas particularmente remotas o de difícil acceso dentro de Italia, Alemania y España, contáctenos antes de la compra. Le facilitaremos un presupuesto personalizado con plazos y costes actualizados.') }}</p>

									<h3>{{ __('Retrasos') }}</h3>
									<p>{{ __('En caso de retraso superior a los plazos indicados, nuestro servicio de atención al cliente se pondrá en contacto con usted de forma proactiva.') }}</p>

									<h3>{{ __('Contacto') }}</h3>
									<p><strong>{{ __('Tec Container Srl') }}</strong></p>
									<p>{{ __('Via Fieschi 1/7') }}</p>
									<p>{{ __('16121 Genova (GE), Italia') }}</p>
									<p><strong>{{ __('Correo electrónico:') }}</strong> <a href="mailto:contatto@teccontainer.eu">contatto@teccontainer.eu</a></p>
									<p><strong>{{ __('Sitio web:') }}</strong> <a href="{{ route('home') }}">https://teccontainer.eu</a></p>

								</div>
							</div>
						</div>
					</article>
				</div>

			</main>

		</div>
@endsection
