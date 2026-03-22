@extends('layouts.app')

@section('content')
<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="space-y-4">
        <p class="text-sm uppercase tracking-[0.3em] text-black/50">Dịch vụ / Lĩnh vực hoạt động</p>
        <h1 class="text-4xl md:text-5xl font-display">Năng lực dịch vụ chuyên sâu</h1>
        <p class="text-black/70 max-w-3xl">Mỗi dịch vụ được trình bày theo quy trình thực hiện, thiết bị sử dụng và tiêu chuẩn áp dụng để thuận tiện tra cứu và đánh giá năng lực.</p>
    </div>

    <div class="mt-10 grid gap-8">
        <article class="rounded-3xl border border-black/10 bg-white p-7 shadow-soft">
            <h2 class="text-3xl font-display">Thí nghiệm Vật liệu & Cơ lý chuyên sâu</h2>
            <p class="mt-4 text-black/70 leading-7">
                Gia Nguyên thực hiện kiểm định toàn diện các chỉ tiêu kỹ thuật của đất, đá, cát, xi măng và bê tông nhựa theo tiêu chuẩn LAS-XD 980. Chúng tôi đặc biệt chuyên sâu trong việc xác định các đặc tính cơ lý phức tạp cho nền đường và bê tông khối lớn, đảm bảo nguồn vật liệu đầu vào luôn đạt chuẩn chất lượng cao nhất cho công trình.
            </p>
        </article>

        <article class="rounded-3xl border border-black/10 bg-white p-7 shadow-soft">
            <h2 class="text-3xl font-display">Thử nghiệm Kim loại & Liên kết hàn</h2>
            <p class="mt-4 text-black/70 leading-7">
                Với hệ thống máy kéo nén vạn năng hiện đại, chúng tôi cung cấp dịch vụ thử nghiệm cường độ kéo, uốn cốt thép và kiểm tra chất lượng mối hàn chuyên nghiệp. Dịch vụ này giúp đánh giá chính xác khả năng chịu lực của kết cấu thép, đảm bảo tính an toàn và bền vững tuyệt đối cho các khung xương công trình dân dụng lẫn công nghiệp.
            </p>
        </article>

        <article class="rounded-3xl border border-black/10 bg-white p-7 shadow-soft">
            <h2 class="text-3xl font-display">Kiểm định & Thử tải hiện trường</h2>
            <p class="mt-4 text-black/70 leading-7">
                Chúng tôi có năng lực thực chiến mạnh mẽ trong việc thí nghiệm xuyên tĩnh, nén tĩnh cọc và đo mô đun đàn hồi bằng tấm ép cứng trực tiếp tại công trường. Đây là dịch vụ then chốt giúp kiểm soát chất lượng nền móng, đã được khẳng định qua nhiều dự án trọng điểm như Cao tốc Bắc - Nam và các nhà máy năng lượng tái tạo tại khu vực.
            </p>
        </article>

        <article class="rounded-3xl border border-black/10 bg-white p-7 shadow-soft">
            <h2 class="text-3xl font-display">Thí nghiệm Hóa học & Nước xây dựng</h2>
            <p class="mt-4 text-black/70 leading-7">
                Gia Nguyên cung cấp dịch vụ phân tích các chỉ tiêu hóa lý của nước dùng trong xây dựng và độ ăn mòn của môi trường đối với kết cấu. Chúng tôi giúp chủ đầu tư kiểm soát các tạp chất có hại, đảm bảo tính tương thích của nguồn nước với bê tông và vữa, từ đó kéo dài tuổi thọ tối đa cho công trình.
            </p>
        </article>
        
        <article class="rounded-3xl border border-black/10 bg-white p-7 shadow-soft">
            <h2 class="text-3xl font-display">Tư vấn Giám định & Chứng nhận chất lượng</h2>
            <p class="mt-4 text-black/70 leading-7">
                Với đội ngũ kỹ sư giàu kinh nghiệm và hệ thống LAS-XD 980, chúng tôi thực hiện giám định tư pháp, đánh giá nguyên nhân sự cố và cấp chứng nhận chất lượng công trình. Dịch vụ này là cơ sở pháp lý vững chắc để khách hàng hoàn thiện hồ sơ nghiệm thu và đưa công trình vào vận hành an toàn.
            </p>
        </article>
    </div>

    <div class="mt-12 rounded-3xl bg-stone p-6">
        <p class="text-sm uppercase tracking-[0.3em] text-black/50">Dịch vụ theo dự án</p>
        <p class="mt-3 text-black/70">Bạn có thể tiếp tục mở rộng các dịch vụ thành bài viết chi tiết trong trang riêng để tăng chiều sâu SEO và khả năng chuyển đổi khách hàng.</p>
        <a href="/lien-he" class="mt-5 inline-flex items-center justify-center rounded-full bg-brand px-6 py-3 text-white font-semibold">Liên hệ tư vấn gói dịch vụ</a>
    </div>
</section>

<section class="mx-auto w-full max-w-6xl px-5 pb-16">
    <h2 class="text-2xl font-display">Danh sách dịch vụ từ dữ liệu hệ thống</h2>
    <div class="mt-5 grid gap-4 md:grid-cols-2">
        @forelse ($services as $service)
        <a href="{{ route('services.show', $service->slug) }}" class="rounded-2xl border border-black/10 bg-white p-5 hover:-translate-y-1 transition">
            <p class="font-semibold">{{ $service->title }}</p>
            <p class="mt-2 text-sm text-black/60">{{ $service->summary }}</p>
        </a>
        @empty
        <div class="rounded-2xl border border-black/10 bg-white p-5 text-sm text-black/60">
            Chưa có dịch vụ trong cơ sở dữ liệu.
        </div>
        @endforelse
    </div>
</section>
@endsection