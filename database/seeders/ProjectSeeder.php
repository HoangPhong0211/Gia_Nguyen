<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Trung tam hanh chinh',
                'location' => 'Ninh Thuan',
                'year' => 2024,
                'image' => '/images/card-large-item1.jpg',
            ],
            [
                'title' => 'Khu dan cu ven bien',
                'location' => 'Binh Thuan',
                'year' => 2023,
                'image' => '/images/card-large-item2.jpg',
            ],
            [
                'title' => 'Ha tang khu cong nghiep',
                'location' => 'Khanh Hoa',
                'year' => 2022,
                'image' => '/images/card-large-item3.jpg',
            ],
            [
                'title' => 'Khu nghi duong sinh thai',
                'location' => 'Phu Yen',
                'year' => 2021,
                'image' => '/images/card-large-item4.jpg',
            ],
        ];

        foreach ($items as $item) {
            $slug = Str::slug($item['title']);

            Project::query()->updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $item['title'],
                    'slug' => $slug,
                    'location' => $item['location'],
                    'year' => $item['year'],
                    'summary' => 'Thong tin mo ta ngan ve pham vi tu van, giam sat va kiem dinh.',
                    'featured_image' => $item['image'],
                    'status' => 'published',
                ]
            );
        }
    }
}
