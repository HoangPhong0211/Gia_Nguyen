@extends('layouts.app')

@section('content')
@php
$title = 'Chinh sach bao mat';
@endphp

<section class="mx-auto w-full max-w-4xl px-5 py-16">
    <div class="space-y-4">
        <p class="text-sm uppercase tracking-[0.3em] text-black/50">Thong tin</p>
        <h1 class="text-4xl md:text-5xl font-display">Chinh sach bao mat</h1>
        <p class="text-black/70">Noi dung chinh sach bao mat mau, co the cap nhat theo quy dinh thuc te.</p>
    </div>
    <div class="prose max-w-none mt-10 text-black/70">
        <h2>Thu thap du lieu</h2>
        <p>Chung toi thu thap thong tin can thiet de ho tro dich vu va lien he khach hang.</p>
        <h2>Su dung thong tin</h2>
        <p>Thong tin chi duoc su dung cho muc dich tu van, bao gia va cham soc khach hang.</p>
        <h2>Bao mat</h2>
        <p>Chung toi cam ket bao mat thong tin va khong chia se cho ben thu ba.</p>
    </div>
</section>
@endsection