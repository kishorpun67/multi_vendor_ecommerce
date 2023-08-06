<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;
use App\Models\Section;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::with(['section' =>function($query){
            $query->select('id', 'name');
        }, 'parentCategory'=>function($query){
            $query->select('id', 'category_name');
        }])->get()->toArray();
        return view('admin.categories.categories')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $admin =Category::where('id', $data['category_id'])->first();

            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            Category::where('id', $data['category_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'category_id' =>$data['category_id']]);
        }
    }
    public function appendCategoryLevel()
    {
        if(request()->ajax()) {
            
            $categories = Category::with('subcategories')->where(['section_id'=>request('section_id'),'parent_id' =>0, 'status'=>1])
            ->get()->toArray();
            return view('admin.categories.append_category_level', compact('categories'));
        }
    }
    public function addEditCategory(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Category";
            $button ="Submit";
            $category = new Category;
            $categorydata = array();
            $message = "Category has been added sucessfully";
            $categories = array();
        }else{
            $title = "Edit Category";
            $button ="Update";
            $categorydata = Category::where('id',$id)->first()->toArray();
            $categories = Category::with('subcategories')->where(['parent_id' =>0, 'status'=>1])->get();

            // $categorydata= json_decode(json_encode($categorydata),true);
            $category = Category::find($id);
            $message = "Category has been updated sucessfully";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'category_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'section_id' =>'required',
                'category_url'=>'required',
              
            ];

            $customMessages = [
                'category_name.required' => 'category name is required!',
                'section_id.required' => 'Sections is required',
                'category_url.required' => 'Url is required'
            ];
            $this->validate($request, $rules, $customMessages);

            if(empty($data['category_discount']))
            {
                $data['category_discount'] = 0;
            }
            if(empty($data['description']))
            {
                $data['description'] = "";
            }
            if(empty($data['meta_title']))
            {
                $data['meta_title'] = "";
            }
            if(empty($data['meta_description']))
            {
                $data['meta_description'] = "";
            }
            if(empty($data['meta_keywords']))
            {
                $data['meta_keywords'] = "";
            }
            if(!empty($data['category_image'])){
                $image_tmp = $data['category_image'];
                if($image_tmp->isValid()) {
                    $filename = time().'.'.request()->category_image->getClientOriginalExtension();
                    request()->category_image->storeAs('public/images/category/', $filename);
                    $category->category_image = 'storage/images/category/'.$filename;
                }
            }
            $category->parent_id = $data['parent_id'];
            $category->section_id = $data['section_id'];
            $category->category_name = $data['category_name'];
            $category->category_discount = $data['category_discount'];
            $category->description = $data['description'];
            $category->url = $data['category_url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
            $category->status = 1;
            $category->save();
            Session::flash('success_message', $message);
            return to_route('admin.categories');
        }
        $sections = Section::where('status',1)->get()->toArray();

        return view('admin.categories.add_edit_category', compact('title','button','categorydata', 'categories', 'sections'));
    }
    public function deteteCategory($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->back()->with('success_message','category has been deleted!');
    }
}
