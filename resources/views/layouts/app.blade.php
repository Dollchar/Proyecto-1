<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kuke — Tenis OEM')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>

    {{-- Announcement bar --}}
    <div class="announcement-bar">
        <p>Envío gratis en pedidos mayores a $3,000 MXN &nbsp;|&nbsp; Devoluciones gratis por 30 días &nbsp;|&nbsp; Hacemos la recolección en tu casa</p>
    </div>

    {{-- Navbar --}}
    <header class="navbar">
        <nav class="nav-top">
            <div class="nav-left">
                <a href="#">Mujer</a>
                <a href="#" class="active">Hombre</a>
                <a href="#">Infantil</a>
            </div>

            <a href="{{ url('/') }}" class="logo">KUKE's</a>

            <div class="nav-right">
                <button class="icon-btn" aria-label="Buscar">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                </button>
                <button class="icon-btn" aria-label="Favoritos">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </button>
                <button class="icon-btn cart-btn" aria-label="Carrito">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                    <span class="cart-count">0</span>
                </button>
            </div>
        </nav>

        <nav class="nav-bottom">
            <a href="#">Novedades</a>
            <a href="#">Marcas</a>
            <a href="#">Ropa</a>
            <a href="#" class="current">Zapatos</a>
            <a href="#">Bolsas</a>
            <a href="#">Accesorios</a>
            <a href="#">Relojes</a>
            <a href="#">Lifestyle</a>
            <a href="#" class="sale-link">Rebajas</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-inner">
            <div class="footer-brand">
                <span class="logo-footer">Kuke's</span>
                <p>La selección más exclusiva de tenis OEM para hombre, mujer e infantil.</p>
            </div>
            <div class="footer-links">
                <h4>Ayuda</h4>
                <a href="#">Devoluciones</a>
                <a href="#">Envíos</a>
                <a href="#">Guía de tallas</a>
                <a href="#">Contacto</a>
            </div>
            <div class="footer-links">
                <h4>Empresa</h4>
                <a href="#">Sobre nosotros</a>
                <a href="#">Careers</a>
                <a href="#">Prensa</a>
            </div>
            <div class="footer-links">
                <h4>Síguenos</h4>
                <a href="#">Instagram</a>
                <a href="#">TikTok</a>
                <a href="#">Pinterest</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Kuke's. Todos los derechos reservados.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
