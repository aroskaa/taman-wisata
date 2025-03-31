<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\TamanWisata;
use Illuminate\Http\Request;

class TamanWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tamanWisatas = TamanWisata::with('images')->paginate(10);
        return view('taman-wisata.index', compact('tamanWisatas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TamanWisata $tamanWisata): View
    {
        return view('taman-wisata.show', compact('tamanWisata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TamanWisata $tamanWisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TamanWisata $tamanWisata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TamanWisata $tamanWisata)
    {
        //
    }
}
