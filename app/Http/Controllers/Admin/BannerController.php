<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Session;

class BannerController extends Controller
{

    public function banners()
    {
        $banners = Banner::get()->toArray();
        return view('admin.banners.banners')->with(compact('banners'));
    }

    public function updateBannerStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $admin =Banner::where('id', $data['banner_id'])->first();

            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            banner::where('id', $data['banner_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'banner_id' =>$data['banner_id']]);
        }
    }
    public function addEditBanner(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Banner";
            $button ="Submit";
            $banner = new Banner;
            $bannerdata = array();
            $message = "banner has been added sucessfully";
        }else{
            $title = "Edit Banner";
            $button ="Update";
            $bannerdata = Banner::where('id',$id)->first();
            $bannerdata= json_decode(json_encode($bannerdata),true);
            $banner = Banner::find($id);
            $message = "Banner has been updated sucessfully";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                // 'banner_image' => 'required',
                'banner_type' => 'required',
            ];
            $customMessages = [
                'banner_image.required' => 'Image is required !',
                'banner_type.required' => 'Banner Type is required !',
            ];
            $this->validate($request, $rules, $customMessages);

            if(empty($data['link']))
            {
                $data['link'] = "";
            }
            if(empty($data['title']))
            {
                $data['title'] = "";
            }
            if(empty($data['alt']))
            {
                $data['alt'] = "";
            }
            $this->validate($request, $rules, $customMessages);
            // dd($data['banner_image']);
            if(!empty($data['banner_image'])){
                $image_tmp = $data['banner_image'];
                if($image_tmp->isValid()) {
                    $filename = time().'.'.request()->banner_image->getClientOriginalExtension();
                    request()->banner_image->storeAs('public/images/banner_image/', $filename);
                    $banner->image = 'storage/images/banner_image/'.$filename;
                }
            }
            $banner->banner_type = $data['banner_type'];
            $banner->link = $data['link'];
            $banner->title = $data['title'];
            $banner->alt = $data['alt'];
            $banner->status = 1;
            $banner->save();
            Session::flash('success_message', $message);
            return to_route('admin.banners');
        }
        return view('admin.banners.add_edit_banner', compact('title','button','bannerdata'));
    }
    public function deteteBanner($id)
    {

        // get banner 
        $getBanner = Banner::where('id', $id)->first();
    
        // get image path
        $banner_image_path = 'storage/images/banner_image/';

        // delete image if file exist in folder 
        if(file_exists($banner_image_path.$getBanner->image)) {
            unlink($banner_image_path.$getBanner->image);
        }

        // delete banner from table  
        Banner::where('id', $id)->delete();
        return redirect()->back()->with('success_message','banner has been deleted!');
    }}
