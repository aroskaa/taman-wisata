<?php

namespace App\Livewire\TamanWisata;

use Livewire\Component;
use App\Models\TamanWisata;

class Show extends Component
{
    public TamanWisata $tamanWisata;
    public $activeImage = 0;
    public $isSliding = true;

    public function mount(TamanWisata $tamanWisata)
    {
        $this->tamanWisata = $tamanWisata;
    }

    public function setActiveImage($index)
    {
        $this->activeImage = $index;
    }

    public function nextSlide()
    {
        if ($this->isSliding && $this->tamanWisata->images->count() > 0) {
            $this->activeImage = ($this->activeImage + 1) % $this->tamanWisata->images->count();
        }
    }

    public function toggleSlideshow()
    {
        $this->isSliding = !$this->isSliding;
    }

    public function render()
    {
        return view('livewire.taman-wisata.show')->layout('layouts.user');
    }
} 