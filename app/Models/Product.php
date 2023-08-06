<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductsAttribute;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id')->select('id','category_name', 'url');
    }
    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id')->select('id','name');
    }
    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor', 'vendor_id')->with('vendorBusinessDetails');
    }

    public function attributes()
    {
        return $this->hasMany('App\Models\ProductsAttribute', 'product_id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductsImage', 'product_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }

    public static function getDiscountPrice($product_id)
    {
        $productDetails = Product::where('id', $product_id)->first()->toArray();
        $catDetails = Category::where(['id'=> $productDetails['category_id']])->first()->toArray;
        // dd($catDetails);
        if ($productDetails['product_discount'] > 0) {
            // if product discount is  avilable 
            $discountPrice = $productDetails['product_price']- $productDetails['product_price']
            *$productDetails['product_discount']/100;
        } else if(!empty($catDetails['category_discount']) && $catDetails['category_discount'] > 0) {
            $productDetails['category_price']- $productDetails['category_price']
            *$catDetails['category_discount']/100;
        }else{
            $discountPrice = 0;
        }
        return $discountPrice;
    }
    public static function getDiscountAttributePrice($product_id, $size)
    {
        $proAttrPrice = ProductsAttribute::where(['product_id'=>$product_id, 'size'=>$size])->first()->toArray();
        // dd($proAttrPrice);
        $productDetails = Product::where('id', $product_id)->first()->toArray();
        $catDetails = Category::where(['id'=> $productDetails['category_id']])->first()->toArray;
        if ($productDetails['product_discount'] > 0) {
            // if product discount is  avilable 
            $finalPrice = $proAttrPrice['price']- $proAttrPrice['price']
            *$productDetails['product_discount']/100;
            $discount = $proAttrPrice['price']- $finalPrice;
        } else if(!empty($catDetails['category_discount']) && $catDetails['category_discount'] > 0) {
            $finalPrice = $proAttrPrice['price']- $proAttrPrice['price']*$catDetails['category_discount']/100;
            $discount = $proAttrPrice['price']- $finalPrice;
        }else{
            $finalPrice = $proAttrPrice['price'];
            $discount = 0;
        }
        return array('discount' => $discount, 'final_price' => $finalPrice, 'product_price' =>$proAttrPrice['price']);
    }
    public static function isProductNew($product_id) {
        $productIds = Product::select('id')->where('status', '1')->orderby('id', 'DESC')->limit(3)->pluck('id')->toArray();
        // dd($productIds);
        if (in_array($product_id, $productIds)) {
            $isProductNew = "Yes";
        } else {
            $isProductNew = "No";
        }
        return $isProductNew;
    }

    public static function  getProuductImage($product_id)
    {
        $getProductImage = Product::where('id', $product_id)->select('product_image')->first()->toArray();
        return $getProductImage;
    }

    public static function getProductStatus($product_id) 
    {
        $getProductStatus = Product::select('status')->where('id', $product_id)->first()->toArray();
        return $getProductStatus;
    }

    public static function deleteCartProduct($product_id)
    {
        Cart::where('product_id', $product_id)->delete();
    }

    public static function getAttributStatus($product_id, $size) 
    {
        $getAttributStatus = ProductsAttribute::select('status')->where(['product_id' => $product_id, 'size' => $size])->first()->toArray();
        return $getAttributStatus['status'];
    }

    public static function getCategoryStatus($category_id) {
        $getCategoryStatus = Category::where('id', $category_id)->select('status')->first()->toArray();
        return $getCategoryStatus['status'];
    }
}
