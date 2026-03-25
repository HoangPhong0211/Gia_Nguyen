<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();

            // Thêm trường icon để lưu class FontAwesome (ví dụ: fa-vials)
            $table->string('icon')->nullable()->default('fa-microscope');

            $table->text('summary')->nullable(); // Mô tả ngắn (150-200 ký tự)
            $table->longText('description')->nullable(); // Lưu nội dung bảng từ PDF
            $table->string('featured_image')->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->string('status')->default('published'); // published, draft
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
