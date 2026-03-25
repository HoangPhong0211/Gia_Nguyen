@extends('layouts.app')

@section('content')
<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="space-y-4">
        <p class="text-sm uppercase tracking-[0.3em] text-black/50">Năng lực thực hiện</p>
        <h1 class="text-4xl md:text-5xl font-display uppercase">Dự án tiêu biểu</h1>
        <p class="text-black/70 max-w-3xl">Công ty Gia Nguyên đã thực hiện thí nghiệm và kiểm định cho hơn 91 dự án trọng điểm, đảm bảo chất lượng hạ tầng bền vững.</p>
    </div>

    {{-- Khai báo Alpine.js với dữ liệu dự án Gia Nguyên --}}
    <div x-data="{ 
            tab: 'transport', 
            modalOpen: false, 
            modalImage: '', 
            modalName: '' 
         }" 
         class="mt-10 space-y-6" 
         @keydown.escape.window="modalOpen = false">
        
        <div class="flex flex-wrap gap-3">
    <button @click="tab = 'transport'" 
        :class="tab === 'transport' ? 'bg-navy text-white' : 'bg-white text-navy'" 
        class="rounded-full border border-navy/20 px-6 py-2.5 font-bold uppercase text-[11px] tracking-widest transition-all shadow-sm">
        Giao thông Trọng điểm
    </button>
    
    <button @click="tab = 'energy'" 
        :class="tab === 'energy' ? 'bg-navy text-white' : 'bg-white text-navy'" 
        class="rounded-full border border-navy/20 px-6 py-2.5 font-bold uppercase text-[11px] tracking-widest transition-all shadow-sm">
        Năng lượng & Công nghiệp
    </button>
    
    <button @click="tab = 'civil'" 
        :class="tab === 'civil' ? 'bg-navy text-white' : 'bg-white text-navy'" 
        class="rounded-full border border-navy/20 px-6 py-2.5 font-bold uppercase text-[11px] tracking-widest transition-all shadow-sm">
        Dân dụng & Hạ tầng
    </button>
</div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pt-4">
            
            <template x-if="tab === 'transport'">
                <div class="contents">
                    @php
                        $transportProjects = [
                            ['name' => 'Dự án đường bộ cao tốc Bắc - Nam (Đoạn nối QL1)', 'desc' => 'Thí nghiệm vật liệu & Kiểm định nền móng'],
                            ['name' => 'Đường ven biển Bình Tiên – Cà Ná', 'desc' => 'Thử nghiệm cơ lý đất và bê tông nhựa'],
                            ['name' => 'Đường nối Ninh Thuận đi Tà Năng (Lâm Đồng)', 'desc' => 'Quan trắc và thí nghiệm hiện trường'],
                            ['name' => 'Đường vành đai phía Bắc tỉnh Ninh Thuận', 'desc' => 'Kiểm soát chất lượng vật liệu đầu vào'],
                            ['name' => 'Nâng cấp, mở rộng Quốc lộ 27', 'desc' => 'Thí nghiệm hiện trường & LAS-XD 980'],
                        ];
                    @endphp
                    @foreach($transportProjects as $p)
                        <div class="group relative overflow-hidden rounded-2xl border border-black/5 bg-gray-50 p-6 transition hover:shadow-lg">
                            <h3 class="text-xl font-bold text-ink leading-tight">{{ $p['name'] }}</h3>
                            <p class="mt-2 text-sm text-black/60">{{ $p['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </template>

            <template x-if="tab === 'energy'">
                <div class="contents">
                    @php
                        $energyProjects = [
                            ['name' => 'Điện mặt trời Phước Thái 1 (Dự án EPC)', 'desc' => 'Kiểm định kết cấu và hệ thống móng pin'],
                            ['name' => 'Dự án Điện gió Đầm Nại', 'desc' => 'Thử tải nền đường và móng trụ turbine'],
                            ['name' => 'Nhà máy điện năng lượng mặt trời BIM', 'desc' => 'Thí nghiệm cơ lý vật liệu xây dựng'],
                            ['name' => 'ĐMT Phước Hữu – Ninh Phước', 'desc' => 'Thí nghiệm vật liệu chuyên ngành'],
                            ['name' => 'Nhà máy điện mặt trời Mỹ Sơn 1 & 2', 'desc' => 'Kiểm soát chất lượng thi công hạ tầng'],
                        ];
                    @endphp
                    @foreach($energyProjects as $p)
                        <div class="group relative overflow-hidden rounded-2xl border border-black/5 bg-yellow-50 p-6 transition hover:shadow-lg">
                            <h3 class="text-xl font-bold text-ink leading-tight">{{ $p['name'] }}</h3>
                            <p class="mt-2 text-sm text-black/60">{{ $p['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </template>

            <template x-if="tab === 'civil'">
                <div class="contents">
                    @php
                        $civilProjects = [
                            ['name' => 'Hệ thống thủy lợi Tân Mỹ', 'desc' => 'Thí nghiệm bê tông thủy công & Đất đắp'],
                            ['name' => 'Trụ sở Viện kiểm sát nhân dân tỉnh Ninh Thuận', 'desc' => 'Thử nén mẫu bê tông & Cốt thép'],
                            ['name' => 'Chung cư Phú Thịnh Plaza', 'desc' => 'Kiểm định chất lượng công trình dân dụng'],
                            ['name' => 'Trường THPT Nhơn Hải', 'desc' => 'Thí nghiệm vật liệu xây dựng'],
                            ['name' => 'Hệ thống kênh Chàm', 'desc' => 'Thử nghiệm cơ lý và chất lượng vữa'],
                        ];
                    @endphp
                    @foreach($civilProjects as $p)
                        <div class="group relative overflow-hidden rounded-2xl border border-black/5 bg-blue-50 p-6 transition hover:shadow-lg">
                            <h3 class="text-xl font-bold text-ink leading-tight">{{ $p['name'] }}</h3>
                            <p class="mt-2 text-sm text-black/60">{{ $p['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </template>

        </div>

        {{-- Phần Modal (Nếu bạn muốn dùng ảnh sau này, hãy giữ lại logic này) --}}
        <div x-show="modalOpen" style="display: none;" class="fixed inset-0 z-[90] flex items-center justify-center p-6">
            <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" @click="modalOpen = false"></div>
            <div class="relative z-10 w-full max-w-5xl rounded-2xl bg-white p-2 shadow-2xl">
                <button type="button" class="absolute -top-12 right-0 text-white text-4xl" @click="modalOpen = false">&times;</button>
                <img :src="modalImage" class="max-h-[80vh] w-full rounded-xl object-contain bg-black/5">
                <div class="px-4 py-3"><p class="font-display text-lg text-ink" x-text="modalName"></p></div>
            </div>
        </div>
    </div>
</section>
@endsection