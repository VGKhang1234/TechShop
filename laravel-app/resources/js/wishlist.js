const storageKey = 'etech.wishlist';

function readWishlist() {
    try {
        return new Set(JSON.parse(localStorage.getItem(storageKey) || '[]'));
    } catch {
        return new Set();
    }
}

export function initWishlist() {
    const wishlist = readWishlist();
    document.querySelectorAll('[data-wishlist-toggle]').forEach((button) => {
        const productId = button.dataset.productId;
        button.setAttribute('aria-pressed', String(wishlist.has(productId)));

        button.addEventListener('click', () => {
            if (wishlist.has(productId)) wishlist.delete(productId);
            else wishlist.add(productId);

            localStorage.setItem(storageKey, JSON.stringify([...wishlist]));
            button.setAttribute('aria-pressed', String(wishlist.has(productId)));
            document.dispatchEvent(new CustomEvent('wishlist:updated', {
                detail: { productId, active: wishlist.has(productId) },
            }));
        });
    });
}