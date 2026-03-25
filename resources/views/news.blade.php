@extends('layouts.app')

@section('content')
<section class="py-16 bg-slate-50/50">
    <div class="mx-auto max-w-7xl px-5">

        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
            <p class="text-sm uppercase tracking-[0.3em] text-orange-600 font-bold">Góc chia sẻ</p>
            <h1 class="text-4xl md:text-5xl font-black text-navy uppercase">Tin tức & Sự kiện</h1>
            <p class="text-slate-600 text-lg">Cập nhật các thông tin, sự kiện và kiến thức chuyên môn mới nhất về khảo sát và kiểm định.</p>
        </div>

        @php
        $items = collect($posts->items());
        // Lấy bài đầu tiên làm Nổi bật, đồng thời rút nó ra khỏi mảng $items
        $featured = $items->shift();
        @endphp

        @if(!$featured)
        <div class="flex flex-col items-center justify-center py-20 bg-white rounded-3xl border border-slate-100 shadow-sm">
            <i class="fa-regular fa-newspaper text-6xl text-slate-200 mb-4"></i>
            <p class="text-slate-500 italic text-lg">Hiện tại chưa có bài viết nào.</p>
        </div>
        @else
        <div class="space-y-12">

            <article class="group grid md:grid-cols-2 gap-0 bg-white border border-slate-100 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                <div class="overflow-hidden h-64 md:h-auto relative">
                    <img src="{{ $featured->featured_image ? asset('images/' . $featured->featured_image) : asset('images/no-image.jpg') }}"
                        alt="{{ $featured->title }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        onerror="this.src='{{ asset('images/no-image.jpg') }}'">
                </div>
                <div class="p-8 md:p-12 flex flex-col justify-center">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="px-3 py-1 bg-orange-100 text-orange-600 text-[10px] font-black uppercase tracking-widest rounded-full">Nổi bật</span>
                        <span class="text-xs font-bold text-slate-400"><i class="fa-regular fa-clock mr-1"></i> {{ $featured->created_at->format('d/m/Y') }}</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-black text-navy uppercase mb-4 leading-tight group-hover:text-orange-600 transition-colors">
                        <a href="{{ route('client.posts.show', $featured->slug) }}">{{ $featured->title }}</a>
                    </h2>
                    <p class="text-slate-600 text-base mb-8 line-clamp-3">
                        {{ Str::limit(strip_tags($featured->content), 220) }}
                    </p>
                    <div class="mt-auto">
                        <a href="{{ route('client.posts.show', $featured->slug) }}" class="inline-flex items-center text-sm font-black uppercase text-navy hover:text-orange-600 transition-colors tracking-widest">
                            Đọc tiếp <i class="fa-solid fa-arrow-right-long ml-2"></i>
                        </a>
                    </div>
                </div>
            </article>

            @if($items->isNotEmpty())
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($items as $post)
                <article class="group bg-white border border-slate-100 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                    <div class="overflow-hidden aspect-[4/3]">
                        <img src="{{ $post->featured_image ? asset('images/' . $post->featured_image) : asset('images/no-image.jpg') }}"
                            alt="{{ $post->title }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            onerror="this.src='{{ asset('images/no-image.jpg') }}'">
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-[10px] font-black uppercase tracking-widest text-orange-500">Tin tức</span>
                            <span class="text-[11px] font-bold text-slate-400">{{ $post->created_at->format('d/m/Y') }}</span>
                        </div>
                        <h3 class="mt-2 text-xl font-black text-navy uppercase mb-3 line-clamp-2 group-hover:text-orange-600 transition-colors">
                            <a href="{{ route('client.posts.show', $post->slug) }}">{{ $post->title }}</a>
                        </h3>
                        <p class="text-slate-500 text-sm mb-6 line-clamp-3 flex-1">
                            {{ Str::limit(strip_tags($post->content), 120) }}
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-50">
                            <a href="{{ route('client.posts.show', $post->slug) }}" class="text-[11px] font-black uppercase text-slate-400 group-hover:text-orange-600 transition-colors tracking-widest flex items-center">
                                Xem chi tiết <i class="fa-solid fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
            @endif

        </div>

        @if($posts->hasPages())
        <div class="mt-16 flex justify-center">
            {{ $posts->links() }}
        </div>
        @endif
        @endif
    </div>
</section>
@endsection