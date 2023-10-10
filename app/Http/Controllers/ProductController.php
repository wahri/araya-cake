<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\ImageStorage;
use App\Models\PilihanColor;
use App\Models\PilihanType;
use App\Models\Product;
use App\Models\RelImageProduct;
use Illuminate\Http\Request;

use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('images')->get();
        return view('admin.product.index', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $images = ImageStorage::orderBy('created_at', 'desc')->get();
        $pilihan_type = PilihanType::orderBy('created_at', 'desc')->get();
        $pilihan_color = PilihanColor::orderBy('created_at', 'desc')->get();
        $categories = CategoryProduct::all();
        return view('admin.product.addProduct', compact(['images', 'categories', 'pilihan_type', 'pilihan_color']));
    }

    function uploadProductImage(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'length' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'information' => 'nullable|string',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'has_message' => 'nullable|boolean',
            'has_decoration' => 'nullable|boolean',
            'pilihan_type_id' => 'nullable|exists:pilihan_types,id', 
            'pilihan_color_id' => 'nullable|exists:pilihan_colors,id',
            'category_product_id' => 'required|exists:category_products,id',
            'sub_category_product_id' => 'required|exists:sub_category_products,id',
            'id_images' => 'required|array',
            'id_images.*' => 'exists:image_storages,id', 
        ]);

        $slug = Str::of($validatedData['name'])->slug('-') . '-' . Str::random(6);

        $product = Product::create([
            'name' => $validatedData['name'],
            'slug' => $slug,
            'length' => $validatedData['length'],
            'width' => $validatedData['width'],
            'height' => $validatedData['height'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'information' => $validatedData['information'],
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
            'category_product_id' => $validatedData['category_product_id'],
            'sub_category_product_id' => $validatedData['sub_category_product_id'],
            'has_message' => $validatedData['has_message'] ?? 0,
            'has_decoration' => $validatedData['has_decoration'] ?? 0,
            'pilihan_type_id' => $validatedData['pilihan_type_id'],
            'pilihan_color_id' => $validatedData['pilihan_color_id'],
        ]);

        // Attach images to the product using RelImageProduct
        if (!empty($validatedData['id_images'])) {
            foreach ($validatedData['id_images'] as $idImage) {
                RelImageProduct::create([
                    'image_storage_id' => $idImage,
                    'product_id' => $product->id,
                ]);
            }
        }

        // Redirect to product index with success message
        return redirect()->route('admin.product.index')->with('success', 'Berhasil menambahkan produk.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $images = ImageStorage::all();
        $categories = CategoryProduct::all();
        $product = Product::findOrFail($id);
        return view('admin.product.showProduct', compact(['product', 'images', 'categories']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $images = ImageStorage::all();
        $categories = CategoryProduct::all();
        $product = Product::findOrFail($id);
        $pilihan_type = PilihanType::orderBy('created_at', 'desc')->get();
        $pilihan_color = PilihanColor::orderBy('created_at', 'desc')->get();
        return view('admin.product.editProduct', compact(['product', 'images', 'categories', 'pilihan_type', 'pilihan_color']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'length' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'information' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'has_message' => 'nullable|boolean',
            'has_decoration' => 'nullable|boolean',
            'pilihan_type_id' => 'nullable|exists:pilihan_types,id', 
            'pilihan_color_id' => 'nullable|exists:pilihan_colors,id',
            'category_product_id' => 'required|exists:category_products,id',
            'sub_category_product_id' => 'required|exists:sub_category_products,id',
            'id_images' => 'required|array',
            'id_images.*' => 'exists:image_storages,id', 
        ]);

        // Cari produk yang akan diupdate
        $product = Product::findOrFail($id);

        // Update data produk
        $product->update([
            'name' => $validatedData['name'],
            'length' => $validatedData['length'],
            'width' => $validatedData['width'],
            'height' => $validatedData['height'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'information' => $validatedData['information'],
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
            'category_product_id' => $validatedData['category_product_id'],
            'sub_category_product_id' => $validatedData['sub_category_product_id'],
            'has_message' => $validatedData['has_message'] ?? 0,
            'has_decoration' => $validatedData['has_decoration'] ?? 0,
            'pilihan_type_id' => $validatedData['pilihan_type_id'],
            'pilihan_color_id' => $validatedData['pilihan_color_id'],
        ]);

        // Update relasi image jika ada
        if (!empty($validatedData['id_images'])) {
            $product->images()->sync($validatedData['id_images']);
        } else {
            $product->images()->detach(); // Untuk menghapus relasi gambar jika tidak ada gambar terkait
        }

        // Redirect ke halaman tampilan produk dengan pesan sukses
        return redirect()->route('admin.product.index')->with('success', 'Product berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Hapus relasi gambar terkait dalam tabel rel_image_product
        $product->images()->detach();

        // Hapus produk itu sendiri
        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Berhasil menghapus data produk');
    }
}
