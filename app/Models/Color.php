<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_color'
    ];

    public function pilihan_color()
    {
        return $this->belongsTo(PilihanColor::class);
    }
}
