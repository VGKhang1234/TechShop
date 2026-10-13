document.addEventListener('DOMContentLoaded', () => {
    const usersKey = 'etechUsers';
    const getUsers = () => JSON.parse(localStorage.getItem(usersKey) || '[]');
    const setMessage = (element, message, success = false) => {
        if (!element) return;
        element.textContent = message;
        element.classList.toggle('success', success);
    };

    document.querySelectorAll('[data-password-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            const input = document.getElementById(button.dataset.passwordToggle);
            if (!input) return;
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';
            button.textContent = isPassword ? 'Ẩn' : 'Hiện';
        });
    });

    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const formData = new FormData(registerForm);
            const name = formData.get('name').trim();
            const email = formData.get('email').trim().toLowerCase();
            const password = formData.get('password');
            const confirmPassword = formData.get('confirmPassword');
            const message = document.getElementById('registerMessage');

            if (!registerForm.checkValidity()) {
                setMessage(message, 'Vui lòng điền đầy đủ thông tin bắt buộc.');
                registerForm.reportValidity();
                return;
            }
            if (password !== confirmPassword) {
                setMessage(message, 'Mật khẩu nhập lại chưa khớp.');
                return;
            }
            const users = getUsers();
            if (users.some((user) => user.email === email)) {
                setMessage(message, 'Email này đã được đăng ký. Bạn hãy đăng nhập.');
                return;
            }

            users.push({ name, email, password, phone: formData.get('phone').trim() });
            localStorage.setItem(usersKey, JSON.stringify(users));
            setMessage(message, 'Đăng ký thành công. Đang chuyển đến trang đăng nhập...', true);
            registerForm.reset();
            window.setTimeout(() => { window.location.href = 'login.html'; }, 900);
        });
    }

    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const formData = new FormData(loginForm);
            const email = formData.get('email').trim().toLowerCase();
            const password = formData.get('password');
            const message = document.getElementById('loginMessage');
            const user = getUsers().find((item) => item.email === email && item.password === password);

            if (!loginForm.checkValidity()) {
                setMessage(message, 'Vui lòng nhập email và mật khẩu.');
                loginForm.reportValidity();
                return;
            }
            if (!user) {
                setMessage(message, 'Email hoặc mật khẩu chưa chính xác.');
                return;
            }

            sessionStorage.setItem('etechCurrentUser', JSON.stringify({ name: user.name, email: user.email }));
            setMessage(message, `Xin chào ${user.name}! Đang chuyển về trang chủ...`, true);
            window.setTimeout(() => { window.location.href = 'index.html'; }, 700);
        });
    }
});
