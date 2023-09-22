<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\SubCategoryProduct;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryProduct::all();
        return view('admin.categoryProduct.addCategory', compact(['categories']));
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
            'small_icon' => 'nullable|string|max:255',
            'big_icon' => 'nullable|string|max:255',
            'is_primary' => 'nullable|boolean',
        ]);

        $slug = Str::of($validatedData['name'])->slug('-');
        $isPrimary = isset($validatedData['is_primary']) ? $validatedData['is_primary'] : false;

        // Update data kategori
        CategoryProduct::create([
            'slug' => $slug,
            'name' => $validatedData['name'],
            'small_icon' => $validatedData['small_icon'],
            'big_icon' => $validatedData['big_icon'],
            'is_primary' => $isPrimary,
        ]);

        return redirect()->back()->with(['success' => 'Kategori Berhasil Ditambahkan!']);
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
        $categories = CategoryProduct::all();
        $subCategories = SubCategoryProduct::where('category_product_id', $id)->get();
        $category = CategoryProduct::find($id);
        return view('admin.categoryProduct.editCategory', compact(['category','categories', 'subCategories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'small_icon' => 'nullable|string|max:255',
            'big_icon' => 'nullable|string|max:255',
            'is_primary' => 'nullable|boolean',
        ]);

        // Cari kategori berdasarkan ID
        $category = CategoryProduct::findOrFail($id);
        $isPrimary = isset($validatedData['is_primary']) ? $validatedData['is_primary'] : false;

        // Update data kategori
        $category->update([
            'name' => $validatedData['name'],
            'small_icon' => $validatedData['small_icon'],
            'big_icon' => $validatedData['big_icon'],
            'is_primary' => $isPrimary,
        ]);

        

        // Redirect ke halaman tampilan kategori dengan pesan sukses
        return redirect()->route('admin.categoryProduct.index')->with('success', 'Kategori berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari kategori berdasarkan ID
        $category = CategoryProduct::findOrFail($id);

        // Hapus kategori
        $category->delete();

        // Redirect ke halaman tampilan kategori dengan pesan sukses
        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }
}
