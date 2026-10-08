@extends('layouts.app')

@section('title', 'Mi cuenta | nom domain')

@section('content')
    <div class="container page-shell">
        <h1>Mi cuenta</h1>
        <div class="account-grid">
            <div class="account-panel">
                <h3>Iniciar sesión</h3>
                <form>
                    <input type="email" placeholder="Email">
                    <input type="password" placeholder="Contraseña">
                    <button class="btn btn-primary full-width">Entrar</button>
                </form>
            </div>
            <div class="account-panel">
                <h3>Crear cuenta</h3>
                <form>
                    <input type="text" placeholder="Nombre">
                    <input type="email" placeholder="Email">
                    <input type="password" placeholder="Contraseña">
                    <button class="btn btn-secondary full-width">Registrarme</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .page-shell { padding-top: 40px; }
        .account-grid { display: grid; grid-template-columns: repeat(2, minmax(0,1fr)); gap: 22px; }
        .account-panel { background: #fff; padding: 28px; border-radius: 18px; box-shadow: 0 18px 38px rgba(15,23,42,.08); }
        .account-panel input { margin-bottom: 12px; }
        .full-width { width: 100%; }
        @media (max-width: 940px) { .account-grid { grid-template-columns: 1fr; } }
    </style>
@endpush
