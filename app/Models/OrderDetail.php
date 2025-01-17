<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'product_name',
        'qty',
        'size_name',
        'size',
        'price',
        'user_id',
        'brand',
        'banner_image',
        'color_image',
        'order_id',
        'status',
        'cash',
        'credit',
        'received',
        'pending',
    ];
}
