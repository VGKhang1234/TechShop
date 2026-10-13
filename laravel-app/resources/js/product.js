export function initProduct() {
    const productImage = document.getElementById('productImage');
    document.querySelectorAll('.gallery-thumb').forEach((thumb) => {
        thumb.addEventListener('click', () => {
            if (productImage) productImage.src = thumb.dataset.image;
            document.querySelectorAll('.gallery-thumb').forEach((item) => item.classList.remove('active'));
            thumb.classList.add('active');
        });
    });

    const quantity = document.getElementById('quantity');
    const quantityOutput = document.getElementById('quantityOutput');
    document.querySelectorAll('[data-quantity]').forEach((button) => {
        button.addEventListener('click', () => {
            const current = Number(quantity?.value ?? quantity?.textContent ?? 1);
            const next = Math.max(1, Math.min(99, current + (button.dataset.quantity === 'increase' ? 1 : -1)));
            if (quantity instanceof HTMLInputElement) quantity.value = String(next);
            else if (quantity) quantity.textContent = String(next);
            if (quantityOutput) quantityOutput.textContent = String(next);
        });
    });

    document.querySelectorAll('.info-tab').forEach((tab) => {
        tab.addEventListener('click', () => {
            document.querySelectorAll('.info-tab, .tab-content').forEach((item) => item.classList.remove('active'));
            tab.classList.add('active');
            document.getElementById(tab.dataset.tab)?.classList.add('active');
        });
    });
}