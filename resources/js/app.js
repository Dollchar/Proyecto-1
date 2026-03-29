/* ============================================================
   KUKE's — Main JavaScript
   Cart, Wishlist, Search, Dark Mode, Toasts, Animations,
   Recently Viewed, Newsletter, Mobile Menu, Image Zoom
   ============================================================ */

// ── TOAST NOTIFICATIONS ──────────────────────────
window.KukeToast = {
    show(message, type = 'success', duration = 3000) {
        const container = document.getElementById('toast-container');
        if (!container) return;

        const icons = {
            success: '<svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg>',
            error: '<svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M15 9l-6 6M9 9l6 6"/></svg>',
            info: '<svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>',
            heart: '<svg width="18" height="18" fill="currentColor" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>',
            cart: '<svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>'
        };

        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.innerHTML = `
            <span class="toast-icon">${icons[type] || icons.info}</span>
            <span class="toast-msg">${message}</span>
            <button class="toast-close" onclick="this.parentElement.remove()">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
        `;
        container.appendChild(toast);

        // Trigger animation
        requestAnimationFrame(() => toast.classList.add('show'));

        setTimeout(() => {
            toast.classList.remove('show');
            toast.classList.add('hide');
            setTimeout(() => toast.remove(), 300);
        }, duration);
    }
};

// ── DARK MODE ────────────────────────────────────
window.KukeDarkMode = {
    KEY: 'kuke_theme',

    init() {
        const toggle = document.getElementById('theme-toggle');
        if (!toggle) return;

        toggle.addEventListener('click', () => this.toggle());
    },

    toggle() {
        const html = document.documentElement;
        const current = html.getAttribute('data-theme');
        const next = current === 'dark' ? 'light' : 'dark';
        html.setAttribute('data-theme', next);
        localStorage.setItem(this.KEY, next);
        KukeToast.show(next === 'dark' ? 'Modo oscuro activado' : 'Modo claro activado', 'info', 1500);
    }
};

// ── WISHLIST MANAGER ─────────────────────────────
window.KukeWishlist = {
    KEY: 'kuke_wishlist',

    get() {
        return JSON.parse(localStorage.getItem(this.KEY) || '[]');
    },

    save(ids) {
        localStorage.setItem(this.KEY, JSON.stringify(ids));
    },

    has(id) {
        return this.get().includes(id);
    },

    toggle(id) {
        let ids = this.get();
        const wasIn = ids.includes(id);
        if (wasIn) {
            ids = ids.filter(i => i !== id);
            KukeToast.show('Eliminado de favoritos', 'info', 2000);
        } else {
            ids.push(id);
            KukeToast.show('Agregado a favoritos ❤️', 'heart', 2000);
        }
        this.save(ids);
        return !wasIn;
    },

    syncButtons() {
        const ids = this.get();
        document.querySelectorAll('.wishlist-btn').forEach(btn => {
            const card = btn.closest('[data-id]');
            if (card) {
                const id = parseInt(card.dataset.id);
                if (ids.includes(id)) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            }
        });
    }
};

// ── CART MANAGER ─────────────────────────────────
window.KukeCart = {
    KEY: 'kuke_cart',

    get() {
        return JSON.parse(localStorage.getItem(this.KEY) || '[]');
    },

    save(items) {
        localStorage.setItem(this.KEY, JSON.stringify(items));
        this.updateBadge();
        this.renderDrawer();
    },

    add(product) {
        let items = this.get();
        const existing = items.find(i => i.id === product.id && i.size === product.size);
        if (existing) {
            existing.qty += 1;
        } else {
            items.push({ ...product, qty: 1 });
        }
        this.save(items);
        KukeToast.show(`${product.name} agregado al carrito`, 'cart', 2500);
    },

    remove(id, size) {
        let items = this.get().filter(i => !(i.id === id && i.size === size));
        this.save(items);
        KukeToast.show('Producto eliminado del carrito', 'info', 2000);
    },

    updateQty(id, size, delta) {
        let items = this.get();
        const item = items.find(i => i.id === id && i.size === size);
        if (item) {
            item.qty += delta;
            if (item.qty <= 0) {
                items = items.filter(i => !(i.id === id && i.size === size));
            }
        }
        this.save(items);
    },

    getTotal() {
        return this.get().reduce((sum, i) => sum + i.price_num * i.qty, 0);
    },

    getCount() {
        return this.get().reduce((sum, i) => sum + i.qty, 0);
    },

    updateBadge() {
        const badge = document.getElementById('cart-count');
        if (badge) {
            const count = this.getCount();
            badge.textContent = count;
            badge.style.display = count > 0 ? 'flex' : 'none';
        }
    },

    renderDrawer() {
        const body = document.getElementById('cart-items');
        const empty = document.getElementById('cart-empty');
        const footer = document.getElementById('cart-footer');
        const totalEl = document.getElementById('cart-total-price');
        const shippingMsg = document.getElementById('cart-shipping-msg');

        if (!body) return;

        const items = this.get();

        if (items.length === 0) {
            empty.style.display = 'flex';
            body.style.display = 'none';
            footer.style.display = 'none';
            return;
        }

        empty.style.display = 'none';
        body.style.display = 'block';
        footer.style.display = 'block';

        body.innerHTML = items.map(item => `
            <div class="cart-item">
                <img src="${item.img}" alt="${item.name}" class="cart-item-img">
                <div class="cart-item-info">
                    <span class="cart-item-brand">${item.brand}</span>
                    <span class="cart-item-name">${item.name}</span>
                    <span class="cart-item-size">Talla: ${item.size}</span>
                    <span class="cart-item-price">${item.price} MXN</span>
                </div>
                <div class="cart-item-actions">
                    <div class="cart-qty-controls">
                        <button onclick="KukeCart.updateQty(${item.id}, '${item.size}', -1)">−</button>
                        <span>${item.qty}</span>
                        <button onclick="KukeCart.updateQty(${item.id}, '${item.size}', 1)">+</button>
                    </div>
                    <button class="cart-item-remove" onclick="KukeCart.remove(${item.id}, '${item.size}')">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        `).join('');

        const total = this.getTotal();
        totalEl.textContent = '$' + total.toLocaleString('es-MX') + ' MXN';

        // Coupon discount
        const discountEl = document.getElementById('cart-discount');
        const discountAmount = document.getElementById('cart-discount-amount');
        const grandTotal = document.getElementById('cart-grand-total');
        const discount = window.KukeCoupon ? window.KukeCoupon.getDiscount(total) : 0;

        if (discount > 0 && discountEl) {
            discountEl.style.display = 'flex';
            discountAmount.textContent = '-$' + discount.toLocaleString('es-MX') + ' MXN';
            grandTotal.textContent = '$' + (total - discount).toLocaleString('es-MX') + ' MXN';
        } else if (grandTotal) {
            if (discountEl) discountEl.style.display = 'none';
            grandTotal.textContent = '$' + total.toLocaleString('es-MX') + ' MXN';
        }

        const finalTotal = total - discount;
        const hasFreeShipCoupon = window.KukeCoupon?.applied?.freeShip;
        if (finalTotal >= 3000 || hasFreeShipCoupon) {
            shippingMsg.textContent = '✓ ¡Tu pedido califica para envío gratis!';
            shippingMsg.classList.add('free');
        } else {
            const remaining = 3000 - finalTotal;
            shippingMsg.textContent = `Agrega $${remaining.toLocaleString('es-MX')} más para envío gratis`;
            shippingMsg.classList.remove('free');
        }
    }
};

// ── RECENTLY VIEWED ──────────────────────────────
window.KukeRecentlyViewed = {
    KEY: 'kuke_recently_viewed',
    MAX: 8,

    get() {
        return JSON.parse(localStorage.getItem(this.KEY) || '[]');
    },

    add(product) {
        let items = this.get().filter(p => p.id !== product.id);
        items.unshift(product);
        if (items.length > this.MAX) items = items.slice(0, this.MAX);
        localStorage.setItem(this.KEY, JSON.stringify(items));
    },

    render(containerId, excludeId = null) {
        const container = document.getElementById(containerId);
        if (!container) return;

        let items = this.get();
        if (excludeId) items = items.filter(p => p.id !== excludeId);
        if (items.length === 0) {
            container.closest('.recently-viewed-section')?.remove();
            return;
        }

        container.innerHTML = items.slice(0, 4).map(p => `
            <a href="/tenis/${p.id}" class="product-card reveal-item" data-id="${p.id}">
                <div class="product-img-wrap">
                    <img src="${p.img}" alt="${p.brand} ${p.name}" loading="lazy">
                    <div class="product-badge">${p.badge || ''}</div>
                </div>
                <div class="product-info">
                    <span class="product-brand">${p.brand}</span>
                    <h3 class="product-name">${p.name}</h3>
                    <span class="product-color">${p.color}</span>
                    <span class="product-price">${p.price} MXN</span>
                </div>
            </a>
        `).join('');
    }
};

// ── SEARCH OVERLAY ───────────────────────────────
function initSearch() {
    const toggle = document.getElementById('search-toggle');
    const overlay = document.getElementById('search-overlay');
    const closeBtn = document.getElementById('search-close');
    const input = document.getElementById('search-input');
    const results = document.getElementById('search-results');

    if (!toggle || !overlay) return;

    let products = [];

    toggle.addEventListener('click', () => {
        overlay.classList.add('open');
        setTimeout(() => input.focus(), 200);
        if (products.length === 0 && window.KUKE_API_URL) {
            fetch(window.KUKE_API_URL)
                .then(r => r.json())
                .then(data => { products = data; });
        }
    });

    function closeSearch() {
        overlay.classList.remove('open');
        input.value = '';
        results.innerHTML = '<p class="search-hint">Escribe para buscar entre nuestros productos...</p>';
    }

    closeBtn.addEventListener('click', closeSearch);
    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) closeSearch();
    });
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeSearch();
    });

    let searchTimeout;
    input.addEventListener('input', () => {
        clearTimeout(searchTimeout);
        const q = input.value.trim().toLowerCase();

        if (q.length < 2) {
            results.innerHTML = '<p class="search-hint">Escribe para buscar entre nuestros productos...</p>';
            return;
        }

        searchTimeout = setTimeout(() => {
            const filtered = products.filter(p =>
                p.brand.toLowerCase().includes(q) ||
                p.name.toLowerCase().includes(q) ||
                p.color.toLowerCase().includes(q) ||
                p.category.toLowerCase().includes(q)
            );

            if (filtered.length === 0) {
                results.innerHTML = `
                    <div class="search-no-results">
                        <p>No encontramos resultados para "<strong>${input.value}</strong>"</p>
                        <a href="/buscar?q=${encodeURIComponent(input.value)}" class="btn-primary" style="margin-top:12px;font-size:0.75rem;padding:10px 20px">Ver todos los resultados</a>
                    </div>`;
                return;
            }

            results.innerHTML = `
                <div class="search-results-header">
                    <span>${filtered.length} resultado(s)</span>
                    <a href="/buscar?q=${encodeURIComponent(input.value)}">Ver todos →</a>
                </div>
                <div class="search-results-list">
                    ${filtered.slice(0, 6).map(p => `
                        <a href="/tenis/${p.id}" class="search-result-item">
                            <img src="${p.img}" alt="${p.brand} ${p.name}">
                            <div>
                                <span class="search-result-brand">${p.brand}</span>
                                <span class="search-result-name">${p.name}</span>
                                <span class="search-result-price">${p.price} MXN</span>
                            </div>
                        </a>
                    `).join('')}
                </div>`;
        }, 200);
    });

    input.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' && input.value.trim()) {
            window.location.href = '/buscar?q=' + encodeURIComponent(input.value.trim());
        }
    });
}

// ── CART DRAWER ──────────────────────────────────
function initCartDrawer() {
    const toggle = document.getElementById('cart-toggle');
    const drawer = document.getElementById('cart-drawer');
    const backdrop = document.getElementById('cart-backdrop');
    const closeBtn = document.getElementById('cart-close');

    if (!toggle || !drawer) return;

    function openCart() {
        drawer.classList.add('open');
        backdrop.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeCart() {
        drawer.classList.remove('open');
        backdrop.classList.remove('open');
        document.body.style.overflow = '';
    }

    toggle.addEventListener('click', openCart);
    closeBtn.addEventListener('click', closeCart);
    backdrop.addEventListener('click', closeCart);

    window.openCartDrawer = openCart;
}

// ── MOBILE MENU ──────────────────────────────────
function initMobileMenu() {
    const hamburger = document.getElementById('hamburger');
    const menu = document.getElementById('mobile-menu');
    if (!hamburger || !menu) return;

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        menu.classList.toggle('open');
        document.body.style.overflow = menu.classList.contains('open') ? 'hidden' : '';
    });
}

// ── SCROLL REVEAL ANIMATIONS ─────────────────────
function initScrollReveal() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    // Observe all revealable elements
    document.querySelectorAll('.product-card, .brand-card, .brand-pill, .info-step, .info-card, .about-value, .hero-content, .hero-image-wrap, .editorial-banner, .featured-brands, .editorial-article > *, .pdp-gallery, .pdp-info, .pdp-promise').forEach(el => {
        el.classList.add('reveal-item');
        observer.observe(el);
    });
}

// ── IMAGE ZOOM (PDP) ─────────────────────────────
function initImageZoom() {
    const mainImage = document.querySelector('.pdp-main-image');
    if (!mainImage) return;

    const img = mainImage.querySelector('img');
    const zoomBtn = mainImage.querySelector('.pdp-zoom-btn');

    let zoomed = false;

    mainImage.addEventListener('mousemove', (e) => {
        if (!zoomed) return;
        const rect = mainImage.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;
        img.style.transformOrigin = `${x}% ${y}%`;
    });

    mainImage.addEventListener('mouseleave', () => {
        if (!zoomed) return;
        img.style.transform = 'scale(1)';
        img.style.transformOrigin = 'center center';
        zoomed = false;
        mainImage.classList.remove('zoomed');
    });

    if (zoomBtn) {
        zoomBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            zoomed = !zoomed;
            mainImage.classList.toggle('zoomed');
            if (zoomed) {
                img.style.transform = 'scale(2.5)';
            } else {
                img.style.transform = 'scale(1)';
                img.style.transformOrigin = 'center center';
            }
        });
    }

    mainImage.addEventListener('click', () => {
        zoomed = !zoomed;
        mainImage.classList.toggle('zoomed');
        if (zoomed) {
            img.style.transform = 'scale(2.5)';
        } else {
            img.style.transform = 'scale(1)';
            img.style.transformOrigin = 'center center';
        }
    });
}

// ── NEWSLETTER ───────────────────────────────────
function initNewsletter() {
    const form = document.getElementById('newsletter-form');
    if (!form) return;

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const input = form.querySelector('input');
        KukeToast.show(`¡Gracias! Te enviamos novedades a ${input.value}`, 'success', 3000);
        input.value = '';
    });
}

// ── SKELETON LOADERS ─────────────────────────────
window.KukeSkeleton = {
    show(container, count = 4) {
        if (!container) return;
        let html = '';
        for (let i = 0; i < count; i++) {
            html += `
                <div class="skeleton-card">
                    <div class="skeleton skeleton-img"></div>
                    <div class="skeleton skeleton-line" style="width:40%"></div>
                    <div class="skeleton skeleton-line" style="width:70%"></div>
                    <div class="skeleton skeleton-line" style="width:30%"></div>
                </div>
            `;
        }
        container.innerHTML = html;
    },

    hide(container) {
        if (!container) return;
        container.querySelectorAll('.skeleton-card').forEach(s => s.remove());
    }
};

// ── PRODUCT COMPARATOR ───────────────────────────
window.KukeCompare = {
    items: [],

    toggle(id) {
        const idx = this.items.indexOf(id);
        if (idx > -1) {
            this.items.splice(idx, 1);
        } else {
            if (this.items.length >= 3) {
                KukeToast.show('Máximo 3 productos para comparar', 'error', 2000);
                // Uncheck the checkbox
                const cb = document.querySelector(`.compare-input[data-id="${id}"]`);
                if (cb) cb.checked = false;
                return;
            }
            this.items.push(id);
        }
        this.updateUI();
    },

    updateUI() {
        const btn = document.getElementById('compare-toggle');
        const count = document.getElementById('compare-count');
        if (btn && count) {
            count.textContent = this.items.length;
            btn.style.display = this.items.length > 0 ? 'flex' : 'none';
        }
    },

    async showModal() {
        const modal = document.getElementById('compare-modal');
        const body = document.getElementById('compare-body');
        if (!modal || !body || this.items.length === 0) return;

        // Fetch product data
        const res = await fetch(window.KUKE_API_URL);
        const products = await res.json();
        const selected = products.filter(p => this.items.includes(p.id));

        body.innerHTML = `
            <table class="compare-table">
                <tr><th></th>${selected.map(p => `<th><img src="${p.img}" alt="${p.name}"><span>${p.brand}</span><strong>${p.name}</strong></th>`).join('')}</tr>
                <tr><td>Precio</td>${selected.map(p => `<td><strong>${p.price} MXN</strong></td>`).join('')}</tr>
                <tr><td>Color</td>${selected.map(p => `<td>${p.color}</td>`).join('')}</tr>
                <tr><td>Categoría</td>${selected.map(p => `<td>${p.category.charAt(0).toUpperCase() + p.category.slice(1)}</td>`).join('')}</tr>
                <tr><td>Materiales</td>${selected.map(p => `<td>${p.material}</td>`).join('')}</tr>
                <tr><td>Tallas</td>${selected.map(p => `<td>${p.sizes.join(', ')}</td>`).join('')}</tr>
                <tr><td></td>${selected.map(p => `<td><a href="/tenis/${p.id}" class="btn-primary" style="font-size:0.72rem;padding:8px 16px">Ver producto</a></td>`).join('')}</tr>
            </table>`;

        modal.classList.add('open');
    }
};

// ── COUPON SYSTEM ────────────────────────────────
window.KukeCoupon = {
    VALID: {
        'KUKE10':      { discount: 0.10, label: '10% de descuento' },
        'KUKE20':      { discount: 0.20, label: '20% de descuento' },
        'ENVIOGRATIS': { discount: 0,    label: 'Envío gratis', freeShip: true },
        'BIENVENIDO':  { discount: 0.15, label: '15% de bienvenida' },
    },
    applied: null,

    apply(code) {
        code = code.toUpperCase().trim();
        const coupon = this.VALID[code];
        if (!coupon) return false;
        this.applied = { code, ...coupon };
        return true;
    },

    remove() {
        this.applied = null;
    },

    getDiscount(subtotal) {
        if (!this.applied) return 0;
        return Math.round(subtotal * this.applied.discount);
    }
};

// ── CHAT WIDGET ──────────────────────────────────
function initChat() {
    const btn = document.getElementById('chat-btn');
    const popup = document.getElementById('chat-popup');
    const sendBtn = document.getElementById('chat-send');
    const input = document.getElementById('chat-input');
    const body = popup?.querySelector('.chat-popup-body');

    if (!btn || !popup) return;

    btn.addEventListener('click', () => {
        popup.classList.toggle('open');
        if (popup.classList.contains('open')) input.focus();
    });

    function sendMessage() {
        const text = input.value.trim();
        if (!text) return;

        // User message
        body.innerHTML += `
            <div class="chat-bubble chat-user">
                <p>${text}</p>
                <span class="chat-time">Ahora</span>
            </div>`;
        input.value = '';
        body.scrollTop = body.scrollHeight;

        // Auto response
        setTimeout(() => {
            const responses = [
                '¡Gracias por tu mensaje! Un asesor te atenderá pronto. 😊',
                'Puedes contactarnos por WhatsApp al +52 55 1234 5678 para una respuesta más rápida.',
                '¡Excelente pregunta! Déjame verificar eso y te respondo en un momento.',
                'Tenemos envío gratis en compras mayores a $3,000 MXN. ¿Te gustaría ver nuestra colección?',
            ];
            const resp = responses[Math.floor(Math.random() * responses.length)];
            body.innerHTML += `
                <div class="chat-bubble">
                    <p>${resp}</p>
                    <span class="chat-time">Ahora</span>
                </div>`;
            body.scrollTop = body.scrollHeight;
        }, 1000);
    }

    sendBtn.addEventListener('click', sendMessage);
    input.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') sendMessage();
    });
}

// ── INIT ─────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
    // Cart
    KukeCart.updateBadge();
    KukeCart.renderDrawer();
    initCartDrawer();

    // Search
    initSearch();

    // Wishlist
    KukeWishlist.syncButtons();

    // Dark mode
    KukeDarkMode.init();

    // Mobile menu
    initMobileMenu();

    // Scroll reveal animations
    initScrollReveal();

    // Image zoom
    initImageZoom();

    // Newsletter
    initNewsletter();

    // Chat
    initChat();

    // Recently viewed
    KukeRecentlyViewed.render('recently-viewed-grid');

    // Compare button
    const compareBtn = document.getElementById('compare-toggle');
    if (compareBtn) {
        compareBtn.addEventListener('click', () => KukeCompare.showModal());
    }

    // Coupon form
    const couponForm = document.getElementById('coupon-form');
    const couponMsg = document.getElementById('coupon-msg');
    if (couponForm) {
        couponForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const input = document.getElementById('coupon-input');
            const success = KukeCoupon.apply(input.value);
            if (success) {
                couponMsg.textContent = `✓ ${KukeCoupon.applied.label}`;
                couponMsg.style.color = '#2d8a56';
                KukeToast.show(`Cupón aplicado: ${KukeCoupon.applied.label}`, 'success');
                KukeCart.renderDrawer();
            } else {
                couponMsg.textContent = '✗ Cupón inválido';
                couponMsg.style.color = '#c0392b';
                KukeToast.show('Cupón inválido', 'error', 2000);
            }
        });
    }
});