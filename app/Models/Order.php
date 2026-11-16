<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'order_code',
        'product_id',
        'customer_name',
        'customer_phone',
        'quantity',
        'delivery_date',
        'order_type',
        'address',
        'order_notes',
        'total_price',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}