<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $devices = [
            ['name' => 'Máy thử độ bền kéo, nén, uốn WE-1000B', 'slug' => 'we-1000b'],
            ['name' => 'Máy thử độ bền nén TYE-2000', 'slug' => 'tye-2000'],
            ['name' => 'Máy thử độ bền nén, uốn MC-100', 'slug' => 'mc-100'],
        ];

        foreach ($devices as $device) {
            \App\Models\Certificate::create([
                'name' => $device['name'],
                'slug' => $device['slug'],
                'issue_date' => now(),
                'image_front' => 'certificates/default.jpg', // Bạn cần có ảnh này trong storage
            ]);
        }
    }
}
