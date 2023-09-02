<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image_storage_id', 'reviews', 'link_to_review', 'alt_image'
    ];
    
    public function image()
    {
        return $this->belongsTo(ImageStorage::class, 'image_storage_id');
    }
}
