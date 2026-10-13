@extends('layouts.store')

@section('title', 'Liên hệ | E-Tech')

@section('content')
<main class="contact-page">
    <section class="contact-hero"><div class="container"><span class="store-eyebrow">E-TECH LUÔN SẴN SÀNG LẮNG NGHE</span><h1>Liên hệ với chúng tôi</h1><p>Cần tư vấn sản phẩm, hỗ trợ đơn hàng hay muốn góp ý? Hãy gửi thông tin, đội ngũ E-Tech sẽ phản hồi bạn sớm nhất.</p></div></section>
    <section class="container contact-main"><div class="contact-grid">
        <div class="contact-form-card"><h2>Gửi tin nhắn</h2>
            @if (session('contact_sent'))<div class="contact-success" role="status">Cảm ơn bạn đã liên hệ với E-Tech. Chúng tôi sẽ phản hồi sớm nhất.</div>@endif
            <form class="contact-form" action="{{ route('contact.store') }}" method="post">
                @csrf
                <div class="contact-field"><label for="name">Họ và tên *</label><input id="name" name="name" value="{{ old('name') }}" autocomplete="name" maxlength="120" required>@error('name')<small class="contact-error">{{ $message }}</small>@enderror</div>
                <div class="contact-field"><label for="email">Email *</label><input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" maxlength="190" required>@error('email')<small class="contact-error">{{ $message }}</small>@enderror</div>
                <div class="contact-field"><label for="phone">Số điện thoại *</label><input id="phone" name="phone" type="tel" value="{{ old('phone') }}" autocomplete="tel" maxlength="20" required>@error('phone')<small class="contact-error">{{ $message }}</small>@enderror</div>
                <div class="contact-field"><label for="subject">Chủ đề</label><input id="subject" name="subject" value="{{ old('subject') }}" maxlength="255">@error('subject')<small class="contact-error">{{ $message }}</small>@enderror</div>
                <div class="contact-field full"><label for="message">Nội dung *</label><textarea id="message" name="message" rows="6" maxlength="5000" required>{{ old('message') }}</textarea>@error('message')<small class="contact-error">{{ $message }}</small>@enderror</div>
                <button type="submit" class="contact-submit">Gửi tin nhắn <span aria-hidden="true">→</span></button>
            </form>
        </div>
        <aside class="contact-info-card"><h2>Thông tin liên hệ</h2><div class="contact-info-item"><span class="contact-info-icon" aria-hidden="true">☎</span><div><h3>Điện thoại</h3><a href="tel:0313728397">0313728397</a><p>Thứ Hai – Chủ Nhật, 8:00 – 21:00</p></div></div><div class="contact-info-item"><span class="contact-info-icon" aria-hidden="true">✉</span><div><h3>Email</h3><a href="mailto:info@themona.global">info@themona.global</a></div></div><div class="contact-info-item"><span class="contact-info-icon" aria-hidden="true">⌖</span><div><h3>Địa chỉ</h3><p>1073/23 Cách Mạng Tháng 8, TP.HCM</p><a href="https://maps.google.com/?q=1073%2F23+Cach+Mang+Thang+8+TP.HCM" target="_blank" rel="noopener noreferrer">Xem trên bản đồ →</a></div></div></aside>
    </div></section>
</main>
@endsection