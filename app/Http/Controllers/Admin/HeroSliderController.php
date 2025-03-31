<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Laravel\Facades\Image;

class HeroSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $sliders = HeroSlider::orderBy('order')->get();
        return view('admin.hero-sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.hero-sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'order' => 'nullable|integer',
        ]);

        $imagePath = $request->file('image')->store('hero-sliders', 'public');
        
        // Resize image
        $img = Image::read(storage_path('app/public/' . $imagePath));
        $img->resize(1920, 1080, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save();

        HeroSlider::create([
            'name' => $request->name,
            'image_url' => $imagePath,
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('admin.hero-sliders.index')
            ->with('success', 'Hero slider created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HeroSlider $heroSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSlider $heroSlider): View
    {
        return view('admin.hero-sliders.edit', compact('heroSlider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeroSlider $heroSlider): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($heroSlider->getRawOriginal('image_url'));
            
            // Store new image
            $imagePath = $request->file('image')->store('hero-sliders', 'public');
            
            // Resize image
            $img = Image::read(storage_path('app/public/' . $imagePath));
            $img->resize(1920, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save();
            
            $heroSlider->image_url = $imagePath;
        }

        $heroSlider->name = $request->name;
        $heroSlider->order = $request->order ?? 0;
        $heroSlider->save();

        return redirect()->route('admin.hero-sliders.index')
            ->with('success', 'Hero slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSlider $heroSlider): RedirectResponse
    {
        // Delete image
        Storage::disk('public')->delete($heroSlider->getRawOriginal('image_url'));
        
        $heroSlider->delete();

        return redirect()->route('admin.hero-sliders.index')
            ->with('success', 'Hero slider deleted successfully.');
    }
}
