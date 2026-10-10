{{-- <div class="mm-top-bar">
	<div class="container mm-top-bar-inner">
		<span class="mm-top-bar-label">{{ __('Idioma') }}:</span>
		<ul class="mm-top-bar-langs">
			@foreach ($availableLocales as $code => $label)
				<li class="{{ $code === $currentLocale ? 'mm-top-bar-lang-active' : '' }}">
					<a href="{{ route('locale.switch', $code) }}">{{ $label }}</a>
				</li>
			@endforeach
		</ul>
	</div>
</div> --}}
<header class="whb-header whb-header_423087 whb-sticky-shadow whb-scroll-stick whb-sticky-real">
			<div class="whb-main-header">

				<div
					class="whb-row whb-general-header whb-not-sticky-row whb-without-bg whb-without-border whb-color-dark whb-flex-flex-middle">
					<div class="container">
						<div class="whb-flex-row whb-general-header-inner">
							<div class="whb-column whb-col-left whb-column8 whb-visible-lg">
								<div class="site-logo whb-jey7bav40wk7t8zxlr1t wd-switch-logo">
									<a href="/" class="wd-logo wd-main-logo" rel="home"
										aria-label="{{ __('Logotipo del sitio') }}">
										<img width="175" height="47" src="{{ asset('assets/images/logo/nova-terra-logo.svg') }}"
											class="attachment-full size-full" alt="{{ config('app.name') }}" style="max-width:175px;"
											decoding="async"/> </a>

								</div>
							</div>
							<div class="whb-column whb-col-center whb-column9 whb-visible-lg">
								<nav class="wd-header-nav wd-header-main-nav text-center whb-g5a42yquk75unrrcc76x"
									role="navigation" aria-label="{{ __('Navegación principal') }}">
									<ul id="menu-main-menu-edc"
										class="menu wd-nav wd-nav-header wd-nav-main wd-style-default wd-gap-m">
										<li id="menu-item-6034"
											class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-120 menu-item-6034 item-level-0 menu-simple-dropdown wd-event-hover {{ request()->routeIs('home') ? 'current-menu-item current_page_item' : '' }}">
											<a href="{{ route('home') }}" class="woodmart-nav-link"><span
													class="nav-link-text">{{ __('Inicio') }}</span></a></li>
										<li id="menu-item-8094"
											class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-8094 item-level-0 menu-simple-dropdown wd-event-hover {{ ($currentCategoryName ?? null) === 'Generadores y Energía' ? 'current-menu-item current_page_item' : '' }}">
											<a href="{{ $categoryHref['Generadores y Energía'] ?? route('shop.index') }}"
												class="woodmart-nav-link"><span class="nav-link-text">{{ __('Generadores y Energía') }}</span></a>
											<div
												class="color-scheme-dark wd-design-default wd-dropdown-menu wd-dropdown">
												<div class="container wd-entry-content">
													<ul class="wd-sub-menu color-scheme-dark">
														<li id="menu-item-8095"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8095 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Generadores de apoyo solar' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Generadores de apoyo solar'] ?? route('shop.index') }}"
																class="woodmart-nav-link">{{ __('Generadores de apoyo solar') }}</a>
														</li>
														<li id="menu-item-8096"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8096 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Generadores Eléctricos' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Generadores Eléctricos'] ?? route('shop.index') }}"
																class="woodmart-nav-link">{{ __('Generadores Eléctricos') }}</a>
														</li>
														<li id="menu-item-8097"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8097 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Generadores Eléctricos Inverter' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Generadores Eléctricos Inverter'] ?? route('shop.index') }}"
																class="woodmart-nav-link">{{ __('Generadores Eléctricos Inverter') }}</a></li>
														<li id="menu-item-8098"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8098 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Grupos' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Grupos'] ?? route('shop.index') }}"
																class="woodmart-nav-link">{{ __('Grupos') }}</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li id="menu-item-8108"
											class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-8108 item-level-0 menu-simple-dropdown wd-event-hover {{ ($currentCategoryName ?? null) === 'Jardín y Exterior' ? 'current-menu-item current_page_item' : '' }}">
											<a href="{{ $categoryHref['Jardín y Exterior'] ?? route('shop.index') }}"
												class="woodmart-nav-link"><span class="nav-link-text">{{ __('Jardín y Exterior') }}</span></a>
											<div
												class="color-scheme-dark wd-design-default wd-dropdown-menu wd-dropdown">
												<div class="container wd-entry-content">
													<ul class="wd-sub-menu color-scheme-dark">
														<li id="menu-item-8109"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8109 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Barbacoas' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Barbacoas'] ?? route('shop.index') }}"
																class="woodmart-nav-link">{{ __('Barbacoas') }}</a></li>
														<li id="menu-item-8110"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8110 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Casetas de jardín' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Casetas de jardín'] ?? route('shop.index') }}"
																class="woodmart-nav-link">{{ __('Casetas de jardín') }}</a></li>
														<li id="menu-item-8111"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8111 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Cenadores' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Cenadores'] ?? route('shop.index') }}"
																class="woodmart-nav-link">{{ __('Cenadores') }}</a></li>
														<li id="menu-item-8112"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8112 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Muebles de jardín' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Muebles de jardín'] ?? route('shop.index') }}"
																class="woodmart-nav-link">{{ __('Muebles de jardín') }}</a></li>
														<li id="menu-item-8113"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8113 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Pérgolas para jardines y terrazas' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Pérgolas para jardines y terrazas'] ?? route('shop.index') }}"
																class="woodmart-nav-link">{{ __('Pérgolas para jardines y terrazas') }}</a></li>
														<li id="menu-item-8114"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8114 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Pergolas-carpas-y-cenadores' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Pergolas-carpas-y-cenadores'] ?? route('shop.index') }}"
																class="woodmart-nav-link">{{ __('Pergolas-carpas-y-cenadores') }}</a>
														</li>
														<li id="menu-item-8115"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8115 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Techos para terrazas' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Techos para terrazas'] ?? route('shop.index') }}"
																class="woodmart-nav-link">{{ __('Techos para terrazas') }}</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li id="menu-item-8121"
											class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8121 item-level-0 menu-simple-dropdown wd-event-hover {{ ($currentCategoryName ?? null) === 'Casas Móviles y Prefabricadas' ? 'current-menu-item current_page_item' : '' }}">
											<a href="{{ $categoryHref['Casas Móviles y Prefabricadas'] ?? route('shop.index') }}"
												class="woodmart-nav-link"><span class="nav-link-text">{{ __('Casas Móviles y Prefabricadas') }}</span></a></li>
										<li id="menu-item-8122"
											class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-8122 item-level-0 menu-simple-dropdown wd-event-hover {{ ($currentCategoryName ?? null) === 'Calefacción' ? 'current-menu-item current_page_item' : '' }}">
											<a href="{{ $categoryHref['Calefacción'] ?? route('shop.index') }}"
												class="woodmart-nav-link"><span
													class="nav-link-text">{{ __('Calefacción') }}</span></a>
											<div
												class="color-scheme-dark wd-design-default wd-dropdown-menu wd-dropdown">
												<div class="container wd-entry-content">
													<ul class="wd-sub-menu color-scheme-dark">
														@if($categoryHref->has('Palet de leña'))
														<li id="menu-item-8123"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8123 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Palet de leña' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Palet de leña'] }}"
																class="woodmart-nav-link">{{ __('Palet de leña') }}</a></li>
														@endif
														<li id="menu-item-8124"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8124 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Pellet' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Pellet'] ?? route('shop.index') }}"
																class="woodmart-nav-link">{{ __('Pellet') }}</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li id="menu-item-8125"
											class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-8125 item-level-0 menu-simple-dropdown wd-event-hover {{ ($currentCategoryName ?? null) === 'Maquinaria y Transporte' ? 'current-menu-item current_page_item' : '' }}">
											<a href="{{ $categoryHref['Maquinaria y Transporte'] ?? route('shop.index') }}"
												class="woodmart-nav-link"><span class="nav-link-text">{{ __('Maquinaria y Transporte') }}</span></a>
											<div
												class="color-scheme-dark wd-design-default wd-dropdown-menu wd-dropdown">
												<div class="container wd-entry-content">
													<ul class="wd-sub-menu color-scheme-dark">
														<li id="menu-item-8126"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8126 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Minidumpers' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Minidumpers'] ?? route('shop.index') }}"
																class="woodmart-nav-link">{{ __('Minidumpers') }}</a></li>
														<li id="menu-item-8127"
															class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8127 item-level-1 wd-event-hover {{ ($currentCategoryName ?? null) === 'Plataformas elevadoras' ? 'current-menu-item current_page_item' : '' }}">
															<a href="{{ $categoryHref['Plataformas elevadoras'] ?? route('shop.index') }}"
																class="woodmart-nav-link">{{ __('Plataformas elevadoras') }}</a>
														</li>
													</ul>
												</div>
											</div>
										</li>
										<li id="menu-item-9552"
											class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-9552 item-level-0 menu-simple-dropdown wd-event-hover {{ ($currentCategoryName ?? null) === 'Nuestros remolques' ? 'current-menu-item current_page_item' : '' }}">
											<a href="{{ $categoryHref['Nuestros remolques'] ?? route('shop.index') }}"
												class="woodmart-nav-link"><span class="nav-link-text">{{ __('Nuestros remolques') }}</span></a></li>
										<li id="menu-item-9553"
											class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-9553 item-level-0 menu-simple-dropdown wd-event-hover {{ ($currentCategoryName ?? null) === 'Piscina' ? 'current-menu-item current_page_item' : '' }}">
											<a href="{{ $categoryHref['Piscina'] ?? route('shop.index') }}"
												class="woodmart-nav-link"><span class="nav-link-text">{{ __('Piscina') }}</span></a>
										</li>
										<li id="menu-item-8104"
											class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8104 item-level-0 menu-simple-dropdown wd-event-hover {{ ($currentCategoryName ?? null) === 'Astilladoras de Leña' ? 'current-menu-item current_page_item' : '' }}">
											<a href="{{ $categoryHref['Astilladoras de Leña'] ?? route('shop.index') }}"
												class="woodmart-nav-link"><span class="nav-link-text">{{ __('Astilladoras de Leña') }}</span></a></li>
										<li id="menu-item-8105"
											class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8105 item-level-0 menu-simple-dropdown wd-event-hover {{ ($currentCategoryName ?? null) === 'Cortacéspedes Giro Cero' ? 'current-menu-item current_page_item' : '' }}">
											<a href="{{ $categoryHref['Cortacéspedes Giro Cero'] ?? route('shop.index') }}"
												class="woodmart-nav-link"><span class="nav-link-text">{{ __('Cortacéspedes Giro Cero') }}</span></a></li>
										<li id="menu-item-8106"
											class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8106 item-level-0 menu-simple-dropdown wd-event-hover {{ ($currentCategoryName ?? null) === 'Tractores Cortacésped' ? 'current-menu-item current_page_item' : '' }}">
											<a href="{{ $categoryHref['Tractores Cortacésped'] ?? route('shop.index') }}"
												class="woodmart-nav-link"><span class="nav-link-text">{{ __('Tractores Cortacésped') }}</span></a></li>
										<li id="menu-item-8107"
											class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8107 item-level-0 menu-simple-dropdown wd-event-hover {{ ($currentCategoryName ?? null) === 'Trituradoras Semiprofesionales' ? 'current-menu-item current_page_item' : '' }}">
											<a href="{{ $categoryHref['Trituradoras Semiprofesionales'] ?? route('shop.index') }}"
												class="woodmart-nav-link"><span class="nav-link-text">{{ __('Trituradoras Semiprofesionales') }}</span></a></li>
										<li id="menu-item-8118"
											class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-8118 item-level-0 menu-simple-dropdown wd-event-hover {{ ($currentCategoryName ?? null) === 'Piscinas desmontables' ? 'current-menu-item current_page_item' : '' }}">
											<a href="{{ $categoryHref['Piscinas desmontables'] ?? route('shop.index') }}"
												class="woodmart-nav-link"><span class="nav-link-text">{{ __('Piscinas desmontables') }}</span></a></li>
										<li id="menu-item-6056"
											class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6056 item-level-0 menu-simple-dropdown wd-event-hover">
											<a href="contactanos/" class="woodmart-nav-link"><span
													class="nav-link-text">{{ __('Contáctanos') }}</span></a></li>
									</ul>
								</nav>
							</div>
							<div class="whb-column whb-col-right whb-column10 whb-visible-lg">
								<div class="wd-header-search wd-tools-element wd-design-1 wd-style-icon wd-display-full-screen whb-uw84u23jz1337k4d87hh"
									title="{{ __('Buscar') }}">
									<a href="#" rel="nofollow">
										<span class="wd-tools-icon"></span>
									</a>
								</div>
								<div
									class="wd-header-my-account wd-tools-element wd-event-hover wd-design-1 wd-style-icon whb-2x15qwfhcl3o3ujdxh9z">
									<a href="mi-cuenta/" title="{{ __('Mi cuenta') }}">

										<span class="wd-tools-icon">
										</span>


									</a>

									<div class="wd-dropdown wd-dropdown-register  color-scheme-dark">
										<div class="login-dropdown-inner woocommerce">
											<span class="wd-heading">
												<span class="title">
													{{ __('Iniciar sesión') }} </span>
												<a class="create-account-link" href="{{ route('shop.my-account') }}">{{ __('Crear una cuenta') }} </a>
											</span>
											<form method="post" class="login woocommerce-form woocommerce-form-login"
												action="{{ route('login') }}">
												@csrf
												@error('login')<span class="woocommerce-error" style="display:block;color:#c0392b;font-size:12px;margin-bottom:8px;">{{ $message }}</span>@enderror



												<p
													class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-username">
													<label for="username">{{ __('Nombre de usuario o correo electrónico') }}&nbsp;<span class="required"
															aria-hidden="true">*</span><span
															class="screen-reader-text">{{ __('Obligatorio') }}</span></label>
													<input type="email"
														class="woocommerce-Input woocommerce-Input--text input-text"
														name="email" id="username" autocomplete="username"
														value="{{ old('email') }}" />
												</p>
												<p
													class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-password">
													<label for="password">{{ __('Contraseña') }}&nbsp;<span class="required"
															aria-hidden="true">*</span><span
															class="screen-reader-text">{{ __('Obligatorio') }}</span></label>
													<input class="woocommerce-Input woocommerce-Input--text input-text"
														type="password" name="password" id="password"
														autocomplete="current-password" />
												</p>


												<p class="form-row form-row-btn">
													<button
														type="submit"
														class="button btn btn-accent woocommerce-button woocommerce-form-login__submit"
														name="login" value="{{ __('Iniciar sesión') }}">{{ __('Iniciar sesión') }}</button>
												</p>

												<p class="login-form-footer">
													<a href="{{ route('shop.lost-password') }}"
														class="woocommerce-LostPassword lost_password">{{ __('¿Ha olvidado su contraseña?') }}</a>
													<label
														class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
														<input
															class="woocommerce-form__input woocommerce-form__input-checkbox"
															name="remember" type="checkbox" value="1"
															title="{{ __('Recordarme') }}" aria-label="{{ __('Recordarme') }}" />
														<span>{{ __('Recordarme') }}</span>
													</label>
												</p>


											</form>

										</div>
									</div>
								</div>

								<div class="whb-space-element whb-2x1n4a0aisve7ytt1rt8 " style="width:10px;"></div>
								<div class="wd-header-divider whb-divider-default whb-m4vz99bnqdnhhaigz9ty">
									
								</div>

								<div class="whb-space-element whb-wbe46k9j7ph9c86j6g33 " style="width:10px;"></div>

								<div
									class="wd-header-cart wd-tools-element wd-design-7 cart-widget-opener wd-style-text wd-with-wrap whb-8buyjktpo4jp6c7oimzq">
									<link rel="stylesheet" id="wd-header-cart-css"
										href={{ asset('/wp-content/themes/woodmart/css/parts/header-el-cart8833.css') }}
										type="text/css" media="all" /> <a href="carrito/"
										title="{{ __('Carrito de compra') }}">
										<span class="wd-tools-inner">

											<span class="wd-tools-icon">
												<span class="wd-cart-number wd-tools-count">0
													<span>{{ __('artículos') }}</span></span>
											</span>


											<span class="wd-tools-text">

												<span class="wd-cart-subtotal"><span
														class="woocommerce-Price-amount amount"><bdi><span
																class="woocommerce-Price-currencySymbol"
																translate="no">&euro;</span>0</bdi></span></span>
											</span>

										</span>
									</a>
								</div>
							</div>
							<div class="whb-column whb-mobile-left whb-column_mobile2 whb-hidden-lg">
								<div
									class="wd-tools-element wd-header-mobile-nav wd-style-icon wd-design-1 whb-340gzk4ac2oxval15pnh">
									<a href="#" rel="nofollow" aria-label="{{ __('Abrir menú móvil') }}">
										<span class="wd-tools-icon">
										</span>

									</a>
								</div>
							</div>
							<div class="whb-column whb-mobile-center whb-column_mobile3 whb-hidden-lg">
								<div class="site-logo whb-ep1ny3r4ky7wli5rao3g wd-switch-logo">
									<a href="/" class="wd-logo wd-main-logo" rel="home"
										aria-label="{{ __('Logotipo del sitio') }}">
										<img width="150" height="40" src="{{ asset('assets/images/logo/nova-terra-logo.svg') }}"
											class="attachment-full size-full" alt="{{ config('app.name') }}"
											decoding="async"
											/> </a>

								</div>
							</div>
							<div class="whb-column whb-mobile-right whb-column_mobile4 whb-hidden-lg">

								<div
									class="wd-header-cart wd-tools-element wd-design-1 cart-widget-opener wd-style-icon whb-bg41lzhdhceld7novk8u">
									<a href="carrito/" title="{{ __('Carrito de compra') }}">

										<span class="wd-tools-icon">
										</span>



									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>