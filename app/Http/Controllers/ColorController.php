<?php

namespace App\Http\Controllers;

use App\Models\PilihanColor;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function createColor()
    {
        $pilihanColor = PilihanColor::all();
        return view('admin.colorOption.addColorOption', compact(['pilihanColor']));
    }
}
