<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Gia Nguyên - LAS-XD 980' }}</title>

    {{-- 1. FONTS & ICONS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-ink antialiased">
    
    {{-- 2. TOPBAR --}}
    <div class="bg-navy text-white py-2 hidden md:block">
        <div class="mx-auto max-w-7xl px-5 flex justify-between text-xs font-bold uppercase tracking-widest">
            <div class="flex gap-6">
                <a href="tel:02593531368" class="hover:text-orange transition-colors flex items-center">
                    <i class="fa-solid fa-phone text-orange mr-2 text-[13px]"></i> 0259 353 1368
                </a>
                <a href="mailto:gianguyen.nt@gmail.com" class="hover:text-orange transition-colors flex items-center">
                    <i class="fa-solid fa-envelope text-orange mr-2 text-[13px]"></i> gianguyen.nt@gmail.com
                </a>
            </div>
            <div class="flex gap-4">
                <span class="flex items-center gap-2"><i class="fa-solid fa-certificate text-orange"></i> LAS-XD 980</span>
                <span>ISO/IEC 17025</span>
            </div>
        </div>
    </div>

    {{-- 3. MAIN HEADER --}}
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-lg border-b border-slate-100">
        <div class="mx-auto max-w-7xl px-5 py-4 flex justify-between items-center">
            {{-- Logo --}}
            <a href="/" class="flex items-center gap-3 group">
                <div class="bg-navy p-2.5 rounded-lg transform group-hover:rotate-6 transition-all duration-300 shadow-lg shadow-navy/20">
                    <span class="text-orange font-black text-2xl italic">GN</span>
                </div>
                <div>
                    <h1 class="text-navy font-black text-xl leading-none uppercase tracking-tighter">Gia Nguyên</h1>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-[0.2em] mt-1">Kiểm định & Địa kỹ thuật</p>
                </div>
            </a>

            {{-- Nav Menu (ĐÃ THÊM TIN TỨC) --}}
            <nav class="hidden lg:flex items-center gap-7">
                @php 
                    $navItems = [
                        ['Trang chủ', '/'],
                        ['Giới thiệu', '/gioi-thieu'],
                        ['Dịch vụ', '/dich-vu'],
                        ['Dự án', '/du-an'],
                        ['Tin tức', '/tin-tuc'], 
                        ['Chứng chỉ', '/chung-chi']
                    ]; 
                @endphp
                @foreach($navItems as $item)
                    <a href="{{ $item[1] }}" class="text-[13px] font-bold uppercase tracking-wider text-navy/70 hover:text-orange transition-all relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-0.5 after:bg-orange hover:after:w-full after:transition-all">
                        {{ $item[0] }}
                    </a>
                @endforeach
                
                <a href="/lien-he" class="bg-orange text-white px-7 py-3 rounded-full text-[12px] font-black uppercase shadow-lg shadow-orange/30 hover:shadow-orange/50 hover:-translate-y-0.5 transition-all">
                    Liên hệ ngay
                </a>
            </nav>
        </div>
    </header>

    {{-- 4. MAIN CONTENT --}}
    <main id="main-content" class="min-h-screen">
        @yield('content')
    </main>

    {{-- 5. FOOTER --}}
    <footer class="bg-navy text-white relative mt-20 slant-top pt-32 pb-12 overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-dot-grid opacity-10"></div>
        
        <div class="mx-auto max-w-7xl px-5">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="bg-white p-2 rounded-md"><span class="text-navy font-black text-xl italic">GN</span></div>
                        <span class="font-black text-xl uppercase tracking-tighter">Gia Nguyên</span>
                    </div>
                    <p class="text-white/50 text-sm leading-relaxed">
                        Chất lượng khẳng định - Công trình bền vững. Đơn vị hàng đầu về thí nghiệm chuyên ngành LAS-XD 980 tại Ninh Thuận.
                    </p>
                    <div class="flex gap-4 pt-2">
                        <a href="#" class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center hover:bg-orange hover:border-orange transition-all"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center hover:bg-orange hover:border-orange transition-all"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>

                <div class="space-y-6">
                    <h4 class="text-lg font-bold uppercase tracking-widest text-orange">Dịch vụ</h4>
                    <ul class="space-y-3.5 text-sm text-white/60">
                        <li><a href="/dich-vu#vat-lieu" class="hover:text-white transition-colors">Thí nghiệm vật liệu xây dựng</a></li>
                        <li><a href="/dich-vu#dia-chat" class="hover:text-white transition-colors">Khảo sát địa chất công trình</a></li>
                        <li><a href="/dich-vu#kiem-dinh" class="hover:text-white transition-colors">Kiểm định chất lượng công trình</a></li>
                        <li><a href="/tin-tuc" class="hover:text-white transition-colors">Tin tức & Công nghệ xây dựng</a></li>
                    </ul>
                </div>

                <div class="lg:col-span-2 space-y-6">
                    <h4 class="text-lg font-bold uppercase tracking-widest text-orange">Thông tin liên hệ</h4>
                    <div class="grid sm:grid-cols-2 gap-x-10 gap-y-6 text-sm text-white/60">
                        <div class="space-y-4">
                            <p class="flex items-start gap-3">
                                <i class="fa-solid fa-location-dot text-orange mt-1"></i>
                                <span>Khu tái định cư Tháp Chàm, KP7, P. Bảo An, TP. Phan Rang-Tháp Chàm</span>
                            </p>
                            <p class="flex items-center gap-3">
                                <i class="fa-solid fa-phone text-orange"></i>
                                <span>0259 353 1368</span>
                            </p>
                        </div>
                        <div class="space-y-4">
                            <p class="flex items-center gap-3">
                                <i class="fa-solid fa-envelope text-orange"></i>
                                <span>gianguyen.nt@gmail.com</span>
                            </p>
                            <p class="flex items-center gap-3">
                                <i class="fa-solid fa-clock text-orange"></i>
                                <span>Thứ 2 - Thứ 7: 07:30 - 17:00</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/5 pt-8 flex flex-col md:row justify-between items-center gap-4 text-[11px] font-bold uppercase text-white/30 tracking-widest">
                <p>© {{ date('Y') }} GIA NGUYEN CO., LTD. ALL RIGHTS RESERVED.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-orange">Chính sách bảo mật</a>
                    <a href="#" class="hover:text-orange">Điều khoản dịch vụ</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>