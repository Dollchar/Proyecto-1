<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Tienda de Tenis</title>
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}">

</head>
<body>

<nav>
    <h2>TenisStore</h2>
    <div>
        <a href="#">Inicio</a>
        <a href="#">Productos</a>
        <a href="#">Contacto</a>
    </div>
</nav>

<section class="hero">
    <h1>Los mejores tenis</h1>
    <p>Estilo, comodidad y calidad</p>
    <a class="btn" href="#">Ver productos</a>
</section>

<section class="productos">

    <div class="card">
        <img src="https://via.placeholder.com/220x150">
        <div class="card-body">
            <h3>Nike Air</h3>
            <p>Tenis deportivos cómodos.</p>
            <div class="precio">$1,899</div>
        </div>
    </div>

    <div class="card">
        <img src="https://via.placeholder.com/220x150">
        <div class="card-body">
            <h3>Adidas Run</h3>
            <p>Perfectos para correr.</p>
            <div class="precio">$1,499</div>
        </div>
    </div>

    <div class="card">
        <img src="https://via.placeholder.com/220x150">
        <div class="card-body">
            <h3>Puma Street</h3>
            <p>Estilo urbano moderno.</p>
            <div class="precio">$1,299</div>
        </div>
    </div>

</section>

<footer>
    © 2026 TenisStore - Todos los derechos reservados
</footer>

</body>
</html>