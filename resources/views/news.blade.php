@extends('layouts.app')

@section('content')
<section class="py-16 bg-white">
    <div class="mx-auto max-w-7xl px-5">
        <div class="grid md:grid-cols-3 gap-8">
            @forelse ($posts as $post)
                <article class="border border-slate-100 rounded-[2rem] overflow-hidden hover:shadow-xl transition-all">
                    <img src="{{ asset('images/' . $post->featured_image) ?? 'images/no-image.jpg' }}" class="w-full aspect-video object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-navy uppercase mb-3 line-clamp-2">{{ $post->title }}</h3>
                        <p class="text-slate-500 text-sm mb-6 line-clamp-2">
                            {{ Str::limit(strip_tags($post->content), 100) }}
                        </p>
                        {{-- CHÚ Ý DÒNG NÀY: Tên route phải khớp với web.php --}}
                        <a href="{{ route('posts.show', $post->slug) }}" class="text-[10px] font-black uppercase text-orange tracking-widest">
                            Xem chi tiết <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-20 text-slate-400 italic">
                    Chưa có bài viết nào.
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection