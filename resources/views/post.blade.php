@extends('layouts.app')

@section('content')
{{-- BREADCRUMB --}}
<div class="bg-slate-50 py-4 border-b border-slate-100">
    <div class="mx-auto max-w-7xl px-5 text-[10px] font-bold uppercase tracking-widest text-slate-400">
        <a href="/" class="hover:text-navy">Trang chủ</a> 
        <span class="mx-2">/</span> 
        <a href="{{ route('news') }}" class="hover:text-navy">Tin tức</a>
        <span class="mx-2 text-orange">/</span> 
        {{-- SỬA: title -> post_title --}}
        <span class="text-navy italic line-clamp-1 inline-block max-w-[200px] align-bottom">{{ $post->post_title }}</span>
    </div>
</div>

<section class="py-16 bg-white">
    <div class="mx-auto max-w-4xl px-5">
        {{-- HEADER --}}
        <div class="mb-12 text-center">
            {{-- SỬA: title -> post_title --}}
            <h1 class="text-3xl md:text-5xl font-black text-navy uppercase leading-tight mb-6">
                {{ $post->post_title }}
            </h1>
            <div class="flex items-center justify-center gap-6 text-slate-400 text-[11px] font-bold uppercase tracking-widest">
                <span><i class="fa-regular fa-calendar-check mr-2 text-orange"></i>{{ $post->created_at->format('d/m/Y') }}</span>
                <span><i class="fa-regular fa-user mr-2 text-orange"></i>Admin Gia Nguyên</span>
            </div>
        </div>

        {{-- FEATURED IMAGE --}}
        {{-- SỬA: featured_image -> post_image --}}
        @if($post->post_image)
        <div class="mb-16 rounded-[2.5rem] overflow-hidden shadow-2xl border-8 border-slate-50">
            <img src="{{ asset('images/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto">
        </div>
        @endif

        {{-- MAIN CONTENT --}}
        <article class="prose prose-slate max-w-none prose-img:rounded-3xl prose-headings:text-navy prose-headings:font-black">
            <div class="content-rich-text leading-relaxed text-slate-600 text-lg">
                {{-- SỬA: content -> post_content --}}
                {!! $post->content !!}
            </div>
        </article>

        {{-- FOOTER --}}
        <div class="mt-20 pt-10 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-6">
            <a href="{{ route('news') }}" class="text-[11px] font-black uppercase text-slate-400 hover:text-orange flex items-center gap-3 transition-all">
                <i class="fa-solid fa-arrow-left-long"></i> Quay lại danh sách tin
            </a>
        </div>
    </div>
</section>

<style>
    .content-rich-text table { width: 100% !important; border-collapse: collapse; margin: 2rem 0; border: 1px solid #e2e8f0; }
    .content-rich-text th, .content-rich-text td { padding: 1rem; border: 1px solid #e2e8f0; font-size: 0.9rem; }
    .content-rich-text th { background: #f8fafc; font-weight: 800; color: #003366; }
</style>
@endsection