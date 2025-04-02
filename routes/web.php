<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\TamanWisataController;
use App\Http\Controllers\TamanWisataController as ControllersTamanWisataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

// Public Taman Wisata Routes
Route::get('/taman-wisata', \App\Livewire\TamanWisata\Index::class)->name('taman-wisata.index');
Route::get('/taman-wisata/{tamanWisata}', \App\Livewire\TamanWisata\Show::class)->name('taman-wisata.show');

// Auth Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('taman-wisatas', TamanWisataController::class);
        Route::resource('hero-sliders', HeroSliderController::class);
    });
});

require __DIR__.'/auth.php';
