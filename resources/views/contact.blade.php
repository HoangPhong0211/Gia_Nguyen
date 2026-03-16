@extends('layouts.app')

@section('content')
@php
$title = 'Liên hệ';
@endphp

<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="grid gap-10 lg:grid-cols-[1fr_0.9fr]">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">Liên hệ</p>
            <h1 class="text-4xl md:text-5xl font-display">Kết nối với Hoàng Gia Việt Nam</h1>
            <p class="mt-4 text-black/70">Vui lòng để lại thông tin để nhận tư vấn khảo sát, thí nghiệm, báo giá và hồ sơ năng lực. Chúng tôi phản hồi trong 24 giờ làm việc.</p>

            <form class="mt-8 grid gap-4">
                <div class="grid gap-4 md:grid-cols-2">
                    <input class="rounded-2xl border border-black/10 bg-white px-4 py-3" placeholder="Họ và tên" type="text" aria-label="Họ và tên">
                    <input class="rounded-2xl border border-black/10 bg-white px-4 py-3" placeholder="Số điện thoại" type="tel" aria-label="Số điện thoại">
                </div>
                <input class="rounded-2xl border border-black/10 bg-white px-4 py-3" placeholder="Email" type="email" aria-label="Email">
                <textarea class="rounded-2xl border border-black/10 bg-white px-4 py-3" rows="5" placeholder="Nội dung yêu cầu" aria-label="Nội dung yêu cầu"></textarea>
                <button class="inline-flex items-center justify-center rounded-full bg-brand px-6 py-3 text-white font-semibold" type="submit">
                    Gửi yêu cầu
                </button>
            </form>
        </div>
        <div class="space-y-6">
            <div class="rounded-3xl bg-stone p-6">
                <h3 class="font-display text-2xl">Thông tin liên hệ</h3>
                <p class="mt-3 text-sm text-black/70">Công ty Cổ phần Địa kỹ thuật Hoàng Gia Việt Nam</p>
                <p class="text-sm text-black/70">Địa chỉ: Số 55 Cầu Cốn, P. Trần Hưng Đạo, TP Hải Dương, Tỉnh Hải Dương</p>
                <p class="text-sm text-black/70">0982 461 026</p>
                <p class="text-sm text-black/70">Hientvxd7217@gmail.com</p>
            </div>
            <div class="rounded-3xl bg-[linear-gradient(135deg,_#f3d3bf,_#f9f2e7)] p-6">
                <p class="text-sm uppercase tracking-[0.3em] text-black/50">Bản đồ</p>
                <div class="mt-4 overflow-hidden rounded-2xl border border-black/10 bg-white">
                    <iframe
                        title="Bản đồ văn phòng Hoàng Gia Việt Nam"
                        class="h-[320px] w-full"
                        src="https://maps.google.com/maps?q=S%E1%BB%91%2055%20C%E1%BA%A7u%20C%E1%BB%91n%2C%20P.%20Tr%E1%BA%A7n%20H%C6%B0ng%20%C4%90%E1%BA%A1o%2C%20TP%20H%E1%BA%A3i%20D%C6%B0%C6%A1ng%2C%20T%E1%BB%89nh%20H%E1%BA%A3i%20D%C6%B0%C6%A1ng&z=17&output=embed"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <a href="https://www.google.com/maps/search/?api=1&query=S%E1%BB%91%2055%20C%E1%BA%A7u%20C%E1%BB%91n%2C%20P.%20Tr%E1%BA%A7n%20H%C6%B0ng%20%C4%90%E1%BA%A1o%2C%20TP%20H%E1%BA%A3i%20D%C6%B0%C6%A1ng%2C%20T%E1%BB%89nh%20H%E1%BA%A3i%20D%C6%B0%C6%A1ng" target="_blank" rel="noopener noreferrer" class="mt-3 inline-flex text-sm font-semibold text-brand hover:underline">
                    Mở Google Maps
                </a>
            </div>
        </div>
    </div>
</section>
@endsection