<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TamanWisata;
use App\Models\TamanWisataImage;
use App\Models\TamanWisataImages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Laravel\Facades\Image;

class TamanWisataController extends Controller
{
    public function index(): View
    {
        $tamanWisatas = TamanWisata::with('images')->paginate(10);
        return view('admin.taman-wisatas.index', compact('tamanWisatas'));
    }

    public function create(): View
    {
        return view('admin.taman-wisatas.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
            'wa_admin' => 'required|string|min:10|max:13',
            'images.*' => 'required|image|max:2048',
            'images' => 'required|array|max:7',
        ]);

        DB::beginTransaction();

        try {
            $tamanWisata = TamanWisata::create([
                'name' => $request->name,
                'description' => $request->description,
                'location' => $request->location,
                'rating' => $request->rating,
                'wa_admin' => $request->wa_admin,
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $imagePath = $image->store('taman-wisatas', 'public');
                    
                    TamanWisataImages::create([
                        'taman_wisata_id' => $tamanWisata->id,
                        'image_path' => $imagePath,
                        'order' => $index,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('admin.taman-wisatas.index')
                ->with('success', 'Taman wisata created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(TamanWisata $tamanWisata): View
    {
        return view('admin.taman-wisatas.edit', compact('tamanWisata'));
    }

    public function update(Request $request, TamanWisata $tamanWisata): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
            'wa_admin' => 'required|string|max:20',
            'new_images.*' => 'nullable|image|max:2048',
            'new_images' => 'nullable|array|max:7',
            'delete_images.*' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $tamanWisata->update([
                'name' => $request->name,
                'description' => $request->description,
                'location' => $request->location,
                'rating' => $request->rating,
                'wa_admin' => $request->wa_admin,
            ]);

            // Delete selected images
            if ($request->has('delete_images')) {
                foreach ($request->delete_images as $imageId) {
                    $image = TamanWisataImages::find($imageId);
                    if ($image) {
                        Storage::disk('public')->delete($image->image_path);
                        $image->delete();
                    }
                }
            }

            // Add new images
            if ($request->hasFile('new_images')) {
                $currentImageCount = $tamanWisata->images()->count();
                $newImageCount = count($request->file('new_images'));
                
                if ($currentImageCount + $newImageCount > 7) {
                    return back()->with('error', 'Maximum 7 images allowed')->withInput();
                }
                
                $lastOrder = $tamanWisata->images()->max('order') ?? -1;
                
                foreach ($request->file('new_images') as $image) {
                    $lastOrder++;
                    $imagePath = $image->store('taman-wisatas', 'public');
                    
                    TamanWisataImages::create([
                        'taman_wisata_id' => $tamanWisata->id,
                        'image_path' => $imagePath,
                        'order' => $lastOrder,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('admin.taman-wisatas.index')
                ->with('success', 'Taman wisata updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(TamanWisata $tamanWisata): RedirectResponse
    {
        DB::beginTransaction();

        try {
            // Delete all images
            foreach ($tamanWisata->images as $image) {
                Storage::disk('public')->delete($image->image_path);
            }
            
            $tamanWisata->delete();
            
            DB::commit();

            return redirect()->route('admin.taman-wisatas.index')
                ->with('success', 'Tempat wisata deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
