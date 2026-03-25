@extends('layouts.app')

@section('content')
@php
$title = 'Về chúng tôi - Gia Nguyên LAS-XD 980';
@endphp

{{-- 1. HERO SECTION --}}
<section class="relative py-20 bg-navy overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-dot-grid"></div>
    <div class="mx-auto w-full max-w-7xl px-5 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <span
                    class="inline-block px-4 py-1.5 bg-orange/10 border border-orange/20 text-orange text-[11px] font-black uppercase tracking-[0.2em] rounded-full">
                    Thiết lập từ 2010
                </span>

                <h1 class="text-4xl md:text-6xl font-black text-white uppercase leading-[1.2] tracking-normal">
                    Công ty TNHH <br>
                    {{-- 2. Đảm bảo dòng màu cam cũng dùng tracking-normal (mặc định của cha) --}}
                    <span class="text-orange">Xây dựng & Thương mại</span><br>
                    Gia Nguyên
                </h1>
                <p class="text-slate-400 text-lg leading-relaxed max-w-xl">
                    Đơn vị hàng đầu tại Ninh Thuận chuyên về thí nghiệm chuyên ngành xây dựng (LAS-XD 980) và kiểm định
                    chất lượng công trình, cung cấp giải pháp kỹ thuật chính xác cho các dự án hạ tầng trọng điểm.
                </p>
            </div>
            <div class="relative">
                <div class="absolute -inset-4 bg-orange/20 blur-3xl rounded-full"></div>
                <figure class="relative rounded-3xl overflow-hidden border border-white/10 shadow-2xl">
                    <img src="/images/0111.png" alt="Trụ sở Gia Nguyên" class="w-full aspect-video object-cover">
                </figure>
            </div>
        </div>
    </div>
</section>

{{-- 2. THÔNG TIN PHÁP LÝ & NĂNG LỰC --}}
<section class="py-24 bg-white">
    <div class="mx-auto max-w-7xl px-5">
        <div class="grid lg:grid-cols-3 gap-10">
            {{-- Cột trái: Thông tin doanh nghiệp --}}
            <div class="lg:col-span-2 space-y-12">
                <div>
                    <h2 class="text-3xl font-black text-navy uppercase mb-8 flex items-center gap-4">
                        <span class="w-12 h-1px bg-orange"></span>
                        Hành trình phát triển
                    </h2>
                    <div class="prose prose-slate max-w-none text-slate-600 space-y-6">
                        <p>
                            Được thành lập theo Giấy chứng nhận đăng ký doanh nghiệp số <strong>4500453534</strong>,
                            Công ty Gia Nguyên đã khẳng định vị thế là một trong những đơn vị tư vấn kỹ thuật xây dựng
                            uy tín nhất khu vực Nam Trung Bộ.
                        </p>
                        <p>
                            Với phòng thí nghiệm <strong>LAS-XD 980</strong> được Bộ Xây dựng công nhận và hệ thống quản
                            lý chất lượng đạt chuẩn <strong>ISO/IEC 17025:2017 (VILAS 264)</strong>, chúng tôi cam kết
                            mang lại những kết quả thí nghiệm khách quan, chuẩn xác và kịp thời nhất.
                        </p>
                    </div>
                </div>

                {{-- Grid năng lực --}}
                <div class="grid sm:grid-cols-2 gap-6">
                    <div
                        class="p-8 bg-slate-50 rounded-2xl border border-slate-100 group hover:border-orange transition-all">
                        <i class="fa-solid fa-microscope text-3xl text-orange mb-5"></i>
                        <h4 class="font-bold text-navy uppercase text-lg mb-2">LAS-XD 980</h4>
                        <p class="text-sm text-slate-500">Phòng thí nghiệm chuyên ngành được trang bị máy móc hiện đại,
                            đáp ứng đầy đủ các phép thử vật liệu và nền móng.</p>
                    </div>
                    <div
                        class="p-8 bg-slate-50 rounded-2xl border border-slate-100 group hover:border-orange transition-all">
                        <i class="fa-solid fa-award text-3xl text-orange mb-5"></i>
                        <h4 class="font-bold text-navy uppercase text-lg mb-2">ISO/IEC 17025</h4>
                        <p class="text-sm text-slate-500">Chứng chỉ năng lực thí nghiệm đạt tiêu chuẩn quốc tế, đảm bảo
                            tính pháp lý cao nhất cho mọi hồ sơ hoàn công.</p>
                    </div>
                </div>
            </div>

            {{-- Cột phải: Con số ấn tượng --}}
            <div class="space-y-6">
                <div class="bg-navy rounded-3xl p-10 text-white text-center relative overflow-hidden group">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-orange/10 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-150">
                    </div>
                    <span class="text-5xl font-black text-orange block mb-2">91+</span>
                    <span class="text-xs font-bold uppercase tracking-widest opacity-60">Dự án trọng điểm</span>
                </div>

                <div class="bg-slate-50 rounded-3xl p-8 border border-slate-100">
                    <h4 class="font-bold text-navy uppercase mb-6 text-sm tracking-wider">Lĩnh vực hoạt động</h4>
                    <ul class="space-y-4">
                        @foreach(['Thí nghiệm vật liệu xây dựng', 'Khảo sát địa chất công trình', 'Kiểm định chất lượng công trình', 'Tư vấn giải pháp kỹ thuật'] as $field)
                        <li class="flex items-center gap-3 text-sm text-slate-600 font-medium">
                            <i class="fa-solid fa-check text-orange"></i> {{ $field }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 3. TẦM NHÌN & GIÁ TRỊ CỐT LÕI --}}
<section class="py-24 bg-slate-50">
    <div class="mx-auto max-w-7xl px-5 text-center mb-16">
        <span class="text-orange font-black uppercase tracking-widest text-xs">Giá trị Gia Nguyên</span>
        <h2 class="text-3xl md:text-5xl font-black text-navy uppercase mt-4 italic">Phương châm hoạt động</h2>
    </div>

    <div class="mx-auto max-w-7xl px-5 grid md:grid-cols-4 gap-8">
        @php
        $values = [
        ['Chính xác', 'Cung cấp số liệu trung thực, khách quan tuyệt đối.', 'fa-bullseye'],
        ['An toàn', 'Đảm bảo tiêu chuẩn an toàn kỹ thuật cho công trình.', 'fa-shield-halved'],
        ['Hiệu quả', 'Tối ưu hóa thời gian và chi phí cho đối tác.', 'fa-bolt-lightning'],
        ['Bền vững', 'Góp phần tạo nên những công trình vĩnh cửu.', 'fa-leaf']
        ];
        @endphp
        @foreach($values as $v)
        <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all text-center group">
            <div
                class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-orange transition-colors">
                <i class="fa-solid {{ $v[2] }} text-2xl text-navy group-hover:text-white"></i>
            </div>
            <h4 class="font-black text-navy uppercase mb-3">{{ $v[0] }}</h4>
            <p class="text-xs text-slate-500 leading-relaxed">{{ $v[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- 4. CTA --}}
<section class="py-20 bg-white">
    <div class="mx-auto max-w-5xl px-5 bg-navy rounded-[3rem] p-12 md:p-20 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-orange/20 to-transparent"></div>
        <div class="relative z-10">
            <h2 class="text-3xl md:text-5xl font-black text-white uppercase mb-8">Sẵn sàng đồng hành cùng dự án của bạn
            </h2>
            <p class="text-slate-400 mb-10 max-w-2xl mx-auto">Liên hệ ngay với đội ngũ kỹ sư của Gia Nguyên để nhận tư
                vấn kỹ thuật và báo giá thí nghiệm tốt nhất.</p>
            <div class="flex flex-wrap justify-center gap-6">
                <a href="/lien-he"
                    class="bg-orange text-white px-10 py-4 rounded-full font-black uppercase tracking-widest hover:scale-105 transition-all shadow-lg shadow-orange/30">Hợp
                    tác ngay</a>
                <a href="tel:02593531368"
                    class="bg-white text-navy px-10 py-4 rounded-full font-black uppercase tracking-widest hover:bg-slate-100 transition-all flex items-center gap-3">
                    <i class="fa-solid fa-phone"></i> 0259 353 1368
                </a>
            </div>
        </div>
    </div>
</section>

@endsection