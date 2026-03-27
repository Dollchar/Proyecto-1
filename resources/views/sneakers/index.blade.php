@extends('layouts.app')

@section('title', 'Tenis OEM para Hombre — Kukes')

@section('content')

{{-- Hero Banner --}}
<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-content">
        <span class="hero-eyebrow">Nueva Temporada 2025</span>
        <h1 class="hero-title">Tenis <br><em>OEM</em> para<br>hombre</h1>
        <p class="hero-desc">Los modelos más legendarios y los nuevos lanzamientos que están en boca de todos.</p>
        <a href="#catalogo" class="btn-primary">Explorar colección</a>
    </div>
    <div class="hero-image-wrap">
        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=900&q=80" alt="Tenis de lujo" class="hero-img">
    </div>
</section>

{{-- Brand Pills --}}
<section class="brands-bar">
    <div class="brands-inner">
        @foreach(['Dolce & Gabbana', 'Prada', 'Valentino', 'Polo Ralph Lauren', 'Saint Laurent', 'Gucci', 'Golden Goose', 'Off-White', 'ASICS'] as $brand)
        <button class="brand-pill {{ $loop->first ? 'active' : '' }}">{{ $brand }}</button>
        @endforeach
    </div>
</section>

{{-- Filtros y Ordenar --}}
<section class="catalog-header" id="catalogo">
    <div class="breadcrumb">
        <a href="#">Inicio</a> <span>›</span>
        <a href="#">Zapatos</a> <span>›</span>
        <span>Tenis</span>
    </div>
    <div class="catalog-controls">
        <button class="btn-filter">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><line x1="4" y1="6" x2="20" y2="6"/><line x1="8" y1="12" x2="16" y2="12"/><line x1="11" y1="18" x2="13" y2="18"/></svg>
            Filtros
        </button>
        <div class="results-count">{{ count($products ?? []) ?: 24 }} resultados</div>
        <div class="sort-wrap">
            <label>Ordenar por</label>
            <select class="sort-select">
                <option>Relevancia</option>
                <option>Precio: menor a mayor</option>
                <option>Precio: mayor a menor</option>
                <option>Novedades</option>
            </select>
        </div>
    </div>
</section>

{{-- Grid de Productos --}}
<section class="products-grid">
    @php
    $products = $products ?? [
        ['id'=>1,'brand'=>'On','name'=>'Cloudnova Form','price'=>'$4,800','badge'=>'Nueva temporada','color'=>'Blanco / Gris','img'=>'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=600&q=80'],
        ['id'=>2,'brand'=>'ASICS','name'=>'Gel-Kayano 14','price'=>'$3,200','badge'=>'Nueva temporada','color'=>'Crema / Azul','img'=>'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=600&q=80'],
        ['id'=>3,'brand'=>'Axel Arigato','name'=>'Area Lo Sneaker','price'=>'$6,500','badge'=>'Destacado','color'=>'Negro / Grafito','img'=>'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=600&q=80'],
        ['id'=>4,'brand'=>'Off-White','name'=>'Out Of Office','price'=>'$14,900','badge'=>'Nueva temporada','color'=>'Blanco / Negro / Plata','img'=>'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=600&q=80'],
        ['id'=>5,'brand'=>'New Balance','name'=>'550 Heritage','price'=>'$2,800','badge'=>'Más vendido','color'=>'Blanco / Verde','img'=>'https://images.unsplash.com/photo-1539185441755-769473a23570?w=600&q=80'],
        ['id'=>6,'brand'=>'Salomon','name'=>'XT-6 Advanced','price'=>'$5,400','badge'=>'Nueva temporada','color'=>'Negro / Rojo','img'=>'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&q=80'],
        ['id'=>7,'brand'=>'Prada','name'=>'America\'s Cup','price'=>'$22,000','badge'=>'Lujo','color'=>'Blanco / Negro','img'=>'https://images.unsplash.com/photo-1584735175315-9d5df23860e6?w=600&q=80'],
        ['id'=>8,'brand'=>'Golden Goose','name'=>'Superstar Distressed','price'=>'$16,500','badge'=>'Icónico','color'=>'Blanco / Dorado','img'=>'https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=600&q=80'],
    ];
    @endphp

    @foreach($products as $product)
    <article class="product-card" data-id="{{ $product['id'] }}">
        <div class="product-img-wrap">
            <img src="{{ $product['img'] }}" alt="{{ $product['brand'] }} {{ $product['name'] }}" loading="lazy">
            <button class="wishlist-btn" aria-label="Añadir a favoritos">
                <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </button>
            <div class="product-badge">{{ $product['badge'] }}</div>
            <div class="product-overlay">
                <button class="btn-quick-add">Agregar al carrito</button>
            </div>
        </div>
        <div class="product-info">
            <span class="product-brand">{{ $product['brand'] }}</span>
            <h3 class="product-name">{{ $product['name'] }}</h3>
            <span class="product-color">{{ $product['color'] }}</span>
            <span class="product-price">{{ $product['price'] }} MXN</span>
        </div>
    </article>
    @endforeach
</section>

{{-- Banner editorial --}}
<section class="editorial-banner">
    <div class="editorial-text">
        <span class="editorial-label">Editorial</span>
        <h2>Las siluetas que<br>definen esta temporada</h2>
        <p>Desde las plataformas chunky hasta los runners ultra-técnicos: descubre cuáles son los tenis que no pueden faltar en tu clóset.</p>
        <a href="#" class="btn-outline">Leer más</a>
    </div>
    <div class="editorial-img-wrap">
        <img src="https://images.unsplash.com/photo-1556906781-9a412961a28c?w=900&q=80" alt="Editorial tenis">
    </div>
</section>

{{-- Marcas destacadas --}}
<section class="featured-brands">
    <h2 class="section-title">Marcas exclusivas</h2>
    <div class="brands-grid">
        @foreach(['Golden Goose','Prada','Off-White','Salomon','New Balance','ASICS'] as $b)
        <a href="#" class="brand-card">{{ $b }}</a>
        @endforeach
    </div>
</section>

@endsection
