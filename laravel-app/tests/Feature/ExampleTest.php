<?php

namespace Tests\Feature;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::create('categories', function (Blueprint $table): void {
            $table->increments('category_id');
            $table->string('category_name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('brands', function (Blueprint $table): void {
            $table->increments('brand_id');
            $table->string('brand_name');
            $table->string('slug')->unique();
        });

        Schema::create('products', function (Blueprint $table): void {
            $table->bigIncrements('product_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id')->nullable();
            $table->string('product_name');
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 15, 2);
            $table->decimal('old_price', 15, 2)->nullable();
            $table->unsignedInteger('stock_quantity')->default(0);
            $table->decimal('rating', 2, 1)->default(0);
            $table->unsignedInteger('review_count')->default(0);
            $table->unsignedInteger('sold_count')->default(0);
            $table->string('status')->default('active');
            $table->timestamps();
            $table->foreign('category_id')->references('category_id')->on('categories')->restrictOnDelete();
        });

        Schema::create('product_images', function (Blueprint $table): void {
            $table->bigIncrements('image_id');
            $table->unsignedBigInteger('product_id');
            $table->string('image_url');
            $table->string('alt_text')->nullable();
            $table->boolean('is_primary')->default(false);
            $table->unsignedSmallInteger('sort_order')->default(0);
        });

        Schema::create('blog_posts', function (Blueprint $table): void {
            $table->bigIncrements('blog_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('thumbnail')->nullable();
            $table->string('status')->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('contact_messages', function (Blueprint $table): void {
            $table->bigIncrements('message_id');
            $table->string('name', 120);
            $table->string('email', 190);
            $table->string('phone', 20)->nullable();
            $table->string('subject')->nullable();
            $table->text('message');
            $table->string('status')->default('new');
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('users', function (Blueprint $table): void {
            $table->bigIncrements('user_id');
            $table->string('name', 120);
            $table->string('email', 190)->unique();
            $table->string('password_hash');
            $table->string('phone', 20)->nullable();
            $table->string('address')->nullable();
            $table->string('role')->default('customer');
            $table->string('status')->default('active');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('carts', function (Blueprint $table): void {
            $table->bigIncrements('cart_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('session_id', 128)->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('cart_items', function (Blueprint $table): void {
            $table->bigIncrements('cart_item_id');
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('unit_price', 15, 2);
            $table->timestamps();
            $table->unique(['cart_id', 'product_id']);
        });

        Schema::create('orders', function (Blueprint $table): void {
            $table->bigIncrements('order_id');
            $table->string('order_code')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedInteger('voucher_id')->nullable();
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->decimal('discount_amount', 15, 2)->default(0);
            $table->decimal('shipping_fee', 15, 2)->default(0);
            $table->decimal('total_amount', 15, 2)->default(0);
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->string('receiver_email')->nullable();
            $table->string('shipping_address');
            $table->string('payment_method');
            $table->string('order_status')->default('pending');
            $table->string('note')->nullable();
            $table->timestamp('ordered_at')->nullable();
        });

        Schema::create('order_items', function (Blueprint $table): void {
            $table->bigIncrements('order_item_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('product_name');
            $table->unsignedInteger('quantity');
            $table->decimal('unit_price', 15, 2);
            $table->decimal('line_total', 15, 2);
        });

        Schema::create('payments', function (Blueprint $table): void {
            $table->bigIncrements('payment_id');
            $table->unsignedBigInteger('order_id');
            $table->string('method');
            $table->decimal('amount', 15, 2);
            $table->string('transaction_code')->nullable();
            $table->string('payment_status')->default('pending');
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('vouchers', function (Blueprint $table): void {
            $table->increments('voucher_id');
            $table->string('code')->unique();
            $table->string('description')->nullable();
            $table->string('discount_type');
            $table->decimal('discount_value', 15, 2);
            $table->decimal('min_order_value', 15, 2)->default(0);
            $table->decimal('max_discount_amount', 15, 2)->nullable();
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->unsignedInteger('usage_limit')->nullable();
            $table->unsignedInteger('used_count')->default(0);
            $table->string('status')->default('active');
        });

        Schema::create('reviews', function (Blueprint $table): void {
            $table->bigIncrements('review_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedTinyInteger('rating');
            $table->text('comment')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        DB::table('categories')->insert([
            ['category_name' => 'Điện thoại', 'slug' => 'phone', 'description' => 'Điện thoại thông minh chính hãng.'],
            ['category_name' => 'Máy tính', 'slug' => 'computer', 'description' => 'Laptop và thiết bị máy tính.'],
            ['category_name' => 'Phổ biến', 'slug' => 'popular', 'description' => 'Sản phẩm được quan tâm.'],
        ]);
        DB::table('brands')->insert(['brand_name' => 'Apple', 'slug' => 'apple']);

        $this->insertProduct(1, 'iphone-15', 'iPhone 15', 29990000, 900);
        $this->insertProduct(2, 'macbook-air', 'MacBook Air', 24990000, 450);
    }

    public function test_home_displays_categories_and_featured_products(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Danh mục sản phẩm')
            ->assertSee('iPhone 15')
            ->assertSee('Máy tính');
    }

    public function test_category_page_filters_products_and_supports_sorting(): void
    {
        $this->get('/danh-muc/phone?sort=price-asc')
            ->assertOk()
            ->assertSee('iPhone 15')
            ->assertDontSee('MacBook Air');
    }

    public function test_category_search_filters_products_by_keyword(): void
    {
        $this->get('/danh-muc/popular?q=MacBook')
            ->assertOk()
            ->assertSee('MacBook Air')
            ->assertDontSee('iPhone 15');
    }

    public function test_product_detail_uses_the_product_slug(): void
    {
        $this->get('/san-pham/iphone-15')
            ->assertOk()
            ->assertSee('iPhone 15')
            ->assertSee('SKU: SKU-IPHONE-15')
            ->assertSee('Điện thoại chính hãng.');
    }

    public function test_legacy_product_detail_url_redirects_to_slug_route(): void
    {
        $this->get('/product-detail.php?id=1')
            ->assertRedirect('/san-pham/iphone-15');
    }

    public function test_about_page_contains_store_story_and_faq(): void
    {
        $this->get('/gioi-thieu')
            ->assertOk()
            ->assertSee('CÂU CHUYỆN CỦA CHÚNG TÔI')
            ->assertSee('Câu hỏi thường gặp');
    }

    public function test_news_index_and_published_article_are_available(): void
    {
        DB::table('blog_posts')->insert([
            'title' => 'Chọn thiết bị phù hợp',
            'slug' => 'chon-thiet-bi-phu-hop',
            'excerpt' => 'Gợi ý chọn thiết bị theo nhu cầu.',
            'content' => 'Nội dung bài viết.',
            'thumbnail' => 'img/shopping.webp',
            'status' => 'published',
            'published_at' => now()->subMinute(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->get('/tin-tuc')
            ->assertOk()
            ->assertSee('Chọn thiết bị phù hợp');

        $this->get('/tin-tuc/chon-thiet-bi-phu-hop')
            ->assertOk()
            ->assertSee('Nội dung bài viết.');
    }

    public function test_unpublished_article_is_not_publicly_accessible(): void
    {
        DB::table('blog_posts')->insert([
            'title' => 'Bài viết nháp',
            'slug' => 'bai-viet-nhap',
            'content' => 'Nội dung nháp.',
            'status' => 'draft',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->get('/tin-tuc/bai-viet-nhap')->assertNotFound();
    }

    public function test_contact_form_saves_valid_message(): void
    {
        $this->post('/lien-he', [
            'name' => 'Nguyễn An',
            'email' => 'an@example.com',
            'phone' => '0901234567',
            'subject' => 'Tư vấn sản phẩm',
            'message' => 'Tôi cần tư vấn laptop.',
        ])->assertRedirect('/lien-he')->assertSessionHas('contact_sent', true);

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'an@example.com',
            'subject' => 'Tư vấn sản phẩm',
            'status' => 'new',
        ]);
    }

    public function test_contact_form_validates_required_fields(): void
    {
        $this->from('/lien-he')->post('/lien-he', [
            'name' => '',
            'email' => 'not-an-email',
            'phone' => '',
            'message' => '',
        ])->assertRedirect('/lien-he')->assertSessionHasErrors(['name', 'email', 'phone', 'message']);
    }

    public function test_legacy_static_pages_redirect_to_laravel_routes(): void
    {
        $this->get('/introduction.php')->assertRedirect('/gioi-thieu');
        $this->get('/news.php')->assertRedirect('/tin-tuc');
        $this->get('/contact.php')->assertRedirect('/lien-he');
        $this->get('/cart.php')->assertRedirect('/gio-hang');
        $this->get('/checkout.php')->assertRedirect('/thanh-toan');
    }

    public function test_guest_can_add_update_and_remove_cart_items(): void
    {
        $this->post('/gio-hang/items', ['product_id' => 1, 'quantity' => 2])
            ->assertRedirect('/gio-hang');
        $this->assertDatabaseCount('carts', 1);
        $this->assertDatabaseHas('cart_items', ['product_id' => 1, 'quantity' => 2]);
        $this->get('/gio-hang')->assertOk()->assertSee('iPhone 15');

        $cartItem = DB::table('cart_items')->first();
        $this->assertSame(2, (int) $cartItem->quantity);

        $this->patch('/gio-hang/items/' . $cartItem->cart_item_id, ['quantity' => 3])
            ->assertRedirect('/gio-hang');
        $this->assertDatabaseHas('cart_items', ['cart_item_id' => $cartItem->cart_item_id, 'quantity' => 3]);

        $this->delete('/gio-hang/items/' . $cartItem->cart_item_id)->assertRedirect('/gio-hang');
        $this->assertDatabaseMissing('cart_items', ['cart_item_id' => $cartItem->cart_item_id]);
    }

    public function test_checkout_creates_order_payment_and_decrements_stock(): void
    {
        $this->post('/gio-hang/items', ['product_id' => 1, 'quantity' => 2]);
        $this->get('/thanh-toan')->assertOk()->assertSee('Thông tin nhận hàng');

        $this->post('/thanh-toan', [
            'receiver_name' => 'Nguyễn An',
            'receiver_phone' => '0901234567',
            'receiver_email' => 'an@example.com',
            'shipping_address' => '12 Lê Lợi, Hải Phòng',
            'payment_method' => 'cod',
        ])->assertRedirect('/thanh-toan/thanh-cong');

        $order = DB::table('orders')->first();
        $this->assertNotNull($order);
        $this->assertSame('pending', $order->order_status);
        $this->assertSame('cod', $order->payment_method);
        $this->assertDatabaseHas('order_items', ['order_id' => $order->order_id, 'product_id' => 1, 'quantity' => 2]);
        $this->assertDatabaseHas('payments', ['order_id' => $order->order_id, 'method' => 'cod', 'payment_status' => 'pending']);
        $this->assertDatabaseHas('products', ['product_id' => 1, 'stock_quantity' => 8]);
        $this->assertDatabaseHas('carts', ['status' => 'converted']);
        $this->get('/thanh-toan/thanh-cong')->assertOk()->assertSee($order->order_code);
    }

    public function test_checkout_rejects_insufficient_stock_without_creating_order(): void
    {
        $this->post('/gio-hang/items', ['product_id' => 1, 'quantity' => 5]);
        DB::table('products')->where('product_id', 1)->update(['stock_quantity' => 2]);

        $this->from('/thanh-toan')->post('/thanh-toan', [
            'receiver_name' => 'Nguyễn An',
            'receiver_phone' => '0901234567',
            'shipping_address' => '12 Lê Lợi, Hải Phòng',
            'payment_method' => 'cod',
        ])->assertRedirect('/thanh-toan')->assertSessionHasErrors('cart');

        $this->assertDatabaseCount('orders', 0);
        $this->assertDatabaseHas('products', ['product_id' => 1, 'stock_quantity' => 2]);
    }

    public function test_checkout_applies_valid_voucher_and_records_usage(): void
    {
        DB::table('vouchers')->insert([
            'code' => 'SAVE10',
            'discount_type' => 'percentage',
            'discount_value' => 10,
            'min_order_value' => 1000000,
            'max_discount_amount' => 500000,
            'start_at' => now()->subDay(),
            'end_at' => now()->addDay(),
            'usage_limit' => 5,
            'used_count' => 0,
            'status' => 'active',
        ]);
        $this->post('/gio-hang/items', ['product_id' => 1, 'quantity' => 1]);

        $this->post('/thanh-toan', [
            'receiver_name' => 'Nguyễn An',
            'receiver_phone' => '0901234567',
            'shipping_address' => '12 Lê Lợi, Hải Phòng',
            'payment_method' => 'bank_transfer',
            'voucher_code' => 'save10',
        ])->assertRedirect('/thanh-toan/thanh-cong');

        $order = DB::table('orders')->first();
        $this->assertSame(500000.0, (float) $order->discount_amount);
        $this->assertSame(1, (int) DB::table('vouchers')->where('code', 'SAVE10')->value('used_count'));
    }

    public function test_guest_cart_is_merged_into_user_cart_after_login(): void
    {
        DB::table('users')->insert([
            'name' => 'Khách E-Tech',
            'email' => 'cart-user@example.com',
            'password_hash' => Hash::make('StrongPass123'),
            'role' => 'customer',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->post('/gio-hang/items', ['product_id' => 1, 'quantity' => 2]);

        $this->post('/dang-nhap', [
            'email' => 'cart-user@example.com',
            'password' => 'StrongPass123',
        ])->assertRedirect('/');

        $this->assertDatabaseHas('carts', ['user_id' => 1, 'status' => 'active', 'session_id' => null]);
        $this->assertDatabaseHas('cart_items', ['product_id' => 1, 'quantity' => 2]);
        $this->get('/gio-hang')->assertOk()->assertSee('iPhone 15');
    }

    public function test_buy_now_adds_product_and_opens_checkout(): void
    {
        $this->post('/gio-hang/items', [
            'product_id' => 1,
            'quantity' => 1,
            'buy_now' => '1',
        ])->assertRedirect('/thanh-toan');
    }

    public function test_admin_routes_require_an_active_admin_account(): void
    {
        $this->get('/admin')->assertRedirect('/dang-nhap');

        DB::table('users')->insert([
            'name' => 'Khách thường',
            'email' => 'regular@example.com',
            'password_hash' => Hash::make('StrongPass123'),
            'role' => 'customer',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->actingAs(User::query()->where('email', 'regular@example.com')->first())
            ->get('/admin')->assertForbidden();
    }

    public function test_admin_dashboard_and_catalog_pages_load_for_admin(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin E-Tech',
            'email' => 'admin@example.com',
            'password_hash' => Hash::make('StrongPass123'),
            'role' => 'admin',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->actingAs(User::query()->where('email', 'admin@example.com')->first());

        $this->get('/admin')->assertOk()->assertSee('Sản phẩm đang bán');
        $this->get('/admin/products')->assertOk()->assertSee('iPhone 15');
        $this->get('/admin/categories')->assertOk()->assertSee('Điện thoại');
        $this->get('/admin/products/create')->assertOk()->assertSee('Thêm sản phẩm');
        $this->get('/admin/categories/create')->assertOk()->assertSee('Thêm danh mục');
    }

    public function test_admin_can_create_update_and_delete_products_and_categories(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin E-Tech',
            'email' => 'catalog-admin@example.com',
            'password_hash' => Hash::make('StrongPass123'),
            'role' => 'admin',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->actingAs(User::query()->where('email', 'catalog-admin@example.com')->first());

        $this->post('/admin/categories', [
            'category_name' => 'Thiết bị nhà thông minh',
            'description' => 'Các thiết bị thông minh cho gia đình.',
        ])->assertRedirect('/admin/categories');
        $categoryId = (int) DB::table('categories')->where('category_name', 'Thiết bị nhà thông minh')->value('category_id');
        $this->assertDatabaseHas('categories', ['category_id' => $categoryId, 'slug' => 'thiet-bi-nha-thong-minh']);

        $this->post('/admin/products', [
            'product_name' => 'Smart Home Hub',
            'sku' => 'HOME-HUB-01',
            'category_id' => $categoryId,
            'brand_id' => 1,
            'price' => 1250000,
            'old_price' => 1500000,
            'stock_quantity' => 5,
            'status' => 'active',
            'image_url' => 'img/shopping.webp',
        ])->assertRedirect('/admin/products');
        $productId = (int) DB::table('products')->where('sku', 'HOME-HUB-01')->value('product_id');
        $this->assertDatabaseHas('products', ['product_id' => $productId, 'slug' => 'smart-home-hub']);
        $this->assertDatabaseHas('product_images', ['product_id' => $productId, 'is_primary' => 1]);

        $this->from('/admin/categories')->delete('/admin/categories/' . $categoryId)
            ->assertRedirect('/admin/categories')->assertSessionHasErrors('delete');
        $this->put('/admin/categories/' . $categoryId, [
            'category_name' => 'Thiết bị gia đình thông minh',
            'description' => 'Danh mục đã được cập nhật.',
        ])->assertRedirect('/admin/categories');
        $this->assertDatabaseHas('categories', ['category_id' => $categoryId, 'slug' => 'thiet-bi-gia-dinh-thong-minh']);

        $this->put('/admin/products/' . $productId, [
            'product_name' => 'Smart Home Hub V2',
            'sku' => 'HOME-HUB-01',
            'category_id' => $categoryId,
            'brand_id' => 1,
            'price' => 1350000,
            'old_price' => '',
            'stock_quantity' => 0,
            'status' => 'active',
            'image_url' => 'img/shopping.webp',
        ])->assertRedirect('/admin/products');
        $this->assertDatabaseHas('products', ['product_id' => $productId, 'status' => 'out_of_stock', 'price' => 1350000]);

        $this->delete('/admin/products/' . $productId)->assertRedirect('/admin/products');
        $this->assertDatabaseMissing('products', ['product_id' => $productId]);
        $this->delete('/admin/categories/' . $categoryId)->assertRedirect('/admin/categories');
        $this->assertDatabaseMissing('categories', ['category_id' => $categoryId]);
    }

    public function test_admin_can_advance_and_cancel_orders_with_inventory_restore(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin E-Tech', 'email' => 'orders-admin@example.com',
            'password_hash' => Hash::make('StrongPass123'), 'role' => 'admin', 'status' => 'active',
            'created_at' => now(), 'updated_at' => now(),
        ]);
        $this->actingAs(User::query()->where('email', 'orders-admin@example.com')->first());
        DB::table('orders')->insert([
            'order_code' => 'ET-TEST-001', 'subtotal' => 59980000, 'shipping_fee' => 0, 'total_amount' => 59980000,
            'receiver_name' => 'Khách hàng', 'receiver_phone' => '0901234567',
            'shipping_address' => 'Địa chỉ nhận hàng', 'payment_method' => 'cod',
            'order_status' => 'pending', 'ordered_at' => now(),
        ]);
        $orderId = (int) DB::table('orders')->value('order_id');
        DB::table('order_items')->insert([
            'order_id' => $orderId, 'product_id' => 1, 'product_name' => 'iPhone 15',
            'quantity' => 2, 'unit_price' => 29990000, 'line_total' => 59980000,
        ]);
        DB::table('payments')->insert(['order_id' => $orderId, 'method' => 'cod', 'amount' => 59980000]);
        DB::table('products')->where('product_id', 1)->update(['stock_quantity' => 8]);

        $this->get('/admin/orders')->assertOk()->assertSee('ET-TEST-001');
        $this->patch('/admin/orders/' . $orderId . '/status', ['order_status' => 'confirmed'])->assertRedirect('/admin/orders');
        $this->patch('/admin/orders/' . $orderId . '/status', ['order_status' => 'cancelled'])->assertRedirect('/admin/orders');

        $this->assertDatabaseHas('orders', ['order_id' => $orderId, 'order_status' => 'cancelled']);
        $this->assertDatabaseHas('products', ['product_id' => 1, 'stock_quantity' => 10]);
        $this->assertDatabaseHas('payments', ['order_id' => $orderId, 'payment_status' => 'failed']);
    }

    public function test_admin_can_create_update_and_delete_vouchers(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin E-Tech', 'email' => 'vouchers-admin@example.com',
            'password_hash' => Hash::make('StrongPass123'), 'role' => 'admin', 'status' => 'active',
            'created_at' => now(), 'updated_at' => now(),
        ]);
        $this->actingAs(User::query()->where('email', 'vouchers-admin@example.com')->first());

        $this->post('/admin/vouchers', [
            'code' => 'summer15', 'description' => 'Ưu đãi mùa hè', 'discount_type' => 'percentage',
            'discount_value' => 15, 'min_order_value' => 500000, 'max_discount_amount' => 200000,
            'start_at' => now()->format('Y-m-d\TH:i'), 'end_at' => now()->addDays(5)->format('Y-m-d\TH:i'),
            'usage_limit' => 50, 'status' => 'active',
        ])->assertRedirect('/admin/vouchers');

        $voucherId = (int) DB::table('vouchers')->where('code', 'SUMMER15')->value('voucher_id');
        $this->assertGreaterThan(0, $voucherId);
        $this->get('/admin/vouchers')->assertOk()->assertSee('SUMMER15');
        $this->put('/admin/vouchers/' . $voucherId, [
            'code' => 'SUMMER15', 'description' => 'Đã chỉnh sửa', 'discount_type' => 'fixed',
            'discount_value' => 100000, 'min_order_value' => 500000, 'max_discount_amount' => '',
            'start_at' => now()->format('Y-m-d\TH:i'), 'end_at' => now()->addDays(6)->format('Y-m-d\TH:i'),
            'usage_limit' => 60, 'status' => 'inactive',
        ])->assertRedirect('/admin/vouchers');
        $this->assertDatabaseHas('vouchers', ['voucher_id' => $voucherId, 'discount_type' => 'fixed', 'status' => 'inactive']);
        $this->delete('/admin/vouchers/' . $voucherId)->assertRedirect('/admin/vouchers');
        $this->assertDatabaseMissing('vouchers', ['voucher_id' => $voucherId]);
    }

    public function test_admin_can_moderate_reviews(): void
    {
        DB::table('users')->insert([
            ['name' => 'Admin E-Tech', 'email' => 'reviews-admin@example.com', 'password_hash' => Hash::make('StrongPass123'), 'role' => 'admin', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nguyễn An', 'email' => 'reviewer@example.com', 'password_hash' => Hash::make('StrongPass123'), 'role' => 'customer', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);
        $admin = User::query()->where('email', 'reviews-admin@example.com')->first();
        $reviewer = User::query()->where('email', 'reviewer@example.com')->first();
        $this->actingAs($admin);
        DB::table('reviews')->insert([
            'user_id' => $reviewer->user_id, 'product_id' => 1, 'rating' => 5,
            'comment' => 'Sản phẩm tốt.', 'status' => 'pending', 'created_at' => now(), 'updated_at' => now(),
        ]);
        $reviewId = (int) DB::table('reviews')->value('review_id');

        $this->get('/admin/reviews')->assertOk()->assertSee('Sản phẩm tốt.');
        $this->patch('/admin/reviews/' . $reviewId . '/status', ['status' => 'approved'])->assertRedirect('/admin/reviews');
        $this->assertDatabaseHas('reviews', ['review_id' => $reviewId, 'status' => 'approved']);
        $this->patch('/admin/reviews/' . $reviewId . '/status', ['status' => 'rejected'])->assertRedirect('/admin/reviews');
        $this->assertDatabaseHas('reviews', ['review_id' => $reviewId, 'status' => 'rejected']);
    }

    public function test_registration_hashes_password_and_logs_user_in(): void
    {
        $this->post('/dang-ky', [
            'name' => 'Lê Minh',
            'email' => 'MINH@example.com',
            'phone' => '0901234567',
            'password' => 'StrongPass123',
            'password_confirmation' => 'StrongPass123',
            'terms' => '1',
        ])->assertRedirect('/');

        $user = DB::table('users')->where('email', 'minh@example.com')->first();
        $this->assertNotNull($user);
        $this->assertTrue(Hash::check('StrongPass123', $user->password_hash));
        $this->assertAuthenticated();

        $this->get('/')->assertOk()->assertSee('Lê Minh')->assertSee('Đăng xuất');
    }

    public function test_login_and_logout_use_the_existing_password_hash(): void
    {
        DB::table('users')->insert([
            'name' => 'Khách E-Tech',
            'email' => 'customer@example.com',
            'password_hash' => Hash::make('StrongPass123'),
            'role' => 'customer',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->post('/dang-nhap', [
            'email' => 'CUSTOMER@example.com',
            'password' => 'StrongPass123',
        ])->assertRedirect('/');

        $this->assertAuthenticated();
        $this->get('/')->assertOk()->assertSee('Khách E-Tech')->assertSee('Đăng xuất');

        $this->post('/dang-xuat')->assertRedirect('/');
        $this->assertGuest();
        $this->get('/')->assertOk()->assertSee('Tài khoản')->assertDontSee('Đăng xuất');
    }

    public function test_blocked_users_cannot_log_in(): void
    {
        DB::table('users')->insert([
            'name' => 'Tài khoản bị khóa',
            'email' => 'blocked@example.com',
            'password_hash' => Hash::make('StrongPass123'),
            'role' => 'customer',
            'status' => 'blocked',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->from('/dang-nhap')->post('/dang-nhap', [
            'email' => 'blocked@example.com',
            'password' => 'StrongPass123',
        ])->assertRedirect('/dang-nhap')->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    private function insertProduct(int $categoryId, string $slug, string $name, int $price, int $soldCount): void
    {
        DB::table('products')->insert([
            'category_id' => $categoryId,
            'brand_id' => 1,
            'product_name' => $name,
            'slug' => $slug,
            'sku' => 'SKU-' . strtoupper(str_replace('-', '-', $slug)),
            'description' => 'Điện thoại chính hãng.',
            'price' => $price,
            'old_price' => $price + 1000000,
            'stock_quantity' => 10,
            'rating' => 4.8,
            'review_count' => 12,
            'sold_count' => $soldCount,
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
