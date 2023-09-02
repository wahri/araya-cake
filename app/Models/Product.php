<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'length', 'width', 'height', 'description', 'meta_title', 'meta_keyword', 'meta_description', 'category_product_id'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }

    public function images()
    {
        return $this->belongsToMany(ImageStorage::class, 'rel_image_products');
    }

}
