@extends('layouts.app')

@section('content')
{{-- BREADCRUMB --}}
<div class="bg-slate-50 py-4 border-b border-slate-100">
    <div class="mx-auto max-w-7xl px-5 text-[10px] font-bold uppercase tracking-widest text-slate-400">
        <a href="/" class="hover:text-navy">Trang chủ</a>
        <span class="mx-2">/</span>
        <a href="{{ route('client.posts.index') }}" class="hover:text-navy">Tin tức</a>
        <span class="mx-2 text-orange">/</span>
        <span class="text-navy italic line-clamp-1 inline-block max-w-[200px] align-bottom">{{ $post->title }}</span>
    </div>
</div>

<section class="py-16 bg-white">
    <div class="mx-auto max-w-4xl px-5">
        {{-- HEADER --}}
        <div class="mb-12 text-center">
            <h1 class="text-3xl md:text-5xl font-black text-navy uppercase leading-tight mb-6">
                {{ $post->title }}
            </h1>
            <div class="flex items-center justify-center gap-6 text-slate-400 text-[11px] font-bold uppercase tracking-widest">
                <span><i class="fa-regular fa-calendar-check mr-2 text-orange"></i>{{ $post->created_at->format('d/m/Y') }}</span>
                <span><i class="fa-regular fa-user mr-2 text-orange"></i>Admin Gia Nguyên</span>
            </div>
        </div>

        {{-- FEATURED IMAGE --}}
        @if($post->featured_image)
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
            <a href="{{ route('client.posts.index') }}" class="text-[11px] font-black uppercase text-slate-400 hover:text-orange flex items-center gap-3 transition-all">
                <i class="fa-solid fa-arrow-left-long"></i> Quay lại danh sách tin
            </a>
        </div>
    </div>
</section>

<style>
    .content-rich-text {
        font-size: 1.05rem;
        line-height: 1.85;
        color: #475569;
    }

    .content-rich-text h1,
    .content-rich-text h2,
    .content-rich-text h3,
    .content-rich-text h4,
    .content-rich-text h5,
    .content-rich-text h6 {
        color: #003366;
        font-weight: 800;
        margin: 2.2rem 0 1rem;
        line-height: 1.3;
    }

    .content-rich-text p {
        margin: 0 0 1.2rem;
    }

    .content-rich-text ul,
    .content-rich-text ol {
        margin: 0 0 1.4rem 1.4rem;
        padding-left: 1.2rem;
        list-style-position: outside;
    }

    .content-rich-text ul {
        list-style: disc;
    }

    .content-rich-text ol {
        list-style: decimal;
    }

    .content-rich-text li {
        margin: 0.3rem 0;
    }

    .content-rich-text figure.image {
        margin: 2rem 0;
    }

    .content-rich-text figure.image img {
        border-radius: 1.5rem;
        width: 100%;
        height: auto;
    }

    .content-rich-text figure.table {
        margin: 2rem 0;
    }

    .content-rich-text table {
        width: 100% !important;
        border-collapse: collapse;
        margin: 2rem 0;
        border: 1px solid #e2e8f0;
    }

    .content-rich-text th,
    .content-rich-text td {
        padding: 1rem;
        border: 1px solid #e2e8f0;
        font-size: 0.9rem;
    }

    .content-rich-text th {
        background: #f8fafc;
        font-weight: 800;
        color: #003366;
    }

    .content-rich-text a {
        color: #f97316;
        font-weight: 700;
        text-decoration: underline;
        text-underline-offset: 3px;
    }

    .content-rich-text blockquote {
        border-left: 4px solid #f97316;
        padding-left: 1.2rem;
        margin: 1.6rem 0;
        color: #64748b;
        font-style: italic;
    }

    .content-rich-text .text-align-left {
        text-align: left;
    }

    .content-rich-text .text-align-center {
        text-align: center;
    }

    .content-rich-text .text-align-right {
        text-align: right;
    }

    .content-rich-text .text-align-justify {
        text-align: justify;
    }
</style>
@endsection