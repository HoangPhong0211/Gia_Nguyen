<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        // Sử dụng paginate(9) để tránh lỗi treo trang (Timeout) nếu dữ liệu lớn
        $services = Service::where('status', 'published')
            ->orderBy('sort_order', 'asc')
            ->paginate(9); 

        return view('services', compact('services'));
    }

    public function show($slug) {
        // Chỉ lấy những dịch vụ đang ở trạng thái 'published'
        $service = Service::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('service-detail', compact('service'));
    }
}