<?php

namespace App\Http\Controllers;

use App\Models\ImageStorage;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return view('admin.review.review', compact(['reviews']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $images = ImageStorage::all();
        return view('admin.review.addReview', compact(['images']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'alt_image' => 'required|string',
            'reviews' => 'required|string',
            'link_to_review' => 'required|string',
            'image_storage_id' => 'required',
            'image_storage_id.*' => 'exists:image_storages,id',
        ]);

        // Create product
        Review::create([
            'image_storage_id' => $validatedData['image_storage_id'],
            'alt_image' => $validatedData['alt_image'],
            'name' => $validatedData['name'],
            'reviews' => $validatedData['reviews'],
            'link_to_review' => $validatedData['link_to_review'],
        ]);

        // Redirect to product index with success message
        return redirect()->route('admin.review.index')->with('success', 'Berhasil menambahkan review.');
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
        $review = Review::findOrFail($id);
        $images = ImageStorage::all();
        return view('admin.review.editReview', compact(['images', 'review']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'alt_image' => 'required|string',
            'reviews' => 'required|string',
            'link_to_review' => 'required|string',
            'image_storage_id' => 'required',
            'image_storage_id.*' => 'exists:image_storages,id',
        ]);

        // Cari kategori berdasarkan ID
        $review = Review::findOrFail($id);

        // Update data kategori
        $review->update([
            'image_storage_id' => $validatedData['image_storage_id'],
            'alt_image' => $validatedData['alt_image'],
            'name' => $validatedData['name'],
            'reviews' => $validatedData['reviews'],
            'link_to_review' => $validatedData['link_to_review'],
        ]);

        // Redirect ke halaman tampilan kategori dengan pesan sukses
        return redirect()->route('admin.review.index')->with('success', 'Review berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari kategori berdasarkan ID
        $review = Review::findOrFail($id);

        // Hapus kategori
        $review->delete();

        // Redirect ke halaman tampilan kategori dengan pesan sukses
        return redirect()->back()->with('success', 'Review berhasil dihapus.');
    }
}
