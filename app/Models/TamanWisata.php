<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\TempatWisataImage;

class TamanWisata extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'description',
        'location',
        'rating',
        'wa_admin',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(TamanWisataImages::class)->orderBy('order');
    }

    public function getMainImageAttribute()
    {
        return $this->images->first() ? asset('storage/' . $this->images->first()->image_path) : asset('images/no-image.jpg');
    }

    public function getWhatsappLinkAttribute()
    {
        $message = "Halo, saya ingin membeli tiket untuk {$this->name}";
        $encodedMessage = urlencode($message);
        return "https://wa.me/{$this->wa_admin}?text={$encodedMessage}";
    }
}
