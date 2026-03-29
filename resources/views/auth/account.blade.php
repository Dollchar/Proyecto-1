@extends('layouts.app')
@section('title', "Mi cuenta — Kuke's")

@section('content')
<div class="account-page">
    <div class="account-header">
        <div class="account-avatar">
            @if(Auth::user()->photo)
                <img src="{{ Auth::user()->photo }}" alt="{{ Auth::user()->name }}">
            @else
                <span>{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
            @endif
        </div>
        <div>
            <h1 class="account-name">{{ Auth::user()->name }}</h1>
            <p class="account-email">{{ Auth::user()->email }}</p>
            @if(Auth::user()->google_id)
            <span class="account-badge google-badge">
                <svg width="14" height="14" viewBox="0 0 48 48"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></svg>
                Conectado con Google
            </span>
            @endif
        </div>
    </div>

    <div class="account-grid">
        {{-- Favoritos guardados --}}
        <div class="account-card">
            <h3><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg> Mis favoritos</h3>
            <p>Accede a tus productos guardados en <a href="{{ route('pages.favoritos') }}">Favoritos</a>.</p>
        </div>
        {{-- Cupones --}}
        <div class="account-card">
            <h3><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20 12v10H4V12"/><path d="M22 7H2v5h20V7z"/><path d="M12 22V7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg> Mis cupones</h3>
            <p>Tienes un cupón activo: <strong>BIENVENIDO</strong> — 15% de descuento en tu primera compra.</p>
        </div>
        {{-- Pedidos --}}
        <div class="account-card">
            <h3><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg> Mis pedidos</h3>
            <p class="account-empty">Aún no tienes pedidos. <a href="{{ url('/') }}">¡Empieza a comprar!</a></p>
        </div>
        {{-- Datos --}}
        <div class="account-card">
            <h3><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Mi perfil</h3>
            <p>Miembro desde <strong>{{ Auth::user()->created_at->format('M Y') }}</strong></p>
            <p>{{ Auth::user()->email }}</p>
        </div>
    </div>

    <form method="POST" action="{{ route('logout') }}" class="account-logout">
        @csrf
        <button type="submit" class="btn-outline">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16,17 21,12 16,7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            Cerrar sesión
        </button>
    </form>
</div>
@endsection
