<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function parentCategory()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }
    public function subcategories() 
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public static function categoryDetails($url) {
        $categoryDetails = Category::select('id', 'category_name', 'url', 'description', 'parent_id', 'meta_title', 'meta_description','meta_keywords')->with(['subcategories' =>function($query) {
            $query->select('id', 'parent_id', 'category_name', 'url', 'description', 'meta_title', 'meta_description','meta_keywords');
        }])->where('url',$url)->first()->toArray();
        $catIds = array();
        $caIds[] = $categoryDetails['id']; 

        if($categoryDetails['parent_id'] == 0) {
            $brandscrumbs = '<li class="has-separator">
                    <a href="'.route('listing',$categoryDetails).'">'.$categoryDetails['category_name']. '</a>
                </li>
                ';
        } else {

            $parentCategory = Category::select('category_name', 'url')->where('id', $categoryDetails['parent_id'])
            ->first()->toArray();
            $brandscrumbs = '<li class="has-separator">
                    <a href="'.route('listing',$parentCategory).'">'.$parentCategory['category_name']. '</a>
                </li>
                <li class="has-separator">
                    <a href="'.route('listing',$categoryDetails).'">'.$categoryDetails['category_name']. '</a>
                </li>
                ';

        }
        foreach ($categoryDetails['subcategories'] as $cat) {
            $caIds[] = $cat['id'];
        }
        $resp  =array('catIds' => $caIds, 'categoryDetails' => $categoryDetails, 'brandscrumbs'=>$brandscrumbs);
        return $resp;
    }


}
