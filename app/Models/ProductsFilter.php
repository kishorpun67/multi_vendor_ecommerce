<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsFiltersValue;
use App\Models\Category;
use App\Models\ProductsAttribute;
use App\Models\Product;
use App\Models\Brand;


class ProductsFilter extends Model
{
    use HasFactory;
    public static function getFilterName($category_id) 
    {
        $getFilterName = ProductsFilter::select('filter_name')->where('id', $category_id)->first()->toArray();
        return $getFilterName['filter_name'];
    } 

    public function filter_values()
    {
        return $this->hasMany('App\Models\ProductsFiltersValue','filter_id');
    }

    public static function productFilters()
    {
        $productFilters = ProductsFilter::with('filter_values')->where('status', 1)->get()->toArray();
        return $productFilters;
    }

    public static function fitlerAvalable($filter_id, $category_id)
    {
        $filterAvailable = ProductsFilter::select('cat_ids')->where(['id'=>$filter_id, 'status'=>1])
        ->first()->toArray();
        $catsIdsArr = explode(',',$filterAvailable['cat_ids']);
        if(in_array($category_id, $catsIdsArr)) {
            $available = 'Yes';
        } else {
            $available = 'No';
            
        }
        return $available;
    }

    public static function getSizes($url) 
    {
        $categoryDetails = Category::categoryDetails($url);
        $getProductsIds = Product::whereIn('category_id', $categoryDetails['catIds'])->select('id')->get()->toArray();
        $getProductSizes = ProductsAttribute::select('size')->whereIn('product_id', $getProductsIds)->groupBy('size')
        ->get()->toArray();
        return $getProductSizes;
    }
    
    public static function getBrands($url) 
    {
        $categoryDetails = Category::categoryDetails($url);
        $getBrandIds = Product::whereIn('category_id', $categoryDetails['catIds'])->select('brand_id')->get()->toArray();
        $getBrands = Brand::select('id','brands')->whereIn('id', $getBrandIds)->groupBy('brands')->get()->toArray();
        return $getBrands;
    }

    public static function getColors($url) 
    {
        $categoryDetails = Category::categoryDetails($url);
        $getProductsIds = Product::whereIn('category_id', $categoryDetails['catIds'])->select('id')->get()->toArray();
        $getColors = Product::select('product_color')->whereIn('id', $getProductsIds)->groupBy('product_color')->get()->toArray();
        return $getColors;
    }


}
