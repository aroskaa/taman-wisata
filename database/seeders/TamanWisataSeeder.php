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
                'name' => 'Taman Bunga Nusantara',
                'description' => 'Taman bunga yang indah dengan berbagai macam bunga dari seluruh dunia.',
                'location' => 'Cipanas, Cianjur, Jawa Barat',
                'rating' => 4.5,
                'wa_admin' => '6281234567890',
            ],
            [
                'name' => 'Taman Safari Indonesia',
                'description' => 'Taman margasatwa yang memiliki berbagai koleksi hewan dari seluruh dunia.',
                'location' => 'Cisarua, Bogor, Jawa Barat',
                'rating' => 4.7,
                'wa_admin' => '6289876543210',
            ],
            [
                'name' => 'Taman Mini Indonesia Indah',
                'description' => 'Taman rekreasi yang menampilkan kebudayaan dari berbagai daerah di Indonesia.',
                'location' => 'Jakarta Timur, DKI Jakarta',
                'rating' => 4.3,
                'wa_admin' => '6287654321098',
            ],
            [
                'name' => 'Taman Orchid Forest',
                'description' => 'Hutan anggrek terbesar di Indonesia dengan berbagai koleksi anggrek langka.',
                'location' => 'Lembang, Bandung Barat',
                'rating' => 4.6,
                'wa_admin' => '6282345678901',
            ],
            [
                'name' => 'Taman Wisata Matahari',
                'description' => 'Taman rekreasi keluarga dengan berbagai wahana permainan outdoor.',
                'location' => 'Puncak, Bogor',
                'rating' => 4.2,
                'wa_admin' => '6285678901234',
            ],
            [
                'name' => 'Taman Langit Gunung Banyak',
                'description' => 'Spot paralayang dengan pemandangan kota Batu yang menakjubkan.',
                'location' => 'Batu, Malang',
                'rating' => 4.8,
                'wa_admin' => '6283456789012',
            ],
            [
                'name' => 'Taman Kyai Langgeng',
                'description' => 'Taman rekreasi edukasi dengan berbagai wahana menarik.',
                'location' => 'Magelang, Jawa Tengah',
                'rating' => 4.1,
                'wa_admin' => '6281234567891',
            ],
            [
                'name' => 'Taman Pintar Yogyakarta',
                'description' => 'Wahana edukasi sains dan teknologi yang interaktif.',
                'location' => 'Yogyakarta',
                'rating' => 4.4,
                'wa_admin' => '6289876543211',
            ],
            [
                'name' => 'Taman Nasional Bromo',
                'description' => 'Taman nasional dengan pemandangan gunung dan savana yang memukau.',
                'location' => 'Probolinggo, Jawa Timur',
                'rating' => 4.9,
                'wa_admin' => '6287654321099',
            ],
            [
                'name' => 'Taman Wisata Mangrove',
                'description' => 'Hutan mangrove dengan tracking board dan edukasi lingkungan.',
                'location' => 'Surabaya, Jawa Timur',
                'rating' => 4.2,
                'wa_admin' => '6285678901235',
            ],
            [
                'name' => 'Taman Pelangi',
                'description' => 'Taman dengan ribuan lampu LED yang membentuk berbagai ornamen indah.',
                'location' => 'Jogja, DI Yogyakarta',
                'rating' => 4.3,
                'wa_admin' => '6282345678902',
            ],
            [
                'name' => 'Taman Harmoni',
                'description' => 'Taman musik dengan berbagai instalasi alat musik interaktif.',
                'location' => 'Bandung, Jawa Barat',
                'rating' => 4.5,
                'wa_admin' => '6285678901236',
            ],
            [
                'name' => 'Taman Kupu-Kupu',
                'description' => 'Taman konservasi dengan berbagai spesies kupu-kupu langka.',
                'location' => 'Tabanan, Bali',
                'rating' => 4.6,
                'wa_admin' => '6281234567892',
            ],
            [
                'name' => 'Taman Air Mancur',
                'description' => 'Taman dengan pertunjukan air mancur menari dan cahaya.',
                'location' => 'Purwakarta, Jawa Barat',
                'rating' => 4.4,
                'wa_admin' => '6289876543212',
            ],
            [
                'name' => 'Taman Labirin',
                'description' => 'Taman dengan labirin tanaman yang menantang.',
                'location' => 'Malang, Jawa Timur',
                'rating' => 4.2,
                'wa_admin' => '6287654321100',
            ],
            [
                'name' => 'Taman Burung',
                'description' => 'Taman dengan koleksi berbagai jenis burung eksotis.',
                'location' => 'Bogor, Jawa Barat',
                'rating' => 4.7,
                'wa_admin' => '6282345678903',
            ],
            [
                'name' => 'Taman Dinosaurus',
                'description' => 'Taman dengan replika dinosaurus berukuran asli.',
                'location' => 'Semarang, Jawa Tengah',
                'rating' => 4.5,
                'wa_admin' => '6285678901237',
            ],
            [
                'name' => 'Taman Bunga Lavender',
                'description' => 'Taman dengan hamparan bunga lavender yang mempesona.',
                'location' => 'Wonosobo, Jawa Tengah',
                'rating' => 4.8,
                'wa_admin' => '6281234567893',
            ],
            [
                'name' => 'Taman Gua Kreo',
                'description' => 'Taman wisata alam dengan gua dan koloni kera.',
                'location' => 'Semarang, Jawa Tengah',
                'rating' => 4.3,
                'wa_admin' => '6289876543213',
            ],
            [
                'name' => 'Taman Balekambang',
                'description' => 'Taman bersejarah dengan arsitektur Jawa klasik.',
                'location' => 'Solo, Jawa Tengah',
                'rating' => 4.4,
                'wa_admin' => '6287654321101',
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