@extends('layouts.app')

@section('content')
    {{-- 1. HERO SECTION --}}
    <section class="relative py-24 bg-navy overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-dot-grid"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-orange/10 rounded-full blur-3xl"></div>

        <div class="mx-auto max-w-7xl px-5 relative z-10">
            <div class="max-w-3xl">
                <span
                    class="inline-block px-4 py-1.5 bg-orange/10 border border-orange/20 text-orange text-[11px] font-black uppercase tracking-[0.2em] rounded-full mb-6">
                    Phòng thí nghiệm LAS-XD 980
                </span>
                <h1 class="text-4xl md:text-6xl font-black text-white uppercase leading-tight tracking-normal mb-8">
                    Năng lực <span class="text-orange italic">Thí nghiệm & Kiểm định</span>
                </h1>
                <p
                    class="text-slate-400 text-lg leading-relaxed border-l-4 border-orange pl-6 bg-white/5 py-4 rounded-r-2xl">
                    Được công nhận bởi Bộ Xây dựng và đạt chuẩn quốc tế <strong>ISO/IEC 17025:2017</strong>, Gia Nguyên cung
                    cấp kết quả chính xác, khách quan phục vụ mọi công trình.
                </p>
            </div>
        </div>
    </section>

    {{-- 2. DANH MỤC DỊCH VỤ TỪ DATABASE --}}
    <section class="py-24 bg-white relative">
        <div class="mx-auto max-w-7xl px-5">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($services as $s)
                    <div
                        class="group relative p-10 bg-slate-50 border border-slate-100 rounded-[2.5rem] hover:bg-white hover:shadow-2xl hover:shadow-navy/10 hover:-translate-y-2 transition-all duration-500 flex flex-col h-full overflow-hidden">
                        {{-- Họa tiết số thứ tự mờ --}}
                        <span
                            class="absolute -top-4 -right-2 text-8xl font-black text-navy/5 group-hover:text-orange/5 transition-colors">0{{ $loop->iteration }}</span>

                        {{-- Họa tiết số thứ tự mờ --}}
                        <span class="absolute -top-4 -right-2 text-8xl font-black text-navy/5 group-hover:text-orange/5 transition-colors">0{{ $loop->iteration }}</span>

                        {{-- HÌNH ẢNH DỊCH VỤ VÀ ICON --}}
                        @if(!empty($s->featured_image))
                            <div class="mb-8 rounded-2xl overflow-hidden h-48 relative z-10 shadow-sm border border-slate-100">
                                <img src="{{ str_starts_with($s->featured_image, '/') ? asset($s->featured_image) : asset('images/' . $s->featured_image) }}" 
                                     alt="{{ $s->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                        @else
                            {{-- Icon chuyên ngành (dùng khi chưa có ảnh) --}}
                            <div class="w-20 h-20 bg-white rounded-2xl flex items-center justify-center text-navy shadow-sm group-hover:bg-orange group-hover:text-white transition-all duration-500 mb-10 relative z-10">
                                <i class="fa-solid {{ $s->icon ?? 'fa-microscope' }} text-3xl"></i>
                            </div>
                        @endif

                        {{-- Nội dung --}}
                        <div class="flex-grow relative z-10">
                            <h3
                                class="text-2xl font-black text-navy uppercase mb-5 leading-tight group-hover:text-orange transition-colors tracking-tight">
                                {{ $s->title }}
                            </h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-8 italic">
                                {{ $s->summary }}
                            </p>

                            {{-- Một vài phép thử tiêu biểu (Lấy từ PDF) --}}
                            <ul class="space-y-3 mb-10">
                                <li class="flex items-center gap-3 text-xs font-bold text-navy/70">
                                    <i class="fa-solid fa-check text-orange"></i> Thí nghiệm chỉ tiêu cơ lý
                                </li>
                                <li class="flex items-center gap-3 text-xs font-bold text-navy/70">
                                    <i class="fa-solid fa-check text-orange"></i> Kiểm định chất lượng tại hiện trường
                                </li>
                            </ul>
                        </div>

                        {{-- Button xem chi tiết --}}
                        <div class="pt-8 border-t border-slate-200/60 mt-auto relative z-10">
                            <a href="{{ route('client.services.show', $s->slug) }}"
                                class="inline-flex items-center gap-3 text-[12px] font-black uppercase text-navy group-hover:text-orange transition-all tracking-widest">
                                Chi tiết danh mục phép thử
                                <div
                                    class="w-10 h-10 rounded-full border border-navy/10 flex items-center justify-center group-hover:border-orange group-hover:translate-x-2 transition-all">
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-full py-20 text-center bg-slate-50 rounded-[3rem] border-2 border-dashed border-slate-200">
                        <i class="fa-solid fa-microscope text-6xl text-slate-300 mb-6"></i>
                        <p class="text-slate-400 font-bold uppercase tracking-widest">Đang cập nhật danh mục phép thử...</p>
                    </div>
                @endforelse
            </div>
            <div class="mt-16 flex justify-center">
                {{ $services->links() }}
            </div>
        </div>
    </section>

    {{-- 3. NĂNG LỰC PHÁP LÝ (TRÍCH TỪ PDF) --}}
    <section class="pb-24 bg-white">
        <div class="mx-auto max-w-7xl px-5">
            <div class="grid lg:grid-cols-2 gap-8 items-stretch">
                {{-- Box 1: Pháp lý --}}
                <div class="bg-navy rounded-[3rem] p-12 text-white relative overflow-hidden shadow-xl">
                    <div class="absolute top-0 right-0 w-48 h-48 bg-white/5 rounded-full -mr-24 -mt-24"></div>
                    <i class="fa-solid fa-file-contract text-5xl text-orange mb-8 block"></i>
                    <h4 class="text-2xl font-black uppercase mb-6 tracking-tight">Hồ sơ pháp lý đầy đủ</h4>
                    <p class="text-slate-400 text-sm leading-relaxed mb-8">
                        Hoạt động theo Giấy chứng nhận đăng ký doanh nghiệp số <strong>4500453534</strong>. Phòng thí nghiệm
                        được Bộ Xây dựng mã số <strong>LAS-XD 980</strong> chứng nhận đủ điều kiện hoạt động thí nghiệm
                        chuyên ngành xây dựng.
                    </p>
                    <div class="flex gap-4">
                        <span
                            class="px-4 py-2 bg-white/10 rounded-lg text-[10px] font-bold uppercase tracking-wider">ISO/IEC
                            17025</span>
                        <span class="px-4 py-2 bg-white/10 rounded-lg text-[10px] font-bold uppercase tracking-wider">VILAS
                            264</span>
                    </div>
                </div>

                {{-- Box 2: Cam kết --}}
                <div class="bg-slate-50 rounded-[3rem] p-12 border border-slate-100 flex flex-col justify-center">
                    <h4 class="text-2xl font-black text-navy uppercase mb-6 tracking-tight">Cam kết chất lượng</h4>
                    <ul class="space-y-5">
                        <li class="flex items-start gap-4">
                            <div
                                class="w-6 h-6 rounded-full bg-orange/20 flex items-center justify-center mt-1 flex-shrink-0">
                                <i class="fa-solid fa-check text-[10px] text-orange"></i>
                            </div>
                            <p class="text-sm text-slate-600 font-medium italic">"Kết quả trung thực - Khách quan - Kịp thời
                                phục vụ công tác quản lý chất lượng công trình."</p>
                        </li>
                        <li class="flex items-start gap-4">
                            <div
                                class="w-6 h-6 rounded-full bg-orange/20 flex items-center justify-center mt-1 flex-shrink-0">
                                <i class="fa-solid fa-check text-[10px] text-orange"></i>
                            </div>
                            <p class="text-sm text-slate-600 font-medium italic">"Báo cáo thí nghiệm có giá trị pháp lý phục
                                vụ nghiệm thu, thanh quyết toán."</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection