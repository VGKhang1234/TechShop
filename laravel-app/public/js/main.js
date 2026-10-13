/* ==========================================================================
   E-Tech Technology Store - Main JavaScript File
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {
    // 1. COUNTDOWN TIMER LOGIC
    let days = 262;
    let hours = 17;
    let minutes = 9;
    let seconds = 45;

    const daysEl = document.getElementById('timer-days');
    const hoursEl = document.getElementById('timer-hours');
    const minutesEl = document.getElementById('timer-minutes');
    const secondsEl = document.getElementById('timer-seconds');

    function updateTimer() {
        if (seconds > 0) {
            seconds--;
        } else {
            seconds = 59;
            if (minutes > 0) {
                minutes--;
            } else {
                minutes = 59;
                if (hours > 0) {
                    hours--;
                } else {
                    hours = 23;
                    if (days > 0) {
                        days--;
                    }
                }
            }
        }

        if (daysEl) daysEl.textContent = String(days).padStart(3, '0');
        if (hoursEl) hoursEl.textContent = String(hours).padStart(2, '0');
        if (minutesEl) minutesEl.textContent = String(minutes).padStart(2, '0');
        if (secondsEl) secondsEl.textContent = String(seconds).padStart(2, '0');
    }

    setInterval(updateTimer, 1000);

    // 2. BACK TO TOP BUTTON LOGIC
    const backToTopBtn = document.getElementById('backToTop');

    if (backToTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // 3. MOBILE MENU TOGGLE LOGIC
    const mobileToggle = document.getElementById('mobileToggle');
    const navLinks = document.getElementById('navLinks');

    if (mobileToggle && navLinks) {
        mobileToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    }

    // 4. PRODUCT DETAIL INTERACTIONS
    const productImage = document.getElementById('productImage');
    document.querySelectorAll('.gallery-thumb').forEach((thumb) => {
        thumb.addEventListener('click', () => {
            if (productImage) productImage.src = thumb.dataset.image;
            document.querySelectorAll('.gallery-thumb').forEach((item) => item.classList.remove('active'));
            thumb.classList.add('active');
        });
    });

    const quantityOutput = document.getElementById('quantity');
    let quantity = 1;
    document.querySelectorAll('[data-quantity]').forEach((button) => {
        button.addEventListener('click', () => {
            quantity += button.dataset.quantity === 'increase' ? 1 : -1;
            quantity = Math.max(1, Math.min(quantity, 9));
            if (quantityOutput) quantityOutput.textContent = quantity;
        });
    });

    const addToCartButton = document.getElementById('addToCart');
    if (addToCartButton) {
        addToCartButton.addEventListener('click', () => {
            addToCartButton.textContent = 'Đã thêm vào giỏ';
            window.setTimeout(() => { addToCartButton.textContent = 'Thêm vào giỏ hàng'; }, 1800);
        });
    }

    document.querySelectorAll('.info-tab').forEach((tab) => {
        tab.addEventListener('click', () => {
            document.querySelectorAll('.info-tab, .tab-content').forEach((item) => item.classList.remove('active'));
            tab.classList.add('active');
            const content = document.getElementById(tab.dataset.tab);
            if (content) content.classList.add('active');
        });
    });

    // 5. CATALOG VIEW MODE SWITCHER (GRID vs LIST)
    const gridViewBtn = document.getElementById('btnGridView');
    const listViewBtn = document.getElementById('btnListView');
    const catalogGrid = document.getElementById('catalogProductsGrid');

    if (gridViewBtn && listViewBtn && catalogGrid) {
        gridViewBtn.addEventListener('click', () => {
            catalogGrid.classList.remove('list-mode');
            gridViewBtn.classList.add('active');
            listViewBtn.classList.remove('active');
        });

        listViewBtn.addEventListener('click', () => {
            catalogGrid.classList.add('list-mode');
            listViewBtn.classList.add('active');
            gridViewBtn.classList.remove('active');
        });
    }

    // 6. CATALOG SORTING LOGIC
    const catalogSort = document.getElementById('catalogSort');
    if (catalogSort && catalogGrid) {
        catalogSort.addEventListener('change', () => {
            const val = catalogSort.value;
            const cards = Array.from(catalogGrid.querySelectorAll('.product-shop-card'));

            cards.sort((a, b) => {
                const priceA = parseInt(a.dataset.price || '0', 10);
                const priceB = parseInt(b.dataset.price || '0', 10);
                const ratingA = parseFloat(a.dataset.rating || '5');
                const ratingB = parseFloat(b.dataset.rating || '5');

                if (val === 'price-asc') return priceA - priceB;
                if (val === 'price-desc') return priceB - priceA;
                if (val === 'rating') return ratingB - ratingA;
                if (val === 'popularity') return (parseInt(b.dataset.sales || '0', 10)) - (parseInt(a.dataset.sales || '0', 10));
                return 0; // default
            });

            cards.forEach(card => catalogGrid.appendChild(card));
        });
    }

    // 7. TOAST NOTIFICATION & CART BADGE UPDATE
    function showToast(message) {
        let toast = document.getElementById('catalogToast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'catalogToast';
            toast.className = 'catalog-toast';
            toast.innerHTML = `
                <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                <span id="toastMsg">${message}</span>
            `;
            document.body.appendChild(toast);
        } else {
            const msgSpan = document.getElementById('toastMsg');
            if (msgSpan) msgSpan.textContent = message;
        }

        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    }

    // Add to cart buttons in catalog
    document.addEventListener('click', (e) => {
        const addBtn = e.target.closest('.card-add-cart-btn') || e.target.closest('.btn-add-cart-action');
        if (addBtn) {
            e.preventDefault();
            const card = addBtn.closest('.product-shop-card');
            const title = card ? card.querySelector('.card-product-title a')?.textContent.trim() : 'Sản phẩm';
            
            // Increment header cart badge
            const cartBadges = document.querySelectorAll('.header-actions .badge, .category-header-actions .badge, .cart-counter-badge');
            cartBadges.forEach(b => {
                const cur = parseInt(b.textContent || '0', 10);
                b.textContent = cur + 1;
            });

            showToast(`Đã thêm "${title}" vào giỏ hàng!`);
        }

        const wishBtn = e.target.closest('.btn-wishlist-action');
        if (wishBtn) {
            e.preventDefault();
            const card = wishBtn.closest('.product-shop-card');
            const title = card ? card.querySelector('.card-product-title a')?.textContent.trim() : 'Sản phẩm';
            showToast(`Đã thêm "${title}" vào danh sách yêu thích!`);
        }
    });

    // 8. SIDEBAR FILTER INTERACTION
    const brandCheckboxes = document.querySelectorAll('.filter-brand-check');
    const priceCheckboxes = document.querySelectorAll('.filter-price-check');
    const btnResetFilters = document.getElementById('btnResetFilters');

    function applyFilters() {
        if (!catalogGrid) return;
        const selectedBrands = Array.from(brandCheckboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value.toLowerCase());

        const selectedPriceRanges = Array.from(priceCheckboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);

        const cards = catalogGrid.querySelectorAll('.product-shop-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const cardBrand = (card.dataset.brand || '').toLowerCase();
            const cardPrice = parseInt(card.dataset.price || '0', 10);

            let matchBrand = selectedBrands.length === 0 || selectedBrands.includes(cardBrand);
            let matchPrice = selectedPriceRanges.length === 0;

            if (selectedPriceRanges.length > 0) {
                for (const range of selectedPriceRanges) {
                    if (range === 'under-1m' && cardPrice < 1000000) matchPrice = true;
                    if (range === '1m-5m' && cardPrice >= 1000000 && cardPrice <= 5000000) matchPrice = true;
                    if (range === '5m-15m' && cardPrice > 5000000 && cardPrice <= 15000000) matchPrice = true;
                    if (range === 'over-15m' && cardPrice > 15000000) matchPrice = true;
                }
            }

            if (matchBrand && matchPrice) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        const countEl = document.getElementById('catalogResultCount');
        if (countEl) countEl.textContent = visibleCount;
    }

    brandCheckboxes.forEach(cb => cb.addEventListener('change', applyFilters));
    priceCheckboxes.forEach(cb => cb.addEventListener('change', applyFilters));

    if (btnResetFilters) {
        btnResetFilters.addEventListener('click', () => {
            brandCheckboxes.forEach(cb => cb.checked = false);
            priceCheckboxes.forEach(cb => cb.checked = false);
            applyFilters();
        });
    }
});
