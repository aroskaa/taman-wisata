<?php

namespace Database\Seeders;

use App\Models\HeroSlider;
use Illuminate\Database\Seeder;

class HeroSliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            [
                'name' => 'Welcome to Indonesia Tourism',
                'image_url' => 'hero/slider-1.jpg',
                'order' => 1,
            ],
            [
                'name' => 'Discover Beautiful Places',
                'image_url' => 'hero/slider-2.jpg',
                'order' => 2,
            ],
            [
                'name' => 'Experience Natural Wonders',
                'image_url' => 'hero/slider-3.jpg',
                'order' => 3,
            ],
        ];

        foreach ($sliders as $slider) {
            HeroSlider::create($slider);
        }
    }
} 