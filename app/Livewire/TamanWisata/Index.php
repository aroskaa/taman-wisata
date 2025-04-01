<?php

namespace App\Livewire\TamanWisata;

use Livewire\Component;
use App\Models\TamanWisata;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $tamanWisatas = TamanWisata::where('name', 'like', "%{$this->search}%")
            ->orWhere('location', 'like', "%{$this->search}%")
            ->paginate(10);

        return view('livewire.taman-wisata.index', [
            'tamanWisatas' => $tamanWisatas
        ])->layout('layouts.user');
    }
} 