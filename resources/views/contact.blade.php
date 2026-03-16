@extends('layouts.app')

@section('content')
@php
$title = 'Lien he';
@endphp

<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="grid gap-10 lg:grid-cols-[1fr_0.9fr]">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">Lien he</p>
            <h1 class="text-4xl md:text-5xl font-display">Ket noi voi chung toi</h1>
            <p class="mt-4 text-black/70">Gui yeu cau tu van, chung toi se phan hoi trong 24 gio lam viec.</p>

            <form class="mt-8 grid gap-4">
                <div class="grid gap-4 md:grid-cols-2">
                    <input class="rounded-2xl border border-black/10 bg-white px-4 py-3" placeholder="Ho va ten" type="text" aria-label="Ho va ten">
                    <input class="rounded-2xl border border-black/10 bg-white px-4 py-3" placeholder="So dien thoai" type="tel" aria-label="So dien thoai">
                </div>
                <input class="rounded-2xl border border-black/10 bg-white px-4 py-3" placeholder="Email" type="email" aria-label="Email">
                <textarea class="rounded-2xl border border-black/10 bg-white px-4 py-3" rows="5" placeholder="Noi dung yeu cau" aria-label="Noi dung yeu cau"></textarea>
                <button class="inline-flex items-center justify-center rounded-full bg-brand px-6 py-3 text-white font-semibold" type="submit">
                    Gui yeu cau
                </button>
            </form>
        </div>
        <div class="space-y-6">
            <div class="rounded-3xl bg-stone p-6">
                <h3 class="font-display text-2xl">Thong tin lien he</h3>
                <p class="mt-3 text-sm text-black/70">147 Tran Phu, TP. Phan Rang - Thap Cham</p>
                <p class="text-sm text-black/70">0918 428 273 - 0977 252 330</p>
                <p class="text-sm text-black/70">nammientrungltd@gmail.com</p>
            </div>
            <div class="rounded-3xl bg-[linear-gradient(135deg,_#f3d3bf,_#f9f2e7)] p-6">
                <p class="text-sm uppercase tracking-[0.3em] text-black/50">Ban do</p>
                <div class="mt-4 aspect-[4/3] rounded-2xl bg-white/60 grid place-items-center">
                    <span class="text-black/50 text-sm">Ban do placeholder</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection