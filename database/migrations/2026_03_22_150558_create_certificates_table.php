<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('slug')->unique(); // Đảm bảo không trùng ID để nhảy link href
            $table->string('serial_number')->nullable(); 
            $table->text('description')->nullable(); // Chuyển sang text để mô tả được dài hơn nếu cần
            $table->string('image_front'); 
            $table->string('image_back')->nullable(); // Cho phép trống nếu chỉ có 1 mặt ảnh
            $table->date('issue_date'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};