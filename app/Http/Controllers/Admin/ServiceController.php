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
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|max:255']);

        Service::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'summary' => $request->summary,
            'description' => $request->description,
            'status' => $request->status ?? 'published',
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

        // Validate dữ liệu
        $request->validate(['title' => 'required|max:255']);

        // Cập nhật
        $service->update([
            'title' => $request->title,
            'slug' => \Illuminate\Support\Str::slug($request->title),
            'summary' => $request->summary,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->route('admin.services.index')->with('success', 'Đã xóa dịch vụ.');
    }
}