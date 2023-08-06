<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use Session;
use App\Models\ProductsAttribute;

class Cart extends Model
{
    use HasFactory;

    public static function getCartItems()
    {
        if(auth()->check()) {
            // if user logged in / pick auth id of the user 
            $etCartItems = Cart::with(['product' =>function($query) {
                $query->select('id','category_id','product_name', 'product_color', 'product_image','product_code', 'product_weight');
            }])->where('user_id', auth()->user()->id)->get()->toArray();
        } else {
            // if usern not logged in / pick session id of the user 
            $etCartItems = Cart::with(['product' =>function($query) {
                $query->select('id','category_id','product_name', 'product_color', 'product_image','product_code', 'product_weight');
            }])->where('session_id', Session::get('session_id'))->get()->toArray();
        }
        return $etCartItems;
    }

    public function product() 
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
