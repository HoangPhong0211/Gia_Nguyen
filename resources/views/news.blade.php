@extends('layouts.app')

@section('content')


<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="space-y-4">
        <p class="text-sm uppercase tracking-[0.3em] text-black/50">Goc tin tuc</p>
        <h1 class="text-4xl md:text-5xl font-display">Bai viet moi nhat</h1>
    </div>
    <div class="mt-10 grid gap-6 md:grid-cols-2">
        @forelse ($posts as $post)
        <a href="{{ route('posts.show', $post->slug) }}" class="rounded-3xl border border-black/10 bg-white overflow-hidden shadow-soft">
            @if ($post->featured_image)
            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="aspect-[4/3] w-full object-cover">
            @else
            <div class="aspect-[4/3] bg-[linear-gradient(120deg,_#f3d3bf,_#f9f2e7)]"></div>
            @endif
            <div class="p-6">
                <p class="text-xs uppercase tracking-[0.3em] text-black/50">Tin moi</p>
                <h3 class="mt-2 font-display text-2xl">{{ $post->title }}</h3>
                <p class="mt-2 text-sm text-black/60">
                    {{ \Illuminate\Support\Str::limit(strip_tags($post->excerpt ?: $post->content), 140) }}
                </p>
            </div>
        </a>
        @empty
        <div class="rounded-3xl border border-black/10 bg-white p-6 text-sm text-black/60">
            Chua co bai viet trong co so du lieu.
        </div>
        @endforelse
    </div>
</section>
@endsection