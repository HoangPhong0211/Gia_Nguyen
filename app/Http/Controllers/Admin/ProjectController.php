<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project; // Đảm bảo bạn đã tạo Model Project
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        // 1. Validate dữ liệu
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|in:bridge,factory,urban',
            'location' => 'nullable|string',
            'year' => 'nullable|integer|min:1900|max:2099',
            'summary' => 'nullable|string',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            // 'status' => 'required|in:active,completed' <-- Bỏ dòng này nếu Form không có ô chọn status
        ]);

        // 2. Khởi tạo đối tượng
        $project = new Project();
        $project->title = $request->title;
        $project->slug = \Illuminate\Support\Str::slug($request->title);
        $project->category = $request->category;
        $project->location = $request->location;
        $project->year = $request->year;
        $project->summary = $request->summary;
        $project->description = $request->description;

        // Gán mặc định là published để khớp với Seeder và logic hiển thị
        $project->status = $request->status ?? 'published';

        // 3. Xử lý lưu ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $project->image = $filename;
        }

        $project->save();

        // 4. Chuyển hướng về trang danh sách
        return redirect()->route('admin.projects.index')->with('success', 'Thêm dự án thành công!');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        // 1. Tìm dự án cần sửa
        $project = Project::findOrFail($id);

        // 2. Validate dữ liệu (Tương tự store nhưng image không bắt buộc)
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|in:bridge,factory,urban',
            'location' => 'nullable|string',
            'year' => 'nullable|integer|min:1900|max:2099',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // 3. Cập nhật các trường thông tin
        $project->title = $request->title;
        $project->slug = \Illuminate\Support\Str::slug($request->title);
        $project->category = $request->category;
        $project->location = $request->location;
        $project->year = $request->year;
        $project->summary = $request->summary;
        $project->description = $request->description;

        // Gán status mặc định nếu form không có
        $project->status = $request->status ?? 'published';

        // 4. Xử lý ảnh (Chỉ cập nhật nếu người dùng chọn file mới)
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ trong thư mục public/images nếu muốn dọn dẹp bộ nhớ
            if ($project->image && file_exists(public_path('images/' . $project->image))) {
                unlink(public_path('images/' . $project->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $project->image = $filename;
        }

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Cập nhật dự án thành công!');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Đã xóa dự án!');
    }
}