<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'big_icon', 'small_icon', 'is_primary', 'image_storage_id'
    ];

    protected $with = ['image'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategoryProduct::class);
    }

    public function image()
    {
        return $this->belongsTo(ImageStorage::class, 'image_storage_id');
    }
}
