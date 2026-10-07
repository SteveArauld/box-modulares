@extends('layouts.app')

@section('title', 'Carrito | Box Modulares')

@section('content')
    <div class="container page-shell">
        <h1>Carrito</h1>
        <div class="cart-box">
            <p>Tu carrito está vacío en esta demo.</p>
            <a href="{{ route('shop') }}" class="btn btn-primary">Seguir comprando</a>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .page-shell { padding-top: 40px; }
        .cart-box { background: #fff; border-radius: 18px; box-shadow: 0 18px 38px rgba(15,23,42,.08); padding: 32px; }
    </style>
@endpush
