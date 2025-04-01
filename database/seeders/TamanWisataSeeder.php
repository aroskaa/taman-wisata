<?php

namespace Database\Seeders;

use App\Models\TamanWisata;
use App\Models\TamanWisataImages;
use Illuminate\Database\Seeder;

class TamanWisataSeeder extends Seeder
{
    public function run(): void
    {
        $tamanWisatas = [
            [
                'name' => 'Waterbom Bali',
                'description' => 'Waterpark terbaik di Asia dengan berbagai wahana air modern dan taman tropis yang luas.',
                'location' => 'Kuta, Bali',
                'rating' => 4.8,
                'wa_admin' => '6281234567890',
            ],
            [
                'name' => 'Atlantis Water Adventures',
                'description' => 'Taman air dengan tema Atlantis, dilengkapi berbagai wahana seru untuk seluruh keluarga.',
                'location' => 'Ancol, Jakarta Utara',
                'rating' => 4.5,
                'wa_admin' => '6289876543210',
            ],
            [
                'name' => 'The Jungle Waterpark',
                'description' => 'Waterpark terbesar di Bogor dengan konsep hutan hujan tropis.',
                'location' => 'Bogor, Jawa Barat',
                'rating' => 4.4,
                'wa_admin' => '6287654321098',
            ],
            [
                'name' => 'Jogja Bay Pirates Adventure Waterpark',
                'description' => 'Waterpark bertema bajak laut dengan wahana air ekstrim dan family rides.',
                'location' => 'Yogyakarta',
                'rating' => 4.6,
                'wa_admin' => '6282345678901',
            ],
            [
                'name' => 'Go! Wet Waterpark',
                'description' => 'Waterpark modern dengan teknologi terkini dan wahana air internasional.',
                'location' => 'Grand Wisata, Bekasi',
                'rating' => 4.5,
                'wa_admin' => '6285678901234',
            ],
            [
                'name' => 'Ocean Park BSD',
                'description' => 'Waterpark dengan konsep lautan dan berbagai wahana air menarik.',
                'location' => 'BSD City, Tangerang',
                'rating' => 4.3,
                'wa_admin' => '6283456789012',
            ],
            [
                'name' => 'Hawai Waterpark',
                'description' => 'Waterpark dengan tema Hawaii yang dilengkapi dengan wave pool terbesar di Indonesia.',
                'location' => 'Malang, Jawa Timur',
                'rating' => 4.4,
                'wa_admin' => '6281234567891',
            ],
            [
                'name' => 'Ciputra Waterpark',
                'description' => 'Waterpark dengan tema petualangan air dan wahana untuk segala usia.',
                'location' => 'Surabaya, Jawa Timur',
                'rating' => 4.2,
                'wa_admin' => '6289876543211',
            ],
            [
                'name' => 'Snowbay Waterpark',
                'description' => 'Waterpark dengan konsep salju di tengah kota Jakarta.',
                'location' => 'TMII, Jakarta Timur',
                'rating' => 4.3,
                'wa_admin' => '6287654321099',
            ],
            [
                'name' => 'Circus Waterpark',
                'description' => 'Waterpark unik dengan tema sirkus dan berbagai wahana air seru.',
                'location' => 'Bali',
                'rating' => 4.2,
                'wa_admin' => '6285678901235',
            ],
            [
                'name' => 'Transera Waterpark',
                'description' => 'Waterpark modern dengan berbagai fasilitas rekreasi keluarga.',
                'location' => 'Bekasi, Jawa Barat',
                'rating' => 4.4,
                'wa_admin' => '6282345678902',
            ],
            [
                'name' => 'Amanzi Waterpark',
                'description' => 'Waterpark dengan desain modern dan wahana air yang menantang.',
                'location' => 'Palembang, Sumatera Selatan',
                'rating' => 4.3,
                'wa_admin' => '6285678901236',
            ],
            [
                'name' => 'Bugis Waterpark',
                'description' => 'Waterpark terbesar di Sulawesi Selatan dengan berbagai wahana air menarik.',
                'location' => 'Makassar, Sulawesi Selatan',
                'rating' => 4.2,
                'wa_admin' => '6281234567892',
            ],
            [
                'name' => 'Gowa Discovery Park',
                'description' => 'Taman rekreasi air dengan wahana air modern dan area bermain keluarga.',
                'location' => 'Gowa, Sulawesi Selatan',
                'rating' => 4.1,
                'wa_admin' => '6289876543212',
            ],
            [
                'name' => 'Ocean Park Waterpark',
                'description' => 'Waterpark dengan tema kelautan dan berbagai wahana air seru.',
                'location' => 'Batam, Kepulauan Riau',
                'rating' => 4.3,
                'wa_admin' => '6287654321100',
            ],
        ];

        foreach ($tamanWisatas as $tamanWisata) {
            $taman = TamanWisata::create($tamanWisata);

            // Create 3 sample images for each taman wisata
            for ($i = 1; $i <= 3; $i++) {
                TamanWisataImages::create([
                    'taman_wisata_id' => $taman->id,
                    'image_path' => 'placeholder/taman-wisata-' . $i . '.jpg',
                    'order' => $i,
                ]);
            }
        }
    }
} 