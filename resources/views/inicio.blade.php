<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Kukes Shop - Main page</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

@vite(['resources/sass/inicio.scss','resources/css/app.css','resources/js/app.js'])

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-dark navbar-blur fixed-top">
<div class="container">

<a class="navbar-brand fw-bold">Kuke's Shop</a>

<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link active">Inicio</a>
</li>

<li class="nav-item">
<a class="nav-link">Colección</a>
</li>

<li class="nav-item">
<a class="nav-link">Historia</a>
</li>

</ul>

</div>
</div>
</nav>


<!-- HERO -->

<section class="hero">

<div class="hero-content">

<h1 class="hero-title">
El futuro del movimiento
</h1>

<p class="hero-sub">
Diseñados para velocidad, creados para destacar.
</p>

<button class="shadow__btn">
    Ver colección
</button>

</div>

</section>


<!-- SLIDER 3D -->

<section class="slider-section">

<h2 class="section-title">
Modelos destacados
</h2>

<div class="slider3d">

<div class="slide">
<img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff">
</div>

<div class="slide">
<img src="{{ url('assets/images/tenisbi.avif') }}">
</div>

<div class="slide">
<img src="{{ url('assets/images/tenisgay.avif') }}">
</div>

<div class="slide">
<img src="https://images.unsplash.com/photo-1584735175097-719d848f8449">
</div>

<div class="slide">
<img src="https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77">
</div>

</div>

</section>


<!-- SECCION BRAND -->

<section class="brand">

<div class="brand-content">

<h2>Diseño. Velocidad. Innovación.</h2>

<p>
Cada par de tenis combina ingeniería deportiva y diseño minimalista.
Pensados para quienes quieren avanzar más rápido.
</p>

</div>
    
</section>


<!-- FOOTER -->

<footer>

<p>
© 2026 Kuke's Shop
</p>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>