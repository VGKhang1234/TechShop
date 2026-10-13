-- E-Tech Store database
-- MySQL 8.0+ / MariaDB 10.5+

CREATE DATABASE IF NOT EXISTS etech_store
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE etech_store;

CREATE TABLE IF NOT EXISTS users (
    user_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(190) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NULL,
    address VARCHAR(255) NULL,
    role ENUM('customer', 'admin') NOT NULL DEFAULT 'customer',
    status ENUM('active', 'blocked') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS categories (
    category_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL UNIQUE,
    slug VARCHAR(120) NOT NULL UNIQUE,
    description TEXT NULL,
    image_url VARCHAR(500) NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS brands (
    brand_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(100) NOT NULL UNIQUE,
    slug VARCHAR(120) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS products (
    product_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_id INT UNSIGNED NOT NULL,
    brand_id INT UNSIGNED NULL,
    product_name VARCHAR(255) NOT NULL,
    slug VARCHAR(280) NOT NULL UNIQUE,
    sku VARCHAR(80) NOT NULL UNIQUE,
    description TEXT NULL,
    price DECIMAL(15, 2) NOT NULL,
    old_price DECIMAL(15, 2) NULL,
    stock_quantity INT UNSIGNED NOT NULL DEFAULT 0,
    rating DECIMAL(2, 1) NOT NULL DEFAULT 0.0,
    review_count INT UNSIGNED NOT NULL DEFAULT 0,
    sold_count INT UNSIGNED NOT NULL DEFAULT 0,
    status ENUM('active', 'inactive', 'out_of_stock') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT chk_products_price CHECK (price >= 0),
    CONSTRAINT chk_products_rating CHECK (rating BETWEEN 0 AND 5),
    CONSTRAINT fk_products_category FOREIGN KEY (category_id)
        REFERENCES categories(category_id)
        ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT fk_products_brand FOREIGN KEY (brand_id)
        REFERENCES brands(brand_id)
        ON UPDATE CASCADE ON DELETE SET NULL,
    INDEX idx_products_category (category_id),
    INDEX idx_products_brand (brand_id),
    INDEX idx_products_status (status),
    FULLTEXT INDEX ft_products_search (product_name, description)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS product_images (
    image_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id BIGINT UNSIGNED NOT NULL,
    image_url VARCHAR(500) NOT NULL,
    alt_text VARCHAR(255) NULL,
    is_primary BOOLEAN NOT NULL DEFAULT FALSE,
    sort_order SMALLINT UNSIGNED NOT NULL DEFAULT 0,
    CONSTRAINT fk_product_images_product FOREIGN KEY (product_id)
        REFERENCES products(product_id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    INDEX idx_product_images_product (product_id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS vouchers (
    voucher_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL UNIQUE,
    description VARCHAR(255) NULL,
    discount_type ENUM('percentage', 'fixed') NOT NULL,
    discount_value DECIMAL(15, 2) NOT NULL,
    min_order_value DECIMAL(15, 2) NOT NULL DEFAULT 0,
    max_discount_amount DECIMAL(15, 2) NULL,
    start_at DATETIME NOT NULL,
    end_at DATETIME NOT NULL,
    usage_limit INT UNSIGNED NULL,
    used_count INT UNSIGNED NOT NULL DEFAULT 0,
    status ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
    CONSTRAINT chk_vouchers_discount CHECK (discount_value >= 0),
    CONSTRAINT chk_vouchers_dates CHECK (end_at > start_at)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS carts (
    cart_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NULL,
    session_id VARCHAR(128) NULL,
    status ENUM('active', 'converted', 'abandoned') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_carts_user FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT chk_carts_owner CHECK (user_id IS NOT NULL OR session_id IS NOT NULL),
    INDEX idx_carts_user (user_id),
    INDEX idx_carts_session (session_id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS cart_items (
    cart_item_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cart_id BIGINT UNSIGNED NOT NULL,
    product_id BIGINT UNSIGNED NOT NULL,
    quantity INT UNSIGNED NOT NULL DEFAULT 1,
    unit_price DECIMAL(15, 2) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT uq_cart_product UNIQUE (cart_id, product_id),
    CONSTRAINT chk_cart_items_quantity CHECK (quantity > 0),
    CONSTRAINT fk_cart_items_cart FOREIGN KEY (cart_id)
        REFERENCES carts(cart_id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_cart_items_product FOREIGN KEY (product_id)
        REFERENCES products(product_id)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS orders (
    order_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_code VARCHAR(30) NOT NULL UNIQUE,
    user_id BIGINT UNSIGNED NULL,
    voucher_id INT UNSIGNED NULL,
    subtotal DECIMAL(15, 2) NOT NULL DEFAULT 0,
    discount_amount DECIMAL(15, 2) NOT NULL DEFAULT 0,
    shipping_fee DECIMAL(15, 2) NOT NULL DEFAULT 0,
    total_amount DECIMAL(15, 2) NOT NULL DEFAULT 0,
    receiver_name VARCHAR(120) NOT NULL,
    receiver_phone VARCHAR(20) NOT NULL,
    receiver_email VARCHAR(190) NULL,
    shipping_address VARCHAR(500) NOT NULL,
    payment_method ENUM('bank_transfer', 'cod') NOT NULL,
    order_status ENUM('pending', 'confirmed', 'processing', 'shipping', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
    note VARCHAR(500) NULL,
    ordered_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_orders_user FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON UPDATE CASCADE ON DELETE SET NULL,
    CONSTRAINT fk_orders_voucher FOREIGN KEY (voucher_id)
        REFERENCES vouchers(voucher_id)
        ON UPDATE CASCADE ON DELETE SET NULL,
    INDEX idx_orders_user (user_id),
    INDEX idx_orders_status (order_status),
    INDEX idx_orders_ordered_at (ordered_at)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS order_items (
    order_item_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id BIGINT UNSIGNED NOT NULL,
    product_id BIGINT UNSIGNED NULL,
    product_name VARCHAR(255) NOT NULL,
    quantity INT UNSIGNED NOT NULL,
    unit_price DECIMAL(15, 2) NOT NULL,
    line_total DECIMAL(15, 2) NOT NULL,
    CONSTRAINT chk_order_items_quantity CHECK (quantity > 0),
    CONSTRAINT fk_order_items_order FOREIGN KEY (order_id)
        REFERENCES orders(order_id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_order_items_product FOREIGN KEY (product_id)
        REFERENCES products(product_id)
        ON UPDATE CASCADE ON DELETE SET NULL,
    INDEX idx_order_items_order (order_id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS payments (
    payment_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id BIGINT UNSIGNED NOT NULL,
    method ENUM('bank_transfer', 'cod') NOT NULL,
    amount DECIMAL(15, 2) NOT NULL,
    transaction_code VARCHAR(120) NULL,
    payment_status ENUM('pending', 'paid', 'failed', 'refunded') NOT NULL DEFAULT 'pending',
    paid_at DATETIME NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_payments_order FOREIGN KEY (order_id)
        REFERENCES orders(order_id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    INDEX idx_payments_order (order_id),
    INDEX idx_payments_status (payment_status)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS reviews (
    review_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    product_id BIGINT UNSIGNED NOT NULL,
    rating TINYINT UNSIGNED NOT NULL,
    comment TEXT NULL,
    status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT uq_review_user_product UNIQUE (user_id, product_id),
    CONSTRAINT chk_reviews_rating CHECK (rating BETWEEN 1 AND 5),
    CONSTRAINT fk_reviews_user FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_reviews_product FOREIGN KEY (product_id)
        REFERENCES products(product_id)
        ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS wishlists (
    user_id BIGINT UNSIGNED NOT NULL,
    product_id BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id, product_id),
    CONSTRAINT fk_wishlists_user FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_wishlists_product FOREIGN KEY (product_id)
        REFERENCES products(product_id)
        ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS blog_posts (
    blog_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    author_id BIGINT UNSIGNED NULL,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(280) NOT NULL UNIQUE,
    excerpt TEXT NULL,
    content LONGTEXT NOT NULL,
    thumbnail VARCHAR(500) NULL,
    status ENUM('draft', 'published', 'archived') NOT NULL DEFAULT 'draft',
    published_at DATETIME NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_blog_posts_author FOREIGN KEY (author_id)
        REFERENCES users(user_id)
        ON UPDATE CASCADE ON DELETE SET NULL,
    INDEX idx_blog_posts_status_date (status, published_at)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS contact_messages (
    message_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NULL,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(190) NOT NULL,
    phone VARCHAR(20) NULL,
    subject VARCHAR(255) NULL,
    message TEXT NOT NULL,
    status ENUM('new', 'in_progress', 'resolved', 'closed') NOT NULL DEFAULT 'new',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    resolved_at DATETIME NULL,
    CONSTRAINT fk_contact_messages_user FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON UPDATE CASCADE ON DELETE SET NULL,
    INDEX idx_contact_messages_status (status)
) ENGINE=InnoDB;

-- Sample categories and brands used by the current frontend.
INSERT INTO categories (category_name, slug, description) VALUES
    ('Phổ biến', 'popular', 'Các sản phẩm được khách hàng quan tâm nhiều.'),
    ('Điện thoại', 'phone', 'Điện thoại thông minh chính hãng.'),
    ('Máy tính', 'computer', 'Laptop và thiết bị máy tính.'),
    ('Phụ kiện', 'accessory', 'Chuột, sạc, cáp và phụ kiện công nghệ.'),
    ('Tai nghe', 'headphone', 'Tai nghe và thiết bị âm thanh.'),
    ('Smart Watch', 'watch', 'Đồng hồ thông minh.'),
    ('Web Cam', 'webcam', 'Webcam và camera.'),
    ('Thiết bị gaming', 'gaming', 'Thiết bị chơi game và thực tế ảo.')
ON DUPLICATE KEY UPDATE category_name = VALUES(category_name), description = VALUES(description);

INSERT INTO blog_posts (title, slug, excerpt, content, thumbnail, status, published_at) VALUES
    ('Thiết bị điện tử đang thay đổi cách chúng ta sống', 'thiet-bi-dien-tu-thay-doi-cuoc-song', 'Khám phá những sản phẩm nổi bật đang giúp công việc, giải trí và cuộc sống hằng ngày trở nên tiện lợi hơn.', 'Công nghệ hiện diện trong nhiều khoảnh khắc thường ngày, từ kết nối với gia đình đến hoàn thành công việc và giải trí sau giờ làm.\n\nKhi chọn một thiết bị mới, hãy bắt đầu từ nhu cầu thật sự: bạn sẽ dùng thiết bị ở đâu, thường xuyên làm việc gì và tính năng nào giúp tiết kiệm thời gian. Một lựa chọn phù hợp thường có giá trị hơn việc chạy theo thông số cao nhất.', 'img/pexels-dom-bucci-981062-scaled-1.jpg', 'published', UTC_TIMESTAMP()),
    ('Ý tưởng tạo không gian sống thông minh', 'y-tuong-khong-gian-song-thong-minh', 'Một vài gợi ý đơn giản để kết hợp thiết bị công nghệ vào không gian sống theo cách tinh tế.', 'Một không gian sống thông minh không nhất thiết phải bắt đầu bằng hệ thống phức tạp. Những thiết bị hữu ích nhất thường giải quyết một việc cụ thể, chẳng hạn cải thiện ánh sáng, âm thanh hoặc kết nối trong nhà.\n\nHãy ưu tiên khả năng tương thích và cách sử dụng đơn giản. Bắt đầu từ một thiết bị, làm quen với thói quen mới rồi mở rộng khi bạn thấy thực sự cần thiết.', 'img/pexels-karolina-grabowska-4887246.jpg', 'published', UTC_TIMESTAMP()),
    ('Chọn đồng hồ thông minh theo nhu cầu thực tế', 'chon-dong-ho-thong-minh-theo-nhu-cau', 'Từ theo dõi sức khỏe đến kết nối hằng ngày, đâu là những tính năng thật sự đáng quan tâm?', 'Trước khi mua đồng hồ thông minh, hãy xác định điều bạn muốn theo dõi mỗi ngày. Thời lượng pin, độ thoải mái khi đeo và khả năng tương thích với điện thoại thường ảnh hưởng đến trải nghiệm nhiều hơn các tính năng ít dùng.\n\nNếu bạn tập luyện thường xuyên, hãy xem xét khả năng chống nước và độ chính xác của cảm biến. Nếu cần thiết bị hỗ trợ công việc, thông báo rõ ràng và thời lượng pin ổn định có thể là ưu tiên phù hợp.', 'img/smartwatch-ultra.jpg', 'published', UTC_TIMESTAMP()),
    ('Những điều nên biết trước khi chọn webcam 4K', 'kinh-nghiem-chon-webcam-4k', 'Độ phân giải chỉ là một phần; ánh sáng, góc nhìn và microphone cũng ảnh hưởng đến chất lượng cuộc gọi.', 'Webcam 4K có thể ghi lại nhiều chi tiết, nhưng chất lượng hình ảnh còn phụ thuộc đáng kể vào ánh sáng trong phòng và vị trí đặt camera. Một nguồn sáng ở phía trước thường giúp hình ảnh rõ hơn so với việc ngồi quay lưng về phía cửa sổ.\n\nBạn cũng nên cân nhắc góc nhìn, khả năng lấy nét và microphone tích hợp. Kiểm tra kích thước màn hình và cổng kết nối để chắc chắn thiết bị phù hợp với góc làm việc hiện tại.', 'img/webcam-4k-pro.jpg', 'published', UTC_TIMESTAMP())
ON DUPLICATE KEY UPDATE title = VALUES(title), excerpt = VALUES(excerpt), content = VALUES(content), thumbnail = VALUES(thumbnail), status = VALUES(status), published_at = VALUES(published_at);

INSERT IGNORE INTO brands (brand_name, slug) VALUES
    ('Apple', 'apple'),
    ('Samsung', 'samsung'),
    ('Rapoo', 'rapoo'),
    ('Fantech', 'fantech'),
    ('Vega', 'vega'),
    ('DJI', 'dji'),
    ('Sony', 'sony'),
    ('Meta', 'meta');

INSERT IGNORE INTO products
    (category_id, brand_id, product_name, slug, sku, description, price, old_price, stock_quantity, rating, review_count, sold_count)
SELECT
    c.category_id, b.brand_id,
    'Chuột quang có dây Rapoo N100 Wired Optical Mouse',
    'rapoo-n100-wired-optical-mouse', 'RAPOO-N100',
    'Chuột văn phòng kết nối USB 2.0.', 600000, 1000000, 100, 4.8, 126, 1150
FROM categories c JOIN brands b ON b.slug = 'rapoo'
WHERE c.slug = 'accessory'
ON DUPLICATE KEY UPDATE product_name = VALUES(product_name), description = VALUES(description);

INSERT IGNORE INTO products
    (category_id, brand_id, product_name, slug, sku, description, price, old_price, stock_quantity, rating, review_count, sold_count)
SELECT
    c.category_id, b.brand_id,
    'iPhone 15 Pro Max 256GB Titan Tự Nhiên',
    'iphone-15-pro-max-256gb', 'APPLE-IP15PM-256',
    'Điện thoại iPhone 15 Pro Max chính hãng.', 29990000, 34990000, 25, 5.0, 284, 890
FROM categories c JOIN brands b ON b.slug = 'apple'
WHERE c.slug = 'phone'
ON DUPLICATE KEY UPDATE product_name = VALUES(product_name), description = VALUES(description);

INSERT IGNORE INTO products
    (category_id, brand_id, product_name, slug, sku, description, price, old_price, stock_quantity, rating, review_count, sold_count)
SELECT
    c.category_id, b.brand_id,
    'Samsung Galaxy S24 Ultra 5G 512GB',
    'samsung-galaxy-s24-ultra-512gb', 'SAMSUNG-S24U-512',
    'Samsung Galaxy S24 Ultra kèm S-Pen.', 31990000, 36490000, 20, 4.9, 189, 670
FROM categories c JOIN brands b ON b.slug = 'samsung'
WHERE c.slug = 'phone'
ON DUPLICATE KEY UPDATE product_name = VALUES(product_name), description = VALUES(description);

INSERT INTO products
    (category_id, brand_id, product_name, slug, sku, description, price, old_price, stock_quantity, rating, review_count, sold_count)
SELECT c.category_id, b.brand_id, 'Apple MacBook Pro 16 inch M3 Max 36GB RAM 1TB SSD',
    'macbook-pro-16-m3-max', 'APPLE-MBP16-M3MAX',
    'MacBook Pro 16 inch M3 Max dành cho công việc sáng tạo và hiệu năng chuyên nghiệp.',
    59990000, 64990000, 4, 5.0, 95, 420
FROM categories c JOIN brands b ON b.slug = 'apple'
WHERE c.slug = 'computer'
ON DUPLICATE KEY UPDATE product_name = VALUES(product_name), description = VALUES(description);

INSERT INTO products
    (category_id, brand_id, product_name, slug, sku, description, price, old_price, stock_quantity, rating, review_count, sold_count)
SELECT c.category_id, b.brand_id, 'Meta Quest 2 128GB All-In-One VR System',
    'meta-quest-2-128gb', 'META-QUEST2-128',
    'Kính thực tế ảo Meta Quest 2 với thiết kế độc lập và thư viện trò chơi phong phú.',
    9250000, 9500000, 10, 4.9, 135, 290
FROM categories c JOIN brands b ON b.slug = 'meta'
WHERE c.slug = 'gaming'
ON DUPLICATE KEY UPDATE product_name = VALUES(product_name), description = VALUES(description);

INSERT INTO products
    (category_id, brand_id, product_name, slug, sku, description, price, old_price, stock_quantity, rating, review_count, sold_count)
SELECT c.category_id, b.brand_id, 'Apple AirPods Max USB-C Space Orange',
    'apple-airpods-max-usbc-orange', 'APPLE-AIRPODSMAX-OR',
    'Tai nghe over-ear Apple AirPods Max với âm thanh không gian và kết nối USB-C.',
    13990000, 14990000, 12, 5.0, 31, 620
FROM categories c JOIN brands b ON b.slug = 'apple'
WHERE c.slug = 'headphone'
ON DUPLICATE KEY UPDATE product_name = VALUES(product_name), description = VALUES(description);

INSERT INTO products
    (category_id, brand_id, product_name, slug, sku, description, price, old_price, stock_quantity, rating, review_count, sold_count)
SELECT c.category_id, b.brand_id, 'Apple Watch Ultra Smart Watch',
    'apple-watch-ultra', 'APPLE-WATCH-ULTRA',
    'Đồng hồ thông minh Apple Watch Ultra theo dõi sức khỏe và hoạt động hằng ngày.',
    6990000, 7990000, 8, 4.8, 44, 540
FROM categories c JOIN brands b ON b.slug = 'apple'
WHERE c.slug = 'watch'
ON DUPLICATE KEY UPDATE product_name = VALUES(product_name), description = VALUES(description);

INSERT INTO products
    (category_id, brand_id, product_name, slug, sku, description, price, old_price, stock_quantity, rating, review_count, sold_count)
SELECT c.category_id, b.brand_id, 'Sony 4K Pro Webcam',
    'sony-4k-pro-webcam', 'SONY-WEBCAM-4K',
    'Webcam Sony độ phân giải 4K cho hội họp trực tuyến và sáng tạo nội dung.',
    2490000, 3190000, 16, 4.9, 38, 490
FROM categories c JOIN brands b ON b.slug = 'sony'
WHERE c.slug = 'webcam'
ON DUPLICATE KEY UPDATE product_name = VALUES(product_name), description = VALUES(description);

INSERT INTO product_images (product_id, image_url, alt_text, is_primary, sort_order)
SELECT p.product_id, image.image_url, image.alt_text, TRUE, 0
FROM products p
JOIN (
    SELECT 'macbook-pro-16-m3-max' AS slug, 'img/macbook-pro-m3.jpg' AS image_url, 'Apple MacBook Pro 16 inch' AS alt_text
    UNION ALL SELECT 'meta-quest-2-128gb', 'img/-q1kinh-thuc-te-ao-oculus-quest-2-min-mobile-q4_result_9f730879c9cd4d63b416244b08208f82_grande.webp', 'Meta Quest 2'
    UNION ALL SELECT 'apple-airpods-max-usbc-orange', 'img/AirPods-Max-USBC-Orange-A.png', 'Apple AirPods Max'
    UNION ALL SELECT 'apple-watch-ultra', 'img/smartwatch-ultra.jpg', 'Apple Watch Ultra'
    UNION ALL SELECT 'sony-4k-pro-webcam', 'img/webcam-4k-pro.jpg', 'Sony 4K Webcam'
) AS image ON image.slug = p.slug
WHERE NOT EXISTS (
    SELECT 1 FROM product_images existing
    WHERE existing.product_id = p.product_id AND existing.is_primary = TRUE
);

INSERT IGNORE INTO vouchers
    (code, description, discount_type, discount_value, min_order_value, max_discount_amount, start_at, end_at, usage_limit)
VALUES
    ('ETECH10', 'Giảm 10% cho đơn hàng đủ điều kiện', 'percentage', 10, 1000000, 500000, '2026-01-01 00:00:00', '2026-12-31 23:59:59', 1000);

-- Password hashes must be generated by the backend. This is only a placeholder account.
-- Replace the value before using this record in a real application.
INSERT IGNORE INTO users (name, email, password_hash, phone, role)
VALUES ('Quản trị viên E-Tech', 'admin@etech.local', 'REPLACE_WITH_BCRYPT_HASH', '0313728397', 'admin');

-- Useful read-only views for the product catalog and order summary.
CREATE OR REPLACE VIEW product_catalog AS
SELECT
    p.product_id,
    p.product_name,
    p.slug,
    p.sku,
    c.category_name,
    b.brand_name,
    p.price,
    p.old_price,
    p.stock_quantity,
    p.rating,
    p.review_count,
    p.sold_count,
    p.status
FROM products p
JOIN categories c ON c.category_id = p.category_id
LEFT JOIN brands b ON b.brand_id = p.brand_id;

CREATE OR REPLACE VIEW order_summary AS
SELECT
    o.order_id,
    o.order_code,
    o.user_id,
    o.receiver_name,
    o.total_amount,
    o.payment_method,
    o.order_status,
    o.ordered_at,
    COUNT(oi.order_item_id) AS item_count
FROM orders o
LEFT JOIN order_items oi ON oi.order_id = o.order_id
GROUP BY
    o.order_id, o.order_code, o.user_id, o.receiver_name,
    o.total_amount, o.payment_method, o.order_status, o.ordered_at;
