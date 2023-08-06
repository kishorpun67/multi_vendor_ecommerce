<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

    public static function deliveryAddress()
    {
        $deliveryAddress = DeliveryAddress::where('user_id', auth()->user()->id)->get()->toArray();
        return $deliveryAddress;
    }
}
