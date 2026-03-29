<!DOCTYPE html>
<html lang="es" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Kuke — Tenis Premium')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <script>
        // Apply dark mode before paint to avoid flash
        if (localStorage.getItem('kuke_theme') === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
        }
    </script>
</head>
<body>

    {{-- Toast container --}}
    <div class="toast-container" id="toast-container"></div>

    {{-- Announcement bar --}}
    <div class="announcement-bar">
        <p>Envío gratis en pedidos mayores a $3,000 MXN &nbsp;|&nbsp; Devoluciones gratis por 30 días &nbsp;|&nbsp; Hacemos la recolección en tu casa</p>
    </div>

    {{-- Navbar --}}
    <header class="navbar">
        <nav class="nav-top">
            {{-- Mobile hamburger --}}
            <button class="hamburger" id="hamburger" aria-label="Menú">
                <span></span><span></span><span></span>
            </button>

            <div class="nav-left">
                <a href="{{ route('sneakers.category', 'mujer') }}" class="{{ ($category ?? '') === 'mujer' ? 'active' : '' }}">Mujer</a>
                <a href="{{ route('sneakers.index') }}" class="{{ ($category ?? 'hombre') === 'hombre' ? 'active' : '' }}">Hombre</a>
                <a href="{{ route('sneakers.category', 'infantil') }}" class="{{ ($category ?? '') === 'infantil' ? 'active' : '' }}">Infantil</a>
            </div>

            <a href="{{ url('/') }}" class="logo">KUKE's</a>

            <div class="nav-right">
                {{-- Dark mode toggle --}}
                <button class="icon-btn theme-toggle" id="theme-toggle" aria-label="Cambiar tema">
                    <svg class="icon-sun" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
                    <svg class="icon-moon" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                </button>
                <button class="icon-btn" id="search-toggle" aria-label="Buscar">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                </button>
                <a href="{{ route('pages.favoritos') }}" class="icon-btn" aria-label="Favoritos">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </a>

                {{-- User: logged in → dropdown, guest → login link --}}
                @auth
                <div class="user-menu" id="user-menu">
                    <button class="user-menu-btn" id="user-menu-btn" aria-label="Mi cuenta">
                        @if(Auth::user()->photo)
                        <img src="{{ Auth::user()->photo }}" alt="{{ Auth::user()->name }}" class="user-avatar-sm">
                        @else
                        <span class="user-initials">{{ strtoupper(substr(Auth::user()->name,0,1)) }}</span>
                        @endif
                    </button>
                    <div class="user-dropdown" id="user-dropdown">
                        <div class="user-dropdown-header">
                            <strong>{{ Auth::user()->name }}</strong>
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                        <a href="{{ route('account') }}">Mi cuenta</a>
                        <a href="{{ route('pages.favoritos') }}">Mis favoritos</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Cerrar sesión</button>
                        </form>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="icon-btn" aria-label="Iniciar sesión">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </a>
                @endauth

                <button class="icon-btn cart-btn" id="cart-toggle" aria-label="Carrito">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                    <span class="cart-count" id="cart-count">0</span>
                </button>
            </div>
        </nav>

        {{-- Mobile menu --}}
        <div class="mobile-menu" id="mobile-menu">
            <div class="mobile-menu-cats">
                <a href="{{ route('sneakers.category', 'mujer') }}">Mujer</a>
                <a href="{{ route('sneakers.index') }}">Hombre</a>
                <a href="{{ route('sneakers.category', 'infantil') }}">Infantil</a>
            </div>
            <div class="mobile-menu-links">
                <a href="{{ route('sneakers.index') }}">Novedades</a>
                <a href="{{ route('sneakers.index') }}">Marcas</a>
                <a href="{{ route('sneakers.index') }}">Zapatos</a>
                <a href="{{ route('sneakers.index') }}" class="sale-link">Rebajas</a>
            </div>
            <div class="mobile-menu-links">
                @auth
                <a href="{{ route('account') }}">👤 Mi cuenta</a>
                @endauth
                @guest
                <a href="{{ route('login') }}">🔑 Iniciar sesión</a>
                <a href="{{ route('register') }}">📝 Registrarse</a>
                @endguest
                <a href="{{ route('pages.favoritos') }}">❤️ Mis favoritos</a>
                <a href="{{ route('pages.devoluciones') }}">Devoluciones</a>
                <a href="{{ route('pages.envios') }}">Envíos</a>
                <a href="{{ route('pages.contacto') }}">Contacto</a>
            </div>
        </div>

        <nav class="nav-bottom">
            <a href="{{ route('sneakers.index') }}">Novedades</a>
            <a href="{{ route('sneakers.index') }}">Marcas</a>
            <a href="{{ route('sneakers.index') }}">Ropa</a>
            <a href="{{ route('sneakers.index') }}" class="current">Zapatos</a>
            <a href="{{ route('sneakers.index') }}">Bolsas</a>
            <a href="{{ route('sneakers.index') }}">Accesorios</a>
            <a href="{{ route('sneakers.index') }}">Relojes</a>
            <a href="{{ route('sneakers.index') }}">Lifestyle</a>
            <a href="{{ route('sneakers.index') }}" class="sale-link">Rebajas</a>
        </nav>
    </header>

    {{-- Search Overlay --}}
    <div class="search-overlay" id="search-overlay">
        <div class="search-overlay-inner">
            <div class="search-bar-wrap">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                <input type="text" id="search-input" placeholder="Buscar tenis, marcas, estilos..." autocomplete="off">
                <button class="search-close" id="search-close">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="search-results" id="search-results">
                <p class="search-hint">Escribe para buscar entre nuestros productos...</p>
            </div>
        </div>
    </div>

    {{-- Cart Drawer --}}
    <div class="cart-drawer-backdrop" id="cart-backdrop"></div>
    <aside class="cart-drawer" id="cart-drawer">
        <div class="cart-drawer-header">
            <h3>Tu carrito</h3>
            <button class="cart-drawer-close" id="cart-close">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="cart-drawer-body" id="cart-body">
            <div class="cart-empty" id="cart-empty">
                <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                <p>Tu carrito está vacío</p>
                <a href="{{ url('/') }}" class="btn-primary">Explorar colección</a>
            </div>
            <div class="cart-items" id="cart-items"></div>
        </div>
        <div class="cart-drawer-footer" id="cart-footer" style="display:none">
            <div class="cart-coupon">
                <form class="coupon-form" id="coupon-form">
                    <input type="text" id="coupon-input" placeholder="Código de cupón" autocomplete="off">
                    <button type="submit">Aplicar</button>
                </form>
                <span class="coupon-msg" id="coupon-msg"></span>
            </div>
            <div class="cart-total">
                <span>Subtotal</span>
                <span id="cart-total-price">$0 MXN</span>
            </div>
            <div class="cart-discount" id="cart-discount" style="display:none">
                <span>Descuento</span>
                <span id="cart-discount-amount">-$0</span>
            </div>
            <div class="cart-total cart-grand-total">
                <span>Total</span>
                <span id="cart-grand-total">$0 MXN</span>
            </div>
            <div class="cart-shipping-note">
                <span id="cart-shipping-msg">Envío gratis en pedidos mayores a $3,000 MXN</span>
            </div>
            <button class="btn-primary cart-checkout-btn">Proceder al pago</button>
        </div>
    </aside>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-inner">
            <div class="footer-brand">
                <span class="logo-footer">Kuke's</span>
                <p>La selección más exclusiva de tenis premium para hombre, mujer e infantil.</p>
            </div>
            <div class="footer-links">
                <h4>Ayuda</h4>
                <a href="{{ route('pages.devoluciones') }}">Devoluciones</a>
                <a href="{{ route('pages.envios') }}">Envíos</a>
                <a href="{{ route('pages.tallas') }}">Guía de tallas</a>
                <a href="{{ route('pages.contacto') }}">Contacto</a>
            </div>
            <div class="footer-links">
                <h4>Empresa</h4>
                <a href="{{ route('pages.nosotros') }}">Sobre nosotros</a>
                <a href="{{ route('pages.contacto') }}">Careers</a>
                <a href="{{ route('pages.nosotros') }}">Prensa</a>
            </div>
            {{-- Newsletter --}}
            <div class="footer-newsletter">
                <h4>Newsletter</h4>
                <p>Recibe novedades y ofertas exclusivas.</p>
                <form class="newsletter-form" id="newsletter-form">
                    <input type="email" placeholder="tu@email.com" required>
                    <button type="submit">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Kuke's. Todos los derechos reservados.</p>
        </div>
    </footer>

    {{-- WhatsApp Chat Widget --}}
    <div class="chat-widget" id="chat-widget">
        <button class="chat-widget-btn" id="chat-btn" aria-label="Chat">
            <svg width="26" height="26" fill="white" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        </button>
        <div class="chat-popup" id="chat-popup">
            <div class="chat-popup-header">
                <div class="chat-popup-avatar">K</div>
                <div>
                    <strong>Kuke's</strong>
                    <span>Normalmente responde en minutos</span>
                </div>
                <button class="chat-popup-close" onclick="document.getElementById('chat-popup').classList.remove('open')">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="chat-popup-body">
                <div class="chat-bubble">
                    <p>¡Hola! 👋 ¿En qué podemos ayudarte?</p>
                    <span class="chat-time">Ahora</span>
                </div>
            </div>
            <div class="chat-popup-footer">
                <input type="text" id="chat-input" placeholder="Escribe un mensaje..." autocomplete="off">
                <button id="chat-send">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Data for JS --}}
    <script>
        window.KUKE_API_URL = "{{ route('api.products') }}";
    </script>
    
    {{-- Toast Triggers from Session --}}
    @if(session('toast_success'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.KukeToast) {
                window.KukeToast.show("{{ session('toast_success') }}", 'success', 3000);
            }
        });
    </script>
    @endif

    @if(session('toast_error'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.KukeToast) {
                window.KukeToast.show("{{ session('toast_error') }}", 'error', 3000);
            }
        });
    </script>
    @endif

    @stack('scripts')
</body>
</html>
