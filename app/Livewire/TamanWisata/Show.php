<?php

namespace App\Livewire\TamanWisata;

use Livewire\Component;
use App\Models\TamanWisata;

class Show extends Component
{
    public TamanWisata $tamanWisata;
    public $activeImage = 0;

    public function mount(TamanWisata $tamanWisata)
    {
        $this->tamanWisata = $tamanWisata;
    }

    public function setActiveImage($index)
    {
        $this->activeImage = $index;
    }

    public function render()
    {
        return view('livewire.taman-wisata.show')->layout('layouts.user');
    }
} 