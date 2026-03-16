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
            <h2 class="text-3xl font-display">Khoan khảo sát địa chất</h2>
            <p class="mt-4 text-black/70 leading-7">
                Dịch vụ khoan khảo sát địa chất được triển khai nhằm xác định chính xác điều kiện địa tầng, đặc trưng cơ lý của đất đá và các yếu tố
                ảnh hưởng trực tiếp đến giải pháp nền móng. Quy trình thực hiện gồm khảo sát hiện trường, bố trí lỗ khoan theo nhiệm vụ thiết kế,
                khoan lấy mẫu, thí nghiệm hiện trường và lập nhật ký kỹ thuật đầy đủ. Hoàng Gia Việt Nam sử dụng máy khoan XY-1 cùng hệ thống thiết bị
                lấy mẫu đồng bộ để bảo đảm độ tin cậy của mẫu nguyên dạng và mẫu biến dạng. Dữ liệu được kiểm tra chéo với kết quả thí nghiệm phòng,
                giúp kỹ sư thiết kế có cơ sở lựa chọn phương án móng phù hợp, tối ưu chi phí và kiểm soát rủi ro lún nứt. Hồ sơ bàn giao bao gồm mặt cắt
                địa chất, chỉ tiêu cơ lý, nhận xét địa tầng và khuyến nghị kỹ thuật theo tiêu chuẩn áp dụng.
            </p>
        </article>

        <article class="rounded-3xl border border-black/10 bg-white p-7 shadow-soft">
            <h2 class="text-3xl font-display">Khảo sát địa hình</h2>
            <p class="mt-4 text-black/70 leading-7">
                Khảo sát địa hình là bước nền tảng cho công tác quy hoạch, thiết kế kỹ thuật và tổ chức thi công. Tổ khảo sát thực hiện đo đạc tọa độ,
                cao độ, bình đồ khu vực và các điểm khống chế theo yêu cầu của dự án. Tùy đặc thù công trình, khối lượng có thể bao gồm đo mặt cắt,
                kiểm tra mốc hiện trạng, lập bản đồ hiện trạng và số hóa dữ liệu để tích hợp vào hồ sơ thiết kế. Chúng tôi áp dụng quy trình nghiệm thu
                nội bộ nhiều cấp nhằm bảo đảm sai số nằm trong giới hạn cho phép, đồng thời bàn giao tệp dữ liệu thuận tiện cho đơn vị tư vấn thiết kế.
                Kết quả khảo sát địa hình giúp chủ đầu tư kiểm soát khối lượng san nền, tối ưu phương án tuyến và giảm xung đột kỹ thuật trong giai đoạn
                triển khai thi công ngoài hiện trường.
            </p>
        </article>

        <article class="rounded-3xl border border-black/10 bg-white p-7 shadow-soft">
            <h2 class="text-3xl font-display">Thí nghiệm hiện trường, trong phòng và thí nghiệm VLXD</h2>
            <p class="mt-4 text-black/70 leading-7">
                Hoàng Gia Việt Nam triển khai đồng thời thí nghiệm hiện trường, thí nghiệm cơ lý trong phòng và thí nghiệm vật liệu xây dựng để tạo
                chuỗi dữ liệu đầy đủ cho quá trình kiểm soát chất lượng. Đối với hiện trường, các phép thử được thực hiện theo quy trình chuẩn nhằm đánh
                giá nhanh trạng thái nền đất và khả năng chịu tải. Đối với phòng thí nghiệm, mẫu được bảo quản, mã hóa và thử nghiệm trong điều kiện
                kiểm soát để xác định các chỉ tiêu phục vụ tính toán kỹ thuật. Song song đó, công tác thí nghiệm vật liệu xây dựng giúp đánh giá chất
                lượng đầu vào của bê tông, cốt liệu, vật liệu san lấp và các cấu kiện liên quan. Toàn bộ kết quả được tổng hợp thành báo cáo có truy vết,
                kèm kết luận và kiến nghị để chủ đầu tư, nhà thầu và tư vấn giám sát ra quyết định kịp thời.
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