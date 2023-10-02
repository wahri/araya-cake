<?php

namespace App\Http\Controllers;

use App\Models\PilihanType;
use Illuminate\Http\Request;

class VarianController extends Controller
{
    public function createVarian()
    {
        $pilihanVarian = PilihanType::all();
        return view('admin.varian.addVarian', compact(['pilihanVarian']));
    }
}
