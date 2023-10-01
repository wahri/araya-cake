<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihanColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pilihan'
    ];

    public function colors()
    {
        return $this->hasMany(Color::class);
    }
}
