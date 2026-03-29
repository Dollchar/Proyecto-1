@extends('layouts.app')
@section('title', "Crear cuenta — Kuke's")

@section('content')
<div class="auth-page">
    <div class="auth-split">

        {{-- Left: Visual --}}
        <div class="auth-visual">
            <div class="auth-visual-inner">
                <a href="{{ url('/') }}" class="auth-logo">Kuke's</a>
                <blockquote class="auth-quote">
                    <p>"Únete a miles de sneakerheads que ya confían en nosotros."</p>
                </blockquote>
                <ul class="auth-perks">
                    <li>
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg>
                        Envío gratis en tu primer pedido
                    </li>
                    <li>
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg>
                        Acceso anticipado a drops exclusivos
                    </li>
                    <li>
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg>
                        Historial de pedidos y devoluciones fácil
                    </li>
                    <li>
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg>
                        Cupón de bienvenida: <strong>BIENVENIDO</strong>
                    </li>
                </ul>
            </div>
            <img src="https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=900&q=80" alt="Sneakers" class="auth-visual-img">
        </div>

        {{-- Right: Form --}}
        <div class="auth-form-wrap">
            <div class="auth-form-inner">
                <h1 class="auth-title">Crear cuenta</h1>
                <p class="auth-subtitle">Únete a la comunidad Kuke's — es gratis</p>

                {{-- Google Button --}}
                <a href="{{ route('auth.google') }}" class="btn-google">
                    <svg width="20" height="20" viewBox="0 0 48 48">
                        <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                        <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                        <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                        <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                    </svg>
                    Registrarse con Google
                </a>

                <div class="auth-divider"><span>o con tu correo</span></div>

                {{-- Errors --}}
                @if($errors->any())
                <div class="auth-error-box">
                    @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                {{-- Register Form --}}
                <form method="POST" action="{{ route('register') }}" class="auth-form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre completo</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Tu nombre" autocomplete="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="tu@correo.com" autocomplete="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="password-wrap">
                            <input type="password" id="password" name="password"
                                placeholder="Mínimo 8 caracteres" autocomplete="new-password" required>
                            <button type="button" class="password-toggle" aria-label="Mostrar contraseña">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar contraseña</label>
                        <div class="password-wrap">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Repite tu contraseña" autocomplete="new-password" required>
                        </div>
                    </div>
                    <p class="auth-terms">
                        Al registrarte aceptas nuestros <a href="#">Términos de uso</a> y
                        <a href="#">Política de privacidad</a>.
                    </p>
                    <button type="submit" class="btn-primary auth-submit">Crear cuenta gratis</button>
                </form>

                <p class="auth-switch">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}">Inicia sesión</a>
                </p>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
document.querySelectorAll('.password-toggle').forEach(btn => {
    btn.addEventListener('click', function() {
        const input = this.previousElementSibling;
        input.type = input.type === 'password' ? 'text' : 'password';
    });
});
</script>
@endpush
@endsection
