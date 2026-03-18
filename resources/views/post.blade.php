@extends('layouts.app')

@section('content')
    <section class="mx-auto w-full max-w-4xl px-5 py-16">
        <div class="space-y-4">
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">Tin tức</p>
            <h1 class="text-4xl md:text-5xl font-display">{{ $post->title }}</h1>
            <p class="text-black/60">
                Cập nhật: {{ optional($post->updated_at)->format('d/m/Y') ?? '16/03/2026' }} · {{ $post->views }} lượt xem
            </p>
        </div>

        @if ($post->featured_image)
            @php
                $img = $post->featured_image;
                // Xử lý đường dẫn: Nếu là URL hoặc đã có 'images/' thì dùng asset(), ngược lại thêm 'images/'
                $src = (str_starts_with($img, 'http') || str_contains($img, 'images/'))
                    ? asset($img)
                    : asset('images/' . $img);
            @endphp
            <img src="{{ $src }}" alt="{{ $post->title }}" class="mt-8 aspect-[16/9] w-full rounded-3xl object-cover shadow-lg"
                onerror="this.onerror=null;this.src='{{ asset('images/main-logo.png') }}';">
        @else
            <div class="mt-8 aspect-[16/9] rounded-3xl bg-[linear-gradient(120deg,_#f3d3bf,_#f9f2e7)]"></div>
        @endif

        <div class="prose max-w-none mt-10 text-black/70 leading-relaxed">
            @if ($post->excerpt)
                <p class="text-lg font-medium text-black/80 mb-6 border-l-4 border-brand pl-4">
                    {{ $post->excerpt }}
                </p>
            @endif

            {{-- Phần nội dung chính --}}
            <div class="content-body">
                {!! nl2br(e($post->content)) !!}
            </div>
        </div>

        <div class="mt-16 pt-8 border-t border-black/5">
            <a href="{{ url('/tin-tuc') }}" class="text-brand font-semibold hover:underline">
                ← Quay lại góc tin tức
            </a>
        </div>
    </section>
@endsection