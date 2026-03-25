@extends('layouts.app')

@section('content')
<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="space-y-4">
        <p class="text-sm uppercase tracking-[0.3em] text-black/50">Năng lực thực hiện</p>
        <h1 class="text-4xl md:text-5xl font-display uppercase">Dự án tiêu biểu</h1>
        <p class="text-black/70 max-w-3xl">Công ty Gia Nguyên đã thực hiện thí nghiệm và kiểm định cho hơn 91 dự án trọng điểm, đảm bảo chất lượng hạ tầng bền vững.</p>
    </div>

    {{-- Dự án lấy từ admin (DB) --}}
    <div x-data="{ tab: 'all' }" class="mt-10 space-y-6">
        @php
        $categories = [
        'energy' => 'Lĩnh vực Năng lượng',
        'transport' => 'Hạ tầng Giao thông Trọng điểm',
        'agriculture' => 'Thủy lợi & Nông nghiệp CNC',
        'civil-industrial' => 'Công trình Dân dụng & Công nghiệp',
        ];
        @endphp

        <div class="flex flex-wrap gap-3">
            <button @click="tab = 'all'"
                :class="tab === 'all' ? 'bg-navy text-white' : 'bg-white text-navy'"
                class="rounded-full border border-navy/20 px-6 py-2.5 font-bold uppercase text-[11px] tracking-widest transition-all shadow-sm">
                Tất cả dự án
            </button>

            @foreach($categories as $key => $label)
            <button @click="tab = '{{ $key }}'"
                :class="tab === '{{ $key }}' ? 'bg-navy text-white' : 'bg-white text-navy'"
                class="rounded-full border border-navy/20 px-6 py-2.5 font-bold uppercase text-[11px] tracking-widest transition-all shadow-sm">
                {{ $label }}
            </button>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pt-4">
            @forelse($projects as $project)
            <a href="{{ route('client.projects.show', $project->slug) }}"
                x-show="tab === 'all' || tab === '{{ $project->category }}'"
                class="group relative overflow-hidden rounded-2xl border border-black/5 bg-white p-6 transition hover:shadow-lg">
                <div class="mb-4 overflow-hidden rounded-xl border border-black/5 bg-black/5">
                    <img src="{{ $project->image ? asset('images/' . $project->image) : asset('images/placeholder.jpg') }}"
                        alt="{{ $project->title }}" class="h-40 w-full object-cover">
                </div>
                <h3 class="text-xl font-bold text-ink leading-tight">{{ $project->title }}</h3>
                <p class="mt-2 text-sm text-black/60">{{ $project->summary }}</p>
                <p class="mt-4 text-xs text-black/50">{{ $project->location }} · {{ $project->year }}</p>
            </a>
            @empty
            <div class="col-span-full rounded-2xl border border-black/5 bg-white p-6 text-center text-black/60">
                Chưa có dự án nào.
            </div>
            @endforelse
        </div>
    </div>

    </div>
</section>
@endsection