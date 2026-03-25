<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // THÊM DÒNG NÀY

class AppServiceProvider extends ServiceProvider
{
    public function register(): void { }

    public function boot(): void
    {
        // THÊM DÒNG NÀY ĐỂ FIX LỖI 500 KHI DÙNG PAGINATE
        Paginator::useTailwind(); 
    }
}