export function initCart() {
    document.querySelectorAll('[data-cart-add]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            const button = event.submitter || form.querySelector('[type="submit"]');
            if (!button) return;

            button.setAttribute('aria-busy', 'true');
            button.textContent = 'Đang xử lý…';
        });
    });

    document.querySelectorAll('[data-cart-quantity]').forEach((input) => {
        input.addEventListener('change', () => input.form?.requestSubmit());
    });
}