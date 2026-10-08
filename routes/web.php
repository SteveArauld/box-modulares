<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ShopController::class,'home'])->name('home');



Route::get('/producto/{slug}',[ShopController::class,'shop']);


Route::get('/categoria-producto/{slug}',[ShopController::class,'category']);

Route::get('/contactanos', [ShopController::class, 'contact'])->name('shop.contact');
Route::get('/politica-de-envios', [ShopController::class, 'shippingPolicy'])->name('shop.shipping-policy');
Route::get('/politica-de-devoluciones-y-reembolsos', [ShopController::class, 'returnPolicy'])->name('shop.return-policy');
Route::get('/politica-de-pago', [ShopController::class, 'paymentPolicy'])->name('shop.payment-policy');

// --- Legal Information ---
Route::get('/aviso-legal', [ShopController::class, 'legalNotice'])->name('shop.legal-notice');
Route::get('/condiciones-generales-de-uso-cgu', [ShopController::class, 'termsOfUse'])->name('shop.terms-of-use');
Route::get('/condiciones-generales-de-venta', [ShopController::class, 'termsOfSale'])->name('shop.terms-of-sale');
Route::get('/politica-de-privacidad', [ShopController::class, 'privacyPolicy'])->name('shop.privacy-policy');
Route::get('/politica-de-cookies', [ShopController::class, 'cookiePolicy'])->name('shop.cookie-policy');

Route::get('/mi-cuenta', [ShopController::class, 'myAccount'])->name('shop.my-account');
Route::get('/mi-cuenta/lost-password', [ShopController::class, 'lostPassword'])->name('shop.lost-password');

Route::get('/carrito', [ShopController::class, 'carrito'])->name('shop.carrito');

Route::get('/finalizar-compra', [ShopController::class, 'checkout'])->name('shop.checkout');
