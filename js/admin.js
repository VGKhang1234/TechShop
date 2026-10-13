document.addEventListener('DOMContentLoaded', () => {
    const storageKey = 'etechAdminData';
    const seed = {
        products: [
            { id: 1, name: 'iPhone 15 Pro Max', sku: 'IP15PM-256', category: 'Điện thoại', price: 29990000, stock: 24, status: 'active', image: 'img/iphone-15-pro.jpg' },
            { id: 2, name: 'Samsung Galaxy S24 Ultra', sku: 'SGS24U-512', category: 'Điện thoại', price: 27990000, stock: 8, status: 'active', image: 'img/samsung-s24-ultra.jpg' },
            { id: 3, name: 'MacBook Pro M3', sku: 'MBP-M3-14', category: 'Máy tính', price: 42990000, stock: 12, status: 'active', image: 'img/macbook-pro-m3.jpg' },
            { id: 4, name: 'Smart Watch Ultra', sku: 'SW-ULTRA-01', category: 'Smart Watch', price: 8990000, stock: 0, status: 'out_of_stock', image: 'img/smartwatch-ultra.jpg' },
            { id: 5, name: 'Webcam 4K Pro', sku: 'WEB-4K-PRO', category: 'Web Cam', price: 2490000, stock: 31, status: 'inactive', image: 'img/webcam-4k-pro.jpg' }
        ],
        categories: [
            { id: 1, name: 'Điện thoại', count: 48, icon: '▯' }, { id: 2, name: 'Máy tính', count: 22, icon: '▣' },
            { id: 3, name: 'Phụ kiện', count: 31, icon: '⚙' }, { id: 4, name: 'Tai nghe', count: 14, icon: '◉' },
            { id: 5, name: 'Smart Watch', count: 8, icon: '◷' }, { id: 6, name: 'Web Cam', count: 3, icon: '▣' }
        ],
        orders: [
            { id: '#ET-2409248', customer: 'Nguyễn Minh Anh', date: '24/09/2026, 09:42', items: 'iPhone 15 Pro Max', total: 29990000, payment: 'COD', status: 'pending' },
            { id: '#ET-2409247', customer: 'Trần Hoàng Nam', date: '24/09/2026, 08:35', items: 'MacBook Pro M3', total: 42990000, payment: 'Đã thanh toán', status: 'processing' },
            { id: '#ET-2409246', customer: 'Lê Thu Hà', date: '23/09/2026, 21:18', items: 'Galaxy S24 Ultra', total: 27990000, payment: 'Đã thanh toán', status: 'shipping' },
            { id: '#ET-2409245', customer: 'Phạm Quốc Bảo', date: '23/09/2026, 18:02', items: 'Webcam 4K Pro', total: 2490000, payment: 'COD', status: 'completed' },
            { id: '#ET-2409244', customer: 'Đỗ Ngọc Mai', date: '23/09/2026, 16:40', items: 'Smart Watch Ultra', total: 8990000, payment: 'COD', status: 'cancelled' }
        ],
        vouchers: [
            { id: 1, code: 'WELCOME15', discount: '15%', description: 'Giảm 15% cho khách hàng mới', used: 84, limit: 500, expiry: '30/09/2026', status: 'active' },
            { id: 2, code: 'TECH500K', discount: '500.000 đ', description: 'Giảm 500.000 đ cho đơn từ 10 triệu', used: 42, limit: 100, expiry: '15/10/2026', status: 'active' },
            { id: 3, code: 'FLASH25', discount: '25%', description: 'Ưu đãi Flash Sale cuối tuần', used: 1000, limit: 1000, expiry: '25/09/2026', status: 'inactive' }
        ],
        reviews: [
            { id: 1, initials: 'HN', name: 'Hoàng Nam', product: 'iPhone 15 Pro Max', rating: 5, text: 'Sản phẩm chính hãng, giao hàng rất nhanh. Đóng gói cẩn thận.', date: '2 giờ trước', status: 'pending' },
            { id: 2, initials: 'TL', name: 'Thu Lan', product: 'Samsung Galaxy S24 Ultra', rating: 4, text: 'Máy đẹp, camera chụp rất tốt. Nhân viên tư vấn nhiệt tình.', date: '5 giờ trước', status: 'approved' },
            { id: 3, initials: 'QB', name: 'Quốc Bảo', product: 'Webcam 4K Pro', rating: 5, text: 'Hình ảnh sắc nét, phù hợp để họp và livestream.', date: 'Hôm qua', status: 'approved' },
            { id: 4, initials: 'NM', name: 'Ngọc Mai', product: 'Smart Watch Ultra', rating: 2, text: 'Sản phẩm không giống mô tả, tôi muốn được hỗ trợ đổi hàng.', date: 'Hôm qua', status: 'rejected' }
        ]
    };
    const data = JSON.parse(localStorage.getItem(storageKey) || 'null') || seed;
    const save = () => localStorage.setItem(storageKey, JSON.stringify(data));
    const money = value => new Intl.NumberFormat('vi-VN').format(value) + ' đ';
    const escapeHtml = value => String(value).replace(/[&<>'"]/g, char => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[char]));
    const statusText = { active: 'Đang bán', inactive: 'Ngừng bán', out_of_stock: 'Hết hàng', pending: 'Chờ xử lý', processing: 'Đang xử lý', shipping: 'Đang giao', completed: 'Hoàn thành', cancelled: 'Đã hủy', approved: 'Đã duyệt', rejected: 'Đã ẩn' };
    const toast = message => { const element = document.getElementById('toast'); element.textContent = message; element.classList.add('show'); setTimeout(() => element.classList.remove('show'), 2400); };

    function showSection(section) {
        document.querySelectorAll('.nav-item').forEach(item => item.classList.toggle('active', item.dataset.section === section));
        document.querySelectorAll('.page-section').forEach(item => item.classList.toggle('active', item.id === `${section}Section`));
        const label = { dashboard: 'Tổng quan', products: 'Sản phẩm', categories: 'Danh mục', orders: 'Đơn hàng', vouchers: 'Voucher', reviews: 'Đánh giá' }[section];
        document.getElementById('pageTitle').textContent = `/ ${label}`;
        document.getElementById('sidebar').classList.remove('open');
    }
    document.querySelectorAll('[data-section], [data-section-link]').forEach(item => item.addEventListener('click', () => showSection(item.dataset.section || item.dataset.sectionLink)));
    document.getElementById('menuToggle').addEventListener('click', () => document.getElementById('sidebar').classList.toggle('open'));
    document.getElementById('logoutButton').addEventListener('click', () => { sessionStorage.removeItem('etechCurrentUser'); toast('Đã đăng xuất khỏi trang quản trị.'); });

    function renderDashboard() {
        document.getElementById('bestProducts').innerHTML = data.products.slice(0, 4).map(product => `<div class="best-item"><img class="best-thumb" src="${product.image}" alt=""><div class="best-info"><strong>${escapeHtml(product.name)}</strong><small>${Math.max(18, 80 - product.stock)} sản phẩm đã bán</small></div><strong>${money(product.price)}</strong></div>`).join('');
        document.getElementById('recentOrders').innerHTML = data.orders.slice(0, 4).map(order => `<tr><td><strong>${order.id}</strong></td><td>${escapeHtml(order.customer)}</td><td class="muted">${order.date}</td><td>${money(order.total)}</td><td><span class="status ${order.status}">${statusText[order.status]}</span></td></tr>`).join('');
        document.getElementById('recentReviews').innerHTML = data.reviews.slice(0, 3).map(review => `<div class="review-row"><span class="review-avatar">${review.initials}</span><div><strong>${escapeHtml(review.name)}</strong> <span class="stars">${'★'.repeat(review.rating)}</span><p>${escapeHtml(review.text)}</p><time>${review.date}</time></div></div>`).join('');
        document.getElementById('productsStat').textContent = data.products.filter(product => product.status === 'active').length;
        document.getElementById('ordersStat').textContent = 248 + data.orders.filter(order => order.status === 'pending').length - 1;
    }
    function renderProducts() {
        const query = document.getElementById('productSearch').value.toLowerCase();
        const category = document.getElementById('productCategoryFilter').value;
        const status = document.getElementById('productStatusFilter').value;
        const products = data.products.filter(product => (!query || `${product.name} ${product.sku}`.toLowerCase().includes(query)) && (category === 'all' || product.category === category) && (status === 'all' || product.status === status));
        document.getElementById('productsEmpty').style.display = products.length ? 'none' : 'block';
        document.getElementById('productsTable').innerHTML = products.map(product => `<tr><td><div class="product-cell"><img src="${product.image}" alt=""><strong>${escapeHtml(product.name)}</strong></div></td><td class="muted">${product.sku}</td><td>${product.category}</td><td><strong>${money(product.price)}</strong></td><td>${product.stock}</td><td><span class="status ${product.status}">${statusText[product.status]}</span></td><td><div class="row-actions"><button class="row-action" title="Sửa" data-edit="product" data-id="${product.id}">✎</button><button class="row-action" title="Xóa" data-delete="product" data-id="${product.id}">×</button></div></td></tr>`).join('');
    }
    function renderCategories() {
        document.getElementById('categoriesGrid').innerHTML = data.categories.map(category => `<article class="category-card"><span class="category-symbol">${category.icon}</span><div><h3>${escapeHtml(category.name)}</h3><p>${category.count} sản phẩm</p></div><div class="row-actions"><button class="row-action" data-edit="category" data-id="${category.id}">✎</button><button class="row-action" data-delete="category" data-id="${category.id}">×</button></div></article>`).join('');
        const filter = document.getElementById('productCategoryFilter');
        filter.innerHTML = '<option value="all">Tất cả danh mục</option>' + data.categories.map(category => `<option value="${escapeHtml(category.name)}">${escapeHtml(category.name)}</option>`).join('');
    }
    function renderOrders(filter = 'all') {
        const orders = data.orders.filter(order => filter === 'all' || order.status === filter);
        document.getElementById('ordersTable').innerHTML = orders.map(order => `<tr><td><strong>${order.id}</strong></td><td>${escapeHtml(order.customer)}</td><td class="muted">${order.date}</td><td>${escapeHtml(order.items)}</td><td><strong>${money(order.total)}</strong></td><td class="muted">${order.payment}</td><td><select class="status-select status ${order.status}" data-order-status="${order.id}">${['pending', 'processing', 'shipping', 'completed', 'cancelled'].map(option => `<option value="${option}" ${order.status === option ? 'selected' : ''}>${statusText[option]}</option>`).join('')}</select></td><td><button class="row-action" data-order-detail="${order.id}">→</button></td></tr>`).join('');
    }
    function renderVouchers() {
        document.getElementById('vouchersGrid').innerHTML = data.vouchers.map(voucher => `<article class="voucher-card"><div class="voucher-head"><strong class="voucher-code">${voucher.code}</strong><span class="status ${voucher.status}">${voucher.status === 'active' ? 'Đang hoạt động' : 'Đã hết hạn'}</span></div><div class="voucher-discount">${voucher.discount}</div><p>${escapeHtml(voucher.description)}</p><div class="voucher-meta"><span>Đã dùng: ${voucher.used}/${voucher.limit}</span><span>HSD: ${voucher.expiry}</span><span class="row-actions"><button class="row-action" data-edit="voucher" data-id="${voucher.id}">✎</button><button class="row-action" data-delete="voucher" data-id="${voucher.id}">×</button></span></div></article>`).join('');
    }
    function renderReviews(filter = 'all') {
        const reviews = data.reviews.filter(review => filter === 'all' || review.status === filter);
        document.getElementById('reviewsList').innerHTML = reviews.map(review => `<article class="review-card"><span class="review-avatar">${review.initials}</span><div class="review-content"><header><h3>${escapeHtml(review.name)}</h3><time>${review.date}</time></header><div class="stars">${'★'.repeat(review.rating)}${'☆'.repeat(5 - review.rating)}</div><p>${escapeHtml(review.text)}</p><span class="review-product">${escapeHtml(review.product)}</span></div><div class="review-actions">${review.status === 'pending' ? `<button class="approve" data-review-action="approve" data-id="${review.id}">✓ Duyệt</button>` : ''}<button data-review-action="${review.status === 'rejected' ? 'approve' : 'reject'}" data-id="${review.id}">${review.status === 'rejected' ? 'Hiện lại' : 'Ẩn'}</button></div></article>`).join('');
    }

    const modal = document.getElementById('modalBackdrop');
    let modalType = ''; let editId = null;
    const fields = {
        product: `<div class="form-grid"><div class="form-field full"><label>Tên sản phẩm</label><input name="name" required></div><div class="form-field"><label>Mã SKU</label><input name="sku" required></div><div class="form-field"><label>Danh mục</label><select name="category" required>${data.categories.map(category => `<option>${category.name}</option>`).join('')}</select></div><div class="form-field"><label>Giá bán (VNĐ)</label><input name="price" type="number" min="0" required></div><div class="form-field"><label>Tồn kho</label><input name="stock" type="number" min="0" required></div><div class="form-field"><label>Trạng thái</label><select name="status"><option value="active">Đang bán</option><option value="inactive">Ngừng bán</option><option value="out_of_stock">Hết hàng</option></select></div></div>`,
        category: `<div class="form-grid"><div class="form-field full"><label>Tên danh mục</label><input name="name" required></div><div class="form-field"><label>Số sản phẩm</label><input name="count" type="number" min="0" value="0"></div><div class="form-field"><label>Biểu tượng</label><input name="icon" value="◈"></div></div>`,
        voucher: `<div class="form-grid"><div class="form-field"><label>Mã voucher</label><input name="code" required></div><div class="form-field"><label>Mức giảm</label><input name="discount" required placeholder="15% hoặc 500.000 đ"></div><div class="form-field full"><label>Mô tả</label><input name="description" required></div><div class="form-field"><label>Giới hạn lượt dùng</label><input name="limit" type="number" min="1" value="100"></div><div class="form-field"><label>Ngày hết hạn</label><input name="expiry" required placeholder="30/09/2026"></div></div>`
    };
    function openModal(type, id = null) {
        modalType = type; editId = id; document.getElementById('modalTitle').textContent = id ? `Sửa ${type === 'product' ? 'sản phẩm' : type === 'category' ? 'danh mục' : 'voucher'}` : `Thêm ${type === 'product' ? 'sản phẩm' : type === 'category' ? 'danh mục' : 'voucher'}`; document.getElementById('modalFields').innerHTML = fields[type];
        const item = id ? data[`${type}s`].find(entry => entry.id === id) : null;
        if (item) Object.keys(item).forEach(key => { const input = document.querySelector(`[name="${key}"]`); if (input) input.value = item[key]; });
        modal.classList.add('open'); document.querySelector('#modalFields input')?.focus();
    }
    function closeModal() { modal.classList.remove('open'); }
    document.querySelectorAll('[data-modal]').forEach(button => button.addEventListener('click', () => openModal(button.dataset.modal)));
    document.getElementById('modalClose').addEventListener('click', closeModal); document.getElementById('modalCancel').addEventListener('click', closeModal); modal.addEventListener('click', event => { if (event.target === modal) closeModal(); });
    document.getElementById('adminForm').addEventListener('submit', event => { event.preventDefault(); const form = Object.fromEntries(new FormData(event.target)); const collection = data[`${modalType}s`]; if (editId) Object.assign(collection.find(item => item.id === editId), form); else collection.unshift({ ...form, id: Date.now(), ...(modalType === 'product' ? { image: 'img/12.png' } : modalType === 'voucher' ? { used: 0, status: 'active' } : {}) }); save(); renderAll(); closeModal(); toast(editId ? 'Đã cập nhật dữ liệu.' : 'Đã thêm dữ liệu mới.'); });

    document.addEventListener('click', event => {
        const edit = event.target.closest('[data-edit]'); const remove = event.target.closest('[data-delete]');
        if (edit) openModal(edit.dataset.edit, Number(edit.dataset.id));
        if (remove && confirm('Bạn có chắc muốn xóa mục này?')) { const collection = data[`${remove.dataset.delete}s`]; const index = collection.findIndex(item => item.id === Number(remove.dataset.id)); if (index > -1) collection.splice(index, 1); save(); renderAll(); toast('Đã xóa dữ liệu.'); }
        const reviewAction = event.target.closest('[data-review-action]'); if (reviewAction) { const review = data.reviews.find(item => item.id === Number(reviewAction.dataset.id)); review.status = reviewAction.dataset.reviewAction === 'approve' ? 'approved' : 'rejected'; save(); renderReviews(); renderDashboard(); toast(review.status === 'approved' ? 'Đã duyệt đánh giá.' : 'Đã ẩn đánh giá.'); }
    });
    document.addEventListener('change', event => { const orderStatus = event.target.dataset.orderStatus; if (orderStatus) { const order = data.orders.find(item => item.id === orderStatus); order.status = event.target.value; save(); renderOrders(); renderDashboard(); toast('Đã cập nhật trạng thái đơn hàng.'); } });
    document.getElementById('productSearch').addEventListener('input', renderProducts); document.getElementById('productCategoryFilter').addEventListener('change', renderProducts); document.getElementById('productStatusFilter').addEventListener('change', renderProducts);
    document.querySelectorAll('[data-order-filter]').forEach(button => button.addEventListener('click', () => { document.querySelectorAll('[data-order-filter]').forEach(item => item.classList.remove('active')); button.classList.add('active'); renderOrders(button.dataset.orderFilter); }));
    document.querySelectorAll('[data-review-filter]').forEach(button => button.addEventListener('click', () => { document.querySelectorAll('[data-review-filter]').forEach(item => item.classList.remove('active')); button.classList.add('active'); renderReviews(button.dataset.reviewFilter); }));
    document.getElementById('exportButton').addEventListener('click', () => toast('Báo cáo doanh thu đã sẵn sàng để tải xuống.')); document.getElementById('downloadOrders').addEventListener('click', () => toast('Danh sách đơn hàng đã được xuất.'));
    function renderAll() { renderDashboard(); renderProducts(); renderCategories(); renderOrders(); renderVouchers(); renderReviews(); }
    renderAll();
});
