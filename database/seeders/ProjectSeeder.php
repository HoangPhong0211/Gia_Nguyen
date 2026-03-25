<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // Xóa dữ liệu cũ để tránh trùng lặp
        Project::truncate();

        $projects = [
            ['title' => 'Lĩnh vực Năng lượng', 'category' => 'energy', 'location' => 'Ninh Thuận', 'year' => 2024, 'image' => 'Picture6.png'],
            ['title' => 'Hạ tầng Giao thông Trọng điểm', 'category' => 'transport', 'location' => 'Ninh Thuận', 'year' => 2024, 'image' => 'Picture1.png'],
            ['title' => 'Thủy lợi & Nông nghiệp Công nghệ cao', 'category' => 'agriculture', 'location' => 'Ninh Thuận', 'year' => 2023, 'image' => 'Picture5.png'],
            ['title' => 'Công trình Dân dụng & Công nghiệp', 'category' => 'civil-industrial', 'location' => 'Ninh Thuận', 'year' => 2023, 'image' => 'Picture8.png'],
        ];

        foreach ($projects as $item) {
            Project::create([
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'category' => $item['category'],
                'location' => $item['location'],
                'year' => $item['year'],
                'image' => $item['image'],
                'summary' => 'Thông tin mô tả ngắn về phạm vi tư vấn, giám sát và kiểm định.',
                'description' => 'Nội dung chi tiết đang được cập nhật...',
                'status' => 'published'
            ]);
        }
    }
}
