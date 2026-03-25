@extends('layouts.app')

@php
// Dữ liệu Dịch vụ
$featuredServices = [
[
'title' => 'Thí nghiệm Vật liệu',
'desc' => 'Kiểm tra chỉ tiêu cơ lý của Xi măng, cát, đá, gạch, ngói, vữa và bê tông nhựa.',
'icon' => 'fa-vial-flask'
],
[
'title' => 'Địa chất công trình',
'desc' => 'Xác định độ chặt K, thí nghiệm CBR, nén lún và các chỉ tiêu cơ lý đất hiện trường.',
'icon' => 'fa-mountain-sun'
],
[
'title' => 'Kiểm định chất lượng',
'desc' => 'Thử tải nền đường, kiểm định chất lượng bê tông bằng phương pháp không phá hủy.',
'icon' => 'fa-clipboard-check'
],
];

// Dữ liệu Dự án tiêu biểu (Lấy từ DB nếu bạn đã làm phần Admin)
$featuredProjects = \App\Models\Project::latest()->limit(4)->get();

// Dữ liệu Tin tức (Lấy từ DB)
$latestPosts = \App\Models\Post::where('status', 'published')->latest()->limit(3)->get();
@endphp

@section('content')
{{-- 1. HERO BANNER --}}
<section class="relative h-[90vh] flex items-center bg-navy overflow-hidden slant-bottom bg-grid-pattern">
    <div class="absolute inset-0">
        <img src="{{ asset('images/01.png') }}" class="w-full h-full object-cover opacity-30 zoom-in" alt="Gia Nguyễn Banner">
        <div class="absolute inset-0 bg-gradient-to-r from-navy-dark via-navy-dark/80 to-transparent"></div>
    </div>

    <div class="relative z-10 mx-auto max-w-7xl px-6 w-full">
        <div class="max-w-3xl space-y-8 float-in">
            <div class="flex items-center gap-4">
                <div class="h-[2px] w-12 bg-orange"></div>
                <span class="text-orange font-bold uppercase tracking-[0.3em] text-xs">Phòng thí nghiệm LAS-XD
                    980</span>
            </div>
            <h1 class="text-5xl md:text-8xl font-black text-white leading-[1.1] uppercase">
                Chính xác <br><span class="text-orange text-outline">Minh bạch</span>
            </h1>
            <p class="text-lg text-slate-300 max-w-xl leading-relaxed">
                Đơn vị dẫn đầu về kiểm định và địa kỹ thuật tại Ninh Thuận. Chúng tôi đồng hành cùng sự bền vững của mọi
                công trình quốc gia.
            </p>
            <div class="flex flex-wrap gap-5">
                <a href="/dich-vu"
                    class="bg-orange px-10 py-5 text-xs font-black uppercase text-white shadow-2xl hover:bg-orange-hover hover:-translate-y-1 transition-all">Khám
                    phá dịch vụ</a>
                <a href="/lien-he"
                    class="border border-white/30 px-10 py-5 text-xs font-black uppercase text-white hover:bg-white hover:text-navy transition-all">Liên
                    hệ tư vấn</a>
            </div>
        </div>
    </div>
</section>

{{-- 2. GIỚI THIỆU & THỐNG KÊ (NĂNG LỰC) --}}
<section class="py-24 bg-white relative overflow-hidden">
    <div class="mx-auto max-w-7xl px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative group">
                <div class="absolute -top-6 -left-6 w-32 h-32 bg-orange/10 -z-10 rounded-full"></div>
                <img src="/images/01kysu.png" class="rounded-2xl shadow-2xl relative z-10" alt="Nhân sự Gia Nguyễn">
                <div class="absolute -bottom-10 -right-10 bg-navy p-8 text-white hidden md:block z-20 shadow-2xl">
                    <p class="text-orange font-black text-4xl italic">100%</p>
                    <p class="text-[10px] font-bold uppercase tracking-widest mt-1">Đảm bảo tiến độ</p>
                </div>
            </div>

            <div class="space-y-8">
                <div>
                    <span class="text-orange font-bold uppercase tracking-widest text-xs">Về chúng tôi</span>
                    <h2 class="text-3xl md:text-5xl font-black text-navy uppercase mt-4 leading-tight">Năng lực thực thi
                        <br> vượt trội
                    </h2>
                </div>
                <p class="text-slate-600 leading-relaxed italic">
                    "Gia Nguyễn không chỉ cung cấp những con số thí nghiệm, chúng tôi cung cấp sự an tâm tuyệt đối cho
                    chủ đầu tư thông qua quy trình kiểm soát nghiêm ngặt ISO/IEC 17025."
                </p>

                {{-- Grid Thống kê --}}
                <div class="grid grid-cols-2 gap-8 border-t border-slate-100 pt-8">
                    <div>
                        <h4 class="text-4xl font-black text-navy italic">14+</h4>
                        <p class="text-xs font-bold text-slate-400 uppercase mt-2">Năm kinh nghiệm</p>
                    </div>
                    <div>
                        <h4 class="text-4xl font-black text-navy italic">500+</h4>
                        <p class="text-xs font-bold text-slate-400 uppercase mt-2">Dự án hoàn thành</p>
                    </div>
                    <div>
                        <h4 class="text-4xl font-black text-navy italic">30+</h4>
                        <p class="text-xs font-bold text-slate-400 uppercase mt-2">Nhân sự chuyên môn</p>
                    </div>
                    <div>
                        <h4 class="text-4xl font-black text-navy italic">24/7</h4>
                        <p class="text-xs font-bold text-slate-400 uppercase mt-2">Hỗ trợ kỹ thuật</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 3. DỊCH VỤ TRỌNG ĐIỂM --}}
<section class="py-24 bg-light relative">
    <div class="mx-auto max-w-7xl px-6 text-center mb-16">
        <span class="text-orange font-bold uppercase tracking-[0.3em] text-xs">Lĩnh vực hoạt động</span>
        <h2 class="text-3xl md:text-5xl font-black text-navy uppercase mt-4">Dịch vụ trọng điểm</h2>
        <div class="w-20 h-1 bg-orange mx-auto mt-6"></div>
    </div>

    <div class="mx-auto max-w-7xl px-6 grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($featuredServices as $service)
        <div class="group p-12 bg-white hover-lift border border-slate-100 rounded-3xl text-center">
            <div
                class="w-20 h-20 bg-slate-50 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:bg-orange transition-colors duration-500">
                <i
                    class="fa-solid {{ $service['icon'] }} text-3xl text-navy group-hover:text-white transition-colors"></i>
            </div>
            <h3 class="text-xl font-bold text-navy uppercase mb-4">{{ $service['title'] }}</h3>
            <p class="text-sm text-slate-500 leading-relaxed">{{ $service['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- SECTION DỰ ÁN TIÊU BIỂU --}}
<section class="py-24 bg-white">
    <div class="mx-auto max-w-7xl px-6">
        {{-- Tiêu đề và Nút liên kết --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-6">
            <div class="max-w-xl text-left">
                <span class="text-orange font-bold uppercase tracking-widest text-xs">Năng lực thực hiện</span>
                <h2 class="text-3xl md:text-5xl font-black text-navy uppercase mt-4 italic">Dự án tiêu biểu</h2>
            </div>

            <a href="{{ route('client.projects.index') }}" class="group flex items-center gap-3 text-xs font-black uppercase text-navy border-b-2 border-orange pb-2 hover:text-orange transition-all">
                Xem tất cả 91+ dự án
                <i class="fa-solid fa-arrow-right-long transition-transform group-hover:translate-x-2"></i>
            </a>
        </div>

        {{-- Danh sách 4 dự án theo phong cách Trang Dự Án --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($featuredProjects as $project)
            <a href="{{ route('client.projects.show', $project->slug) }}" class="group relative overflow-hidden rounded-2xl border border-slate-100 bg-slate-50 p-8 transition-all hover:shadow-xl hover:-translate-y-2 flex flex-col h-full">
                {{-- Icon hoặc Tag nhỏ --}}
                <div class="mb-6 flex justify-between items-start">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-orange group-hover:bg-orange group-hover:text-white transition-colors">
                        <i class="fa-solid fa-helmet-safety text-xl"></i>
                    </div>
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-400 group-hover:text-orange">LAS-XD 980</span>
                </div>

                {{-- Tên dự án (Quan trọng nhất) --}}
                <h3 class="text-xl font-bold text-navy leading-tight uppercase group-hover:text-orange transition-colors">
                    {{ $project->title }}
                </h3>

                {{-- Mô tả ngắn --}}
                <p class="mt-4 text-sm text-slate-500 leading-relaxed flex-grow">
                    {{ $project->summary }}
                </p>

                {{-- Nút giả xem chi tiết --}}
                <div class="mt-8 pt-6 border-t border-slate-200/60 flex items-center justify-between">
                    <span class="text-[10px] font-black uppercase text-navy">Chi tiết dự án</span>
                    <i class="fa-solid fa-chevron-right text-orange text-xs"></i>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center text-slate-400 italic py-10">Hiện chưa có dự án tiêu biểu.</div>
            @endforelse
        </div>
    </div>
</section>

{{-- 5. TIN TỨC MỚI NHẤT --}}
<section class="py-24 bg-light slant-top">
    <div class="mx-auto max-w-7xl px-6 text-center mb-16">
        <span class="text-orange font-bold uppercase tracking-[0.3em] text-xs">Góc chia sẻ</span>
        <h2 class="text-3xl md:text-5xl font-black text-navy uppercase mt-4">Tin tức & Sự kiện</h2>
    </div>

    <div class="mx-auto max-w-7xl px-6 grid md:grid-cols-3 gap-10">
        @forelse($latestPosts as $post)
        <article class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all">
            <div class="aspect-video overflow-hidden">
                <img src="{{ $post->featured_image ? asset('images/' . $post->featured_image) : asset('images/no-image.jpg') }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                    alt="{{ $post->title }}"
                    onerror="this.src='{{ asset('images/no-image.jpg') }}'">
            </div>
            <div class="p-8">
                <div
                    class="flex items-center gap-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">
                    <span><i
                            class="fa-regular fa-calendar-check mr-2"></i>{{ $post->created_at->format('d/m/Y') }}</span>
                    <span class="text-orange">#TinTuc</span>
                </div>
                <h3
                    class="text-lg font-bold text-navy group-hover:text-orange transition-colors line-clamp-2 uppercase leading-tight">
                    {{ $post->title }}
                </h3>
                <a href="/tin-tuc/{{ $post->slug }}"
                    class="inline-block mt-6 text-[11px] font-black uppercase text-navy group-hover:translate-x-2 transition-transform">Đọc
                    tiếp <i class="fa-solid fa-arrow-right ml-2 text-orange"></i></a>
            </div>
        </article>
        @empty
        <div class="col-span-full text-center text-slate-400 italic py-10">Hiện chưa có tin tức mới.</div>
        @endforelse
    </div>
</section>
@endsection