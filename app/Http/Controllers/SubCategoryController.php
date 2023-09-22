<?php

namespace App\Http\Controllers;

use App\Models\SubCategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_product_id' => 'required|exists:category_products,id',
        ]);

        $slug = Str::of($validatedData['name'])->slug('-');

        // Update data kategori
        SubCategoryProduct::create([
            'slug' => $slug,
            'name' => $validatedData['name'],
            'category_product_id' => $validatedData['category_product_id'],
        ]);

        return redirect()->back()->with(['success' => 'Sub Kategori Berhasil Ditambahkan!']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari kategori berdasarkan ID
        $category = SubCategoryProduct::findOrFail($id);

        // Hapus kategori
        $category->delete();

        // Redirect ke halaman tampilan kategori dengan pesan sukses
        return redirect()->back()->with('success', 'Sub Kategori berhasil dihapus.');
    }
}
