<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Product;
use App\Models\Section;
use App\Models\Category;
use App\Models\Brand;
use Image;
use App\Models\ProductsAttribute;
use App\Models\ProductsImage;
use App\Models\ProductsFilter;

class ProductsController extends Controller
{
    public function products()
    {

        $adminType = auth('admin')->user()->type;
        $vendor_id = auth('admin')->user()->vendor_id;
        if($adminType == "vendor") {
            $vendorStatus = auth('admin')->user()->status;
            if($vendorStatus ==0) {
                return  to_route('admin.update.vendor.details', 'business');
            }
        }
        $products = Product::with([
            'section' => function($query){
                $query->select('id','name');
            },
            'category' => function($query){
            $query->select('id','category_name');
        }]);
        if($adminType == 'vendor') {
            $products = $products->where('vendor_id',$vendor_id);
        }
        $products = $products->get()->toArray();
        return view('admin.products.products')->with(compact('products'));
    }

    public function updateProductStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $admin =Product::where('id', $data['product_id'])->first();

            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            Product::where('id', $data['product_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'product_id' =>$data['product_id']]);
        }
    }
    public function addEditProduct(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Product";
            $button ="Submit";
            $product = new product;
            $productdata = array();
            $message = "Product has been added sucessfully";
        }else{
            $title = "Edit Product";
            $button ="Update";
            $productdata = Product::where('id',$id)->first();
            $productdata= json_decode(json_encode($productdata),true);
            $product = Product::find($id);
            $message = "Product has been updated sucessfully";
        }
        if($request->isMethod('post')) {
        $data = $request->all();
            // dd($data);
            // echo phpinfo(); die;
            // if (extension_loaded('gd') && function_exists('gd')) {
            //     return "gel install";
            //     # code...
            // } else {
            //     # code...
            //     return 'gd not installed';
            // }

            $rules = [
                
                'product_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'category_id' => 'required',
                'brand_id' =>'required',
                'product_url'=>'required',
                'product_price'=>'required',
                'product_color'=>'required|regex:/^[\pL\s\-]+$/u',
                'product_code'=>'required',
                'product_image'=>'required',
            ];
            $customMessages = [
                'product_name.required' => 'Product Name is required!',
                'category_id.required' => 'Product Category is required!',
                'brand_id.required' => 'Product Brand is required!',
                'product_url.required' => 'Url is required!',
                'product_price.required' => 'Product Price is required!',
                'product_color.required' => 'Product Color is required!',
                'product_code.required' => 'Product Code is required!',
                'product_image.required' => 'Product Image is required!',
            ];
            // $this->validate($request, $rules, $customMessages);
            // return 'test';

            if(empty($data['product_discount']))
            {
                $data['product_discount'] = 0;
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
            if(empty($data['product_weight']))
            {
                $data['product_weight'] = "";
            }
            $categoryDetails = Category::where('id', $data['category_id'])->first();
            if(empty($id)) {
                $vendorType = auth('admin')->user()->type;
                $admin_id = auth('admin')->user()->id;
    
                if ($vendorType== 'vendor') {
                    $product->vendor_id = auth('admin')->user()->vendor_id;
                } else {
                    $product->vendor_id = 0;
                }
                $product->admin_id =  $admin_id;
                $product->admin_type =  $vendorType;
            }

            if(!empty($data['product_image'])){
                $image_tmp = $data['product_image'];
                if($image_tmp->isValid()) {
                    // $filename = time().'.'.request()->product_image->getClientOriginalExtension();
                    // request()->product_image->storeAs('public/images/prodduct/', $filename);
                    // $product->product_image = 'storage/images/prodduct/'.$filename;

                              // get extension
                    $image_name = $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = $image_name.'-'.rand(111,99999).'.'.$extension;
                    $large_image_path = 'image/product_image/large/'.$imageName;
                    $medium_image_path = 'image/product_image/medium/'.$imageName;
                    $small_image_path = 'image/product_image/small/'.$imageName;

                    Image::make($image_tmp)->resize(250,250)->save($large_image_path);
                    Image::make($image_tmp)->resize(500,500)->save($small_image_path);
                    Image::make($image_tmp)->resize(1000,1000)->save($medium_image_path);

                    $product->product_image = $imageName;

                }
            }
            $productsFilters = ProductsFilter::productFilters();
            $product->section_id = $categoryDetails->section_id;
            $product->category_id = $data['category_id'];
            $product->brand_id = $data['brand_id'];
            $product->product_name = $data['product_name'];
            $product->product_price = $data['product_price'];
            $product->product_color = $data['product_color'];
            $product->product_code = $data['product_code'];
            $product->group_code = $data['group_code'];
            $product->product_weight = $data['product_weight'];
            $product->product_discount = $data['product_discount'];
            $product->description = $data['description'];
            $product->product_url = $data['product_url'];
            foreach( $productsFilters as $filter) {
                $filterAvailable = ProductsFilter::fitlerAvalable($filter['id'], $data['category_id']); 
                if($filterAvailable == 'Yes') { 
                    if(!empty($filter['filter_column']) && !empty($data[$filter['filter_column']] ))
                    {
                        $product->{$filter['filter_column']}= $data[$filter['filter_column']];
                    }
                }
            }
            $product->meta_title = $data['meta_title'];
            $product->meta_description = $data['meta_description'];
            $product->meta_keywords = $data['meta_keywords'];            
            $product->status = 1;
            if(!empty($data['is_featured']))
            {
                $product->is_featured = $data['is_featured'] ;
            } else {
                $product->is_featured = "No";
            }
            if(!empty($data['is_best_seller']))
            {
                $product->is_best_seller = $data['is_best_seller'] ;
            } else {
                $product->is_best_seller = "No";
            }
            $product->save();

            Session::flash('success_message', $message);
            return to_route('admin.products');

        }
        $categories = Section::with(['categories'])->where('status',1)->get()->toArray();
        $brands = Brand::where('status',1)->get()->toArray();
        // $categories = Category::with('subcategories')->where(['parent_id' =>0, 'status'=>1])->get();
        return view('admin.products.add_edit_product', compact('title','button','productdata',  'brands','categories'));
    }
    public function deteteProduct($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->back()->with('success_message','product has been deleted!');
    }

    public function addAttributes(Request $request, $id=null)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            foreach($data['sku'] as $key => $val) {
                if(!empty($val)) {
                    // Prevent duplicate sku check
                    $attrCount = ProductsAttribute::where('sku',$val)->count();
                    if($attrCount>0){
                        return redirect()->back()->with('error_message', 'SKU already exits! Please another SKU.');
                    }
                      // Prevent duplicate sku check
                      $attrCount = ProductsAttribute::where(['product_id'=>$id,  'size'=>$data['size'][$key]])->count();
                      if($attrCount>0){
                          return redirect()->back()->with('error_message', $data['size'][$key]."\n".'fSize already exits! Please another SKU.');
                      }
                    $attribute = new ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->status=1;
                    $attribute->save();
                }

            }
            return redirect()->back()->with('success_message', 'Attributes has been added successfully!');

        }
        $attributes = Product::with('attributes')->where('id', $id)->first()->toArray();
        return view('admin.attributes.add_edit_attributes', compact('attributes'));
    }
    

    public function updateAttributeStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $admin =ProductsAttribute::where('id', $data['attribute_id'])->first();

            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            ProductsAttribute::where('id', $data['attribute_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'attribute_id' =>$data['attribute_id']]);
        }
    }

    public function deteteAttribute($id)
    {
        ProductsAttribute::where('id', $id)->delete();
        return redirect()->back()->with('success_message','Attribute has been deleted!');
    }

    public function addImage (Request $request, $id)
    {
        if($request->isMethod('post')) {
            if($request->hasFile('image')) {
                $file =  $request->file('image');
                foreach($file as $file) {
                    // get extension
                    $extension = $file->getClientOriginalExtension();
                    // generate new image name

                    $image = New ProductsImage;
                    $imageName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'image/product_image/large/'.$imageName; 
                    $medium_image_path = 'image/product_image/medium/'.$imageName; 
                    $small_image_path = 'image/product_image/small/'.$imageName; 

                    Image::make($file)->save($large_image_path);
                    Image::make($file)->save($medium_image_path);
                    Image::make($file)->save($small_image_path);

                    $image->product_id = $id;
                    $image->image = $imageName;
                    $image->status=1;
                    $image->save();
                }
            }
            return redirect()->back()->with('success_message', 'Image has been added successfully!');
        }
       $productDetails = Product::with('images')->find($id);
        Session::flash('page', 'product');
        return view('admin.attributes.add_product_images', compact('productDetails'));
    }
    public function deteteImage($id) 
    {
        // Get product image 
        $product_image= ProductsImage::select('image')->where('id',$id)->first();

        // Get image path
        $product_image_small = 'image/product_image/small/';
        $product_image_medium = 'image/product_image/medium/';
        $product_image_large = 'image/product_image/large/';

        $image_path = 'image/product_image/small/'.$product_image->image;
     
        if(!empty($product_image->image) && file_exists($image_path)){

            if(file_exists($product_image_small.$product_image->image)) {
                unlink($product_image_small.$product_image->image);
            }     
            if(file_exists($product_image_medium.$product_image->product_image)) {
                unlink($product_image_medium.$product_image->image);
            }     
            if(file_exists($product_image_large.$product_image->image)) {
                unlink($product_image_large.$product_image->image);
            }
        }
        $id = ProductsImage::find($id);
        $id->delete();
        return redirect()->back()->with('success_message', 'Product Image has been delete successfully!');
    }

    public function updateProductImageStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            ProductsImage::where('id', $data['image_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'image_id' =>$data['image_id']]);
        }
    }
    

}
