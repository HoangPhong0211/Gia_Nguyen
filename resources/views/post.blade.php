@extends('layouts.app')

@section('content')
<section class="mx-auto w-full max-w-4xl px-5 py-16">
    <div class="space-y-4">
        <p class="text-sm uppercase tracking-[0.3em] text-black/50">Tin tuc</p>
        <h1 class="text-4xl md:text-5xl font-display">{{ $post->title }}</h1>
        <p class="text-black/60">
            Cap nhat: {{ optional($post->updated_at)->format('d/m/Y') ?? '16/03/2026' }} · {{ $post->views }} luot xem
        </p>
    </div>
    @if ($post->featured_image)
    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="mt-8 aspect-[16/9] w-full rounded-3xl object-cover">
    @else
    <div class="mt-8 aspect-[16/9] rounded-3xl bg-[linear-gradient(120deg,_#f3d3bf,_#f9f2e7)]"></div>
    @endif

    <div class="prose max-w-none mt-10 text-black/70">
        @if ($post->excerpt)
        <p>{{ $post->excerpt }}</p>
        @endif
        <div>{!! nl2br(e($post->content)) !!}</div>
    </div>
</section>
@endsection