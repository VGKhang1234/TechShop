# E-Tech Store

Website thương mại điện tử bán sản phẩm công nghệ, xây dựng bằng Laravel, PHP, MySQL, Blade và Vite. Ứng dụng có giao diện tiếng Việt, hỗ trợ danh mục sản phẩm, giỏ hàng, đặt hàng, tài khoản khách hàng và khu vực quản trị.

## Mục lục

- [Tính năng](#tính-năng)
- [Công nghệ](#công-nghệ)
- [Yêu cầu](#yêu-cầu)
- [Cài đặt và chạy](#cài-đặt-và-chạy)
- [Hướng dẫn sử dụng](#hướng-dẫn-sử-dụng)
- [Database](#database)
- [Tài liệu route và API](#tài-liệu-route-và-api)
- [SEO](#seo)
- [Kiểm thử và xử lý lỗi](#kiểm-thử-và-xử-lý-lỗi)

## Tính năng

### Cửa hàng

- Trang chủ hiển thị sản phẩm bán chạy và sản phẩm mới.
- Duyệt sản phẩm theo danh mục, tìm kiếm theo từ khóa và xem trang chi tiết bằng slug.
- Giỏ hàng hỗ trợ cả khách chưa đăng nhập và tài khoản. Giỏ hàng khách được gộp vào tài khoản sau khi đăng nhập.
- Thanh toán hỗ trợ COD hoặc chuyển khoản ngân hàng. Phí giao hàng là 30.000₫; miễn phí giao hàng từ 1.000.000₫.
- Áp dụng voucher theo thời hạn, giá trị đơn tối thiểu, giới hạn lượt dùng và mức giảm tối đa.
- Đăng ký, đăng nhập, đăng xuất, trang giới thiệu, tin tức và biểu mẫu liên hệ.

### Quản trị

Đăng nhập bằng tài khoản có `role = admin` và `status = active`. Khu vực `/admin` được bảo vệ bằng middleware xác thực và quyền `manage-store`.

- Dashboard: thống kê doanh thu và đơn hàng trong tháng, số khách hàng, sản phẩm, danh mục, sản phẩm bán chạy và đơn gần đây.
- Quản lý sản phẩm, danh mục, đơn hàng, voucher và duyệt trạng thái đánh giá.
- Cập nhật trạng thái đơn hàng theo luồng hợp lệ; hủy đơn sẽ hoàn tồn kho và cập nhật trạng thái thanh toán.

## Công nghệ

- PHP `^8.3`, Laravel `^13.17`
- MySQL 8.0+ hoặc MariaDB 10.5+
- Blade, JavaScript, Vite 8, Tailwind CSS 4 (qua Vite)
- Eloquent ORM, session-based authentication

## Yêu cầu

- PHP 8.3 trở lên cùng các PHP extension Laravel yêu cầu (đặc biệt `pdo_mysql`, `mbstring`, `openssl`, `fileinfo`, `xml`).
- Composer 2.
- MySQL 8.0+ hoặc MariaDB 10.5+ đang chạy.
- Node.js `20.19+` hoặc `22.12+` và npm để chạy Vite 8, biên dịch/tải tài nguyên frontend.

## Cài đặt và chạy

Các lệnh dưới đây chạy trong thư mục `laravel-app` (Windows PowerShell):

```powershell
cd "C:\xampp\htdocs\Mobile Phone shop\laravel-app"
composer install
Copy-Item .env.example .env
php artisan key:generate
```

### 1. Tạo database và cấu hình môi trường

Tạo database `etech_store` trong MySQL hoặc phpMyAdmin. Mở `.env` và thiết lập thông tin kết nối của máy:

```dotenv
APP_NAME="E-Tech Store"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=etech_store
DB_USERNAME=root
DB_PASSWORD=
```

Không đưa `.env`, `APP_KEY` hoặc mật khẩu database lên Git. Chỉ bật `APP_DEBUG=true` trong môi trường phát triển.

### 2. Nạp schema và dữ liệu demo

Nạp file `etech_store.sql` vào MySQL bằng phpMyAdmin (Import) hoặc MySQL CLI. Với CLI, mở Command Prompt tại thư mục `laravel-app` (không dùng cú pháp chuyển hướng này trong PowerShell):

```cmd
mysql -u root -p < etech_store.sql
```

Nhập mật khẩu khi được hỏi; nếu MySQL CLI chưa có trong `PATH`, dùng đường dẫn đầy đủ đến `mysql.exe` của cài đặt MySQL/XAMPP. File SQL tự tạo database `etech_store` và nạp schema cùng dữ liệu demo.

> **Lưu ý về migration:** `database/migrations/0001_01_01_000000_create_users_table.php` là migration mặc định của Laravel, với các cột `id` và `password`. Schema ứng dụng trong `etech_store.sql` dùng `user_id`, `password_hash` và `role`. Vì vậy, không chạy `php artisan migrate` hoặc script `composer run setup` sau khi nạp SQL trên database này nếu chưa đồng bộ migration với schema ứng dụng; migration mặc định sẽ xung đột với bảng `users`.

SQL demo tạo tài khoản quản trị `admin@etech.local`, nhưng giá trị mật khẩu là chuỗi placeholder, **không phải mật khẩu có thể đăng nhập**. Đặt mật khẩu băm mới qua Tinker:

```powershell
php artisan tinker
```

Tại dấu nhắc Tinker, chạy:

```php
\App\Models\User::where('email', 'admin@etech.local')
    ->update(['password_hash' => \Illuminate\Support\Facades\Hash::make('thay-bang-mat-khau-manh')]);
```

Sau đó nhập `exit`. Chỉ dùng mật khẩu thử nghiệm trên máy local; hãy đặt mật khẩu riêng, mạnh và không tái sử dụng khi triển khai.

### 3. Cài frontend và chạy ứng dụng

```powershell
npm install
npm run build
```

Mở hai terminal tại thư mục `laravel-app`:

```powershell
# Terminal 1: ứng dụng Laravel
php artisan serve
```

```powershell
# Terminal 2: Vite dev server khi phát triển giao diện
npm run dev
```

Truy cập `http://127.0.0.1:8000`. Đăng nhập quản trị tại `http://127.0.0.1:8000/dang-nhap`, sau đó mở `/admin`.

Khi chỉ cần chạy bản tài nguyên đã biên dịch, có thể bỏ qua `npm run dev`; chạy `npm run build` lại sau khi sửa JavaScript/CSS. Với triển khai production, cấu hình web server trỏ document root đến thư mục `public`, đặt `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL` thành domain HTTPS thực tế và cấp quyền ghi cho `storage` cùng `bootstrap/cache`.

Cấu Trúc Dự Án

laravel-app/                 # Ứng dụng Laravel chính
    ├── app/
    │   ├── Http/Controllers/
    │   │   └── Admin/           # Controller cho trang quản trị
    │   ├── Models/              # Eloquent models
    │   ├── Providers/            # Service providers
    │   └── Services/             # Logic nghiệp vụ dùng chung
    ├── bootstrap/                # Khởi tạo ứng dụng và middleware
    ├── config/                   # Cấu hình Laravel
    ├── database/
    │   ├── factories/
    │   ├── migrations/
    │   ├── seeders/
    │   ├── database.sqlite       # Database SQLite cục bộ
    │   └── etech_store.sql       # Schema và dữ liệu mẫu MySQL
    ├── docs/                     # Tài liệu API và collection Postman
    ├── public/                   # Document root và tài nguyên công khai
    │   ├── build/                # Tài nguyên được biên dịch bởi Vite
    │   ├── css/
    │   ├── img/
    │   ├── js/
    │   └── index.php             # Entry point HTTP của Laravel
    ├── resources/
    │   ├── css/                  # CSS nguồn được xử lý bởi Vite
    │   ├── js/                   # JavaScript nguồn
    │   └── views/                # Blade templates: store, auth, admin, layouts
    ├── routes/
    │   ├── web.php               # Route giao diện cửa hàng và quản trị
    │   └── console.php           # Console routes
    ├── storage/                  # Log, cache, session và file runtime
    ├── tests/
    │   ├── Feature/
    │   └── Unit/
    ├── .env.example
    ├── artisan
    ├── composer.json
    ├── package.json
    └── vite.config.js

## Hướng dẫn sử dụng

### Khách hàng

1. Chọn danh mục từ thanh điều hướng hoặc dùng ô tìm kiếm.
2. Mở sản phẩm để xem mô tả, giá, tình trạng còn hàng và thông tin liên quan.
3. Thêm sản phẩm vào giỏ; điều chỉnh số lượng hoặc xóa mặt hàng tại trang giỏ.
4. Tiến hành thanh toán, điền thông tin nhận hàng, chọn phương thức thanh toán và nhập voucher nếu có.
5. Sau khi đặt hàng thành công, mã đơn hàng và thông tin sản phẩm được lưu trong đơn hàng.
6. Có thể tạo tài khoản để lưu thông tin và giữ giỏ hàng giữa các phiên.

### Quản trị viên

1. Đăng nhập bằng tài khoản đã có `role = admin` và `status = active`.
2. Mở **Quản trị** hoặc truy cập `/admin`.
3. Dùng menu quản trị để tạo/sửa/xóa sản phẩm, danh mục, voucher; quản lý đơn hàng và duyệt đánh giá.
4. Khi xử lý đơn, chỉ chuyển sang trạng thái được phép theo luồng hiện tại. Hủy đơn sẽ trả số lượng sản phẩm về kho.

## Database

Schema thực tế nằm trong [`etech_store.sql`](./etech_store.sql). Các bảng chính:

| Bảng | Vai trò và dữ liệu chính |
|---|---|
| `users` | Tài khoản, email, `password_hash`, số điện thoại, địa chỉ, vai trò (`customer`, `admin`) và trạng thái. |
| `categories` | Danh mục, tên, slug, mô tả và ảnh. |
| `brands` | Thương hiệu và slug. |
| `products` | Thông tin sản phẩm, SKU, danh mục/thương hiệu, giá, tồn kho, trạng thái, rating và số lượng đã bán. |
| `product_images` | Nhiều ảnh cho sản phẩm, alt text, ảnh chính và thứ tự hiển thị. |
| `carts`, `cart_items` | Giỏ hàng của tài khoản hoặc session khách và các sản phẩm/số lượng trong giỏ. |
| `vouchers` | Mã giảm giá, loại/mức giảm, thời gian hiệu lực, giới hạn và số lượt dùng. |
| `orders`, `order_items` | Đơn hàng, thông tin người nhận, tổng tiền và snapshot tên/giá/số lượng từng sản phẩm tại thời điểm đặt. |
| `payments` | Phương thức và trạng thái thanh toán của đơn. |
| `reviews` | Đánh giá sản phẩm, điểm số, nội dung và trạng thái duyệt. |
| `wishlists` | Quan hệ người dùng - sản phẩm yêu thích. |
| `blog_posts` | Bài viết, nội dung, slug, ảnh đại diện và trạng thái xuất bản. |
| `contact_messages` | Thông tin liên hệ và trạng thái xử lý. |

Các bảng liên kết bằng khóa ngoại; slug/SKU/mã voucher/email có ràng buộc duy nhất ở schema tương ứng. Giá dùng `DECIMAL`; danh mục và thương hiệu được tham chiếu từ sản phẩm. Đơn hàng lưu chi tiết sản phẩm trong `order_items` để giữ lại tên và giá tại thời điểm mua, không phụ thuộc giá sản phẩm hiện tại.

Luồng thanh toán kiểm tra sản phẩm còn hoạt động và đủ tồn kho, tính lại giá/voucher/phí giao hàng phía server, rồi tạo đơn, chi tiết đơn, bản ghi thanh toán và cập nhật tồn kho trong transaction có khóa hàng. Khi đơn bị hủy, tồn kho được hoàn lại.

> `sold_count` có sẵn và được dùng để xếp sản phẩm bán chạy, nhưng luồng checkout hiện tại chưa tăng trường này khi tạo đơn. Dashboard/“bán chạy” sẽ chỉ phản ánh dữ liệu đã có trong cột cho đến khi logic cập nhật được bổ sung.

### Dữ liệu mẫu và tài khoản

File SQL nạp sẵn danh mục, thương hiệu, sản phẩm, bài viết, voucher và một tài khoản admin placeholder. Voucher mẫu `ETECH10` có thời gian hiệu lực đến cuối năm 2026; hãy kiểm tra ngày hiện tại và cấu hình database trước khi dùng.

## Tài liệu route và API

Ứng dụng hiện là **Laravel MVC render HTML bằng Blade**, không phải backend REST JSON độc lập. Các đường dẫn POST/PATCH/DELETE dưới đây là web routes dùng session, CSRF token và thường trả redirect/HTML. Không có contract JSON công khai cho `/api/*`.

### Route cửa hàng

| Method | Đường dẫn | Chức năng |
|---|---|---|
| `GET` | `/` | Trang chủ. |
| `GET` | `/danh-muc/{category:slug}` | Danh sách sản phẩm theo danh mục; hỗ trợ tham số tìm kiếm `q`. |
| `GET` | `/san-pham/{product:slug}` | Chi tiết sản phẩm đang hoạt động. |
| `GET` | `/gio-hang` | Xem giỏ hàng. |
| `POST` | `/gio-hang/items` | Thêm sản phẩm; form gồm `product_id`, `quantity` (1–99), tùy chọn `buy_now`. |
| `PATCH` | `/gio-hang/items/{cartItem}` | Cập nhật `quantity` (1–99). |
| `DELETE` | `/gio-hang/items/{cartItem}` | Xóa sản phẩm khỏi giỏ. |
| `GET` | `/thanh-toan` | Hiển thị trang checkout; yêu cầu giỏ không trống. |
| `POST` | `/thanh-toan` | Tạo đơn. Trường chính: `receiver_name`, `receiver_phone`, `receiver_email`, `shipping_address`, `payment_method` (`cod` hoặc `bank_transfer`), `voucher_code`, `note`. |
| `GET` | `/thanh-toan/thanh-cong` | Trang xác nhận đơn theo session sau checkout. |
| `GET` | `/tin-tuc`, `/tin-tuc/{post:slug}` | Danh sách bài đã xuất bản và chi tiết bài. |
| `GET` / `POST` | `/dang-nhap`, `/dang-ky` | Form và xử lý đăng nhập/đăng ký. |
| `POST` | `/dang-xuat` | Đăng xuất. |
| `GET` / `POST` | `/lien-he` | Form liên hệ và gửi tin nhắn. |
| `GET` | `/robots.txt`, `/sitemap.xml` | Robots và sitemap do ứng dụng sinh. |

Các trang thông tin khác: `/gioi-thieu`. Route tương thích URL cũ chuyển hướng bằng HTTP 301 về các đường dẫn tiếng Việt tương ứng.

### Route quản trị

Tất cả route dưới `/admin` cần đăng nhập và quyền `manage-store`:

| Method | Đường dẫn | Chức năng |
|---|---|---|
| `GET` | `/admin` | Dashboard. |
| `GET`, `POST` | `/admin/products`, `/admin/products/create` | Danh sách và tạo sản phẩm. |
| `GET`, `PUT`, `DELETE` | `/admin/products/{product}/edit`, `/admin/products/{product}` | Sửa/xóa sản phẩm. |
| `GET`, `POST` | `/admin/categories`, `/admin/categories/create` | Danh sách và tạo danh mục. |
| `GET`, `PUT`, `DELETE` | `/admin/categories/{category}/edit`, `/admin/categories/{category}` | Sửa/xóa danh mục. |
| `GET`, `PATCH` | `/admin/orders`, `/admin/orders/{order}/status` | Xem/lọc đơn và cập nhật `order_status`. |
| `GET`, `POST` | `/admin/vouchers`, `/admin/vouchers/create` | Danh sách và tạo voucher. |
| `GET`, `PUT`, `DELETE` | `/admin/vouchers/{voucher}/edit`, `/admin/vouchers/{voucher}` | Sửa/xóa voucher. |
| `GET`, `PATCH` | `/admin/reviews`, `/admin/reviews/{review}/status` | Danh sách và cập nhật trạng thái duyệt review. |

Xem danh sách route đầy đủ bằng:

```powershell
php artisan route:list
```

## SEO

SEO hiện được hỗ trợ ở mức cơ bản:

- URL danh mục, sản phẩm và bài viết dùng slug dễ đọc.
- `GET /robots.txt` cho phép crawl trang công khai và chặn `/admin/`, `/dang-nhap`, `/dang-ky`, `/gio-hang`, `/thanh-toan`.
- `GET /sitemap.xml` sinh URL trang chủ, giới thiệu, tin tức, liên hệ, danh mục, sản phẩm active và bài viết published từ database.
- Một số URL `.php` cũ được chuyển hướng 301 sang route mới.
- Trang sản phẩm, danh mục và bài viết đặt `<title>` riêng; layout đặt ngôn ngữ tài liệu là tiếng Việt.

**Giới hạn hiện tại:** layout chưa khai báo meta description, canonical URL, Open Graph/Twitter Card hoặc structured data (JSON-LD). Khi triển khai thật, nên bổ sung các thẻ này theo từng trang, đặt `APP_URL` là domain chuẩn HTTPS và cập nhật `robots.txt`/sitemap nếu thay đổi quy tắc crawl.

## Kiểm thử và xử lý lỗi

Chạy test Laravel:

```powershell
php artisan test
```

Một số lỗi cài đặt thường gặp:

- **Không kết nối được MySQL:** kiểm tra MySQL đang chạy và `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` trong `.env`.
- **Thiếu bảng/cột:** xác nhận đã import `etech_store.sql` vào đúng database; không chạy migration mặc định trên schema này trước khi đồng bộ migration.
- **Vite báo thiếu manifest:** chạy `npm install` rồi `npm run build`, hoặc bật `npm run dev`.
- **Không đăng nhập được admin:** placeholder SQL không phải mật khẩu hợp lệ; cập nhật `password_hash` bằng Laravel Hash/Tinker như hướng dẫn cài đặt.
- **Thay đổi `.env` chưa có hiệu lực:** chạy `php artisan config:clear`.
