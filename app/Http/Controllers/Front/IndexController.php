<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Country;
use App\Models\ShippingCharge;

class IndexController extends Controller
{
    public function index() 
    {
        $sliderBanners = Banner::where(['banner_type'=>'Slider', 'status'=>1])->get()->toArray();
        $fixBanner = Banner::where(['banner_type'=>'Fix', 'status'=>1])->get()->toArray();
        $newProducts = Product::orderBy('id', 'Desc')->where('status',1)->limit(8)->get()->toArray();
        $bestSeller = Product::inRandomOrder()->where(['status' =>1, 'is_best_seller' =>
        "Yes"])->get()->toArray();
        $discountedProduct = Product::inRandomOrder()->where('product_discount', '>',0)->where('status',1)->limit(8)->get()->toArray();
        $featuredProduct = Product::inRandomOrder()->where(['status' =>1, 'is_featured' =>
        "Yes"])->get()->toArray();
        
        // meta tag  
        $metaTitle = __('meta_tag.meta_title');
        $metaKeywords = __('meta_tag.meta_keywords');
        $metaDescription = __('meta_tag.meta_description');
        return view('front.index', compact('sliderBanners', 'fixBanner', 'newProducts',
         'bestSeller', 'discountedProduct', 'featuredProduct', 'metaTitle', 'metaDescription','metaKeywords'));
    }
}
