@extends('layouts.app')

@section('content')
@php
$title = 'Về chúng tôi';
@endphp

<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="grid gap-8 lg:grid-cols-[1.05fr_0.95fr] items-center">
        <div class="space-y-4">
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">Về chúng tôi</p>
            <h1 class="text-4xl md:text-5xl font-display">Công ty Cổ phần Địa kỹ thuật Hoàng Gia Việt Nam</h1>
            <p class="text-black/70 text-lg">
                Thành lập năm 2011, Hoàng Gia Việt Nam cung cấp dịch vụ khảo sát địa kỹ thuật, khảo sát địa hình,
                thí nghiệm hiện trường - trong phòng và thí nghiệm vật liệu xây dựng với mã LAS-XD 1109.
            </p>
        </div>
        <figure class="rounded-3xl overflow-hidden border border-black/10 bg-white shadow-soft">
            <img src="/images/Picture9.png" alt="Trụ sở và phòng thí nghiệm LAS-XD 1109" class="aspect-[4/3] w-full object-cover">
            <figcaption class="px-5 py-3 text-sm text-black/60">Hình ảnh trụ sở và khu vực phòng thí nghiệm.</figcaption>
        </figure>
    </div>
</section>

<section class="bg-stone">
    <div class="mx-auto w-full max-w-6xl px-5 py-16 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-3xl bg-white p-6 border border-black/5">
            <p class="text-xs uppercase tracking-[0.3em] text-black/50">Tầm nhìn</p>
            <p class="mt-3 text-black/70">Trở thành đơn vị địa kỹ thuật tin cậy hàng đầu trong phân khúc hạ tầng và công nghiệp.</p>
        </div>
        <div class="rounded-3xl bg-white p-6 border border-black/5">
            <p class="text-xs uppercase tracking-[0.3em] text-black/50">Sứ mệnh</p>
            <p class="mt-3 text-black/70">Cung cấp dữ liệu chính xác, minh bạch, kịp thời để hỗ trợ quyết định kỹ thuật an toàn.</p>
        </div>
        <div class="rounded-3xl bg-white p-6 border border-black/5">
            <p class="text-xs uppercase tracking-[0.3em] text-black/50">Năng lực cốt lõi</p>
            <p class="mt-3 text-black/70">Khảo sát địa chất, khảo sát địa hình, thí nghiệm và kiểm định vật liệu.</p>
        </div>
        <div class="rounded-3xl bg-white p-6 border border-black/5">
            <p class="text-xs uppercase tracking-[0.3em] text-black/50">Sơ đồ tổ chức</p>
            <p class="mt-3 text-black/70">Khối khảo sát, khối thí nghiệm, khối QA/QC và bộ phận kỹ thuật hồ sơ vận hành đồng bộ.</p>
        </div>
    </div>
</section>

<section class="mx-auto w-full max-w-6xl px-5 py-16 space-y-10">
    <div class="rounded-3xl border border-black/10 bg-white p-7 shadow-soft">
        <p class="text-sm uppercase tracking-[0.3em] text-black/50">Năng lực phòng thí nghiệm</p>
        <p class="mt-4 text-black/70 leading-8 text-lg">
            "Chất lượng công trình bắt đầu từ sự chuẩn xác của dữ liệu nền móng. Tại Hoàng Gia Việt Nam, chúng tôi tự hào sở hữu Phòng thí nghiệm cơ học đất và vật liệu xây dựng đạt chuẩn quốc gia LAS-XD 1109. Với hệ thống máy móc đo lường hiện đại và quy trình kiểm soát mẫu vật nghiêm ngặt từ hiện trường đến phòng thí nghiệm, chúng tôi cam kết mang lại những kết quả thí nghiệm minh bạch, khách quan và đáng tin cậy nhất."
        </p>
    </div>

    <div class="grid gap-6 lg:grid-cols-2">
        <article class="rounded-3xl border border-black/10 bg-white overflow-hidden shadow-soft">
            <div class="grid grid-cols-2 gap-0">
                <img src="/images/6.jpg" alt="Hộp mẫu đất ngoài hiện trường" class="aspect-[4/3] w-full object-cover">
                <img src="/images/8.jpg" alt="Hộp mẫu đất đã phân loại" class="aspect-[4/3] w-full object-cover">
            </div>
            <div class="p-6">
                <h3 class="font-display text-2xl">Lưu mẫu và Phân loại chuẩn xác</h3>
                <p class="mt-3 text-black/70 leading-7">
                    Mẫu đất, đá từ các mũi khoan khảo sát hiện trường được thu thập, bảo quản nguyên dạng trong các hộp mẫu chuyên dụng và ghi chú độ sâu chi tiết. Quy trình phân loại và bảo quản tuân thủ nghiêm ngặt các tiêu chuẩn kỹ thuật, đảm bảo tính nguyên bản của mẫu vật trước khi đưa vào phân tích chuyên sâu.
                </p>
            </div>
        </article>

        <article class="rounded-3xl border border-black/10 bg-white overflow-hidden shadow-soft">
            <div class="grid grid-cols-2 gap-0">
                <img src="/images/5.jpg" alt="Trang thiết bị thí nghiệm trong phòng" class="aspect-[4/3] w-full object-cover">
                <img src="/images/9.jpg" alt="Máy nén và khay mẫu thí nghiệm" class="aspect-[4/3] w-full object-cover">
            </div>
            <div class="p-6">
                <h3 class="font-display text-2xl">Trang thiết bị đo lường hiện đại</h3>
                <p class="mt-3 text-black/70 leading-7">
                    Hệ thống thiết bị đo lường độ ẩm, tỷ trọng và các loại máy nén cơ lý được đầu tư đồng bộ, hiệu chuẩn định kỳ. Chúng tôi có đầy đủ năng lực thực hiện các thí nghiệm trong phòng phức tạp như: nén cố kết, cắt trượt, nén 3 trục... đáp ứng mọi yêu cầu khắt khe của các dự án giao thông, công nghiệp và dân dụng.
                </p>
            </div>
        </article>
    </div>

    <article class="rounded-3xl border border-black/10 bg-white overflow-hidden shadow-soft">
        <div class="grid lg:grid-cols-[0.9fr_1.1fr] items-stretch">
            <img src="/images/7.jpg" alt="Kỹ sư phòng thí nghiệm đang thao tác" class="h-full w-full object-cover min-h-[280px]">
            <div class="p-6 md:p-8">
                <h3 class="font-display text-2xl">Đội ngũ thí nghiệm viên chuyên nghiệp</h3>
                <p class="mt-3 text-black/70 leading-7">
                    Con người là yếu tố quyết định tạo nên giá trị "Chính xác - An toàn". Đội ngũ kỹ sư, thí nghiệm viên của Hoàng Gia Việt Nam không chỉ vững chuyên môn mà còn tận tâm trong từng thao tác đo đạc, đảm bảo mọi bộ hồ sơ báo cáo địa chất đều phản ánh đúng bản chất nền đất công trình.
                </p>
            </div>
        </div>
    </article>
</section>

<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="grid gap-8 lg:grid-cols-[1.15fr_0.85fr]">
        <div class="rounded-3xl border border-black/10 bg-white p-7 shadow-soft">
            <h2 class="text-3xl font-display">Lịch sử hình thành và đội ngũ kỹ sư</h2>
            <p class="mt-4 text-black/70 leading-7">
                Công ty Cổ phần Địa kỹ thuật Hoàng Gia Việt Nam được thành lập từ năm 2011 trong bối cảnh nhu cầu xây dựng hạ tầng,
                nhà máy và khu đô thị tăng mạnh tại nhiều địa phương. Ngay từ giai đoạn đầu, công ty đã định hướng tập trung vào chất
                lượng dữ liệu khảo sát và kết quả thí nghiệm, coi đây là nền tảng cho mọi quyết định thiết kế và thi công. Trải qua quá
                trình phát triển, Hoàng Gia Việt Nam từng bước chuẩn hóa hệ thống quản lý chất lượng, đầu tư máy khoan XY-1, thiết bị
                CPT và năng lực phòng thí nghiệm theo phạm vi LAS-XD 1109 để đáp ứng các yêu cầu ngày càng cao của chủ đầu tư và nhà thầu.
                Đội ngũ kỹ sư của công ty gồm các cán bộ khảo sát, thí nghiệm và kỹ thuật hồ sơ có kinh nghiệm thực chiến ở nhiều loại dự án
                như cầu, đường cao tốc, nhà máy công nghiệp và khu dân cư. Mỗi dự án đều được triển khai theo quy trình kiểm soát nội bộ rõ ràng:
                từ tiếp nhận nhiệm vụ, khảo sát hiện trường, thí nghiệm kiểm chứng đến tổng hợp báo cáo kỹ thuật và bàn giao kết quả. Nhờ phương
                châm Chính xác - An toàn - Hiệu quả - Bền vững, Hoàng Gia Việt Nam đã xây dựng được uy tín chuyên môn, trở thành đối tác đáng tin cậy
                cho nhiều đơn vị trong và ngoài địa bàn Hải Dương.
            </p>
        </div>
        <div class="space-y-5">
            <div class="rounded-3xl bg-stone p-6">
                <p class="text-xs uppercase tracking-[0.3em] text-black/50">Chứng nhận</p>
                <h3 class="mt-2 font-display text-2xl">LAS-XD 1109</h3>
                <p class="mt-3 text-sm text-black/70">Khu vực này dùng để trưng bày ảnh scan giấy chứng nhận LAS-XD 1109.</p>
            </div>
            <div class="rounded-3xl bg-stone p-6">
                <p class="text-xs uppercase tracking-[0.3em] text-black/50">Năng lực hoạt động xây dựng</p>
                <h3 class="mt-2 font-display text-2xl">Chứng chỉ năng lực</h3>
                <p class="mt-3 text-sm text-black/70">Khu vực này dùng để trưng bày ảnh scan chứng chỉ năng lực hoạt động xây dựng.</p>
            </div>
        </div>
    </div>
</section>
@endsection