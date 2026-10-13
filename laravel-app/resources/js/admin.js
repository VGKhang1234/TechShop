const sidebar = document.getElementById('sidebar');
document.getElementById('menuToggle')?.addEventListener('click', () => sidebar?.classList.toggle('open'));

document.querySelectorAll('[data-confirm-delete]').forEach((form) => {
    form.addEventListener('submit', (event) => {
        if (!window.confirm(form.dataset.confirmDelete || 'Bạn chắc chắn muốn xóa mục này?')) {
            event.preventDefault();
        }
    });
});