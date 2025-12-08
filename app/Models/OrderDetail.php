<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'recipient_name',
        'delivery_date',
        'address',
        'message'
    ];

    protected $casts = [
        'delivery_date' => 'date'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}