<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\HeroSlider as Slider;

class HeroSlider extends Component
{
    public $currentSlide = 0;
    public $sliders;

    public function getListeners()
    {
        return [
            '$refresh' => '$refresh',
            'nextSlide' => 'nextSlide'
        ];
    }

    public function mount()
    {
        $this->sliders = Slider::orderBy('order')->get();
    }

    public function nextSlide()
    {
        $this->currentSlide = ($this->currentSlide + 1) % count($this->sliders);
    }

    public function prevSlide()
    {
        $this->currentSlide = ($this->currentSlide - 1 + count($this->sliders)) % count($this->sliders);
    }

    public function dehydrate()
    {
        $this->dispatch('initSliderAutoAdvance');
    }

    public function render()
    {
        return view('livewire.hero-slider');
    }
}
