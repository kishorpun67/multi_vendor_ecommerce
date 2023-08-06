<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLog extends Model
{
    use HasFactory;

    public function orders_products()
    {
        return $this->belongsTo('App\Models\OrdersProduct', 'order_item_id');
    }
}
