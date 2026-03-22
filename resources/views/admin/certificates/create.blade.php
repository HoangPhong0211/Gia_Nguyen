@extends('layouts.admin')

@section('content')
<div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); max-width: 800px; margin: auto;">
    <div style="border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 25px;">
        <h2 style="margin: 0; font-family: 'Segoe UI', sans-serif; color: #2d3748; display: flex; align-items: center;">
            <i class="fa-solid fa-plus-circle" style="margin-right: 12px; color: #9b59b6;"></i> Thêm chứng chỉ thiết bị mới
        </h2>
    </div>

    <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data" style="font-family: 'Segoe UI', sans-serif;">
        @csrf
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Tên thiết bị <span style="color: #e53e3e;">*</span></label>
            <input type="text" name="name" placeholder="Ví dụ: Máy thử nén TYE-2000" 
                   style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; transition: 0.3s;" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Số hiệu chứng nhận</label>
                <input type="text" name="serial_number" placeholder="Ví dụ: 01.037.25" 
                       style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px;">
            </div>
            <div>
                <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Ngày cấp <span style="color: #e53e3e;">*</span></label>
                <input type="date" name="issue_date" 
                       style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px;" required>
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Mô tả ngắn (Nếu có)</label>
            <textarea name="description" rows="2" placeholder="Thông tin thêm về thiết bị hoặc đơn vị cấp..." 
                      style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; resize: none;"></textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
            <div style="background: #f8fafc; padding: 15px; border-radius: 10px; border: 1px dashed #cbd5e1;">
                <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Ảnh mặt trước (Trang 1) <span style="color: #e53e3e;">*</span></label>
                <input type="file" name="image_front" style="font-size: 13px;" required>
            </div>
            <div style="background: #f8fafc; padding: 15px; border-radius: 10px; border: 1px dashed #cbd5e1;">
                <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Ảnh mặt sau (Trang 2)</label>
                <input type="file" name="image_back" style="font-size: 13px;">
            </div>
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 15px; border-top: 1px solid #eee; padding-top: 20px;">
            <a href="{{ route('admin.certificates.index') }}" 
               style="padding: 10px 25px; border-radius: 8px; text-decoration: none; color: #64748b; font-weight: 600; background: #f1f5f9;">Hủy</a>
            <button type="submit" 
                    style="padding: 10px 25px; border-radius: 8px; border: none; background: #9b59b6; color: white; font-weight: 600; cursor: pointer; transition: 0.3s;">
                Lưu thiết bị
            </button>
        </div>
    </form>
</div>
@endsection