@extends('layouts.store')

@section('title', 'Giới thiệu | E-Tech')

@section('content')
<main class="about-page">
    <section class="about-hero">
        <div class="container about-hero-grid">
            <div class="about-copy">
                <span class="store-eyebrow">GIỚI THIỆU E-TECH</span>
                <h1>Những thiết bị công nghệ hàng đầu</h1>
                <p>E-Tech là điểm đến dành cho những người yêu công nghệ. Chúng tôi tuyển chọn các sản phẩm chính hãng, hữu ích và hiện đại để mỗi trải nghiệm mua sắm đều trở nên đơn giản, tin cậy và đáng nhớ.</p>
                <a href="{{ route('categories.show', ['category' => 'popular']) }}" class="btn-primary"><span>Khám phá sản phẩm</span><span aria-hidden="true">→</span></a>
            </div>
            <img class="about-hero-image" src="{{ asset('img/about1.png') }}" alt="Không gian sản phẩm công nghệ E-Tech">
        </div>
    </section>
    <section class="about-story">
        <div class="container about-story-grid">
            <div><span class="store-eyebrow">CÂU CHUYỆN CỦA CHÚNG TÔI</span><h2>Công nghệ tốt hơn bắt đầu từ lựa chọn đúng</h2></div>
            <div><p>Chúng tôi tin rằng một thiết bị tốt không chỉ có thông số ấn tượng, mà còn phải phù hợp với nhịp sống của bạn. Vì vậy, E-Tech tập trung xây dựng danh mục sản phẩm rõ ràng, tư vấn dễ hiểu và dịch vụ đồng hành tận tâm.</p><p>Từ điện thoại, máy tính đến phụ kiện và thiết bị thông minh, mỗi sản phẩm đều được lựa chọn với tiêu chí chất lượng, nguồn gốc minh bạch và giá trị sử dụng lâu dài.</p><div class="about-stats"><div><strong>100%</strong><span>Sản phẩm được chọn lọc</span></div><div><strong>24/7</strong><span>Sẵn sàng hỗ trợ khách hàng</span></div></div></div>
        </div>
    </section>
    <section class="about-values">
        <div class="container"><div class="about-section-heading"><span class="store-eyebrow">ĐIỀU E-TECH THEO ĐUỔI</span><h2>Mua sắm công nghệ nhẹ nhàng hơn</h2><p>Ba nguyên tắc tạo nên trải nghiệm mà chúng tôi muốn mang đến mỗi ngày.</p></div>
            <div class="about-value-grid"><article><span>✓</span><h3>Chất lượng đáng tin</h3><p>Danh mục được tuyển chọn kỹ để bạn yên tâm về nguồn gốc và hiệu năng sản phẩm.</p></article><article><span>↗</span><h3>Tư vấn rõ ràng</h3><p>Thông tin dễ hiểu, trung thực và tập trung vào nhu cầu sử dụng thực tế của bạn.</p></article><article><span>♡</span><h3>Đồng hành tận tâm</h3><p>Đội ngũ E-Tech luôn sẵn sàng hỗ trợ trước, trong và sau khi bạn mua hàng.</p></article></div>
        </div>
    </section>
    <section class="about-faq" id="faq">
        <div class="container about-faq-grid"><div class="about-faq-images"><img src="{{ asset('img/faq1.png') }}" alt="Thiết bị công nghệ"><img src="{{ asset('img/faq2.png') }}" alt="Điện thoại thông minh"></div>
            <div><span class="store-eyebrow">CÁC CÂU HỎI VÀ TRẢ LỜI</span><h2>Câu hỏi thường gặp</h2><div class="about-faq-list"><details open><summary>E-Tech bán những sản phẩm nào?</summary><p>E-Tech cung cấp điện thoại, laptop, máy tính, tai nghe, phụ kiện, smartwatch, webcam và nhiều thiết bị công nghệ khác.</p></details><details><summary>Làm thế nào để tìm sản phẩm phù hợp?</summary><p>Bạn có thể duyệt theo danh mục hoặc liên hệ hotline để được tư vấn theo nhu cầu, ngân sách và mục đích sử dụng.</p></details><details><summary>Chính sách bảo hành và đổi trả như thế nào?</summary><p>Sản phẩm được hỗ trợ theo chính sách bảo hành của từng thương hiệu. Vui lòng liên hệ chúng tôi để được hướng dẫn chi tiết.</p></details><details><summary>Làm thế nào để liên hệ dịch vụ khách hàng?</summary><p>Gọi 0313728397 hoặc gửi email đến info@themona.global, đội ngũ E-Tech sẽ phản hồi sớm nhất.</p></details></div></div>
        </div>
    </section>
</main>
@endsection