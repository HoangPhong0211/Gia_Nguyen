<?php

namespace App\Http\Controllers;

// THÊM DÒNG NÀY VÀO ĐÂY:
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        // Bây giờ Laravel đã biết Certificate nằm ở đâu để lấy dữ liệu
        $certificates = Certificate::latest()->paginate(12);
        return view('certificates', compact('certificates'));
    }
}