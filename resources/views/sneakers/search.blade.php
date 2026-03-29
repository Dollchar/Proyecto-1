@extends('layouts.app')

@section('title', 'Buscar "' . $query . '" — Kuke\'s')

@section('content')

<section class="info-page">
    <div class="info-page-header">
        <h1>Resultados de búsqueda</h1>
        @if($query)
        <p class="search-results-summary">{{ count($products) }} resultado(s) para "<strong>{{ $query }}</strong>"</p>
        @endif
    </div>

    <form action="{{ route('sneakers.search') }}" method="GET" class="search-page-form">
        <div class="search-bar-wrap search-bar-inline">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            <input type="text" name="q" value="{{ $query }}" placeholder="Buscar tenis, marcas, estilos..." autocomplete="off">
            <button type="submit" class="btn-primary" style="padding:10px 24px">Buscar</button>
        </div>
    </form>

    @if(count($products) > 0)
    <section class="products-grid" style="padding-top:20px">
        @foreach($products as $product)
        <a href="{{ route('sneakers.show', $product['id']) }}" class="product-card" data-id="{{ $product['id'] }}">
            <div class="product-img-wrap">
                <img src="{{ $product['img'] }}" alt="{{ $product['brand'] }} {{ $product['name'] }}" loading="lazy">
                <div class="product-badge">{{ $product['badge'] }}</div>
                <div class="product-overlay">
                    <span class="btn-quick-add">Ver producto</span>
                </div>
            </div>
            <div class="product-info">
                <span class="product-brand">{{ $product['brand'] }}</span>
                <h3 class="product-name">{{ $product['name'] }}</h3>
                <span class="product-color">{{ $product['color'] }}</span>
                <span class="product-price">{{ $product['price'] }} MXN</span>
            </div>
        </a>
        @endforeach
    </section>
    @else
    <div class="empty-state">
        <svg width="64" height="64" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
        <h2>No encontramos resultados</h2>
        <p>Intenta con otro término de búsqueda o explora nuestras categorías.</p>
        <a href="{{ url('/') }}" class="btn-primary">Ver catálogo completo</a>
    </div>
    @endif
</section>

@endsection
