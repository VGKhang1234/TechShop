<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\VoucherController as AdminVoucherController;

Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/dang-nhap', [AuthController::class, 'loginForm'])->name('login');
Route::post('/dang-nhap', [AuthController::class, 'login'])->name('login.store');
Route::get('/dang-ky', [AuthController::class, 'registerForm'])->name('register');
Route::post('/dang-ky', [AuthController::class, 'register'])->name('register.store');
Route::post('/dang-xuat', [AuthController::class, 'logout'])->name('logout');
Route::get('/gio-hang', [CartController::class, 'index'])->name('cart.index');
Route::post('/gio-hang/items', [CartController::class, 'store'])->name('cart.store');
Route::patch('/gio-hang/items/{cartItem}', [CartController::class, 'update'])->whereNumber('cartItem')->name('cart.update');
Route::delete('/gio-hang/items/{cartItem}', [CartController::class, 'destroy'])->whereNumber('cartItem')->name('cart.destroy');
Route::get('/thanh-toan', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/thanh-toan', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/thanh-toan/thanh-cong', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/gioi-thieu', [PageController::class, 'about'])->name('about');
Route::get('/tin-tuc', [NewsController::class, 'index'])->name('news.index');
Route::get('/tin-tuc/{post:slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/lien-he', [ContactController::class, 'create'])->name('contact.create');
Route::post('/lien-he', [ContactController::class, 'store'])->name('contact.store');
Route::get('/danh-muc/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/san-pham/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/product-detail.php', [ProductController::class, 'legacyDetail'])->name('products.legacy');

Route::redirect('/introduction.php', '/gioi-thieu', 301);
Route::redirect('/news.php', '/tin-tuc', 301);
Route::redirect('/contact.php', '/lien-he', 301);
Route::redirect('/cart.php', '/gio-hang', 301);
Route::redirect('/checkout.php', '/thanh-toan', 301);
Route::redirect('/login.php', '/dang-nhap', 301);
Route::redirect('/register.php', '/dang-ky', 301);
foreach (['popular', 'phone', 'computer', 'accessory', 'headphone', 'watch', 'webcam', 'gaming'] as $slug) {
    Route::redirect("/{$slug}.php", "/danh-muc/{$slug}", 301);
}

Route::prefix('admin')->name('admin.')->middleware(['auth', 'can:manage-store'])->group(function (): void {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->whereNumber('product')->name('products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->whereNumber('product')->name('products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->whereNumber('product')->name('products.destroy');
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->whereNumber('category')->name('categories.edit');
    Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])->whereNumber('category')->name('categories.update');
    Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])->whereNumber('category')->name('categories.destroy');
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->whereNumber('order')->name('orders.status');
    Route::get('/vouchers', [AdminVoucherController::class, 'index'])->name('vouchers.index');
    Route::get('/vouchers/create', [AdminVoucherController::class, 'create'])->name('vouchers.create');
    Route::post('/vouchers', [AdminVoucherController::class, 'store'])->name('vouchers.store');
    Route::get('/vouchers/{voucher}/edit', [AdminVoucherController::class, 'edit'])->whereNumber('voucher')->name('vouchers.edit');
    Route::put('/vouchers/{voucher}', [AdminVoucherController::class, 'update'])->whereNumber('voucher')->name('vouchers.update');
    Route::delete('/vouchers/{voucher}', [AdminVoucherController::class, 'destroy'])->whereNumber('voucher')->name('vouchers.destroy');
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::patch('/reviews/{review}/status', [AdminReviewController::class, 'updateStatus'])->whereNumber('review')->name('reviews.status');
});
