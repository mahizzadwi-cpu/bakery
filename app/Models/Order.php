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
        'payment_method',
        'address',
        'order_notes',
        'total_price',
        'status',
    ];

    /**
     * Accessor for payment_method:
     * Returns the explicit payment_method column, or parses from order_notes as a backward-compatible fallback.
     */
    public function getPaymentMethodAttribute($value)
    {
        if ($value) {
            return strtolower($value);
        }

        // Backward compatibility fallback: parse from order_notes
        if (preg_match('/\[Bayar:\s*([A-Za-z0-9_]+)/i', $this->order_notes ?? '', $matches)) {
            return strtolower($matches[1]);
        }

        return 'qris';
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
