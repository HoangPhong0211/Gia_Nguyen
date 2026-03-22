@extends('layouts.app')

@section('content')
    @php
        $title = 'Chứng chỉ hiệu chuẩn thiết bị';
    @endphp

    <section class="mx-auto w-full max-w-6xl px-5 py-16">
        <div class="space-y-4 max-w-4xl">
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">Chứng chỉ</p>
            <h1 class="text-4xl md:text-5xl font-display uppercase">Chứng chỉ hiệu chuẩn thiết bị</h1>
            <p class="text-black/70">Dưới đây là danh sách các giấy chứng nhận hiệu chuẩn thiết bị thí nghiệm của Gia Nguyên (LAS-XD 980), được cập nhật mới nhất từ hệ thống quản lý.</p>
        </div>

        {{-- NÚT BẤM NHẢY LINK (DỮ LIỆU TỪ ADMIN) --}}
        <div class="mt-8 flex flex-wrap gap-3">
            @foreach($certificates as $cert)
                <a href="#{{ $cert->slug }}"
                    class="rounded-full border border-black/15 bg-white px-5 py-2 font-semibold hover:bg-gray-50 transition-colors">
                    {{ $cert->name }}
                </a>
            @endforeach
        </div>

        {{-- NỘI DUNG CHI TIẾT (DỮ LIỆU TỪ ADMIN) --}}
        <div class="mt-10 space-y-8">
            @forelse($certificates as $cert)
                <article id="{{ $cert->slug }}" class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft scroll-mt-24">
                    <h2 class="text-3xl font-display">{{ $cert->name }}</h2>
                    <p class="mt-3 text-black/70">
                        @if($cert->serial_number)
                            Giấy chứng nhận hiệu chuẩn số <strong>{{ $cert->serial_number }}</strong>.
                        @endif
                        Cấp ngày: {{ $cert->issue_date ? $cert->issue_date->format('d/m/Y') : 'Đang cập nhật' }}
                    </p>
                    
                    @if($cert->description)
                        <p class="mt-2 text-sm text-black/50 italic">{{ $cert->description }}</p>
                    @endif

                    <div class="mt-5 grid gap-4 md:grid-cols-2">
                        {{-- Trang 1 --}}
                        <div class="overflow-hidden rounded-2xl border border-black/10">
                            <img src="{{ asset('storage/' . $cert->image_front) }}" 
                                 alt="Trang 1 - {{ $cert->name }}"
                                 class="w-full object-cover hover:scale-105 transition duration-500">
                        </div>

                        {{-- Trang 2 (Nếu có) --}}
                        @if($cert->image_back)
                            <div class="overflow-hidden rounded-2xl border border-black/10">
                                <img src="{{ asset('storage/' . $cert->image_back) }}" 
                                     alt="Trang 2 - {{ $cert->name }}"
                                     class="w-full object-cover hover:scale-105 transition duration-500">
                            </div>
                        @endif
                    </div>
                </article>
            @empty
                <div class="py-20 text-center border-2 border-dashed border-black/10 rounded-3xl">
                    <p class="text-black/40 italic">Chưa có dữ liệu chứng chỉ nào được tải lên.</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- Nút cuộn lên đầu trang (Giữ nguyên của bạn) --}}
    <button id="back-to-top"
        class="fixed bottom-6 right-6 z-50 hidden h-12 w-12 items-center justify-center rounded-full border border-black/20 bg-white/95 text-brand shadow-soft transition hover:-translate-y-0.5 hover:bg-white"
        aria-label="Cuộn lên đầu trang">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd"
                d="M10 3.5a1 1 0 0 1 .707.293l5 5a1 1 0 1 1-1.414 1.414L11 6.914V16a1 1 0 1 1-2 0V6.914L5.707 10.207a1 1 0 1 1-1.414-1.414l5-5A1 1 0 0 1 10 3.5Z"
                clip-rule="evenodd" />
        </svg>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const backToTopButton = document.getElementById('back-to-top');
            if (!backToTopButton) return;

            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    backToTopButton.classList.remove('hidden');
                    backToTopButton.classList.add('flex');
                } else {
                    backToTopButton.classList.remove('flex');
                    backToTopButton.classList.add('hidden');
                }
            });

            backToTopButton.addEventListener('click', function () {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });
    </script>
@endsection