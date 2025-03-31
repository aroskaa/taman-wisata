<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\HeroSlider;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(): View
    {
        $sliders = HeroSlider::orderBy('order')->get();
        return view('welcome', compact('sliders'));
    }
}
