@extends('layouts.app')

@section('content')


<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="space-y-4">
        <p class="text-sm uppercase tracking-[0.3em] text-black/50">Dich vu</p>
        <h1 class="text-4xl md:text-5xl font-display">Giai phap chuyen mon toan dien</h1>
        <p class="text-black/70 max-w-2xl">Chung toi dong hanh tu khao sat, thi nghiem den tu van giam sat thi cong, dam bao chat luong cong trinh.</p>
    </div>
    <div class="mt-10 grid gap-6 md:grid-cols-3">
        @forelse ($services as $service)
        <a href="{{ route('services.show', $service->slug) }}" class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft hover:-translate-y-1 transition">
            @if ($service->featured_image)
            <img src="{{ $service->featured_image }}" alt="{{ $service->title }}" class="mb-4 aspect-[4/3] w-full rounded-2xl object-cover">
            @endif
            <div class="h-12 w-12 rounded-2xl bg-[color:var(--color-brand)]/15 grid place-items-center text-brand font-semibold">
                {{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}
            </div>
            <h3 class="mt-4 font-display text-xl">{{ $service->title }}</h3>
            <p class="mt-2 text-sm text-black/60">{{ $service->summary }}</p>
            <span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold">Xem chi tiet →</span>
        </a>
        @empty
        <div class="rounded-3xl border border-black/10 bg-white p-6 text-sm text-black/60">
            Chua co dich vu trong co so du lieu.
        </div>
        @endforelse
    </div>
</section>

<section class="bg-stone">
    <div class="mx-auto w-full max-w-6xl px-5 py-16 grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
        <div>
            <h2 class="text-3xl md:text-4xl font-display">Dich vu linh hoat theo du an</h2>
            <p class="mt-4 text-black/70">Lien he de nhan bao gia, phuong an va lich trinh phu hop voi quy mo cong trinh.</p>
        </div>
        <div class="rounded-3xl bg-white p-6 border border-black/5">
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">Tu van nhanh</p>
            <p class="mt-3 font-display text-2xl">0918 428 273</p>
            <p class="mt-2 text-sm text-black/60">Phan hoi trong 24 gio lam viec.</p>
        </div>
    </div>
</section>
@endsection