@extends('layouts.app')

@section('content')
@php
$title = 'Gioi thieu';
$milestones = [
['year' => '2005', 'text' => 'Thanh lap cong ty va phong thi nghiem tai Ninh Thuan.'],
['year' => '2012', 'text' => 'Mo rong he thong dich vu giam sat va tu van ky thuat.'],
['year' => '2018', 'text' => 'Nang cap phong thi nghiem va quy trinh bao cao.'],
['year' => '2026', 'text' => 'Dong hanh hon 200 du an tai Nam Trung Bo.'],
];
@endphp

<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] items-center">
        <div class="space-y-6">
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">Ve chung toi</p>
            <h1 class="text-4xl md:text-5xl font-display">Cong ty TNHH Nam Mien Trung</h1>
            <p class="text-base md:text-lg text-black/70">
                Don vi hoat dong trong linh vuc thi nghiem, kiem dinh va khao sat xay dung.
                Chung toi ket hop chuyen mon, cong nghe va su tan tam de mang den chat luong ben vung.
            </p>
            <div class="flex flex-wrap gap-6 text-sm text-black/60">
                <span>LAS-XD.371</span>
                <span>20+ nam kinh nghiem</span>
                <span>200+ du an</span>
            </div>
        </div>
        <div class="rounded-[32px] bg-stone p-6 shadow-soft">
            <div class="aspect-[4/3] rounded-3xl bg-[linear-gradient(135deg,_#f3d3bf,_#f9f2e7)] grid place-items-center">
                <div class="text-center space-y-2">
                    <p class="font-display text-2xl">Chung nhan nang luc</p>
                    <p class="text-sm text-black/60">He thong phong thi nghiem dat chuan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-stone">
    <div class="mx-auto w-full max-w-6xl px-5 py-16 grid gap-10 lg:grid-cols-[0.9fr_1.1fr]">
        <div class="space-y-4">
            <h2 class="text-3xl md:text-4xl font-display">Su menh & tam nhin</h2>
            <p class="text-black/70">
                Tro thanh doi tac tin cay trong linh vuc kiem dinh va tu van ky thuat, dam bao chat luong va an toan
                cho moi cong trinh xay dung.
            </p>
            <a href="/lien-he" class="inline-flex items-center justify-center rounded-full bg-brand px-6 py-3 text-white font-semibold">
                Lien he hop tac
            </a>
        </div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div class="rounded-3xl bg-white p-5 border border-black/5">
                <p class="text-xs uppercase tracking-[0.3em] text-black/50">Gia tri</p>
                <p class="mt-2 font-display text-xl">Minh bach va chuan muc</p>
            </div>
            <div class="rounded-3xl bg-white p-5 border border-black/5">
                <p class="text-xs uppercase tracking-[0.3em] text-black/50">Cam ket</p>
                <p class="mt-2 font-display text-xl">Chinh xac va dung tien do</p>
            </div>
            <div class="rounded-3xl bg-white p-5 border border-black/5">
                <p class="text-xs uppercase tracking-[0.3em] text-black/50">Nang luc</p>
                <p class="mt-2 font-display text-xl">Ky su chuyen mon cao</p>
            </div>
            <div class="rounded-3xl bg-white p-5 border border-black/5">
                <p class="text-xs uppercase tracking-[0.3em] text-black/50">Cong nghe</p>
                <p class="mt-2 font-display text-xl">Thiet bi va phong thi nghiem</p>
            </div>
        </div>
    </div>
</section>

<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <h2 class="text-3xl md:text-4xl font-display">Cac moc phat trien</h2>
    <div class="mt-8 grid gap-6 md:grid-cols-2">
        @foreach ($milestones as $milestone)
        <div class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft">
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">{{ $milestone['year'] }}</p>
            <p class="mt-2 text-lg font-display">{{ $milestone['text'] }}</p>
        </div>
        @endforeach
    </div>
</section>
@endsection