<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'serial_number',
        'description',
        'image_front',
        'image_back',
        'issue_date',
    ];

    // Tự động tạo slug từ tên nếu không nhập
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($certificate) {
            if (empty($certificate->slug)) {
                $certificate->slug = Str::slug($certificate->name);
            }
        });
    }

    // Ép kiểu issue_date về đối tượng Carbon để dễ dàng định dạng ngày tháng
    protected $casts = [
        'issue_date' => 'date',
    ];
}