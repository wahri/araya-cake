<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'small_text', 'big_text', 'image_storage_id', 'alt_image', 'description', 'meta_title', 'meta_keyword', 'meta_description'
    ];

    public function image()
    {
        return $this->belongsTo(ImageStorage::class, 'image_storage_id');
    }
}
