<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug','category_product_id', 'name'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
