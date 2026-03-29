@extends('layouts.app')

@php
    $cat = $category ?? 'hombre';
    $titles = [
        'hombre'   => 'Tenis Premium para Hombre',
        'mujer'    => 'Tenis Premium para Mujer',
        'infantil' => 'Tenis Premium Infantil',
    ];
    $heroTexts = [
        'hombre'   => ['Tenis <br><em>Premium</em> para<br>hombre', 'Los modelos más legendarios y los nuevos lanzamientos que están en boca de todos.'],
        'mujer'    => ['Tenis <br><em>Premium</em> para<br>mujer', 'Estilo, comodidad y diseño exclusivo en cada paso. Encuentra tu par perfecto.'],
        'infantil' => ['Tenis <br><em>Premium</em><br>infantil', 'Los más pequeños también merecen el mejor estilo. Comodidad y diversión garantizadas.'],
    ];
    $heroImages = [
        'hombre'   => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=900&q=80',
        'mujer'    => 'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=900&q=80',
        'infantil' => 'https://images.unsplash.com/photo-1514989940723-e8e51635b782?w=900&q=80',
    ];
    $allBrands = collect($products)->pluck('brand')->unique()->sort()->values()->all();
    $allPrices = collect($products)->pluck('price_num');
    $minPrice = $allPrices->min();
    $maxPrice = $allPrices->max();
@endphp

@section('title', ($titles[$cat] ?? 'Tenis Premium') . " — Kuke's")

{{-- SEO Dinámico --}}
@push('styles')
<meta name="description" content="{{ $titles[$cat] ?? 'Tenis Premium' }} — Descubre la colección más exclusiva de sneakers premium en Kuke's. Envío gratis en compras mayores a $3,000 MXN.">
<meta property="og:title" content="{{ $titles[$cat] ?? 'Tenis Premium' }} — Kuke's">
<meta property="og:description" content="Descubre la colección más exclusiva de sneakers premium. Marcas como Prada, Golden Goose, Off-White y más.">
<meta property="og:image" content="{{ $heroImages[$cat] ?? '' }}">
<meta property="og:type" content="website">
<script type="application/ld+json">{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => $titles[$cat] ?? 'Tenis Premium',
    'description' => 'Colección de tenis premium para ' . $cat,
    'url' => url()->current(),
    'numberOfItems' => count($products),
    'itemListElement' => collect($products)->map(fn($p, $i) => [
        '@type' => 'Product',
        'position' => $i + 1,
        'name' => $p['brand'] . ' ' . $p['name'],
        'image' => $p['img'],
        'offers' => ['@type' => 'Offer', 'price' => $p['price_num'], 'priceCurrency' => 'MXN'],
    ])->values()->all(),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
@endpush

@section('content')

{{-- Hero Banner --}}
<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-content">
        <span class="hero-eyebrow">Nueva Temporada 2025</span>
        <h1 class="hero-title">{!! $heroTexts[$cat][0] ?? 'Tenis <br><em>Premium</em>' !!}</h1>
        <p class="hero-desc">{{ $heroTexts[$cat][1] ?? '' }}</p>
        <a href="#catalogo" class="btn-primary">Explorar colección</a>
    </div>
    <div class="hero-image-wrap">
        <img src="{{ $heroImages[$cat] ?? '' }}" alt="Tenis de lujo" class="hero-img">
    </div>
</section>

{{-- Brand Pills --}}
<section class="brands-bar">
    <div class="brands-inner">
        <a href="{{ $cat === 'hombre' ? route('sneakers.index') : route('sneakers.category', $cat) }}" class="brand-pill {{ !request('brand') ? 'active' : '' }}">Todos</a>
        @foreach($allBrands as $brand)
        <a href="{{ ($cat === 'hombre' ? route('sneakers.index') : route('sneakers.category', $cat)) . '?brand=' . urlencode($brand) }}" class="brand-pill {{ request('brand') === $brand ? 'active' : '' }}">{{ $brand }}</a>
        @endforeach
    </div>
</section>

{{-- Breadcrumbs inteligentes --}}
<section class="catalog-header" id="catalogo">
    <div class="breadcrumb">
        <a href="{{ url('/') }}">Inicio</a> <span>›</span>
        <a href="{{ url('/') }}">Zapatos</a> <span>›</span>
        <a href="{{ $cat === 'hombre' ? route('sneakers.index') : route('sneakers.category', $cat) }}">Tenis {{ ucfirst($cat) }}</a>
        @if(request('brand'))
        <span>›</span>
        <span>{{ request('brand') }}</span>
        @endif
    </div>
    <div class="catalog-controls">
        <button class="btn-filter" id="filter-toggle">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><line x1="4" y1="6" x2="20" y2="6"/><line x1="8" y1="12" x2="16" y2="12"/><line x1="11" y1="18" x2="13" y2="18"/></svg>
            Filtros
        </button>
        {{-- Comparador button --}}
        <button class="btn-filter btn-compare" id="compare-toggle" style="display:none">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2V9M9 21H5a2 2 0 0 1-2-2V9m0 0h18"/></svg>
            Comparar (<span id="compare-count">0</span>)
        </button>
        <div class="results-count" id="results-count">{{ count($products) }} resultados</div>
        <div class="sort-wrap">
            <label>Ordenar por</label>
            <select class="sort-select" id="sort-select">
                <option value="relevance">Relevancia</option>
                <option value="price-asc">Precio: menor a mayor</option>
                <option value="price-desc">Precio: mayor a menor</option>
                <option value="name">Nombre A-Z</option>
            </select>
        </div>
    </div>
</section>

{{-- Filter Sidebar --}}
<div class="filter-backdrop" id="filter-backdrop"></div>
<aside class="filter-sidebar" id="filter-sidebar">
    <div class="filter-sidebar-header">
        <h3>Filtros</h3>
        <button class="filter-close" id="filter-close">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12"/></svg>
        </button>
    </div>
    <div class="filter-sidebar-body">
        {{-- Precio --}}
        <div class="filter-group">
            <h4 class="filter-group-title">Precio</h4>
            <div class="filter-price-range">
                <input type="range" id="price-min" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $minPrice }}" step="100">
                <input type="range" id="price-max" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $maxPrice }}" step="100">
            </div>
            <div class="filter-price-labels">
                <span id="price-min-label">${{ number_format($minPrice, 0, '.', ',') }}</span>
                <span id="price-max-label">${{ number_format($maxPrice, 0, '.', ',') }}</span>
            </div>
        </div>
        {{-- Marca --}}
        <div class="filter-group">
            <h4 class="filter-group-title">Marca</h4>
            <div class="filter-checkboxes">
                @foreach($allBrands as $brand)
                <label class="filter-check">
                    <input type="checkbox" value="{{ $brand }}" class="filter-brand-check" {{ request('brand') === $brand ? 'checked' : '' }}>
                    <span>{{ $brand }}</span>
                </label>
                @endforeach
            </div>
        </div>
        {{-- Talla --}}
        <div class="filter-group">
            <h4 class="filter-group-title">Talla</h4>
            <div class="filter-sizes">
                @php
                    $allSizes = collect($products)->pluck('sizes')->flatten()->unique()->sort()->values()->all();
                @endphp
                @foreach($allSizes as $size)
                <label class="filter-size-pill">
                    <input type="checkbox" value="{{ $size }}" class="filter-size-check">
                    <span>{{ $size }}</span>
                </label>
                @endforeach
            </div>
        </div>
    </div>
    <div class="filter-sidebar-footer">
        <button class="btn-outline" id="filter-clear">Limpiar filtros</button>
        <button class="btn-primary" id="filter-apply">Aplicar</button>
    </div>
</aside>

{{-- Grid de Productos --}}
<section class="products-grid" id="products-grid">
    @foreach($products as $product)
    <a href="{{ route('sneakers.show', $product['id']) }}" class="product-card" data-id="{{ $product['id'] }}" data-brand="{{ $product['brand'] }}" data-price="{{ $product['price_num'] }}" data-sizes="{{ implode(',', $product['sizes']) }}" data-name="{{ $product['name'] }}">
        <div class="product-img-wrap">
            <img src="{{ $product['img'] }}" alt="{{ $product['brand'] }} {{ $product['name'] }}" loading="lazy">
            <button class="wishlist-btn" aria-label="Añadir a favoritos" onclick="event.preventDefault(); event.stopPropagation(); window.KukeWishlist && window.KukeWishlist.toggle({{ $product['id'] }}); this.classList.toggle('active')">
                <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </button>
            {{-- Compare checkbox --}}
            <label class="compare-check" onclick="event.preventDefault(); event.stopPropagation();">
                <input type="checkbox" class="compare-input" data-id="{{ $product['id'] }}" onchange="event.stopPropagation(); window.KukeCompare && window.KukeCompare.toggle({{ $product['id'] }})">
                <span class="compare-label">Comparar</span>
            </label>
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

{{-- Comparador modal --}}
<div class="compare-modal" id="compare-modal">
    <div class="compare-modal-inner">
        <div class="compare-modal-header">
            <h3>Comparar productos</h3>
            <button class="compare-modal-close" onclick="document.getElementById('compare-modal').classList.remove('open')">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="compare-modal-body" id="compare-body"></div>
    </div>
</div>

{{-- Banner editorial --}}
<section class="editorial-banner">
    <div class="editorial-text">
        <span class="editorial-label">Editorial</span>
        <h2>Las siluetas que<br>definen esta temporada</h2>
        <p>Desde las plataformas chunky hasta los runners ultra-técnicos: descubre cuáles son los tenis que no pueden faltar en tu clóset.</p>
        <a href="{{ route('pages.editorial') }}" class="btn-outline">Leer más</a>
    </div>
    <div class="editorial-img-wrap">
        <img src="https://images.unsplash.com/photo-1556906781-9a412961a28c?w=900&q=80" alt="Editorial tenis">
    </div>
</section>

{{-- Instagram feed --}}
<section class="instagram-feed">
    <h2 class="section-title">@kukes.mx en Instagram</h2>
    <p class="instagram-subtitle">Comparte tu estilo con #KukesStyle</p>
    <div class="instagram-grid">
        @foreach([
            'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=400&h=400&fit=crop&q=80',
            'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=400&h=400&fit=crop&q=80',
            'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=400&fit=crop&q=80',
            'https://images.unsplash.com/photo-1556906781-9a412961a28c?w=400&h=400&fit=crop&q=80',
            'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=400&h=400&fit=crop&q=80',
            'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=400&h=400&fit=crop&q=80',
        ] as $igImg)
        <a href="#" class="instagram-item" onclick="event.preventDefault(); KukeToast.show('Síguenos en @kukes.mx 📸', 'info')">
            <img src="{{ $igImg }}" alt="Instagram @kukes.mx" loading="lazy">
            <div class="instagram-hover">
                <svg width="24" height="24" fill="white" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
            </div>
        </a>
        @endforeach
    </div>
</section>

{{-- Marcas destacadas --}}
<section class="featured-brands">
    <h2 class="section-title">Marcas exclusivas</h2>
    <div class="brands-grid">
        @foreach(['Golden Goose','Prada','Off-White','Salomon','New Balance','ASICS'] as $b)
        <a href="{{ route('sneakers.index', ['brand' => $b]) }}" class="brand-card">{{ $b }}</a>
        @endforeach
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // ── FILTER SIDEBAR ──
    const filterToggle = document.getElementById('filter-toggle');
    const filterSidebar = document.getElementById('filter-sidebar');
    const filterBackdrop = document.getElementById('filter-backdrop');
    const filterClose = document.getElementById('filter-close');
    const filterApply = document.getElementById('filter-apply');
    const filterClear = document.getElementById('filter-clear');

    function openFilters() {
        filterSidebar.classList.add('open');
        filterBackdrop.classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeFilters() {
        filterSidebar.classList.remove('open');
        filterBackdrop.classList.remove('open');
        document.body.style.overflow = '';
    }

    filterToggle.addEventListener('click', openFilters);
    filterClose.addEventListener('click', closeFilters);
    filterBackdrop.addEventListener('click', closeFilters);

    // Price range labels
    const priceMin = document.getElementById('price-min');
    const priceMax = document.getElementById('price-max');
    const priceMinLabel = document.getElementById('price-min-label');
    const priceMaxLabel = document.getElementById('price-max-label');

    priceMin.addEventListener('input', () => {
        priceMinLabel.textContent = '$' + parseInt(priceMin.value).toLocaleString('es-MX');
    });
    priceMax.addEventListener('input', () => {
        priceMaxLabel.textContent = '$' + parseInt(priceMax.value).toLocaleString('es-MX');
    });

    // Apply filters client-side
    filterApply.addEventListener('click', () => {
        const minP = parseInt(priceMin.value);
        const maxP = parseInt(priceMax.value);
        const checkedBrands = [...document.querySelectorAll('.filter-brand-check:checked')].map(c => c.value);
        const checkedSizes = [...document.querySelectorAll('.filter-size-check:checked')].map(c => c.value);
        const cards = document.querySelectorAll('#products-grid .product-card');
        let visible = 0;

        cards.forEach(card => {
            const price = parseInt(card.dataset.price);
            const brand = card.dataset.brand;
            const sizes = card.dataset.sizes.split(',');

            let show = true;
            if (price < minP || price > maxP) show = false;
            if (checkedBrands.length > 0 && !checkedBrands.includes(brand)) show = false;
            if (checkedSizes.length > 0 && !checkedSizes.some(s => sizes.includes(s))) show = false;

            card.style.display = show ? '' : 'none';
            if (show) visible++;
        });

        document.getElementById('results-count').textContent = visible + ' resultados';
        closeFilters();
        KukeToast.show(`${visible} productos encontrados`, 'info', 2000);
    });

    filterClear.addEventListener('click', () => {
        priceMin.value = priceMin.min;
        priceMax.value = priceMax.max;
        priceMinLabel.textContent = '$' + parseInt(priceMin.min).toLocaleString('es-MX');
        priceMaxLabel.textContent = '$' + parseInt(priceMax.max).toLocaleString('es-MX');
        document.querySelectorAll('.filter-brand-check, .filter-size-check').forEach(c => c.checked = false);
        document.querySelectorAll('#products-grid .product-card').forEach(c => c.style.display = '');
        document.getElementById('results-count').textContent = document.querySelectorAll('#products-grid .product-card').length + ' resultados';
        closeFilters();
    });

    // ── SORT ──
    document.getElementById('sort-select').addEventListener('change', function() {
        const grid = document.getElementById('products-grid');
        const cards = [...grid.querySelectorAll('.product-card')];
        cards.sort((a, b) => {
            switch(this.value) {
                case 'price-asc': return parseInt(a.dataset.price) - parseInt(b.dataset.price);
                case 'price-desc': return parseInt(b.dataset.price) - parseInt(a.dataset.price);
                case 'name': return a.dataset.name.localeCompare(b.dataset.name);
                default: return 0;
            }
        });
        cards.forEach(card => grid.appendChild(card));
    });
});
</script>
@endpush
