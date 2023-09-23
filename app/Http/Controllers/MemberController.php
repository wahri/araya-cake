<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    function setting()
    {
        return view('setting');
    }

    function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'birthdate' => ['required', 'date'],
            'address' => ['required', 'string', 'max:255'],
        ], [
            'name.required' => 'Kolom nama harus diisi',
            'name.string' => 'Kolom nama harus berupa teks',
            'name.max' => 'Kolom nama maksimal 255 karakter',

            'phone.required' => 'Kolom nomor telepon harus diisi',
            'phone.string' => 'Kolom nomor telepon harus berupa teks',
            'phone.max' => 'Kolom nomor telepon maksimal 20 karakter',

            'birthdate.required' => 'Kolom tanggal lahir harus diisi',
            'birthdate.date' => 'Format tanggal lahir tidak valid',

            'address.required' => 'Kolom alamat harus diisi',
            'address.string' => 'Kolom alamat harus berupa teks',
            'address.max' => 'Kolom alamat maksimal 255 karakter',
        ]);

        $user = User::findOrFail(auth()->user()->id);

        $user->update([
            'name' => $validatedData['name'],
        ]);

        $user->profile()->update([
            'phone' => $validatedData['phone'],
            'birthdate' => $validatedData['birthdate'],
            'address' => $validatedData['address'],
        ]);

        return redirect()->back()->with('success', 'mengupdate profile');
    }
}
