@extends('layouts.app')

@section('content')
@php
$title = 'Liên hệ';
@endphp

{{-- Thêm Grid Pattern làm nền để tránh cảm giác trống trải --}}
<section class="mx-auto w-full max-w-7xl px-6 py-20 bg-grid-pattern">
    <div class="grid gap-12 lg:grid-cols-[1.1fr_0.9fr] items-start">

        {{-- CỘT TRÁI: FORM LIÊN HỆ --}}
        <div class="float-in">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand/10 border border-brand/20 mb-4">
                <span class="w-2 h-2 rounded-full bg-brand animate-pulse"></span>
                <span class="text-[10px] font-black uppercase tracking-widest text-brand">Hỗ trợ 24/7</span>
            </div>

            <h1 class="text-4xl md:text-6xl font-black text-ink leading-[1.05] uppercase tracking-tighter">
                Kết nối với <br><span class="text-brand italic">Gia Nguyễn</span>
            </h1>

            <p class="mt-6 text-body leading-relaxed max-w-lg">
                Vui lòng để lại thông tin để nhận tư vấn kỹ thuật, báo giá thí nghiệm hoặc yêu cầu hồ sơ năng lực <strong class="text-ink">LAS-XD 980</strong>. Đội ngũ kỹ sư của chúng tôi sẽ phản hồi trong vòng 24 giờ.
            </p>

            <form action="{{ route('client.contact.store') }}" method="POST" class="mt-10 grid gap-5">
                @csrf
                @if(session('success'))
                <div class="rounded-2xl bg-emerald-50 border border-emerald-100 p-5 text-emerald-700 font-medium flex items-center gap-3">
                    <i class="fa-solid fa-circle-check text-xl"></i>
                    {{ session('success') }}
                </div>
                @endif

                <div class="grid gap-5 md:grid-cols-2">
                    <div class="space-y-2">
                        <label class="text-[11px] font-black uppercase ml-2 text-slate-400">Họ và tên</label>
                        <input name="name" class="w-full rounded-2xl border border-slate-200 bg-white px-5 py-4 focus:border-brand focus:ring-4 focus:ring-brand/5 transition-all outline-none"
                            placeholder="Nguyễn Văn A" type="text" autocomplete="name" required>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-black uppercase ml-2 text-slate-400">Số điện thoại</label>
                        <input name="phone" class="w-full rounded-2xl border border-slate-200 bg-white px-5 py-4 focus:border-brand focus:ring-4 focus:ring-brand/5 transition-all outline-none"
                            placeholder="0908 700 009" type="tel" inputmode="tel" autocomplete="tel" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-black uppercase ml-2 text-slate-400">Địa chỉ Email</label>
                    <input name="email" class="w-full rounded-2xl border border-slate-200 bg-white px-5 py-4 focus:border-brand focus:ring-4 focus:ring-brand/5 transition-all outline-none"
                        placeholder="gianguyen.nt@gmail.com" type="email" autocomplete="email" required>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-black uppercase ml-2 text-slate-400">Nội dung yêu cầu</label>
                    <textarea name="message" class="w-full rounded-2xl border border-slate-200 bg-white px-5 py-4 focus:border-brand focus:ring-4 focus:ring-brand/5 transition-all outline-none"
                        rows="4" placeholder="Ví dụ: Tôi cần báo giá thí nghiệm nén mẫu bê tông cho dự án..." required></textarea>
                </div>

                <button class="btn-primary w-full md:w-max px-12 py-5 shadow-xl shadow-brand/20 hover-lift flex items-center justify-center gap-3" type="submit">
                    <span>Gửi yêu cầu ngay</span>
                    <i class="fa-solid fa-paper-plane text-xs"></i>
                </button>
            </form>
        </div>

        {{-- CỘT PHẢI: THÔNG TIN CHI TIẾT --}}
        <div class="space-y-8 lg:pl-10">
            {{-- Card thông tin --}}
            <div class="rounded-[2rem] bg-navy p-10 text-white shadow-2xl relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-32 h-32 bg-brand/20 rounded-full blur-3xl -mr-16 -mt-16 group-hover:bg-brand/40 transition-colors"></div>

                <h3 class="font-black text-2xl uppercase tracking-tight">Thông tin <br>Liên hệ</h3>
                <div class="w-12 h-1 bg-brand mt-4 mb-8"></div>

                <div class="space-y-6 relative z-10">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-location-dot text-brand"></i>
                        </div>
                        <div class="text-sm leading-relaxed text-white">
                            <span class="block text-white font-bold mb-1 uppercase text-xs">Trụ sở chính:</span>
                            Khu tái định cư Tháp Chàm, KP7, Phường Bảo An, TP. Phan Rang-Tháp Chàm, Tỉnh Ninh Thuận.
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-phone text-brand"></i>
                        </div>
                        <div class="text-sm text-white">
                            <span class="block text-white font-bold mb-1 uppercase text-xs">Hotline tư vấn:</span>
                            0259.353.1368 — 0908.700.009
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-envelope text-brand"></i>
                        </div>
                        <div class="text-sm text-white">
                            <span class="block text-white font-bold mb-1 uppercase text-xs">Email doanh nghiệp:</span>
                            gianguyen.nt@gmail.com
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-receipt text-brand"></i>
                        </div>
                        <div class="text-sm text-white">
                            <span class="block text-white font-bold mb-1 uppercase text-xs">Mã số thuế:</span>
                            4500453534
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Bản đồ --}}
            <div class="rounded-[2rem] bg-stone p-8 border border-slate-200">
                <div class="flex items-center justify-between mb-6">
                    <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400">Vị trí phòng Lab</p>
                    <a href="https://www.google.com/maps/search/?api=1&query=Khu%20t%C3%A1i%20%C4%91%E1%BB%8Bnh%20c%C6%B0%20Th%C3%A1p%20Ch%C3%A0m%2C%20KP7%2C%20Ph%C6%B0%E1%BB%9Dng%20B%E1%BA%A3o%20An%2C%20TP.%20Phan%20Rang-Th%C3%A1p%20Ch%C3%A0m%2C%20T%E1%BB%89nh%20Ninh%20Thu%E1%BA%ADn" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm hover:text-brand transition-colors">
                        <i class="fa-solid fa-up-right-from-square text-[10px]"></i>
                    </a>
                </div>

                <div class="overflow-hidden rounded-2xl shadow-inner border border-white">
                    {{-- Giữ nguyên iframe của bạn nhưng tăng độ cao nhẹ --}}
                    <iframe title="Bản đồ Gia Nguyen" class="h-[280px] w-full"
                        src="https://maps.google.com/maps?q=Khu%20t%C3%A1i%20%C4%91%E1%BB%8Bnh%20c%C6%B0%20Th%C3%A1p%20Ch%C3%A0m%2C%20KP7%2C%20Ph%C6%B0%E1%BB%9Dng%20B%E1%BA%A3o%20An%2C%20TP.%20Phan%20Rang-Th%C3%A1p%20Ch%C3%A0m%2C%20T%E1%BB%89nh%20Ninh%20Thu%E1%BA%ADn&z=17&output=embed"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <a href="https://www.google.com/maps/search/?api=1&query=Khu%20t%C3%A1i%20%C4%91%E1%BB%8Bnh%20c%C6%B0%20Th%C3%A1p%20Ch%C3%A0m%2C%20KP7%2C%20Ph%C6%B0%E1%BB%9Dng%20B%E1%BA%A3o%20An%2C%20TP.%20Phan%20Rang-Th%C3%A1p%20Ch%C3%A0m%2C%20T%E1%BB%89nh%20Ninh%20Thu%E1%BA%ADn" target="_blank" rel="noopener noreferrer" class="mt-6 flex items-center justify-between p-4 bg-white rounded-xl hover:border-brand/30 border border-transparent transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-map-location-dot text-brand text-xl"></i>
                        <span class="text-[11px] font-bold text-ink uppercase">Xem chỉ đường</span>
                    </div>
                    <i class="fa-solid fa-chevron-right text-slate-300 text-xs"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection