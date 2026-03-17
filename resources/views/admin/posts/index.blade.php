@extends('layouts.admin')

@section('content')
<div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
        <h2 style="margin: 0; font-family: 'Segoe UI', sans-serif; color: #2d3748; display: flex; align-items: center;">
            <i class="fa-solid fa-newspaper" style="margin-right: 12px; color: #4f46e5;"></i> Quản lý bài viết
        </h2>
        <a href="{{ route('admin.posts.create') }}" style="background: #4f46e5; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px; transition: 0.3s; box-shadow: 0 4px 6px rgba(79, 70, 229, 0.2);">
            <i class="fa-solid fa-plus"></i> Thêm bài viết mới
        </a>
    </div>

    <table style="width: 100%; border-collapse: collapse; font-family: 'Segoe UI', sans-serif;">
        <thead>
            <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase; letter-spacing: 0.05em;">Ảnh</th>
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase; letter-spacing: 0.05em;">Nội dung bài viết</th>
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase; letter-spacing: 0.05em;">Danh mục</th>
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase; letter-spacing: 0.05em;">Trạng thái</th>
                <th style="padding: 15px; text-align: center; color: #64748b; font-size: 13px; text-transform: uppercase; letter-spacing: 0.05em;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr style="border-bottom: 1px solid #f1f5f9; transition: 0.2s;" onmouseover="this.style.backgroundColor='#f8fafc'" onmouseout="this.style.backgroundColor='transparent'">
                <td style="padding: 15px;">
                    <div style="width: 70px; height: 70px; overflow: hidden; border-radius: 10px; border: 1px solid #e2e8f0; background: #f1f5f9;">
                        @php
                            // Logic sửa lỗi đường dẫn: Nếu trong DB đã có /images/ thì bỏ qua, nếu chưa có thì thêm vào
                            $img = $post->featured_image;
                            $finalPath = str_contains($img, 'images/') ? ltrim($img, '/') : 'images/' . $img;
                        @endphp
                        <img src="{{ asset($finalPath) }}" 
                             style="width: 100%; height: 100%; object-fit: cover;" 
                             onerror="this.onerror=null;this.src='{{ asset('images/main-logo.png') }}';">
                    </div>
                </td>
                <td style="padding: 15px;">
                    <div style="font-weight: 600; color: #1e293b; font-size: 15px; margin-bottom: 4px;">{{ $post->title }}</div>
                    <div style="font-size: 12px; color: #94a3b8;">Ngày tạo: {{ $post->created_at->format('d/m/Y') }}</div>
                </td>
                <td style="padding: 15px;">
                    <span style="color: #475569; background: #f1f5f9; padding: 4px 12px; border-radius: 6px; font-size: 13px;">
                        {{ $post->category->name ?? 'Chưa phân loại' }}
                    </span>
                </td>
                <td style="padding: 15px;">
                    @if($post->status == 'published')
                        <span style="background: #dcfce7; color: #15803d; padding: 5px 12px; border-radius: 6px; font-size: 12px; font-weight: 600;">
                            <i class="fa-solid fa-check-circle"></i> Đã đăng
                        </span>
                    @else
                        <span style="background: #fef9c3; color: #a16207; padding: 5px 12px; border-radius: 6px; font-size: 12px; font-weight: 600;">
                            <i class="fa-solid fa-clock"></i> Bản nháp
                        </span>
                    @endif
                </td>
                <td style="padding: 15px; text-align: center;">
                    <div style="display: flex; justify-content: center; gap: 15px;">
                        <a href="{{ route('admin.posts.edit', $post) }}" style="color: #3b82f6; font-size: 18px; transition: 0.2s;" title="Sửa bài viết">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
                            @csrf @method('DELETE')
                            <button type="submit" style="background:none; border:none; color: #ef4444; cursor: pointer; font-size: 18px; padding: 0;" title="Xóa bài viết">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $posts->links() }}
    </div>
</div>
@endsection