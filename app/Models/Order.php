<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nota_no', 'session_id', 'user_id', 'name', 'no_whatsapp', 'email', 'address', 'notes', 'total_price', 'discount','order_type', 'schedule_type', 'delivery_date'
    ];

    protected $with = ['orderDetail'];

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
