@extends('layouts.app')
@section('title', "Iniciar sesión — Kuke's")

@section('content')
<div class="auth-page">
    <div class="auth-split">

        {{-- Left: Visual --}}
        <div class="auth-visual">
            <div class="auth-visual-inner">
                <a href="{{ url('/') }}" class="auth-logo">Kuke's</a>
                <blockquote class="auth-quote">
                    <p>"El estilo no es solo lo que usas, es quién eres."</p>
                </blockquote>
                <div class="auth-visual-badge">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    Compra 100% segura
                </div>
            </div>
            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=900&q=80" alt="Sneakers" class="auth-visual-img">
        </div>

        {{-- Right: Form --}}
        <div class="auth-form-wrap">
            <div class="auth-form-inner">
                <h1 class="auth-title">Bienvenido de nuevo</h1>
                <p class="auth-subtitle">Inicia sesión en tu cuenta de Kuke's</p>

                {{-- Google Button --}}
                <a href="{{ route('auth.google') }}" class="btn-google">
                    <svg width="20" height="20" viewBox="0 0 48 48">
                        <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                        <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                        <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                        <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                    </svg>
                    Continuar con Google
                </a>

                <div class="auth-divider"><span>o</span></div>

                {{-- Errors --}}
                @if($errors->any())
                <div class="auth-error-box">
                    @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                {{-- Login Form --}}
                <form method="POST" action="{{ route('login') }}" class="auth-form">
                    @csrf
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="tu@correo.com" autocomplete="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">
                            Contraseña
                            <a href="#" class="form-label-link">¿Olvidaste tu contraseña?</a>
                        </label>
                        <div class="password-wrap">
                            <input type="password" id="password" name="password"
                                placeholder="••••••••" autocomplete="current-password" required>
                            <button type="button" class="password-toggle" aria-label="Mostrar contraseña">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>
                    <div class="form-check-row">
                        <label class="form-check">
                            <input type="checkbox" name="remember">
                            <span>Recordarme</span>
                        </label>
                    </div>
                    <button type="submit" class="btn-primary auth-submit">Iniciar sesión</button>
                </form>

                <p class="auth-switch">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}">Regístrate gratis</a>
                </p>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
// Password toggle
document.querySelector('.password-toggle')?.addEventListener('click', function() {
    const input = this.previousElementSibling;
    input.type = input.type === 'password' ? 'text' : 'password';
});
</script>
@endpush
@endsection
