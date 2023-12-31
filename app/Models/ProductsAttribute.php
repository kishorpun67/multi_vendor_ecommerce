<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsAttribute extends Model
{
    use HasFactory;

    public static function  isStockAvailable($product_id, $size) 
    {
        $getProductStock = ProductsAttribute::where(['product_id' => $product_id, 'size' => $size])->first()->toArray();
        return $getProductStock;
    }
}
