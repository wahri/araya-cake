<?php

namespace App\Http\Controllers;

use App\Models\ImageStorage;
use Illuminate\Http\Request;

class ImageManagementController extends Controller
{
    function index()
    {
        $getImageData = ImageStorage::orderBy('created_at', 'desc')->get();

        return view('admin.ImageManagement.index', ['image_data' => $getImageData]);
    }

    function uploadImages(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        $imageUpload = new ImageStorage();
        $imageUpload->name = $imageName;
        $imageUpload->save();
        return response()->json(['success' => $imageName]);
    }

    function deleteImages($id)
    {
        $image = ImageStorage::findOrFail($id);
        $path = public_path() . "/images/" . $image->name;
        if (file_exists($path)) {
            unlink($path);
        }
        $image->delete();

        if ($image) {
            //redirect dengan pesan sukses
            return redirect()->back()->with(['success' => 'Gambar Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->back()->with(['error' => 'Gambar Gagal Dihapus!']);
        }
    }
}
