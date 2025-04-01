<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TamanWisata;

class UserNavbar extends Component
{
    public $search = '';
    public $showSearchResults = false;
    public $searchResults = [];
    public $hideSearch = false;

    public function mount()
    {
        $this->hideSearch = request()->routeIs('taman-wisata.index');
    }

    public function updatedSearch()
    {
        if (strlen($this->search) > 0) {
            $this->searchResults = TamanWisata::where('name', 'like', "%{$this->search}%")
                ->orWhere('location', 'like', "%{$this->search}%")
                ->limit(3)
                ->get();
            $this->showSearchResults = true;
        } else {
            $this->reset('searchResults', 'showSearchResults');
        }
    }

    public function redirectToSearch()
    {
        return redirect()->route('taman-wisata.index', ['search' => $this->search]);
    }

    public function render()
    {
        return view('livewire.user-navbar');
    }
} 