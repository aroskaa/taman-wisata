<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeroSlider extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'image_url',
        'order',
    ];

    public function getImageUrlAttribute($value)
    {
        return $value ?? '';
    }
}
