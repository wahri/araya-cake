<?php

namespace App\Http\Controllers;

use App\Models\ImageStorage;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders=Slider::all();
        return view('admin.slider.slider', compact(['sliders']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $images = ImageStorage::all();
        return view('admin.slider.addSlider', compact(['images']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'small_text' => 'nullable|string',
            'big_text' => 'nullable|string',
            'alt_image' => 'nullable|string',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'image_id' => 'required',
            'image_id.*' => 'exists:image_storages,id', // Ganti 'image_storages' dengan nama tabel image storage yang sesuai
        ]);

        // Create product
         Slider::create([
            'name' => $validatedData['name'],
            'small_text' => $validatedData['small_text'],
            'big_text' => $validatedData['big_text'],
            'image_storage_id' => $validatedData['image_id'],
            'alt_image' => $validatedData['alt_image'],
            'description' => $validatedData['description'],
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        // Redirect to product index with success message
        return redirect()->route('admin.slider.index')->with('success', 'Berhasil menambahkan slider.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        $images = ImageStorage::all();
        return view('admin.slider.editSlider', compact(['images', 'slider']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'small_text' => 'nullable|string',
            'big_text' => 'nullable|string',
            'alt_image' => 'nullable|string',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'image_id' => 'required',
            'image_id.*' => 'exists:image_storages,id', // Ganti 'image_storages' dengan nama tabel image storage yang sesuai
        ]);

        // Cari kategori berdasarkan ID
        $slider = Slider::findOrFail($id);

        // Update data kategori
        $slider->update([
            'name' => $validatedData['name'],
            'small_text' => $validatedData['small_text'],
            'big_text' => $validatedData['big_text'],
            'image_storage_id' => $validatedData['image_id'],
            'alt_image' => $validatedData['alt_image'],
            'description' => $validatedData['description'],
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        // Redirect ke halaman tampilan kategori dengan pesan sukses
        return redirect()->route('admin.slider.index')->with('success', 'Slider berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari kategori berdasarkan ID
        $slider = Slider::findOrFail($id);

        // Hapus kategori
        $slider->delete();

        // Redirect ke halaman tampilan kategori dengan pesan sukses
        return redirect()->back()->with('success', 'Slider berhasil dihapus.');
    }
}
