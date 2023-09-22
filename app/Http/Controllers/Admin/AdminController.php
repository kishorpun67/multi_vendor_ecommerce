<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorBussinessDetail;
use App\Models\VendorBankDetail;
use App\Models\Country;
use App\Models\Section;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\User;
use App\Models\Category;
use App\Models\NewslaterSubscriber;

use Mail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $sectionCount = Section::count();
        $productCount = Product::count();
        $brandCount = Brand::count();
        $couponCount = Coupon::count();
        $userCount = User::count();
        $categoryCount = Category::count();
        $orderCount = Order::count();
        $subscriberCount = NewslaterSubscriber::count();
        Session::flash('page', 'dashboard');
        return view('admin.admin_dashboard', compact('sectionCount', 'subscriberCount','orderCount',
        'couponCount', 'userCount', 'categoryCount', 'brandCount', 'productCount'));
    }

    public function login(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            // return $data;
            // return Hash::make($data['password']);
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valild Email is required',
                'password.required' => 'Password is required',
            ];
            $this->validate($request, $rules, $customMessages);
            // $admin = new Admin();
            // $admin->email= $data['email'];
            // $admin->password= Hash::make($data['password']);
            // $admin->save();
            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'type'=>'admin'])) {
                Session::flash('success_message', 'Login Successfully');
                return to_route('admin.dashboard');
            }else{
                Session::flash('error_message', 'Invalid Email or Password');
                return redirect()->back();
            }
        }
        return view('admin.admin_login');
    }
    public function updateAdminPassword (Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // return $data->id;
            // check current password
            if(Hash::check($data['current_password'],auth('admin')->user()->password)) {

                // check new password ana confirm password
                if($data['new_password']==$data['confirm_password']){
                    Admin::where('id',auth('admin')->user()->id)->update(['password' => Hash::make($data['new_password'])]);
                    Session::flash('success_message', 'Password has been changed sucessfully');
                }else{
                    Session::flash('error_message', 'New Password and Confirm Password is not Match');
                }

            }else{
                Session::flash('error_message', 'Your Current Password is Incorrect');
            }
            return redirect()->back();
        }
        Session::flash('page', 'update_admin_password');
        return view('admin.settings.update_admin_password');
    }

    public function updateAdminDetail(Request $request)
    {
        if($request->isMethod('post'))
            {
                $data = $request->all();
                // dd($data);
                $rules = [
                    'name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'mobile' =>'required|between:10,20',
                    // 'image' =>'image:jpeg, png, bmp, gif',
                ];

                $customMessages = [
                    'name.required' => 'Name is required',
                    'name.alpha' => 'alpha charcter is required',
                    'mobile.required' => 'mobile is required',
                    'mobile.between' => 'enter between 10 to 20 ',
                    // 'image.image' =>'file must be image',
                ];
                $this->validate($request, $rules, $customMessages);

                // upload images

                if(empty($data['image'])){
                    $imagePath = Auth::guard('admin')->user()->image;
                }
                if(!empty($data['image'])){
                    $image_tmp = $data['image'];
                    // dd($image_tmp);
                    if($image_tmp->isValid())
                    {
                       
                        $filename = time().'.'.request()->image->getClientOriginalExtension();
                        request()->image->storeAs('public/images/admin_image/', $filename);
                        $imagePath = 'storage/images/admin_image/'.$filename;
                    }
                }else{
                    // $imagePath = auth('admin')->user()->image;
                }


                Admin::where('email',Auth::guard('admin')->user()->email)->update([
                    'name'=>$data['name'],
                    'mobile' =>$data['mobile'],
                    'image' => $imagePath,
                ]);
                Session::flash('success_message', 'Admin details update sucessfully');
                return redirect()->back();
            }

            Session::flash('page', 'update_admin_detail');
            return view('admin.settings.update_admin_detail');
    }

    public function logout()
    {
        $adminType = auth('admin')->user()->type;
        Auth::guard('admin')->logout();
        Session::flash('success_message', 'Logout Successfully');
        if ($adminType == 'vendor') {
            return to_route('vendor.login');
        } else{
            return to_route('admin.login');
        }
    }

    public function updateVendoerDetail(Request $request,$slug)
    {
        if($slug == 'personal') {
            if($request->isMethod('post')) {
                $data = $request->all();
                $admin = Admin::where('id', auth('admin')->user()->id)->first();
                if(!empty($data['image'])){
                    $image_tmp = $data['image'];
                    if($image_tmp->isValid()) {
                        $filename = time().'.'.request()->image->getClientOriginalExtension();
                        request()->image->storeAs('public/images/vendor_image/', $filename);
                        $admin->image = 'storage/images/vendor_image/'.$filename;
                    }
                }
                $admin->name = $data['name'];
                $admin->mobile = $data['mobile'];
                $admin->save();
                Vendor::where('id', auth('admin')->user()->vendor_id)->update([
                    'name' => $data['name'],
                    'address' => $data['address'],
                    'city' => $data['city'],
                    'state' => $data['state'],
                    'country' => $data['country'],
                    'pincode' => $data['pincode'],
                    'mobile' => $data['mobile'],
                ]);
                Session::flash('success_message', 'Vendor Details has been updated successfully.');
            }
            $vendorDetails = Vendor::where('id', auth("admin")->user()->vendor_id)->first()->toArray();
            $vendorBussinessDetails = array();
            $vendorBankDetails=array();
        }else if($slug == 'business') { 
            if($request->isMethod('post')) {
                $data = $request->all();
                $vendorCount = VendorBussinessDetail::where('vendor_id', auth('admin')->user()->vendor_id)->count();
                if($vendorCount > 0) {
                    $vendorBussinessDetails = VendorBussinessDetail::where('vendor_id', auth("admin")->user()->vendor_id)->first();
                    $vendorBussinessDetails->shop_name = $data['shop_name'];
                    $vendorBussinessDetails->shop_address = $data['shop_address'];
                    $vendorBussinessDetails->shop_city = $data['shop_city'];
                    $vendorBussinessDetails->shop_state = $data['shop_state'];
                    $vendorBussinessDetails->shop_country = $data['shop_country'];
                    $vendorBussinessDetails->shop_pincode = $data['shop_pincode'];
                    $vendorBussinessDetails->shop_mobile = $data['shop_mobile'];
                    $vendorBussinessDetails->shop_website = $data['shop_website'];
                    $vendorBussinessDetails->shop_email = $data['shop_email'];
                    $vendorBussinessDetails->address_proof = $data['address_proof'];
                    $vendorBussinessDetails->bussiness_license_number = $data['bussiness_license_number'];
                    $vendorBussinessDetails->pan_number = $data['pan_number'];
                    $vendorBussinessDetails->save();
                    Session::flash('success_message', 'Vendor Bussiness Details has been updated successfully.');

                } else {
                    $vendorBussinessDetails = new vendorBussinessDetail;
                    $vendorBussinessDetails->vendor_id = auth('admin')->user()->vendor_id;
                    if(!empty($data['address_proof_image'])){
                        $image_tmp = $data['address_proof_image'];
                        if($image_tmp->isValid()) {
                            $filename = time().'.'.request()->address_proof_image->getClientOriginalExtension();
                            request()->address_proof_image->storeAs('public/images/vendor_bussiness_detail/', $filename);
                            $vendorBussinessDetails->address_proof_image = 'storage/images/vendor_bussiness_detail/'.$filename;
                        }
                    }
                    $vendorBussinessDetails->shop_name = $data['shop_name'];
                    $vendorBussinessDetails->shop_address = $data['shop_address'];
                    $vendorBussinessDetails->shop_city = $data['shop_city'];
                    $vendorBussinessDetails->shop_state = $data['shop_state'];
                    $vendorBussinessDetails->shop_country = $data['shop_country'];
                    $vendorBussinessDetails->shop_pincode = $data['shop_pincode'];
                    $vendorBussinessDetails->shop_mobile = $data['shop_mobile'];
                    $vendorBussinessDetails->shop_website = $data['shop_website'];
                    $vendorBussinessDetails->shop_email = $data['shop_email'];
                    $vendorBussinessDetails->address_proof = $data['address_proof'];
                    $vendorBussinessDetails->bussiness_license_number = $data['bussiness_license_number'];
                    $vendorBussinessDetails->pan_number = $data['pan_number'];
                    $vendorBussinessDetails->save();
                    Session::flash('success_message', 'Vendor Bussiness Details has been updated successfully.');
                }
            }
           $vendorBussinessDetails =VendorBussinessDetail::where('vendor_id', auth("admin")->user()->vendor_id)->first();
            $vendorBussinessDetails= json_decode(json_encode($vendorBussinessDetails),true);
            $vendorDetails=array();
            $vendorBankDetails=array();
        } else if($slug == 'bank') {
            if($request->isMethod('post')) {
                $data = $request->all();
                $vendorCount = VendorBankDetail::where('vendor_id', auth('admin')->user()->vendor_id)->count();
                if($vendorCount > 0) {
                    VendorBankDetail::where('vendor_id', auth("admin")->user()->vendor_id)->update([
                        'account_holder_name' => $data['account_holder_name'],
                        'bank_name' => $data['bank_name'],
                        'account_number' => $data['account_number'],
                        'bank_ifsc_code' => $data['bank_ifsc_code'],
                    ]);
                } else {
                    VendorBankDetail::insert([
                        'vendor_id' =>auth("admin")->user()->vendor_id,
                        'account_holder_name' => $data['account_holder_name'],
                        'bank_name' => $data['bank_name'],
                        'account_number' => $data['account_number'],
                        'bank_ifsc_code' => $data['bank_ifsc_code'],
                    ]);
                }

 
                Session::flash('success_message', 'Bank details has been updated Successfully');
            }
            $vendorBankDetails = VendorBankDetail::where('vendor_id', auth("admin")->user()->vendor_id)->first();
            $vendorBankDetails= json_decode(json_encode($vendorBankDetails),true);
            $vendorDetails=array();
            $vendorBussinessDetails=array();
        }
        // return $vendorDetails;
        $countries = Country::get();
        return view('admin.settings.update_vendor_details' , compact('slug', 'countries', 'vendorDetails', 'vendorBussinessDetails', 'vendorBankDetails'));
    }

    public function admins($type=null)
    {
        $admins = Admin::query();
        if(!empty($type)) {
            $admins = $admins->where('type', $type);
            $title = ucfirst($type);
        }else{
            $title = "All Admins/Subadmins/Vendor";
        }
        $admins = $admins->get()->toArray();
        return view('admin.admins.admins',compact('admins', 'title'));
    }

    public function updateAdminStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $admin =Admin::where('id', $data['admin_id'])->first();

            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            Admin::where('id', $data['admin_id'])->update(['status' => $status]);
            if(!empty($admin->vendor_id)) {
                Vendor::where('id', $admin->vendor_id)->update(['status' => $status]);
            }
            if($admin->type == 'vendor'  && $status == 1) { 
                // send approval email 
                $email = $admin->email;
                $messageDta = [
                    'email' => $email,
                    'name' => $admin->name,
                    'name' => $admin->name,
                    'mobile' => $admin->mobile,

                ];
                Mail::send('emails.vendor_approved', $messageDta, function($message) use ($email) {
                    $message->to($email)->subject('Vendor Account is Approved');
                });
            }
            
            return response()->json(['status' =>$status,'admin_id' =>$data['admin_id']]);
        }
    }

    public function viewVendorDetails($slug)
    {
        $vendorDetails =Admin::with('vendorPersonal', 'vendorBusiness','vendorBank')->where('id',$slug)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails),true);
        return view('admin.admins.view_vendor_detail',compact('vendorDetails'));

    }

    public function updateVendoerCommission()
    {
        $data = request()->all();
        Vendor::where('id', $data['vendor_id'])->update(['commissions' => $data['commissions']]);
        return redirect()->back()->with('success_message', 'Vendor Commission has been updated successfully.');
    }
}
