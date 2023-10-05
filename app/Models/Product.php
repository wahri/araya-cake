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
        'name', 'slug', 'length', 'width', 'height', 'price', 'has_message', 'has_decoration', 'pilihan_type_id', 'pilihan_color_id', 'description', 'information', 'meta_title', 'meta_keyword', 'meta_description', 'category_product_id', 'sub_category_product_id'
    ];

    protected $with = ['category', 'subCategory', 'images', 'pilihan_type', 'pilihan_color'];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategoryProduct::class, 'sub_category_product_id');
    }

    public function images()
    {
        return $this->belongsToMany(ImageStorage::class, 'rel_image_products');
    }

    public function pilihan_type()
    {
        return $this->hasOne(PilihanType::class, 'id');
    }
    
    public function pilihan_color()
    {
        return $this->hasOne(PilihanColor::class, 'id');
    }

}
