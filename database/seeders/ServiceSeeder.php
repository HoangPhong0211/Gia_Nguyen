<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Thí nghiệm Vật liệu Xây dựng',
                'summary' => 'Thí nghiệm, đánh giá chỉ tiêu cơ lý và hóa học của vật liệu xây dựng.',
                'image' => '/images/card-image1.jpg',
            ],
            [
                'title' => 'Địa kỹ thuật & Khảo sát Hiện trường',
                'summary' => 'Khảo sát địa chất, đánh giá nền móng và điều kiện hiện trường.',
                'image' => '/images/card-image2.jpg',
            ],
            [
                'title' => 'Kiểm định & Quan trắc Công trình',
                'summary' => 'Kiểm định chất lượng, quan trắc biến dạng và an toàn công trình.',
                'image' => '/images/card-image3.jpg',
            ],
        ];

        foreach ($items as $index => $item) {
            $slug = Str::slug($item['title']);

            Service::query()->updateOrCreate(
                ['sort_order' => $index + 1],
                [
                    'title' => $item['title'],
                    'slug' => $slug,
                    'summary' => $item['summary'],
                    'description' => $item['summary'] . "\n\nNoi dung chi tiet se duoc cap nhat sau.",
                    'featured_image' => $item['image'],
                    'sort_order' => $index + 1,
                    'status' => 'published',
                ]
            );
        }
    }
}
