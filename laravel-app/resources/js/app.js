import { initCart } from './cart.js';
import { initAuth } from './auth.js';
import { initProduct } from './product.js';
import { initSearch } from './search.js';
import { initWishlist } from './wishlist.js';

function initNavigation() {
	const mobileToggle = document.getElementById('mobileToggle');
	const navLinks = document.getElementById('navLinks');

	mobileToggle?.addEventListener('click', () => navLinks?.classList.toggle('active'));

	const backToTop = document.getElementById('backToTop');
	if (!backToTop) return;

	window.addEventListener('scroll', () => {
		backToTop.classList.toggle('visible', window.scrollY > 400);
	});
	backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
}

function initCountdown() {
	const days = document.getElementById('timer-days');
	const hours = document.getElementById('timer-hours');
	const minutes = document.getElementById('timer-minutes');
	const seconds = document.getElementById('timer-seconds');
	if (!days || !hours || !minutes || !seconds) return;

	let remaining = 262 * 86400 + 17 * 3600 + 9 * 60 + 45;
	window.setInterval(() => {
		remaining = Math.max(0, remaining - 1);
		const values = [
			Math.floor(remaining / 86400),
			Math.floor((remaining % 86400) / 3600),
			Math.floor((remaining % 3600) / 60),
			remaining % 60,
		];
		[days, hours, minutes, seconds].forEach((element, index) => {
			element.textContent = String(values[index]).padStart(index === 0 ? 3 : 2, '0');
		});
	}, 1000);
}

initNavigation();
initCountdown();
initProduct();
initCart();
initWishlist();
initSearch();
initAuth();
