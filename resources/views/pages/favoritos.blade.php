@extends('layouts.app')

@section('title', 'Mis favoritos — Kuke\'s')

@section('content')
<section class="info-page">
    <div class="info-page-header">
        <span class="info-eyebrow">Mi cuenta</span>
        <h1>Mis favoritos</h1>
        <p>Los tenis que has marcado con ❤️ aparecen aquí.</p>
    </div>

    <div class="info-page-body">
        {{-- Empty state --}}
        <div class="empty-state" id="wishlist-empty">
            <svg width="64" height="64" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            <h2>No tienes favoritos aún</h2>
            <p>Explora nuestra colección y marca los tenis que más te gusten.</p>
            <a href="{{ url('/') }}" class="btn-primary">Explorar colección</a>
        </div>

        {{-- Products will be injected here by JS --}}
        <section class="products-grid" id="wishlist-grid" style="display:none; padding:0"></section>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const grid = document.getElementById('wishlist-grid');
    const empty = document.getElementById('wishlist-empty');
    const ids = JSON.parse(localStorage.getItem('kuke_wishlist') || '[]');

    if (ids.length === 0) return;

    fetch(window.KUKE_API_URL)
        .then(r => r.json())
        .then(products => {
            const favs = products.filter(p => ids.includes(p.id));
            if (favs.length === 0) return;

            empty.style.display = 'none';
            grid.style.display = 'grid';

            favs.forEach(p => {
                grid.innerHTML += `
                    <a href="/tenis/${p.id}" class="product-card">
                        <div class="product-img-wrap">
                            <img src="${p.img}" alt="${p.brand} ${p.name}" loading="lazy">
                            <button class="wishlist-btn active" aria-label="Quitar de favoritos" onclick="event.preventDefault(); event.stopPropagation(); window.KukeWishlist.toggle(${p.id}); this.closest('.product-card').remove(); if(!document.querySelector('#wishlist-grid .product-card')){document.getElementById('wishlist-empty').style.display='flex';document.getElementById('wishlist-grid').style.display='none';}">
                                <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                            </button>
                            <div class="product-badge">${p.badge}</div>
                        </div>
                        <div class="product-info">
                            <span class="product-brand">${p.brand}</span>
                            <h3 class="product-name">${p.name}</h3>
                            <span class="product-color">${p.color}</span>
                            <span class="product-price">${p.price} MXN</span>
                        </div>
                    </a>
                `;
            });
        });
});
</script>
@endpush
