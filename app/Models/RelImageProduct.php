<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelImageProduct extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'image_storage_id', 'product_id'
    ];

    public function image()
    {
        return $this->belongsTo(ImageStorage::class, 'image_storage_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
