<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihanType extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pilihan'
    ];

    public function types()
    {
        return $this->hasMany(Layer::class);
    }
}