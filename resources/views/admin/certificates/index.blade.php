@extends('layouts.admin')

@section('content')
<div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
    {{-- Thông báo thành công --}}
    @if(session('success'))
        <div style="background: #dcfce7; color: #15803d; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-weight: 500;">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
        <h2 style="margin: 0; font-family: 'Segoe UI', sans-serif; color: #2d3748; display: flex; align-items: center;">
            <i class="fa-solid fa-certificate" style="margin-right: 12px; color: #9b59b6;"></i> Quản lý chứng chỉ hiệu chuẩn
        </h2>
        <a href="{{ route('admin.certificates.create') }}" style="background: #9b59b6; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px; transition: 0.3s;">
            <i class="fa-solid fa-plus"></i> Thêm chứng chỉ mới
        </a>
    </div>

    <table style="width: 100%; border-collapse: collapse; font-family: 'Segoe UI', sans-serif;">
        <thead>
            <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase;">Ảnh GCN</th>
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase;">Tên thiết bị</th>
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase;">Số hiệu GCN</th>
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase;">Ngày cấp</th>
                <th style="padding: 15px; text-align: center; color: #64748b; font-size: 13px; text-transform: uppercase;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse($certificates as $cert)
            <tr style="border-bottom: 1px solid #f1f5f9;">
                <td style="padding: 15px;">
                    <div style="width: 70px; height: 50px; overflow: hidden; border-radius: 8px; border: 1px solid #e2e8f0; background: #f1f5f9;">
                        @php
                            // Ưu tiên hiển thị ảnh từ storage (upload admin), nếu không có mới tìm trong public/images
                            $imgSource = $cert->image_front;
                            $src = (str_starts_with($imgSource, 'certificates/')) 
                                    ? asset('storage/' . $imgSource) 
                                    : asset('images/' . $imgSource);
                        @endphp
                        <img src="{{ $src }}" 
                             style="width: 100%; height: 100%; object-fit: cover;" 
                             onerror="this.src='{{ asset('images/main-logo.png') }}'">
                    </div>
                </td>
                <td style="padding: 15px;">
                    <div style="font-weight: 600; color: #1e293b; font-size: 14px;">{{ $cert->name }}</div>
                    <div style="font-size: 11px; color: #94a3b8; margin-top: 2px;">
                        <i class="fa-solid fa-link"></i> #{{ $cert->slug }}
                    </div>
                </td>
                <td style="padding: 15px;">
                    <span style="color: #475569; background: #f1f5f9; padding: 3px 10px; border-radius: 6px; font-size: 12px; font-weight: 500;">
                        {{ $cert->serial_number ?? 'N/A' }}
                    </span>
                </td>
                <td style="padding: 15px;">
                    <div style="font-size: 13px; color: #1e293b;">
                         {{ $cert->issue_date ? $cert->issue_date->format('d/m/Y') : 'Chưa cập nhật' }}
                    </div>
                </td>
                <td style="padding: 15px; text-align: center;">
                    <div style="display: flex; justify-content: center; gap: 12px;">
                        <a href="{{ route('admin.certificates.edit', $cert->id) }}" style="color: #3b82f6;" title="Sửa">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <form action="{{ route('admin.certificates.destroy', $cert->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa chứng chỉ này?')">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color: #ef4444; cursor: pointer; padding: 0;" title="Xóa">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="padding: 40px; text-align: center; color: #94a3b8;">Chưa có chứng chỉ nào được tạo.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Phân trang (Nếu có) --}}
    @if(method_exists($certificates, 'links'))
    <div style="margin-top: 20px;">
        {{ $certificates->links() }}
    </div>
    @endif
</div>
@endsection