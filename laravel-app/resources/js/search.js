export function initSearch() {
    const form = document.querySelector('.header-search');
    if (!form) return;

    form.addEventListener('submit', (event) => {
        const query = form.querySelector('[name="q"]')?.value.trim();
        const category = form.querySelector('[name="category"]')?.value || 'popular';
        if (!query) return;

        event.preventDefault();
        const base = form.dataset.categoryBase;
        if (!base) return;

        const destination = new URL(`${base}/${encodeURIComponent(category)}`, window.location.origin);
        destination.searchParams.set('q', query);
        window.location.assign(destination);
    });
}