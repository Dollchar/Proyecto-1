@extends('layouts.app')

@section('title', $product['brand'] . ' ' . $product['name'] . " — Kuke's")

{{-- SEO Dinámico --}}
@push('styles')
<meta name="description" content="{{ $product['brand'] }} {{ $product['name'] }} — {{ $product['description'] }}">
<meta property="og:title" content="{{ $product['brand'] }} {{ $product['name'] }} — Kuke's">
<meta property="og:description" content="{{ Str::limit($product['description'], 160) }}">
<meta property="og:image" content="{{ $product['gallery'][0] }}">
<meta property="og:type" content="product">
<meta property="product:price:amount" content="{{ $product['price_num'] }}">
<meta property="product:price:currency" content="MXN">
<script type="application/ld+json">{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Product',
    'name' => $product['brand'] . ' ' . $product['name'],
    'image' => $product['gallery'],
    'description' => $product['description'],
    'sku' => $product['sku'],
    'brand' => ['@type' => 'Brand', 'name' => $product['brand']],
    'color' => $product['color'],
    'material' => $product['material'],
    'offers' => [
        '@type' => 'Offer',
        'price' => $product['price_num'],
        'priceCurrency' => 'MXN',
        'availability' => 'https://schema.org/InStock',
        'seller' => ['@type' => 'Organization', 'name' => "Kuke's"],
    ],
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => '4.7',
        'reviewCount' => '24',
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
@endpush

@section('content')

{{-- Breadcrumbs inteligentes --}}
<nav class="pdp-breadcrumb">
    <a href="{{ url('/') }}">Inicio</a>
    <span>›</span>
    <a href="{{ route('sneakers.category', $product['category']) }}">Tenis {{ ucfirst($product['category']) }}</a>
    <span>›</span>
    <a href="{{ route('sneakers.category', $product['category']) }}?brand={{ urlencode($product['brand']) }}">{{ $product['brand'] }}</a>
    <span>›</span>
    <span>{{ $product['name'] }}</span>
</nav>

{{-- Product Detail --}}
<section class="pdp">
    {{-- Gallery --}}
    <div class="pdp-gallery">
        <div class="pdp-thumbs">
            @foreach($product['gallery'] as $i => $thumb)
            <button class="pdp-thumb {{ $i === 0 ? 'active' : '' }}" data-index="{{ $i }}">
                <img src="{{ $thumb }}" alt="Vista {{ $i + 1 }}" loading="lazy">
            </button>
            @endforeach
        </div>
        <div class="pdp-main-image">
            <img id="pdp-hero-img" src="{{ $product['gallery'][0] }}" alt="{{ $product['brand'] }} {{ $product['name'] }}">
            <span class="pdp-badge">{{ $product['badge'] }}</span>
            <button class="pdp-zoom-btn" aria-label="Zoom">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
            </button>
        </div>
    </div>

    {{-- Info --}}
    <div class="pdp-info">
        <div class="pdp-header">
            <span class="pdp-brand">{{ $product['brand'] }}</span>
            <h1 class="pdp-title">{{ $product['name'] }}</h1>
            <span class="pdp-color">{{ $product['color'] }}</span>
            <div class="pdp-price-row">
                <span class="pdp-price">{{ $product['price'] }} MXN</span>
                @if($product['price_num'] >= 3000)
                <span class="pdp-free-ship">Envío gratis</span>
                @endif
            </div>
            {{-- Rating summary --}}
            <div class="pdp-rating-summary">
                <div class="pdp-stars">
                    @for($s=0; $s<5; $s++)
                    <svg width="14" height="14" fill="{{ $s < 4 ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"/></svg>
                    @endfor
                </div>
                <a href="#reviews" class="pdp-rating-link">4.7 (24 reseñas)</a>
            </div>
        </div>

        <div class="pdp-divider"></div>

        {{-- Tallas --}}
        <div class="pdp-sizes">
            <div class="pdp-sizes-header">
                <span class="pdp-label">Talla (MX)</span>
                <a href="{{ route('pages.tallas') }}" class="pdp-size-guide-btn">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
                    Guía de tallas
                </a>
            </div>
            <div class="pdp-size-grid">
                @foreach($product['sizes'] as $size)
                <button class="pdp-size-btn" data-size="{{ $size }}">{{ $size }}</button>
                @endforeach
            </div>
        </div>

        <div class="pdp-divider"></div>

        {{-- Botones de acción --}}
        <div class="pdp-actions">
            <button class="pdp-add-cart" id="pdp-add-cart">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                Agregar al carrito
            </button>
            <button class="pdp-wishlist" aria-label="Añadir a favoritos">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </button>
        </div>

        <div class="pdp-divider"></div>

        {{-- Descripción --}}
        <div class="pdp-section">
            <h3 class="pdp-section-title">Descripción</h3>
            <p class="pdp-description">{{ $product['description'] }}</p>
        </div>

        {{-- Detalles --}}
        <div class="pdp-section">
            <h3 class="pdp-section-title">Detalles del producto</h3>
            <ul class="pdp-details-list">
                <li><span>Marca</span><span>{{ $product['brand'] }}</span></li>
                <li><span>Color</span><span>{{ $product['color'] }}</span></li>
                <li><span>Materiales</span><span>{{ $product['material'] }}</span></li>
                <li><span>SKU</span><span>{{ $product['sku'] }}</span></li>
            </ul>
        </div>

        {{-- Promesas --}}
        <div class="pdp-promises">
            <div class="pdp-promise">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9 17H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-4m-5 0v4m0-4h4m-4 4h4"/><path d="M12 8v4l3 3"/></svg>
                <div><strong>Envío en 3-5 días</strong><span>Entrega rápida a todo México</span></div>
            </div>
            <div class="pdp-promise">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9,22 9,12 15,12 15,22"/></svg>
                <div><strong>Devolución gratis</strong><span>30 días, recolección a domicilio</span></div>
            </div>
            <div class="pdp-promise">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <div><strong>Garantía de autenticidad</strong><span>100% original, verificado</span></div>
            </div>
        </div>
    </div>
</section>

{{-- Reseñas --}}
<section class="reviews-section" id="reviews">
    <h2 class="section-title">Reseñas de clientes</h2>
    <div class="reviews-summary">
        <div class="reviews-score">
            <span class="reviews-avg">4.7</span>
            <div class="reviews-stars">
                @for($s=0; $s<5; $s++)
                <svg width="18" height="18" fill="{{ $s < 4 ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"/></svg>
                @endfor
            </div>
            <span class="reviews-total">Basado en 24 reseñas</span>
        </div>
        <button class="btn-primary" id="write-review-btn">Escribir reseña</button>
    </div>

    {{-- Write review form --}}
    <div class="review-form-wrap" id="review-form-wrap" style="display:none">
        <form class="review-form" id="review-form">
            <h3>Tu reseña</h3>
            <div class="review-stars-input" id="review-stars-input">
                <span>Calificación:</span>
                @for($s=1; $s<=5; $s++)
                <button type="button" class="review-star-btn" data-rating="{{ $s }}">
                    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"/></svg>
                </button>
                @endfor
            </div>
            <div class="form-group">
                <label for="review-name">Nombre</label>
                <input type="text" id="review-name" placeholder="Tu nombre" required>
            </div>
            <div class="form-group">
                <label for="review-text">Reseña</label>
                <textarea id="review-text" rows="4" placeholder="Comparte tu experiencia con este producto..." required></textarea>
            </div>
            <button type="submit" class="btn-primary">Publicar reseña</button>
        </form>
    </div>

    {{-- Existing reviews (static + dynamic from localStorage) --}}
    <div class="reviews-list" id="reviews-list">
        {{-- Static demo reviews --}}
        <div class="review-card">
            <div class="review-header">
                <div class="review-avatar">M</div>
                <div>
                    <span class="review-author">María G.</span>
                    <span class="review-date">Hace 2 semanas</span>
                </div>
                <div class="review-card-stars">
                    @for($s=0; $s<5; $s++)
                    <svg width="12" height="12" fill="currentColor" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"/></svg>
                    @endfor
                </div>
            </div>
            <p class="review-text">Increíble calidad, se nota que son originales. El envío fue super rápido y llegaron perfectos. Definitivamente compraré más pares aquí.</p>
        </div>
        <div class="review-card">
            <div class="review-header">
                <div class="review-avatar">C</div>
                <div>
                    <span class="review-author">Carlos R.</span>
                    <span class="review-date">Hace 1 mes</span>
                </div>
                <div class="review-card-stars">
                    @for($s=0; $s<5; $s++)
                    <svg width="12" height="12" fill="{{ $s < 4 ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"/></svg>
                    @endfor
                </div>
            </div>
            <p class="review-text">Muy buen producto, la talla fue exacta. El único detalle es que me gustaría más opciones de colores. Pero por lo demás excelente.</p>
        </div>
    </div>
</section>

{{-- Productos relacionados --}}
@if(count($related) > 0)
<section class="pdp-related">
    <h2 class="section-title">También te puede gustar</h2>
    <div class="pdp-related-grid">
        @foreach($related as $rel)
        <a href="{{ route('sneakers.show', $rel['id']) }}" class="product-card">
            <div class="product-img-wrap">
                <img src="{{ $rel['img'] }}" alt="{{ $rel['brand'] }} {{ $rel['name'] }}" loading="lazy">
                <div class="product-badge">{{ $rel['badge'] }}</div>
            </div>
            <div class="product-info">
                <span class="product-brand">{{ $rel['brand'] }}</span>
                <h3 class="product-name">{{ $rel['name'] }}</h3>
                <span class="product-color">{{ $rel['color'] }}</span>
                <span class="product-price">{{ $rel['price'] }} MXN</span>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endif

{{-- Visto recientemente --}}
<section class="pdp-related recently-viewed-section">
    <h2 class="section-title">Visto recientemente</h2>
    <div class="pdp-related-grid" id="recently-viewed-grid"></div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Track recently viewed
    window.KukeRecentlyViewed.add({
        id: {{ $product['id'] }},
        brand: @json($product['brand']),
        name: @json($product['name']),
        price: @json($product['price']),
        color: @json($product['color']),
        img: @json($product['img']),
        badge: @json($product['badge'])
    });
    window.KukeRecentlyViewed.render('recently-viewed-grid', {{ $product['id'] }});

    // Product data for cart
    const product = {
        id: {{ $product['id'] }},
        brand: @json($product['brand']),
        name: @json($product['name']),
        price: @json($product['price']),
        price_num: {{ $product['price_num'] }},
        color: @json($product['color']),
        img: @json($product['img']),
        size: null
    };

    // Gallery thumbnail switching
    const heroImg = document.getElementById('pdp-hero-img');
    const thumbs = document.querySelectorAll('.pdp-thumb');
    thumbs.forEach(thumb => {
        thumb.addEventListener('click', () => {
            const img = thumb.querySelector('img');
            heroImg.src = img.src;
            heroImg.style.opacity = '0';
            setTimeout(() => { heroImg.style.opacity = '1'; }, 50);
            thumbs.forEach(t => t.classList.remove('active'));
            thumb.classList.add('active');
        });
    });

    // Size selection
    const sizeBtns = document.querySelectorAll('.pdp-size-btn');
    sizeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            sizeBtns.forEach(b => b.classList.remove('selected'));
            btn.classList.add('selected');
            product.size = btn.dataset.size;
        });
    });

    // Add to cart
    const addCartBtn = document.getElementById('pdp-add-cart');
    addCartBtn.addEventListener('click', () => {
        const selected = document.querySelector('.pdp-size-btn.selected');
        if (!selected) {
            sizeBtns.forEach(b => {
                b.classList.add('shake');
                setTimeout(() => b.classList.remove('shake'), 500);
            });
            KukeToast.show('Selecciona una talla primero', 'error', 2000);
            return;
        }
        window.KukeCart.add({ ...product, size: selected.dataset.size });
        addCartBtn.textContent = '✓ Agregado al carrito';
        addCartBtn.classList.add('added');
        if (window.openCartDrawer) window.openCartDrawer();
        setTimeout(() => {
            addCartBtn.innerHTML = '<svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg> Agregar al carrito';
            addCartBtn.classList.remove('added');
        }, 2000);
    });

    // Wishlist
    const wishBtn = document.querySelector('.pdp-wishlist');
    if (window.KukeWishlist.has(product.id)) wishBtn.classList.add('active');
    wishBtn.addEventListener('click', () => {
        window.KukeWishlist.toggle(product.id);
        wishBtn.classList.toggle('active');
    });

    // ── REVIEWS ──
    const REVIEW_KEY = `kuke_reviews_${product.id}`;
    const reviewsList = document.getElementById('reviews-list');
    const reviewForm = document.getElementById('review-form');
    const reviewFormWrap = document.getElementById('review-form-wrap');
    const writeBtn = document.getElementById('write-review-btn');
    let selectedRating = 5;

    writeBtn.addEventListener('click', () => {
        reviewFormWrap.style.display = reviewFormWrap.style.display === 'none' ? 'block' : 'none';
        if (reviewFormWrap.style.display === 'block') {
            reviewFormWrap.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });

    // Star rating input
    document.querySelectorAll('.review-star-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            selectedRating = parseInt(btn.dataset.rating);
            document.querySelectorAll('.review-star-btn').forEach((b, i) => {
                const svg = b.querySelector('svg polygon');
                if (svg) b.querySelector('svg').setAttribute('fill', i < selectedRating ? 'currentColor' : 'none');
            });
        });
    });

    // Load saved reviews
    const savedReviews = JSON.parse(localStorage.getItem(REVIEW_KEY) || '[]');
    savedReviews.forEach(r => insertReview(r, true));

    reviewForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const name = document.getElementById('review-name').value;
        const text = document.getElementById('review-text').value;
        const review = { name, text, rating: selectedRating, date: 'Hace un momento' };

        savedReviews.push(review);
        localStorage.setItem(REVIEW_KEY, JSON.stringify(savedReviews));
        insertReview(review, false);

        reviewForm.reset();
        reviewFormWrap.style.display = 'none';
        KukeToast.show('¡Gracias por tu reseña! ⭐', 'success');
    });

    function insertReview(r, prepend) {
        const stars = Array(5).fill(0).map((_, i) =>
            `<svg width="12" height="12" fill="${i < r.rating ? 'currentColor' : 'none'}" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"/></svg>`
        ).join('');
        const html = `
            <div class="review-card reveal-item revealed">
                <div class="review-header">
                    <div class="review-avatar">${r.name.charAt(0).toUpperCase()}</div>
                    <div><span class="review-author">${r.name}</span><span class="review-date">${r.date}</span></div>
                    <div class="review-card-stars">${stars}</div>
                </div>
                <p class="review-text">${r.text}</p>
            </div>`;
        if (prepend) {
            reviewsList.insertAdjacentHTML('afterbegin', html);
        } else {
            reviewsList.insertAdjacentHTML('afterbegin', html);
        }
    }
});
</script>
@endpush
