<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'big_icon', 'small_icon', 'is_primary'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
