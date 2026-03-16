@extends('layouts.app')

@section('content')
@php
$features = [
'Khao sat hien truong va thu thap du lieu',
'Phan tich va danh gia ket qua chuyen mon',
'Bao cao ky thuat ro rang, de hieu',
'De xuat giai phap toi uu cho cong trinh',
];
@endphp

<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
        <div class="space-y-5">
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">Dich vu</p>
            <h1 class="text-4xl md:text-5xl font-display">{{ $service->title }}</h1>
            <p class="text-black/70">{{ $service->summary }}</p>
            <div class="flex flex-wrap gap-4">
                <a href="/lien-he" class="inline-flex items-center justify-center rounded-full bg-brand px-6 py-3 text-white font-semibold">
                    Yeu cau bao gia
                </a>
                <a href="/dich-vu" class="inline-flex items-center justify-center rounded-full border border-black/20 px-6 py-3 font-semibold">
                    Quay lai dich vu
                </a>
            </div>
        </div>
        <div class="rounded-[32px] bg-stone p-6 shadow-soft">
            @if ($service->featured_image)
            <div class="aspect-[4/3] rounded-3xl overflow-hidden">
                <img src="{{ $service->featured_image }}" alt="{{ $service->title }}" class="h-full w-full object-cover">
            </div>
            @else
            <div class="aspect-[4/3] rounded-3xl bg-[linear-gradient(135deg,_#f3d3bf,_#f9f2e7)] grid place-items-center">
                <div class="text-center space-y-2">
                    <p class="font-display text-2xl">Mo ta du an</p>
                    <p class="text-sm text-black/60">Hinh anh minh hoa dich vu</p>
                </div>
            </div>
            @endif
        </div>
    </div>

    @if ($service->description)
    <div class="mt-10 rounded-3xl border border-black/10 bg-white p-6 text-black/70">
        {!! nl2br(e($service->description)) !!}
    </div>
    @endif

    <div class="mt-12 grid gap-6 md:grid-cols-2">
        @foreach ($features as $feature)
        <div class="rounded-3xl border border-black/10 bg-white p-6">
            <h3 class="font-display text-xl">{{ $feature }}</h3>
            <p class="mt-2 text-sm text-black/60">Thong tin chi tiet ve pham vi cong viec va tai lieu lien quan.</p>
        </div>
        @endforeach
    </div>
</section>
@endsection