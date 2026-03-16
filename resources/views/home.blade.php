@extends('layouts.app')

@section('content')
@php
$services = $servicesHome ?? [
(object) [
'title' => 'Giam sat va tu van xay dung',
'summary' => 'Giam sat thi cong, dam bao chat luong va an toan cho cong trinh.',
'slug' => 'giam-sat-va-tu-van-xay-dung',
],
(object) [
'title' => 'Thi nghiem va kiem dinh vat lieu xay dung',
'summary' => 'Thu nghiem, danh gia chat luong vat lieu theo tieu chuan ky thuat.',
'slug' => 'thi-nghiem-va-kiem-dinh-vat-lieu-xay-dung',
],
(object) [
'title' => 'Khao sat dia chat - dia hinh',
'summary' => 'Danh gia nen mong, dieu kien dia chat va dia hinh khu vuc.',
'slug' => 'khao-sat-dia-chat-dia-hinh',
],
];

$values = [
[
'title' => 'Chinh xac va tin cay',
'desc' => 'Quy trinh kiem soat chat luong theo tieu chuan nghiem ngat.',
],
[
'title' => 'Doi ngu chuyen mon cao',
'desc' => 'Ky su nhieu kinh nghiem tu van va giam sat du an lon.',
],
[
'title' => 'Trang thiet bi hien dai',
'desc' => 'He thong may moc va phong thi nghiem dat chuan.',
],
[
'title' => 'Dich vu tan tam',
'desc' => 'Phan hoi nhanh, dong hanh khach hang trong suot du an.',
],
];

$newsImages = [
'/images/post-item1.jpg',
'/images/post-item2.jpg',
'/images/post-item3.jpg',
'/images/post-item4.jpg',
];

@endphp

<section class="relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(208,114,45,0.25),_transparent_55%)]"></div>
    <div class="absolute inset-y-0 right-0 w-[45%] overflow-hidden">
        <img src="/images/card-large-item10.jpg" alt="Nen minh hoa" class="h-full w-full object-cover opacity-40">
        <div class="absolute inset-0 bg-[linear-gradient(120deg,_rgba(15,118,110,0.25),_rgba(181,75,42,0.12))]"></div>
    </div>
    <div class="relative mx-auto w-full max-w-6xl px-5 py-16 lg:py-24 grid gap-10 lg:grid-cols-[1.1fr_0.9fr] items-center">
        <div class="space-y-6">
            <p class="text-sm uppercase tracking-[0.3em] text-black/60">Nam Trung Bo</p>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-display">
                Dong hanh cung chat luong cong trinh
            </h1>
            <p class="text-base md:text-lg text-black/70 max-w-xl">
                He thong thi nghiem, kiem dinh va khao sat chuyen sau, dam bao do chinh xac va an toan
                cho moi cong trinh xay dung.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="/lien-he" class="inline-flex items-center justify-center rounded-full bg-brand px-6 py-3 text-white font-semibold shadow-soft">
                    Yeu cau tu van
                </a>
                <a href="/dich-vu" class="inline-flex items-center justify-center rounded-full border border-black/20 px-6 py-3 font-semibold">
                    Kham pha dich vu
                </a>
            </div>
            <div class="flex flex-wrap gap-6 text-sm text-black/60">
                <span>20+ nam kinh nghiem</span>
                <span>LAS-XD.371</span>
                <span>200+ du an</span>
            </div>
        </div>
        <div class="relative">
            <div class="absolute -top-8 -left-8 h-32 w-32 rounded-full bg-[color:var(--color-sea)]/20 blur-2xl"></div>
            <div class="rounded-[32px] bg-stone p-6 shadow-soft">
                <div class="aspect-[4/3] rounded-3xl overflow-hidden">
                    <img src="/images/banner-image3.jpg" alt="Phong thi nghiem" class="h-full w-full object-cover">
                </div>
                <div class="mt-6 grid grid-cols-2 gap-4 text-sm">
                    <div class="rounded-2xl bg-white p-4">
                        <p class="font-semibold">Tu van giam sat</p>
                        <p class="text-black/60 text-xs">Bao cao tien do hang tuan</p>
                    </div>
                    <div class="rounded-2xl bg-white p-4">
                        <p class="font-semibold">Kiem dinh vat lieu</p>
                        <p class="text-black/60 text-xs">Phan tich chinh xac</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mx-auto w-full max-w-6xl px-5 py-14">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">Dich vu</p>
            <h2 class="text-3xl md:text-4xl font-display">Dich vu chuyen mon</h2>
        </div>
        <a href="/dich-vu" class="text-sm font-semibold text-brand">Xem tat ca</a>
    </div>
    <div class="mt-8 grid gap-6 md:grid-cols-3">
        @foreach ($services as $service)
        <a href="{{ route('services.show', $service->slug) }}" class="group rounded-3xl border border-black/10 bg-white p-6 shadow-soft transition hover:-translate-y-1">
            @if (!empty($service->featured_image))
            <img src="{{ $service->featured_image }}" alt="{{ $service->title }}" class="mb-4 aspect-[4/3] w-full rounded-2xl object-cover">
            @endif
            <div class="h-12 w-12 rounded-2xl bg-[color:var(--color-brand)]/15 grid place-items-center text-brand font-semibold">
                {{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}
            </div>
            <h3 class="mt-4 text-xl font-display group-hover:text-brand">{{ $service->title }}</h3>
            <p class="mt-2 text-sm text-black/60">{{ $service->summary }}</p>
            <span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-black/70">Chi tiet →</span>
        </a>
        @endforeach
    </div>
</section>

<section class="bg-[color:var(--color-ink)] text-white">
    <div class="mx-auto w-full max-w-6xl px-5 py-16 grid gap-10 lg:grid-cols-[0.9fr_1.1fr] items-center">
        <div class="space-y-4">
            <p class="text-sm uppercase tracking-[0.3em] text-white/60">Cong trinh tot nhat</p>
            <h2 class="text-3xl md:text-4xl font-display">Gia tri & dinh huong</h2>
            <p class="text-white/70">
                Chung toi cam ket mang den giai phap kiem dinh va tu van ket hop giua chuyen mon va cong nghe.
                Moi bao cao deu ro rang, minh bach va phu hop quy chuan.
            </p>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div class="rounded-2xl border border-white/15 p-4">
                    <p class="text-3xl font-display">20+</p>
                    <p class="text-white/70">Nam kinh nghiem</p>
                </div>
                <div class="rounded-2xl border border-white/15 p-4">
                    <p class="text-3xl font-display">200+</p>
                    <p class="text-white/70">Du an hoan thanh</p>
                </div>
            </div>
        </div>
        <div class="rounded-[32px] bg-white/5 p-8">
            <div class="grid gap-6 md:grid-cols-2">
                <div class="rounded-3xl bg-white/10 p-6">
                    <p class="font-display text-2xl">He thong phong thi nghiem</p>
                    <p class="mt-2 text-white/70 text-sm">Chuan hoa theo tieu chuan quoc gia va quoc te.</p>
                </div>
                <div class="rounded-3xl bg-white/10 p-6">
                    <p class="font-display text-2xl">Doi ngu tu van</p>
                    <p class="mt-2 text-white/70 text-sm">Ky su giau kinh nghiem, san sang ho tro 24/7.</p>
                </div>
                <div class="rounded-3xl bg-white/10 p-6">
                    <p class="font-display text-2xl">Bao cao chuyen sau</p>
                    <p class="mt-2 text-white/70 text-sm">De xuat giai phap toi uu cho tung giai doan.</p>
                </div>
                <div class="rounded-3xl bg-white/10 p-6">
                    <p class="font-display text-2xl">An toan & ben vung</p>
                    <p class="mt-2 text-white/70 text-sm">Dong hanh cung chat luong va uy tin lau dai.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">Gia tri cot loi</p>
            <h2 class="text-3xl md:text-4xl font-display">Chung toi dong hanh cung chat luong</h2>
            <p class="mt-4 text-black/70">Chinh xac, minh bach va chuyen nghiep la tieu chuan chung toi dat ra cho moi du an.</p>
        </div>
        <div class="grid gap-4 sm:grid-cols-2">
            @foreach ($values as $value)
            <div class="rounded-3xl bg-white p-5 border border-black/5 shadow-soft">
                <h3 class="font-display text-xl">{{ $value['title'] }}</h3>
                <p class="mt-2 text-sm text-black/60">{{ $value['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-[#253b8f] text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-30 bg-dot-grid"></div>
    @php
    $engineers = [
    ['name' => 'Peter Wright', 'role' => 'Ky su', 'image' => '/images/team-item1.jpg'],
    ['name' => 'Jessica Ethan', 'role' => 'Ky su', 'image' => '/images/team-item2.jpg'],
    ['name' => 'Dwayn Royes', 'role' => 'Ky su', 'image' => '/images/team-item3.jpg'],
    ['name' => 'Hannah Vu', 'role' => 'Ky su', 'image' => '/images/team-item4.jpg'],
    ['name' => 'Minh Chau', 'role' => 'Ky su', 'image' => '/images/commentor-item1.jpg'],
    ['name' => 'Quang Huy', 'role' => 'Ky su', 'image' => '/images/commentor-item2.jpg'],
    ['name' => 'Anh Khoa', 'role' => 'Ky su', 'image' => '/images/commentor-item3.jpg'],
    ['name' => 'Bao Nam', 'role' => 'Ky su', 'image' => '/images/author-item.jpg'],
    ['name' => 'Thanh Ha', 'role' => 'Ky su', 'image' => '/images/team-item2.jpg'],
    ['name' => 'Hoang Phuc', 'role' => 'Ky su', 'image' => '/images/team-item1.jpg'],
    ];
    @endphp
    <div class="relative mx-auto w-full max-w-6xl px-5 py-16 flex flex-col gap-8 lg:flex-row lg:items-start">
        <div class="space-y-3 lg:w-56 xl:w-64">
            <p class="text-xs uppercase tracking-[0.35em] text-white/70">Doi ngu ky su</p>
            <h2 class="text-3xl md:text-4xl font-display">Ky su tot nhat</h2>
            <p class="text-white/80 text-sm md:text-base">
                Doi ngu ky su giau kinh nghiem, san sang ho tro va tu van cho tung du an.
            </p>
        </div>
        <div class="relative flex-1" data-carousel>
            <div class="flex items-center justify-end gap-3 mb-4">
                <button class="carousel-btn inline-flex h-10 w-10 items-center justify-center rounded-full bg-white text-black shadow-soft" type="button" aria-label="Truoc" data-carousel-prev>
                    <span aria-hidden="true">‹</span>
                </button>
                <button class="carousel-btn inline-flex h-10 w-10 items-center justify-center rounded-full bg-white text-black shadow-soft" type="button" aria-label="Tiep theo" data-carousel-next>
                    <span aria-hidden="true">›</span>
                </button>
            </div>
            <div class="pointer-events-none absolute inset-y-12 left-0 w-10 bg-gradient-to-r from-[#253b8f] to-transparent"></div>
            <div class="pointer-events-none absolute inset-y-12 right-0 w-10 bg-gradient-to-l from-[#253b8f] to-transparent"></div>
            <div class="flex gap-4 overflow-x-auto no-scrollbar cursor-grab active:cursor-grabbing pb-2" data-carousel-track>
                @foreach (array_merge($engineers, $engineers) as $member)
                <div class="carousel-item group rounded-2xl bg-white text-black overflow-hidden hover-lift">
                    <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="h-48 w-full object-cover img-zoom">
                    <div class="p-4">
                        <h3 class="font-display text-lg">{{ $member['name'] }}</h3>
                        <p class="text-sm text-black/60">{{ $member['role'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-stone">
    <div class="mx-auto w-full max-w-6xl px-5 py-16">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-black/50">Quy trinh</p>
                <h2 class="text-3xl md:text-4xl font-display">Quy trinh lam viec</h2>
            </div>
            <a href="/lien-he" class="text-sm font-semibold text-brand">Bat dau du an</a>
        </div>
        <div class="mt-10 grid gap-6 md:grid-cols-4">
            @foreach (['Tiep nhan yeu cau', 'Khao sat va thi nghiem', 'Phan tich va bao cao', 'Ban giao ket qua'] as $step)
            <div class="rounded-3xl bg-white p-6 border border-black/5">
                <p class="text-xs uppercase tracking-[0.3em] text-black/50">Buoc {{ $loop->iteration }}</p>
                <h3 class="mt-3 font-display text-xl">{{ $step }}</h3>
                <p class="mt-2 text-sm text-black/60">Mo ta ngan ve giai doan thuc hien va tai lieu kem theo.</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">Goc tin tuc</p>
            <h2 class="text-3xl md:text-4xl font-display">Bai viet moi nhat</h2>
        </div>
        <a href="/tin-tuc" class="text-sm font-semibold text-brand">Xem tat ca</a>
    </div>
    <div class="mt-8 grid gap-6 md:grid-cols-3">
        @forelse ($latestPosts ?? [] as $item)
        <a href="{{ route('posts.show', $item->slug) }}" class="rounded-3xl border border-black/10 bg-white overflow-hidden shadow-soft">
            @if ($item->featured_image)
            <img src="{{ $item->featured_image }}" alt="{{ $item->title }}" class="aspect-[4/3] w-full object-cover">
            @else
            <img src="{{ $newsImages[$loop->index % count($newsImages)] }}" alt="{{ $item->title }}" class="aspect-[4/3] w-full object-cover">
            @endif
            <div class="p-5">
                <p class="text-xs uppercase tracking-[0.3em] text-black/50">Tin moi</p>
                <h3 class="mt-2 font-display text-xl">{{ $item->title }}</h3>
                <p class="mt-2 text-sm text-black/60">
                    {{ \Illuminate\Support\Str::limit(strip_tags($item->excerpt ?: $item->content), 120) }}
                </p>
            </div>
        </a>
        @empty
        <div class="rounded-3xl border border-black/10 bg-white p-6 text-sm text-black/60">
            Chua co bai viet. Hay them bai viet de hien thi tai day.
        </div>
        @endforelse
    </div>
</section>

<section class="mx-auto w-full max-w-6xl px-5 pb-20">
    <div class="rounded-[36px] bg-[color:var(--color-ink)] text-white p-10 md:p-14 flex flex-col lg:flex-row gap-8 items-start lg:items-center justify-between">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-white/60">San sang hop tac</p>
            <h2 class="mt-3 text-3xl md:text-4xl font-display">Lien he de nhan tu van du an</h2>
        </div>
        <a href="/lien-he" class="inline-flex items-center justify-center rounded-full bg-brand px-6 py-3 text-white font-semibold">
            Gui yeu cau
        </a>
    </div>
</section>
@endsection