<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\TempatWisata;

class TamanWisataImages extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'taman_wisata_id',
        'image_path',
        'order',
    ];

    public function tamanWisata(): BelongsTo
    {
        return $this->belongsTo(TamanWisata::class);
    }
}
