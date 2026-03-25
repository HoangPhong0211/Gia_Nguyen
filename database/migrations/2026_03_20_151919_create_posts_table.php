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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tiêu đề bài viết
            $table->string('slug')->unique(); // Đường dẫn thân thiện
            $table->text('excerpt')->nullable();
            $table->longText('content'); // Nội dung bài viết
            $table->string('featured_image')->nullable(); // Ảnh đại diện

            // Khóa ngoại liên kết với danh mục
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

            // Khóa ngoại liên kết với người đăng (Admin)
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');

            $table->string('status')->default('published'); // Trạng thái bài viết
            $table->integer('views')->default(0); // Lượt xem
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
