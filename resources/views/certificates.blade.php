@extends('layouts.app')

@section('content')
@php
$title = 'Chứng chỉ và năng lực thiết bị';
@endphp

<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="space-y-4 max-w-4xl">
        <p class="text-sm uppercase tracking-[0.3em] text-black/50">Chứng chỉ</p>
        <h1 class="text-4xl md:text-5xl font-display">Chứng chỉ và năng lực thiết bị</h1>
        <p class="text-black/70">Trang này tập hợp các chứng chỉ và minh chứng năng lực liên quan đến thiết bị, quy trình thí nghiệm của Hoàng Gia Việt Nam.</p>
    </div>

    <div class="mt-8 flex flex-wrap gap-3">
        <a href="#xy1" class="rounded-full border border-black/15 bg-white px-5 py-2 font-semibold">Máy khoan XY-1</a>
        <a href="#cpt" class="rounded-full border border-black/15 bg-white px-5 py-2 font-semibold">Thiết bị CPT</a>
    </div>

    <div class="mt-10 space-y-8">
        <article id="xy1" class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft scroll-mt-24">
            <h2 class="text-3xl font-display">Máy khoan XY-1</h2>
            <p class="mt-3 text-black/70">Hồ sơ năng lực và chứng chỉ liên quan đến hoạt động khảo sát địa chất bằng thiết bị XY-1.</p>
            <div class="mt-5 grid gap-4 md:grid-cols-2">
                <img src="/images/66.jpg" alt="Chứng chỉ liên quan máy khoan XY-1" class="rounded-2xl border border-black/10 object-cover">
                <img src="/images/67.jpg" alt="Hồ sơ năng lực máy khoan XY-1" class="rounded-2xl border border-black/10 object-cover">
            </div>
        </article>

        <article id="cpt" class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft scroll-mt-24">
            <h2 class="text-3xl font-display">Thiết bị CPT</h2>
            <p class="mt-3 text-black/70">Hồ sơ năng lực và chứng chỉ liên quan đến thí nghiệm xuyên tĩnh CPT tại hiện trường.</p>
            <div class="mt-5 grid gap-4 md:grid-cols-2">
                <img src="/images/68.jpg" alt="Chứng chỉ liên quan thiết bị CPT" class="rounded-2xl border border-black/10 object-cover">
                <img src="/images/69.jpg" alt="Minh chứng năng lực thiết bị CPT" class="rounded-2xl border border-black/10 object-cover">
            </div>
        </article>
    </div>
</section>
@endsection