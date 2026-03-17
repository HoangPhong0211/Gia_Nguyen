@extends('layouts.app')

@section('content')
<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="space-y-4">
        <p class="text-sm uppercase tracking-[0.3em] text-black/50">Góc tin tức</p>
        <h1 class="text-4xl md:text-5xl font-display">Bài viết mới nhất</h1>
        <p class="text-black/70 max-w-3xl">Nội dung nên được bổ sung theo 3 nhóm chính: Báo giá, kiến thức chuyên ngành và hoạt động công ty.</p>
    </div>

    <div class="mt-8 grid gap-4 md:grid-cols-3">
        @foreach ([
            'Báo giá dịch vụ khảo sát - thí nghiệm',
            'Kiến thức chuyên ngành địa kỹ thuật',
            'Hoạt động công ty và dự án mới',
        ] as $topic)
        <div class="rounded-2xl border border-black/10 bg-white p-5">
            <p class="font-semibold">{{ $topic }}</p>
            <p class="mt-2 text-sm text-black/60">Bạn có thể đăng định kỳ theo tháng để giữ website luôn tươi mới.</p>
        </div>
        @endforeach
    </div>

    <div class="mt-10 grid gap-6 md:grid-cols-2">
        @forelse ($posts as $post)
        <a href="{{ route('posts.show', $post->slug) }}" class="rounded-3xl border border-black/10 bg-white overflow-hidden shadow-soft">
            {{-- SỬA PHẦN HIỂN THỊ ẢNH TẠI ĐÂY --}}
            @if ($post->featured_image)
                @php
                    $img = $post->featured_image;
                    // Kiểm tra nếu là URL (http) thì giữ nguyên, nếu là tên file thì thêm /images/
                    $imagePath = (str_starts_with($img, 'http')) ? $img : asset('images/' . $img);
                @endphp
                <img src="{{ $imagePath }}" 
                     alt="{{ $post->title }}" 
                     class="aspect-[4/3] w-full object-cover"
                     onerror="this.onerror=null;this.src='{{ asset('images/main-logo.png') }}';">
            @else
                <div class="aspect-[4/3] bg-[linear-gradient(120deg,_#f3d3bf,_#f9f2e7)]"></div>
            @endif

            <div class="p-6">
                <p class="text-xs uppercase tracking-[0.3em] text-black/50">Tin mới</p>
                <h3 class="mt-2 font-display text-2xl">{{ $post->title }}</h3>
                <p class="mt-2 text-sm text-black/60">
                    {{ \Illuminate\Support\Str::limit(strip_tags($post->excerpt ?: $post->content), 140) }}
                </p>
            </div>
        </a>
        @empty
        <div class="rounded-3xl border border-black/10 bg-white p-6 text-sm text-black/60 col-span-2 text-center">
            Chưa có bài viết trong cơ sở dữ liệu.
        </div>
        @endforelse
    </div>
</section>
@endsection