<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

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
        $nextOrder = HeroSlider::max('order') + 1;
        return view('admin.hero-sliders.create', compact('nextOrder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if (!$request->hasFile('image_url')) {
            return back()->withErrors(['image_url' => 'An image is required.']);
        }

        // Store only the path, not the full URL
        $imagePath = $request->file('image_url')->store('hero-sliders', 'public');
        $nextOrder = HeroSlider::max('order') + 1;
        
        HeroSlider::create([
            'name' => $request->name,
            'image_url' => $imagePath, // This will store just the path like 'hero-sliders/filename.jpg'
            'order' => $nextOrder
        ]);

        return redirect()->route('admin.hero-sliders.index')
            ->with('success', 'Hero Slider created successfully.');
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
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'name' => $request->name
        ];

        if ($request->hasFile('image_url')) {
            // Delete old image
            if ($heroSlider->image_url) {
                // Remove 'storage/' prefix from the path
                $oldPath = str_replace('storage/', '', $heroSlider->image_url);
                Storage::disk('public')->delete($oldPath);
            }
            
            // Store new image
            $imagePath = $request->file('image_url')->store('hero-sliders', 'public');
            $data['image_url'] = $imagePath;
        }

        $heroSlider->update($data);

        return redirect()->route('admin.hero-sliders.index')
            ->with('success', 'Hero Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSlider $heroSlider): RedirectResponse
    {
        if ($heroSlider->image_url) {
            Storage::disk('public')->delete($heroSlider->image_url);
        }
        
        $heroSlider->delete();

        return redirect()->route('admin.hero-sliders.index')
            ->with('success', 'Hero Slider deleted successfully.');
    }
}
