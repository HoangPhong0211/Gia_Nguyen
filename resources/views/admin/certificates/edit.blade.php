@extends('layouts.admin')

@section('content')
<div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); max-width: 800px; margin: auto;">
    <div style="border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 25px;">
        <h2 style="margin: 0; font-family: 'Segoe UI', sans-serif; color: #2d3748; display: flex; align-items: center;">
            <i class="fa-solid fa-pen-to-square" style="margin-right: 12px; color: #3b82f6;"></i> Sửa chứng chỉ: {{ $certificate->name }}
        </h2>
    </div>

    <form action="{{ route('admin.certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data" style="font-family: 'Segoe UI', sans-serif;">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Tên thiết bị</label>
            <input type="text" name="name" value="{{ old('name', $certificate->name) }}" 
                   style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; outline: none;" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Số hiệu chứng nhận</label>
                <input type="text" name="serial_number" value="{{ old('serial_number', $certificate->serial_number) }}" 
                       style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px;">
            </div>
            <div>
                <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Ngày cấp</label>
                <input type="date" name="issue_date" value="{{ old('issue_date', $certificate->issue_date ? $certificate->issue_date->format('Y-m-d') : '') }}" 
                       style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px;" required>
            </div>
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 12px;">Ảnh chứng chỉ hiện tại</label>
            <div style="display: flex; gap: 15px;">
                <div style="text-align: center;">
                    <img src="{{ (str_starts_with($certificate->image_front, 'certificates/')) ? asset('storage/' . $certificate->image_front) : asset('images/' . $certificate->image_front) }}" 
                         style="width: 120px; height: 160px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0;">
                    <div style="font-size: 11px; color: #94a3b8; mt-1;">Mặt trước</div>
                </div>
                @if($certificate->image_back)
                <div style="text-align: center;">
                    <img src="{{ (str_starts_with($certificate->image_back, 'certificates/')) ? asset('storage/' . $certificate->image_back) : asset('images/' . $certificate->image_back) }}" 
                         style="width: 120px; height: 160px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0;">
                    <div style="font-size: 11px; color: #94a3b8; mt-1;">Mặt sau</div>
                </div>
                @endif
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
            <div style="background: #f8fafc; padding: 15px; border-radius: 10px; border: 1px dashed #cbd5e1;">
                <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Thay ảnh mặt trước</label>
                <input type="file" name="image_front" style="font-size: 13px;">
            </div>
            <div style="background: #f8fafc; padding: 15px; border-radius: 10px; border: 1px dashed #cbd5e1;">
                <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Thay ảnh mặt sau</label>
                <input type="file" name="image_back" style="font-size: 13px;">
            </div>
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 15px; border-top: 1px solid #eee; padding-top: 20px;">
            <a href="{{ route('admin.certificates.index') }}" 
               style="padding: 10px 25px; border-radius: 8px; text-decoration: none; color: #64748b; font-weight: 600; background: #f1f5f9;">Hủy</a>
            <button type="submit" 
                    style="padding: 10px 25px; border-radius: 8px; border: none; background: #3b82f6; color: white; font-weight: 600; cursor: pointer; transition: 0.3s;">
                Cập nhật thay đổi
            </button>
        </div>
    </form>
</div>
@endsection