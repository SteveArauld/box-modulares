@extends('layouts.app')

@section('title', 'Contáctanos | Box Modulares')
<style>

   .elementor-73 .elementor-element.elementor-element-6e896e5 {
  --display:flex;
  --flex-direction:row;
  --container-widget-width:initial;
  --container-widget-height:100%;
  --container-widget-flex-grow:1;
  --container-widget-align-self:stretch;
  --flex-wrap-mobile:wrap;
  --gap:30px 30px;
  --row-gap:30px;
  --column-gap:30px;
  --margin-top:0px;
  --margin-bottom:40px;
  --margin-left:0px;
  --margin-right:0px;
}
.elementor-73 .elementor-element.elementor-element-2da4d08 {
  --display:flex;
  --gap:5px 5px;
  --row-gap:5px;
  --column-gap:5px;
}
.elementor-73 .elementor-element.elementor-element-0cfd6c4 > .elementor-widget-container {
  margin:0px 0px 25px 0px;
}
.elementor-73 .elementor-element.elementor-element-0cfd6c4 .title-after_title {
  font-size:16px;
}
.elementor-73 .elementor-element.elementor-element-e445546 {
  --display:flex;
  --gap:5px 0px;
  --row-gap:5px;
  --column-gap:0px;
  border-style:solid;
  --border-style:solid;
  border-width:1px 1px 1px 1px;
  --border-top-width:1px;
  --border-right-width:1px;
  --border-bottom-width:1px;
  --border-left-width:1px;
  border-color:#00000026;
  --border-color:#00000026;
  --border-radius:16px 16px 16px 16px;
  --padding-top:20px;
  --padding-bottom:20px;
  --padding-left:20px;
  --padding-right:20px;
}
.elementor-73 .elementor-element.elementor-element-6140cbc > .elementor-widget-container {
  margin:0px 0px 10px 0px;
}
.elementor-73 .elementor-element.elementor-element-fb57b36 {
  --display:flex;
  --flex-direction:row;
  --container-widget-width:initial;
  --container-widget-height:100%;
  --container-widget-flex-grow:1;
  --container-widget-align-self:stretch;
  --flex-wrap-mobile:wrap;
  --gap:10px 10px;
  --row-gap:10px;
  --column-gap:10px;
}
.elementor-73 .elementor-element.elementor-element-00f504e {
  width:var( --container-widget-width, 72px );
  max-width:72px;
  --container-widget-width:72px;
  --container-widget-flex-grow:0;
}
.elementor-73 .elementor-element.elementor-element-00f504e .wd-text-block {
  font-size:12px;
}
.elementor-73 .elementor-element.elementor-element-a8d91a9 {
  --display:flex;
}
.elementor-73 .elementor-element.elementor-element-13d93f0 .wd-text-block {
  font-size:12px;
  color:#333333;
}
.elementor-73 .elementor-element.elementor-element-6eafd27 {
  --display:flex;
  --flex-direction:row;
  --container-widget-width:initial;
  --container-widget-height:100%;
  --container-widget-flex-grow:1;
  --container-widget-align-self:stretch;
  --flex-wrap-mobile:wrap;
  --gap:10px 10px;
  --row-gap:10px;
  --column-gap:10px;
}
.elementor-73 .elementor-element.elementor-element-1db9dd8 {
  width:var( --container-widget-width, 72px );
  max-width:72px;
  --container-widget-width:72px;
  --container-widget-flex-grow:0;
}
.elementor-73 .elementor-element.elementor-element-1db9dd8 .wd-text-block {
  font-size:12px;
}
.elementor-73 .elementor-element.elementor-element-56b4491 {
  --display:flex;
}
.elementor-73 .elementor-element.elementor-element-5d3ca23 .wd-text-block {
  font-size:12px;
  color:#333333;
}
.elementor-73 .elementor-element.elementor-element-1f385a8 {
  --display:flex;
  --flex-direction:row;
  --container-widget-width:initial;
  --container-widget-height:100%;
  --container-widget-flex-grow:1;
  --container-widget-align-self:stretch;
  --flex-wrap-mobile:wrap;
  --gap:10px 10px;
  --row-gap:10px;
  --column-gap:10px;
}
.elementor-73 .elementor-element.elementor-element-35eabb6 {
  width:var( --container-widget-width, 72px );
  max-width:72px;
  --container-widget-width:72px;
  --container-widget-flex-grow:0;
}
.elementor-73 .elementor-element.elementor-element-35eabb6 .wd-text-block {
  font-size:12px;
}
.elementor-73 .elementor-element.elementor-element-3943699 {
  --display:flex;
}
.elementor-73 .elementor-element.elementor-element-dd30907 .wd-text-block {
  font-size:12px;
  color:#333333;
}
.elementor-73 .elementor-element.elementor-element-6f0c1ef > .elementor-widget-container {
  margin:0px 0px 25px 0px;
}
.elementor-73 .elementor-element.elementor-element-6f0c1ef .title-after_title {
  font-size:16px;
}
.elementor-73 .elementor-element.elementor-element-1fb57e4 {
  --display:flex;
}
.elementor-73 .elementor-element.elementor-element-825ca20 .title {
  font-size:40px;
  line-height:1.2em;
}
.elementor-73 .elementor-element.elementor-element-ad0080c .fluentform-widget-wrapper .ff-el-group .ff-btn-submit {
  background-color:#FD5B03 !important;
  color:#ffffff !important;
  border-radius:0px 0px 0px 0px;
}
@media(max-width:1024px) {
  .elementor-73 .elementor-element.elementor-element-825ca20 .title {
    font-size:32px;
  }
}
@media(min-width:769px) {
  .elementor-73 .elementor-element.elementor-element-2da4d08 {
    --width:45%;
  }
  .elementor-73 .elementor-element.elementor-element-1fb57e4 {
    --width:55%;
  }
}
@media(max-width:768px) {
  .elementor-73 .elementor-element.elementor-element-fb57b36 {
    --flex-wrap:nowrap;
  }
  .elementor-73 .elementor-element.elementor-element-6eafd27 {
    --flex-wrap:nowrap;
  }
  .elementor-73 .elementor-element.elementor-element-1f385a8 {
    --flex-wrap:nowrap;
  }
  .elementor-73 .elementor-element.elementor-element-1fb57e4.e-con {
    --order:-99999 /* order start hack */;
  }
  .elementor-73 .elementor-element.elementor-element-825ca20 .title {
    font-size:28px;
  }
}
                     /* Formulario de Contacto - Estilos Modernos */
.fluent_form_3 {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 32px;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  max-width: 650px;
  margin: 30px auto;
  font-family: system-ui, -apple-system, sans-serif;
}

.fluent_form_3 .ff-el-form-control {
  background: #f8fafc;
  color: #1e293b;
  border: 1px solid #cbd5e1;
  border-radius: 6px;
  padding: 12px 16px;
  font-size: 15px;
  transition: all 0.2s ease-in-out;
}

.fluent_form_3 .ff-el-form-control:focus {
  border-color: #3b82f6;
  background-color: #ffffff;
  box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
  outline: none;
}

.fluent_form_3 .ff-el-input--label label {
  font-weight: 600;
  font-size: 14px;
  color: #334155;
  margin-bottom: 8px;
}

.fluent_form_3 .ff-btn-submit {
  background-color: #2563eb;
  color: #ffffff;
  border: none;
  padding: 14px 24px;
  border-radius: 6px;
  font-size: 16px;
  font-weight: 600;
  transition: all 0.2s ease;
  width: 100%;
  cursor: pointer;
}

.fluent_form_3 .ff-btn-submit:hover {
  background-color: #1d4ed8;
  transform: translateY(-1px);
}

.fluent_form_3 .ff-el-is-error .ff-el-form-control {
  border-color: #ef4444;
  background-color: #fef2f2;
}

.fluent_form_3 .ff-message-success {
  background: #f0fdf4;
  border-left: 4px solid #22c55e;
  color: #14532d;
  padding: 16px;
  border-radius: 6px;
}                    
</style>

@section('content')
	<div class="wd-page-content main-page-wrapper">

			<link rel="stylesheet" id="wd-page-title-css"
				href="../wp-content/themes/woodmart/css/parts/page-title8833.css?ver=8.5.2" type="text/css"
				media="all" />
			<div class="wd-page-title page-title  page-title-default title-size-small title-design-default color-scheme-light"
				style="">
				<div class="wd-page-title-bg wd-fill">
					<img width="1920" height="410" src="../wp-content/uploads/2026/04/edc-hero-section-bg.jpg"
						class="attachment-full size-full" alt="" decoding="async" fetchpriority="high"
						srcset="/wp-content/uploads/2026/04/edc-hero-section-bg.jpg 1920w, /wp-content/uploads/2026/04/edc-hero-section-bg-150x32.jpg 150w, /wp-content/uploads/2026/04/edc-hero-section-bg-1200x256.jpg 1200w"
						sizes="(max-width: 1920px) 100vw, 1920px" />
				</div>
				<div class="container">
					<h1 class="entry-title title">
						Contáctanos </h1>


					<nav class="wd-breadcrumbs"><a href="../">Inicio</a><span
							class="wd-delimiter">•</span><span class="wd-last">Contáctanos</span></nav>
				</div>
			</div>

			<main id="main-content" class="wd-content-layout content-layout-wrapper container" role="main">


				<div class="wd-content-area site-content">
					<article id="post-73" class="entry-content post-73 page type-page status-publish hentry">
						<div data-elementor-type="wp-page" data-elementor-id="73" class="elementor elementor-73">
							<div class="wd-negative-gap elementor-element elementor-element-6e896e5 e-flex e-con-boxed e-con e-parent"
								data-id="6e896e5" data-element_type="container" data-e-type="container">
								<div class="e-con-inner">
									<div class="elementor-element elementor-element-2da4d08 e-con-full e-flex e-con e-child"
										data-id="2da4d08" data-element_type="container" data-e-type="container">
										<div class="elementor-element elementor-element-0cfd6c4 wd-width-100 elementor-widget elementor-widget-wd_title"
											data-id="0cfd6c4" data-element_type="widget" data-e-type="widget"
											data-widget_type="wd_title.default">
											<div class="elementor-widget-container">
												<link rel="stylesheet" id="wd-section-title-css"
													href="../wp-content/themes/woodmart/css/parts/el-section-title8833.css?ver=8.5.2"
													type="text/css" media="all" />
												<div
													class="title-wrapper wd-set-mb reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


													<div class="liner-continer">
														<h4 class="woodmart-title-container title wd-fontsize-l">Estamos
															aquí para ayudarle</h4>
													</div>

													<div class="title-after_title reset-last-child wd-fontsize-xs">
														<p>Si tiene alguna pregunta sobre nuestros productos, un pedido,
															un envío, una devolución o cualquier otro asunto relacionado
															con nuestros servicios, nuestro equipo de atención al
															cliente estará encantado de ayudarle.</p>
														<p>Puede ponerse en contacto con nosotros a través de los
															siguientes medios:</p>
													</div>
												</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-e445546 e-con-full e-flex e-con e-child"
											data-id="e445546" data-element_type="container" data-e-type="container">
											<div class="elementor-element elementor-element-6140cbc wd-width-100 elementor-widget elementor-widget-wd_title"
												data-id="6140cbc" data-element_type="widget" data-e-type="widget"
												data-widget_type="wd_title.default">
												<div class="elementor-widget-container">
													<div
														class="title-wrapper wd-set-mb reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


														<div class="liner-continer">
															<h4 class="woodmart-title-container title wd-fontsize-l">
																Datos de contacto</h4>
														</div>

													</div>
												</div>
											</div>
											<div class="elementor-element elementor-element-fb57b36 e-con-full e-flex e-con e-child"
												data-id="fb57b36" data-element_type="container" data-e-type="container">
												<div class="elementor-element elementor-element-00f504e elementor-widget__width-initial elementor-widget elementor-widget-wd_text_block"
													data-id="00f504e" data-element_type="widget" data-e-type="widget"
													data-widget_type="wd_text_block.default">
													<div class="elementor-widget-container">
														<link rel="stylesheet" id="wd-text-block-css"
															href="../wp-content/themes/woodmart/css/parts/el-text-block8833.css?ver=8.5.2"
															type="text/css" media="all" />
														<div class="wd-text-block reset-last-child text-left">

															<p>Correo electrónico:</p>
														</div>
													</div>
												</div>
												<div class="elementor-element elementor-element-a8d91a9 e-con-full e-flex e-con e-child"
													data-id="a8d91a9" data-element_type="container"
													data-e-type="container">
													<div class="elementor-element elementor-element-13d93f0 elementor-widget elementor-widget-wd_text_block"
														data-id="13d93f0" data-element_type="widget"
														data-e-type="widget" data-widget_type="wd_text_block.default">
														<div class="elementor-widget-container">
															<div class="wd-text-block reset-last-child text-left">

																<p><a
																		href="mailto:contacto@box-modulares.es">contacto@box-modulares.es</a>
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="elementor-element elementor-element-6eafd27 e-con-full e-flex e-con e-child"
												data-id="6eafd27" data-element_type="container" data-e-type="container">
												<div class="elementor-element elementor-element-1db9dd8 elementor-widget__width-initial elementor-widget elementor-widget-wd_text_block"
													data-id="1db9dd8" data-element_type="widget" data-e-type="widget"
													data-widget_type="wd_text_block.default">
													<div class="elementor-widget-container">
														<div class="wd-text-block reset-last-child text-left">

															<p>Teléfono:</p>
														</div>
													</div>
												</div>
												<div class="elementor-element elementor-element-56b4491 e-con-full e-flex e-con e-child"
													data-id="56b4491" data-element_type="container"
													data-e-type="container">
													<div class="elementor-element elementor-element-5d3ca23 elementor-widget elementor-widget-wd_text_block"
														data-id="5d3ca23" data-element_type="widget"
														data-e-type="widget" data-widget_type="wd_text_block.default">
														<div class="elementor-widget-container">
															<div class="wd-text-block reset-last-child text-left">

																<p><a href="tel:+34603547522">+34 603 547 522</a></p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="elementor-element elementor-element-1f385a8 e-con-full e-flex e-con e-child"
												data-id="1f385a8" data-element_type="container" data-e-type="container">
												<div class="elementor-element elementor-element-35eabb6 elementor-widget__width-initial elementor-widget elementor-widget-wd_text_block"
													data-id="35eabb6" data-element_type="widget" data-e-type="widget"
													data-widget_type="wd_text_block.default">
													<div class="elementor-widget-container">
														<div class="wd-text-block reset-last-child text-left">

															<p>Dirección:</p>
														</div>
													</div>
												</div>
												<div class="elementor-element elementor-element-3943699 e-con-full e-flex e-con e-child"
													data-id="3943699" data-element_type="container"
													data-e-type="container">
													<div class="elementor-element elementor-element-dd30907 elementor-widget elementor-widget-wd_text_block"
														data-id="dd30907" data-element_type="widget"
														data-e-type="widget" data-widget_type="wd_text_block.default">
														<div class="elementor-widget-container">
															<div class="wd-text-block reset-last-child text-left">

																<p>Calle Avenir 8, 08006 Barcelona, España</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-6f0c1ef wd-width-100 elementor-widget elementor-widget-wd_title"
											data-id="6f0c1ef" data-element_type="widget" data-e-type="widget"
											data-widget_type="wd_title.default">
											<div class="elementor-widget-container">
												<div
													class="title-wrapper wd-set-mb reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


													<div class="liner-continer">
														<h4 class="woodmart-title-container title wd-fontsize-l">Horario
															de atención</h4>
													</div>

													<div class="title-after_title reset-last-child wd-fontsize-xs">
														<p>Nuestro servicio de atención al cliente está disponible en el
															siguiente horario:</p>
														<ul>
															<li><strong>Lunes a viernes:</strong> 09:00 – 18:00</li>
															<li><strong>Sábados, domingos y festivos:</strong> Cerrado
															</li>
														</ul>
														<p>Intentamos responder a todas las consultas en un plazo de
															<strong>24 a 48 horas laborables</strong>.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-1fb57e4 e-con-full e-flex e-con e-child"
										data-id="1fb57e4" data-element_type="container" data-e-type="container">
										<div class="elementor-element elementor-element-825ca20 wd-width-100 elementor-widget elementor-widget-wd_title"
											data-id="825ca20" data-element_type="widget" data-e-type="widget"
											data-widget_type="wd_title.default">
											<div class="elementor-widget-container">
												<div
													class="title-wrapper wd-set-mb reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


													<div class="liner-continer">
														<h4 class="woodmart-title-container title wd-fontsize-l">
															Formulario de contacto</h4>
													</div>

												</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-ad0080c fluentform-widget-submit-button-full-width elementor-widget elementor-widget-fluent-form-widget"
											data-id="ad0080c" data-element_type="widget" data-e-type="widget"
											data-widget_type="fluent-form-widget.default">
											<div class="elementor-widget-container">

												<div class="fluentform-widget-wrapper fluentform-widget-align-default">


													<div
														class='fluentform ff-default fluentform_wrapper_3 ffs_default_wrap'>
														<form data-form_id="3" id="fluentform_3"
															class="frm-fluent-form fluent_form_3 ff-el-form-top ff_form_instance_3_1 ff-form-loading ffs_default"
															data-form_instance="ff_form_instance_3_1" method="POST">
															<fieldset
																style="border: none!important;margin: 0!important;padding: 0!important;background-color: transparent!important;box-shadow: none!important;outline: none!important; min-inline-size: 100%;">
																<legend class="ff_screen_reader_title"
																	style="display: block; margin: 0!important;padding: 0!important;height: 0!important;text-indent: -999999px;width: 0!important;overflow:hidden;">
																	Formulario de Contacto</legend><input type='hidden'
																	name='__fluent_form_embded_post_id'
																	value='73' /><input type="hidden"
																	id="_fluentform_3_fluentformnonce"
																	name="_fluentform_3_fluentformnonce"
																	value="6a6eb286e1" /><input type="hidden"
																	name="_wp_http_referer" value="/contactanos/" />
																<div data-type="name-element" data-name="names"
																	class=" ff-field_container ff-name-field-wrapper">
																	<div class='ff-t-container'>
																		<div class='ff-t-cell '>
																			<div class='ff-el-group ff-el-form-top'>
																				<div
																					class="ff-el-input--label ff-el-is-required asterisk-right">
																					<label for='ff_3_names_first_name_'
																						id='label_ff_3_names_first_name_'>Nombre</label>
																				</div>
																				<div class='ff-el-input--content'><input
																						type="text"
																						name="names[first_name]"
																						id="ff_3_names_first_name_"
																						class="ff-el-form-control"
																						placeholder="Nombre"
																						aria-invalid="false"
																						aria-required=true></div>
																			</div>
																		</div>
																		<div class='ff-t-cell '>
																			<div class='ff-el-group ff-el-form-top'>
																				<div
																					class="ff-el-input--label ff-el-is-required asterisk-right">
																					<label for='ff_3_names_last_name_'
																						id='label_ff_3_names_last_name_'>Apellidos</label>
																				</div>
																				<div class='ff-el-input--content'><input
																						type="text"
																						name="names[last_name]"
																						id="ff_3_names_last_name_"
																						class="ff-el-form-control"
																						placeholder="Apellidos"
																						aria-invalid="false"
																						aria-required=true></div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class='ff-el-group ff-el-form-top'>
																	<div
																		class="ff-el-input--label ff-el-is-required asterisk-right">
																		<label for='ff_3_email' id='label_ff_3_email'
																			aria-label="Correo electrónico">Correo
																			electrónico</label></div>
																	<div class='ff-el-input--content'><input
																			type="email" name="email" id="ff_3_email"
																			class="ff-el-form-control"
																			placeholder="correo@ejemplo.com"
																			data-name="email" aria-invalid="false"
																			aria-required=true></div>
																</div>
																<div class='ff-el-group ff-el-form-top'>
																	<div
																		class="ff-el-input--label ff-el-is-required asterisk-right">
																		<label for='ff_3_subject'
																			id='label_ff_3_subject'
																			aria-label="Asunto">Asunto</label></div>
																	<div class='ff-el-input--content'><input type="text"
																			name="subject" class="ff-el-form-control"
																			placeholder="¿En qué podemos ayudarte?"
																			data-name="subject" id="ff_3_subject"
																			aria-invalid="false" aria-required=true>
																	</div>
																</div>
																<div class='ff-el-group ff-el-form-top'>
																	<div
																		class="ff-el-input--label ff-el-is-required asterisk-right">
																		<label for='ff_3_message'
																			id='label_ff_3_message'
																			aria-label="Mensaje">Mensaje</label></div>
																	<div class='ff-el-input--content'><textarea
																			aria-required="true"
																			aria-labelledby="label_ff_3_message"
																			name="message" id="ff_3_message"
																			class="ff-el-form-control"
																			placeholder="Escribe tu mensaje aquí..."
																			rows="5" cols="2"
																			data-name="message"></textarea></div>
																</div>
																<div class='ff-el-group    ff-el-input--content'>
																	<div class='ff-el-form-check ff-el-tc'><label
																			aria-label='Consiento que este sitio web almacene mi información enviada para que puedan responder a mi consulta.'
																			class='ff-el-form-check-label ff_tc_label'
																			for='gdpr-agreement_3a90edae93adc615272434d5e2740f6d'><span
																				class='ff_tc_checkbox'><input
																					type="checkbox"
																					name="gdpr-agreement"
																					class="ff-el-form-check-input ff_gdpr_field"
																					data-name="gdpr-agreement"
																					id="gdpr-agreement_3a90edae93adc615272434d5e2740f6d"
																					value='on' aria-invalid='false'
																					aria-required=true></span>
																			<div class='ff_t_c'>Consiento que este sitio
																				web almacene mi información enviada para
																				que puedan responder a mi consulta.
																			</div>
																		</label></div>
																</div>
																<div
																	class='ff-el-group ff-text-left ff_submit_btn_wrapper'>
																	<button type="submit"
																		class="ff-btn ff-btn-submit ff-btn-md ff_btn_style"
																		aria-label="Enviar">Enviar</button></div>
															</fieldset>
														</form>
														<div id='fluentform_3_errors'
															class='ff-errors-in-stack ff_form_instance_3_1 ff-form-loading_errors ff_form_instance_3_1_errors'>
														</div>
													</div>
													<script type="text/javascript">
														window.fluent_form_ff_form_instance_3_1 = { "id": "3", "ajaxUrl": "https:\/\/box-modulares.es\/wp-admin\/admin-ajax.php", "settings": { "layout": { "labelPlacement": "top", "asteriskPlacement": "asterisk-right", "helpMessagePlacement": "with_label", "errorMessagePlacement": "inline", "cssClassName": "" }, "restrictions": { "denyEmptySubmission": { "enabled": false } } }, "form_instance": "ff_form_instance_3_1", "form_id_selector": "fluentform_3", "rules": { "names[first_name]": { "required": { "value": true, "message": "Este campo es obligatorio", "global": false, "global_message": "Este campo es obligatorio" } }, "names[middle_name]": { "required": { "value": false, "message": "Este campo es obligatorio", "global_message": "Este campo es obligatorio", "global": true } }, "names[last_name]": { "required": { "value": true, "message": "Este campo es obligatorio", "global": false, "global_message": "Este campo es obligatorio" } }, "email": { "required": { "value": true, "message": "Este campo es obligatorio", "global": false, "global_message": "Este campo es obligatorio" }, "email": { "value": true, "message": "Debe introducir un correo electr\u00f3nico v\u00e1lido", "global": false, "global_message": "Este campo debe contener un correo electr\u00f3nico v\u00e1lido" } }, "subject": { "required": { "value": true, "message": "Este campo es obligatorio", "global": false, "global_message": "Este campo es obligatorio" } }, "message": { "required": { "value": true, "message": "Este campo es obligatorio", "global": false, "global_message": "Este campo es obligatorio" } }, "gdpr-agreement": { "required": { "value": true, "message": "Debe aceptar la pol\u00edtica de privacidad para continuar", "global": false, "global_message": "Este campo es obligatorio" } } }, "debounce_time": 300, "file_upload_settings": [] };
													</script>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


					</article>



				</div>



				<link rel="stylesheet" id="wd-widget-collapse-css"
					href="../wp-content/themes/woodmart/css/parts/opt-widget-collapse8833.css?ver=8.5.2" type="text/css"
					media="all" />
			</main>

		</div>
@endsection


