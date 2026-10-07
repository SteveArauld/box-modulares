@extends('layouts.app')

@section('title', 'Finalizar compra | Box Modulares')

@section('content')
    <div class="container page-shell">
        <h1>Finalizar compra</h1>
        <div class="checkout-grid">
            <div class="checkout-pane">
                <h3>Datos del cliente</h3>
                <form>
                    <div class="field-row">
                        <input type="text" placeholder="Nombre">
                        <input type="text" placeholder="Apellidos">
                    </div>
                    <div class="field-row">
                        <input type="email" placeholder="Email">
                        <input type="tel" placeholder="Teléfono">
                    </div>
                    <textarea placeholder="Dirección de entrega"></textarea>
                </form>
            </div>
            <div class="checkout-pane summary">
                <h3>Resumen</h3>
                <ul>
                    <li><span>Subtotal</span><strong>0,00 €</strong></li>
                    <li><span>Envío</span><strong>Gratis</strong></li>
                    <li><span>Total</span><strong>0,00 €</strong></li>
                </ul>
                <button class="btn btn-primary full-width">Pagar ahora</button>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .page-shell { padding-top: 40px; }
        .checkout-grid { display: grid; grid-template-columns: 1.2fr .8fr; gap: 22px; }
        .checkout-pane { background: #fff; padding: 28px; border-radius: 18px; box-shadow: 0 18px 38px rgba(15,23,42,.08); }
        .field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px; }
        input, textarea { width: 100%; padding: 12px 14px; border: 1px solid #dfe7f2; border-radius: 10px; font: inherit; box-sizing: border-box; }
        textarea { min-height: 120px; }
        .summary ul { list-style: none; padding: 0; margin: 0 0 22px; }
        .summary li { display: flex; justify-content: space-between; margin-bottom: 10px; }
        .full-width { width: 100%; }
        @media (max-width: 940px) { .checkout-grid { grid-template-columns: 1fr; } }
    </style>
@endpush
