<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    // Hiển thị danh sách chứng chỉ trong Admin
    public function index(Request $request)
    {
        $query = Certificate::query();

        if ($request->filled('year')) {
            $query->whereYear('issue_date', $request->year);
        }

        if ($request->filled('type')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->type . '%')
                    ->orWhere('serial_number', 'like', '%' . $request->type . '%');
            });
        }

        $sort = $request->get('sort', 'latest');
        $query->orderBy('issue_date', $sort === 'oldest' ? 'asc' : 'desc');

        $certificates = $query->get();

        return view('admin.certificates.index', compact('certificates'));
    }

    // Trang tạo mới
    public function create()
    {
        return view('admin.certificates.create');
    }

    // Lưu chứng chỉ mới vào DB
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'serial_number' => 'nullable|string|max:100',
            'issue_date' => 'required|date',
            'image_front' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_back' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        // Xử lý upload ảnh mặt trước
        if ($request->hasFile('image_front')) {
            $data['image_front'] = $request->file('image_front')->store('certificates', 'public');
        }

        // Xử lý upload ảnh mặt sau
        if ($request->hasFile('image_back')) {
            $data['image_back'] = $request->file('image_back')->store('certificates', 'public');
        }

        Certificate::create($data);

        return redirect()->route('admin.certificates.index')->with('success', 'Thêm chứng chỉ thành công!');
    }

    // Trang chỉnh sửa
    public function edit($id) // Dùng $id để chắc chắn
    {
        $certificate = Certificate::find($id);

        // Nếu không tìm thấy, quay lại danh sách kèm báo lỗi
        if (!$certificate) {
            return redirect()->route('admin.certificates.index')->with('error', 'Không tìm thấy chứng chỉ này.');
        }

        return view('admin.certificates.edit', compact('certificate'));
    }

    // Cập nhật chứng chỉ
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'image_front' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_back' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        // Cập nhật ảnh mặt trước nếu có file mới
        if ($request->hasFile('image_front')) {
            if ($certificate->image_front)
                Storage::disk('public')->delete($certificate->image_front);
            $data['image_front'] = $request->file('image_front')->store('certificates', 'public');
        }

        // Cập nhật ảnh mặt sau nếu có file mới
        if ($request->hasFile('image_back')) {
            if ($certificate->image_back)
                Storage::disk('public')->delete($certificate->image_back);
            $data['image_back'] = $request->file('image_back')->store('certificates', 'public');
        }

        $certificate->update($data);

        return redirect()->route('admin.certificates.index')->with('success', 'Cập nhật thành công!');
    }

    // Xóa chứng chỉ
    public function destroy(Certificate $certificate)
    {
        // Xóa file ảnh vật lý trước khi xóa bản ghi
        if ($certificate->image_front)
            Storage::disk('public')->delete($certificate->image_front);
        if ($certificate->image_back)
            Storage::disk('public')->delete($certificate->image_back);

        $certificate->delete();

        return redirect()->route('admin.certificates.index')->with('success', 'Đã xóa chứng chỉ.');
    }
}
