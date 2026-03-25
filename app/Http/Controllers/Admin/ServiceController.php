<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        // Lấy danh sách mới nhất để Admin dễ quản lý
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    // Hàm show này thường dành cho Admin xem trước, hoặc bạn có thể xóa nếu không dùng
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.show', compact('service'));
    }

    public function store(Request $request)
    {
        // 1. Validate dữ liệu
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        // 2. Xử lý Slug để tránh lỗi Duplicate entry 1062
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        while (Service::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        // 3. Xử lý upload ảnh
        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            // Lưu theo định dạng đường dẫn có sẵn trong DB của bạn
            $filename = '/images/' . $filename;
        }

        // 4. Lưu vào Database (Dùng đúng tên cột featured_image)
        Service::create([
            'title' => $request->title,
            'slug' => $slug,
            'summary' => $request->summary,
            'description' => $request->description,
            'status' => $request->status ?? 'published',
            'featured_image' => $filename, // Đã sửa từ 'image' thành 'featured_image'
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Thêm dịch vụ thành công!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        // Cập nhật thông tin cơ bản
        $service->title = $request->title;
        $service->summary = $request->summary;
        $service->description = $request->description;
        $service->status = $request->status;
        
        // Chỉ cập nhật slug nếu title thay đổi
        if ($service->isDirty('title')) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;
            while (Service::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $service->slug = $slug;
        }

        // Xử lý ảnh mới nếu có
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);

            // Xóa ảnh cũ nếu cần (tùy chọn)
            if ($service->featured_image && file_exists(public_path($service->featured_image))) {
                // Tránh xóa các ảnh mẫu mặc định
                if (!str_contains($service->featured_image, 'card-image')) {
                    @unlink(public_path($service->featured_image));
                }
            }

            $service->featured_image = '/images/' . $filename;
        }

        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Cập nhật dịch vụ thành công!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        
        // Xóa file ảnh trước khi xóa bản ghi
        if ($service->featured_image && file_exists(public_path($service->featured_image))) {
            if (!str_contains($service->featured_image, 'card-image')) {
                @unlink(public_path($service->featured_image));
            }
        }

        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Đã xóa dịch vụ.');
    }
}