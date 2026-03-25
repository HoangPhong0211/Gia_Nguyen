@extends('layouts.app')

@section('content')
{{-- 1. HERO SECTION (Đã thêm chia cột để chèn ảnh Banner) --}}
<section class="relative py-24 bg-navy overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-dot-grid"></div>
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-orange/10 rounded-full blur-3xl"></div>

    <div class="mx-auto max-w-7xl px-5 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            {{-- Cột trái: Nội dung chữ (Giống y hệt bản thiết kế của bạn) --}}
            <div class="max-w-2xl">
                <span class="inline-block px-4 py-1.5 bg-orange/10 border border-orange/20 text-orange text-[11px] font-black uppercase tracking-[0.2em] rounded-full mb-6">
                    Phòng thí nghiệm LAS-XD 980
                </span>
                <h1 class="text-5xl md:text-7xl font-black text-white uppercase leading-tight tracking-tight mb-6">
                    Chính xác <br>
                    <span class="text-orange">Minh bạch</span>
                </h1>
                <p class="text-slate-300 text-lg leading-relaxed mb-10 max-w-lg">
                    Đơn vị dẫn đầu về kiểm định và địa kỹ thuật tại Ninh Thuận. Chúng tôi đồng hành cùng sự bền vững của mọi công trình quốc gia.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#" class="px-8 py-4 bg-orange text-white font-bold uppercase text-xs tracking-widest rounded-sm hover:bg-orange/90 transition">Khám phá dịch vụ</a>
                    <a href="#" class="px-8 py-4 border border-white/20 text-white font-bold uppercase text-xs tracking-widest rounded-sm hover:bg-white/10 transition">Liên hệ tư vấn</a>
                </div>
            </div>

            {{-- Cột phải: Khung chứa Ảnh Banner (Chỗ bạn khoanh đỏ) --}}
            <div class="relative w-full aspect-[4/3] lg:aspect-video rounded-3xl overflow-hidden shadow-2xl border border-white/10 group">
                {{-- Sửa lại tên file ảnh của bạn vào đây --}}
                <img src="{{ asset('images/01thi.png') }}"
                    alt="Banner Gia Nguyen"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                    onerror="this.src='https://placehold.co/800x600/1e293b/f97316?text=Anh+Banner'">
            </div>
        </div>
    </div>
</section>

{{-- 2. DANH MỤC DỊCH VỤ TỪ DATABASE --}}
<section class="py-24 bg-white relative">
    <div class="mx-auto max-w-7xl px-5">
        {{-- Thêm mt-12 để chừa khoảng trống phía trên cho các con số trồi lên --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
            @forelse($services as $s)
            {{-- BỎ overflow-hidden để số không bị cắt bởi viền bo tròn --}}
            <div class="group relative p-8 bg-slate-50 border border-slate-100 rounded-[2.5rem] hover:shadow-2xl hover:shadow-navy/10 hover:-translate-y-2 transition-all duration-500 flex flex-col h-full">

                {{-- SỐ THỨ TỰ: Nằm góc trên phải, trồi ra ngoài khung --}}
                <div class="absolute -top-14 -right-2 text-[8rem] font-black text-navy leading-none group-hover:text-orange transition-colors z-20 drop-shadow-sm pointer-events-none">
                    0{{ $loop->iteration }}
                </div>

                {{-- HÌNH ẢNH DỊCH VỤ: Được đẩy xuống một chút (mt-6) để nhường chỗ cho số --}}
                <div class="mb-8 rounded-2xl overflow-hidden h-48 relative z-10 shadow-sm border border-slate-100 mt-6 bg-white">
                    @if(!empty($s->featured_image))
                    <img src="{{ str_starts_with($s->featured_image, '/') ? asset($s->featured_image) : asset('images/' . $s->featured_image) }}"
                        alt="{{ $s->title }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-navy/20 group-hover:bg-orange group-hover:text-white transition-all duration-500">
                        <i class="fa-solid {{ $s->icon ?? 'fa-microscope' }} text-5xl"></i>
                    </div>
                    @endif
                </div>

                {{-- NỘI DUNG --}}
                <div class="flex-grow relative z-10">
                    <h3 class="text-2xl font-black text-navy uppercase mb-5 leading-tight group-hover:text-orange transition-colors tracking-tight">
                        {{ $s->title }}
                    </h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-8 italic line-clamp-3">
                        {{ $s->summary }}
                    </p>

                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center gap-3 text-xs font-bold text-navy/70">
                            <i class="fa-solid fa-check text-orange"></i> Thí nghiệm chỉ tiêu cơ lý
                        </li>
                        <li class="flex items-center gap-3 text-xs font-bold text-navy/70">
                            <i class="fa-solid fa-check text-orange"></i> Kiểm định chất lượng tại hiện trường
                        </li>
                    </ul>
                </div>

                {{-- Button xem chi tiết --}}
                <div class="pt-8 border-t border-slate-200/60 mt-auto relative z-10">
                    <a href="{{ route('client.services.show', $s->slug) }}" class="inline-flex items-center gap-3 text-[12px] font-black uppercase text-navy group-hover:text-orange transition-all tracking-widest">
                        Chi tiết danh mục phép thử
                        <div class="w-10 h-10 rounded-full border border-navy/10 flex items-center justify-center group-hover:border-orange group-hover:translate-x-2 transition-all">
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </div>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center bg-slate-50 rounded-[3rem] border-2 border-dashed border-slate-200">
                <i class="fa-solid fa-microscope text-6xl text-slate-300 mb-6"></i>
                <p class="text-slate-400 font-bold uppercase tracking-widest">Đang cập nhật danh mục phép thử...</p>
            </div>
            @endforelse
        </div>

        @if($services->hasPages())
        <div class="mt-16 flex justify-center">
            {{ $services->links() }}
        </div>
        @endif
    </div>
</section>

{{-- Phần Năng lực pháp lý giữ nguyên như của bạn... --}}
@endsection