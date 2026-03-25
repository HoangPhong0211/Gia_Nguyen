@extends('layouts.app')

@section('content')
@php
    $title = ($service->title ?? 'Chi tiết dịch vụ') . ' - Gia Nguyên LAS-XD 980';
@endphp

{{-- 1. BREADCRUMB - Thanh điều hướng --}}
<div class="bg-slate-50 py-4 border-b border-slate-100">
    <div class="mx-auto max-w-7xl px-5 text-[10px] font-bold uppercase tracking-widest text-slate-400">
        <a href="/" class="hover:text-navy transition-colors">Trang chủ</a> 
        <span class="mx-2">/</span> 
        <a href="{{ route('client.services.index') }}" class="hover:text-navy transition-colors">Dịch vụ</a>
        <span class="mx-2 text-orange">/</span> 
        <span class="text-navy italic">{{ $service->title }}</span>
    </div>
</div>

<section class="py-20 bg-white">
    <div class="mx-auto max-w-7xl px-5">
        <div class="grid lg:grid-cols-3 gap-12">
            
            {{-- CỘT TRÁI: NỘI DUNG CHI TIẾT (2/3 chiều rộng) --}}
            <div class="lg:col-span-2">
                {{-- TIÊU ĐỀ CHÍNH --}}
                <div class="mb-12">
                    <span class="text-orange font-black uppercase tracking-[0.3em] text-[10px] mb-4 block">Chi tiết năng lực thí nghiệm</span>
                    <h1 class="text-4xl md:text-5xl font-black text-navy uppercase leading-tight mb-8">
                        {{ $service->title }}
                    </h1>
                    <div class="flex flex-wrap gap-4 mb-8">
                        <span class="px-4 py-2 bg-navy text-white text-[10px] font-bold rounded-lg uppercase tracking-wider">Mã số: LAS-XD 980</span>
                        <span class="px-4 py-2 bg-slate-100 text-navy text-[10px] font-bold rounded-lg uppercase tracking-wider border border-slate-200">Chuẩn ISO/IEC 17025:2017</span>
                    </div>
                    <p class="text-slate-500 text-lg leading-relaxed italic border-l-4 border-orange pl-6 bg-slate-50 py-6 rounded-r-2xl">
                        {{ $service->summary }}
                    </p>
                </div>

                {{-- THÊM HÌNH ẢNH ĐẠI DIỆN DỊCH VỤ Ở ĐÂY --}}
                @if(!empty($service->featured_image))
                    <div class="mb-12 rounded-[2rem] overflow-hidden shadow-lg border-4 border-slate-50 relative z-10">
                        <img src="{{ str_starts_with($service->featured_image, '/') ? asset($service->featured_image) : asset('images/' . $service->featured_image) }}" 
                             alt="{{ $service->title }}" 
                             class="w-full max-h-[450px] object-cover hover:scale-105 transition-transform duration-700">
                    </div>
                @endif

                {{-- NỘI DUNG CHÍNH (BẢNG PHÉP THỬ) --}}
                <article class="prose prose-slate max-w-none prose-img:rounded-3xl">
                    <h3 class="text-navy font-black uppercase tracking-tight flex items-center gap-3 mb-6">
                        <i class="fa-solid fa-list-check text-orange"></i>
                        Danh mục các phép thử được công nhận
                    </h3>
                    
                    <div class="content-rich-text">
                        {{-- Đây là nơi hiển thị nội dung bạn dán từ PDF vào Admin --}}
                        {!! $service->description !!}
                    </div>
                </article>

                {{-- CAM KẾT KỸ THUẬT --}}
                <div class="mt-16 p-8 bg-orange/5 rounded-[2rem] border border-orange/10">
                    <h4 class="text-navy font-black uppercase text-sm mb-4">Ghi chú kỹ thuật:</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Tất cả các phép thử trên đều được thực hiện bởi đội ngũ kỹ thuật viên giàu kinh nghiệm, sử dụng thiết bị đã được hiệu chuẩn định kỳ. Kết quả thí nghiệm được trích xuất trung thực, phục vụ đắc lực cho công tác nghiệm thu và quản lý chất lượng công trình theo quy định hiện hành.
                    </p>
                </div>
            </div>

            {{-- CỘT PHẢI: SIDEBAR HỖ TRỢ (1/3 chiều rộng) --}}
            <div class="space-y-8">
                {{-- BOX LIÊN HỆ NHANH --}}
                <div class="bg-navy rounded-[2.5rem] p-10 text-white shadow-2xl relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-orange/20 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-150 duration-700"></div>
                    
                    <h4 class="text-orange font-black uppercase text-xs tracking-[0.2em] mb-6 relative">Tư vấn kỹ thuật</h4>
                    <p class="text-slate-400 text-sm mb-10 relative leading-relaxed">Bạn cần báo giá chi tiết cho các phép thử này hoặc cần tư vấn về tiêu chuẩn kỹ thuật?</p>
                    
                    <div class="space-y-4 relative">
                        <a href="tel:02593531368" class="flex items-center gap-4 bg-orange hover:bg-white hover:text-navy p-5 rounded-2xl font-black uppercase text-[11px] tracking-widest transition-all w-full justify-center shadow-lg shadow-orange/20">
                            <i class="fa-solid fa-phone-volume text-lg"></i>
                            0259.353.1368
                        </a>
                        <a href="{{ route('client.contact.index') }}" class="flex items-center gap-4 bg-white/10 hover:bg-white/20 p-5 rounded-2xl font-black uppercase text-[11px] tracking-widest transition-all w-full justify-center border border-white/10">
                            <i class="fa-solid fa-paper-plane"></i>
                            Gửi yêu cầu báo giá
                        </a>
                    </div>
                </div>

                {{-- BOX DỊCH VỤ KHÁC --}}
                <div class="p-8 bg-slate-50 rounded-[2.5rem] border border-slate-100">
                    <h4 class="text-navy font-black uppercase text-xs tracking-[0.2em] mb-6">Năng lực liên quan</h4>
                    <div class="space-y-4">
                        {{-- Hiển thị một vài dịch vụ khác để giữ chân người dùng --}}
                        @foreach(\App\Models\Service::where('id', '!=', $service->id)->limit(3)->get() as $other)
                        <a href="{{ route('client.services.show', $other->slug) }}" class="group flex items-center gap-4 p-3 hover:bg-white rounded-xl transition-all">
                            <div class="w-10 h-10 bg-white group-hover:bg-orange rounded-lg flex items-center justify-center text-navy group-hover:text-white shadow-sm transition-colors">
                                <i class="fa-solid {{ $other->icon ?? 'fa-vial' }} text-xs"></i>
                            </div>
                            <span class="text-xs font-bold text-navy uppercase group-hover:text-orange transition-colors">{{ $other->title }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- CSS BỔ TRỢ ĐỂ ĐỊNH DẠNG BẢNG TỪ PDF --}}
<style>
    .content-rich-text table {
        width: 100% !important;
        border-collapse: collapse;
        margin: 2rem 0;
        border-radius: 1rem;
        overflow: hidden;
        border: 1px solid #e2e8f0;
    }
    .content-rich-text th {
        background: #003366; /* Màu Navy Gia Nguyên */
        color: white;
        padding: 1.25rem;
        font-weight: 900;
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 0.1em;
        text-align: left;
    }
    .content-rich-text td {
        padding: 1rem 1.25rem;
        border-bottom: 1px solid #f1f5f9;
        font-size: 0.85rem;
        color: #475569;
        line-height: 1.6;
    }
    .content-rich-text tr:nth-child(even) {
        background-color: #f8fafc;
    }
    .content-rich-text tr:hover {
        background-color: #f1f5f9;
    }
</style>
@endsection