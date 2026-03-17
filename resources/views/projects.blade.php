@extends('layouts.app')

@section('content')
<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="space-y-4">
        <p class="text-sm uppercase tracking-[0.3em] text-black/50">Dự án tiêu biểu</p>
        <h1 class="text-4xl md:text-5xl font-display">Hồ sơ công trình đã thực hiện</h1>
        <p class="text-black/70 max-w-3xl">Dự án được phân nhóm theo loại hình để thuận tiện tra cứu: Cầu/đường cao tốc, nhà máy công nghiệp và khu đô thị - dân cư.</p>
    </div>

    {{-- Khai báo Alpine.js với dữ liệu động --}}
    <div x-data="{ tab: 'bridge', modalOpen: false, modalImage: '', modalName: '' }" 
         class="mt-10 space-y-6" 
         @keydown.escape.window="modalOpen = false">
        
        <div class="flex flex-wrap gap-3">
            <button @click="tab = 'bridge'" :class="tab === 'bridge' ? 'bg-brand text-white' : 'bg-white'" class="rounded-full border border-black/15 px-5 py-2 font-semibold transition">Cầu / Đường cao tốc</button>
            <button @click="tab = 'factory'" :class="tab === 'factory' ? 'bg-brand text-white' : 'bg-white'" class="rounded-full border border-black/15 px-5 py-2 font-semibold transition">Nhà máy công nghiệp</button>
            <button @click="tab = 'urban'" :class="tab === 'urban' ? 'bg-brand text-white' : 'bg-white'" class="rounded-full border border-black/15 px-5 py-2 font-semibold transition">Khu đô thị - dân cư</button>
        </div>

        {{-- Lặp qua 3 danh mục dự án --}}
        @foreach(['bridge', 'factory', 'urban'] as $cat)
            <div x-show="tab === '{{ $cat }}'" x-transition class="grid gap-6 md:grid-cols-2">
                @forelse ($projects->where('category', $cat) as $project)
                    <button
                        type="button"
                        @click="modalOpen = true; modalImage = '{{ asset('images/' . $project->image) }}'; modalName = '{{ $project->title }}'"
                        class="group rounded-3xl border border-black/10 bg-white overflow-hidden shadow-soft text-left transition hover:shadow-lg">
                        
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <img src="{{ asset('images/' . $project->image) }}" 
                                 alt="{{ $project->title }}" 
                                 class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <span class="bg-white/90 text-black px-4 py-2 rounded-full text-sm font-semibold">Xem ảnh lớn</span>
                            </div>
                        </div>

                        <div class="p-5">
                            <h3 class="font-display text-2xl text-ink">{{ $project->title }}</h3>
                            <p class="mt-2 text-sm text-black/60">
                                <i class="fa-solid fa-location-dot mr-1"></i> {{ $project->location }} 
                                <span class="mx-1">·</span> 
                                <i class="fa-solid fa-calendar-days mr-1"></i> {{ $project->year }}
                            </p>
                            <p class="mt-3 text-sm text-black/70 leading-relaxed">{{ $project->summary }}</p>
                        </div>
                    </button>
                @empty
                    <div class="col-span-2 py-12 text-center bg-stone/30 rounded-3xl border border-dashed border-black/10">
                        <p class="text-black/40 italic">Hiện chưa có dữ liệu cho mục này.</p>
                    </div>
                @endforelse
            </div>
        @endforeach

        {{-- Modal xem ảnh lớn (Giữ nguyên logic của bạn) --}}
        <div x-show="modalOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[90] flex items-center justify-center p-4 sm:p-6" 
             style="display: none;">
            
            <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" @click="modalOpen = false"></div>
            
            <div class="relative z-10 w-full max-w-5xl rounded-2xl bg-white p-2 shadow-2xl" @click.stop>
                <button type="button" 
                        class="absolute -top-12 right-0 h-10 w-10 text-white text-4xl hover:text-brand transition"
                        @click="modalOpen = false">&times;</button>
                
                <img :src="modalImage" :alt="modalName" class="max-h-[80vh] w-full rounded-xl object-contain bg-black/5">
                <div class="px-4 py-3 flex justify-between items-center">
                    <p class="font-display text-lg text-ink" x-text="modalName"></p>
                    <span class="text-xs text-black/40 uppercase tracking-widest">Hoàng Gia Việt Nam</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection