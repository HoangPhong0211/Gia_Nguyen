@extends('layouts.app')

@section('content')
{{-- 1. HERO SECTION --}}
<section class="relative py-20 bg-navy overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="mx-auto max-w-7xl px-5 text-center relative z-10">
        <span class="inline-block px-4 py-1.5 bg-orange/10 border border-orange/20 text-orange text-[11px] font-black uppercase tracking-[0.2em] rounded-full mb-6">
            Năng lực pháp lý & Quản lý chất lượng
        </span>
        <h1 class="text-4xl md:text-6xl font-black text-white uppercase leading-tight tracking-tight">
            Chứng chỉ <span class="text-orange">&</span> Giấy phép
        </h1>
        <p class="mt-6 text-slate-400 text-lg max-w-2xl mx-auto leading-relaxed">
            Hệ thống văn bằng, chứng chỉ công nhận năng lực thí nghiệm chuyên ngành xây dựng mã số LAS-XD 980 của Gia Nguyên.
        </p>
    </div>
</section>

{{-- 2. GRID DANH SÁCH CHỨNG CHỈ --}}
<section class="py-24 bg-white">
    <div class="mx-auto max-w-7xl px-5">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse ($certificates as $cert)
                <article class="group bg-white rounded-[2.5rem] p-5 border border-slate-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">
                    {{-- Khung ảnh chứng chỉ (Khổ đứng A4) --}}
                    <div class="relative aspect-[3/4] overflow-hidden rounded-[1.8rem] bg-slate-50 border border-slate-200">
                        <img src="{{ asset($cert->image ?? 'images/no-image.jpg') }}" 
                             alt="{{ $cert->name }}" 
                             class="w-full h-full object-contain p-2 group-hover:scale-105 transition-transform duration-700">
                        
                        {{-- Overlay khi hover --}}
                        <div class="absolute inset-0 bg-navy/80 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 backdrop-blur-sm">
                            <a href="{{ asset($cert->image) }}" target="_blank" class="w-14 h-14 bg-orange text-white flex items-center justify-center rounded-full shadow-lg hover:scale-110 transition-transform mb-4">
                                <i class="fa-solid fa-expand text-xl"></i>
                            </a>
                            <span class="text-[10px] font-black text-white uppercase tracking-widest">Phóng to ảnh</span>
                        </div>
                    </div>

                    {{-- Thông tin chứng chỉ --}}
                    <div class="mt-8 px-2">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="h-[2px] w-6 bg-orange"></span>
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                {{ $cert->created_at->format('Y') }}
                            </span>
                        </div>
                        <h3 class="text-base font-black text-navy uppercase leading-tight group-hover:text-orange transition-colors line-clamp-2 min-h-[3rem]">
                            {{ $cert->name }}
                        </h3>
                        
                        @if($cert->description)
                        <div class="mt-4 pt-4 border-t border-slate-50 text-[13px] text-slate-500 line-clamp-2 italic">
                            {!! strip_tags($cert->description) !!}
                        </div>
                        @endif
                    </div>
                </article>
            @empty
                <div class="col-span-full py-24 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-50 rounded-full mb-6">
                        <i class="fa-solid fa-file-signature text-slate-300 text-3xl"></i>
                    </div>
                    <p class="text-slate-400 italic font-bold uppercase tracking-widest">
                        Dữ liệu chứng chỉ đang được cập nhật...
                    </p>
                </div>
            @endforelse
        </div>

        {{-- 3. THANH PHÂN TRANG --}}
        <div class="mt-20 flex justify-center">
            <div class="pagination-custom">
                {{ $certificates->links() }}
            </div>
        </div>
    </div>
</section>

{{-- 4. CSS BỔ TRỢ ĐỂ NÚT PHÂN TRANG KHÔNG BỊ TO --}}
<style>
    .pagination-custom svg {
        width: 1.5rem;
        display: inline;
    }
    .pagination-custom nav div:first-child {
        display: none;
    }
    .pagination-custom nav div:last-child {
        box-shadow: none !important;
    }
    .pagination-custom span, .pagination-custom a {
        border-radius: 0.75rem !important;
        margin: 0 4px;
        font-weight: 800;
        text-transform: uppercase;
        font-size: 0.75rem;
    }
</style>
@endsection