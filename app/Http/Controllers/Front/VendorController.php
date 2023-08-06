<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Vendor;
use Hash;
use DB;
use Mail;
use Session;
use Auth;

class VendorController extends Controller
{
    public function loginRegister(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];
            $customMessages = [
                'email.required' => 'Email is required',
                'email.unique' => 'Valid Email is required',
                'password.required' => 'Password is required',
            ];
            $this->validate($request, $rules, $customMessages);      
            
            if(Auth::guard('admin')->attempt(['email'=> $data['email'], 'password'=> $data['password']])) {
                if(Auth::guard('admin')->user()->type=="vendor" && Auth::guard('admin')->user()->confirm == 'No') {
                    return redirect()->back()->with('error_message', 'Please confirm your email to active your Vendor Account.');
                } else  if(Auth::guard('admin')->user()->type != 'vendor' && Auth::guard('admin')->user()->status == '0'){
                    return redirect()->back()->with('error_message', 'Your admin account  is not active.');
                }
                Session::flash('success_message', 'Yor login successfully');
                return to_route('admin.dashboard');
            }
        }

        return view('front.vendors.login_register');
    }

    public function vendorRegister(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $rules = [
                'name' => 'required',
                'email' => 'required|email|:admins|unique:vendors',
                'mobile' => 'required|unique:admins|unique:vendors',
                'password' => 'required',
                'accept' => 'required',
            ];
            $customMessages = [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.unique' => 'Email already exists',
                'mobile.required' => 'Mobile is required',
                'mobile.unique' => 'Mobile is already exists',
                'accept.required' => 'Please accept T&C',
                'password.required' => 'Password is required',

            ];
            $this->validate($request, $rules, $customMessages);

            DB::beginTransaction();
            // careat vendor account 
            $user = new Vendor;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->mobile = $data['mobile'];
            // $user->password = Hash::make($data['password']);
            $user->status = 0;
            // date_default_timezone_set("Asia/Kathmandu");
            // $user->created_at = data('y-m-d h:i:s');
            $user->save();

            $vendor_id = DB::getPdo()->lastInsertId();

            // insert vendor into admin 
            $admin = new Admin();
            $admin->vendor_id = $vendor_id;
            $admin->type = 'vendor';
            $admin->name = $data['name'];
            $admin->mobile = $data['mobile'];
            $admin->email = $data['email'];
            $admin->password = Hash::make($data['password']);
            $admin->status = 0;
            $admin->save();

            DB::commit();

            // send confirmation email 
            $email = $data['email'];
            $messageData = [
                'email' => $data['email'],
                'name' => $data['name'],
                'code' => base64_encode($data['email']),
            ];
            Mail::send('emails.vendor_confirmation', $messageData, function($message) use($email){
                $message->to($email)->subject('Confirmaton your Vendor Account');
            });

            return redirect()->back()->with('success_message', 'Thank for registering as Vendor. Please
            confirm your email to active your account.');
        }
    }

    public function vendorConfirm($code = null)
    {
        // decode vendor email
        $email = base64_decode($code);
        $vendorCount = Vendor::where('email', $email)->count();
        if ($vendorCount>0) {
            $vendorDetails = Vendor::where('email', $email)->first();
            if($vendorDetails->confirm== 'Yes') {
                $message = 'Your Vendor Account is already confirmed. You can login';
            } else {
                Admin::where('email', $email)->update(['confirm'=>'Yes']);
                Vendor::where('email', $email)->update(['confirm'=>'Yes']);
                $messageData = [
                    'email' => $email,
                    'name' => $vendorDetails->name,
                    'mobile' => $vendorDetails->mobile,
                ];
                Mail::send('emails.vendor_confirmed', $messageData, function($messages) use ($email) {
                    $messages->to($email)->subject('Your Vendor Account Confirmed');
                });
            }
            Session::flash('success_message', 'Your Vendor Email Account is confirmed. You can login and add your 
            personal, business and bank details to activate your Vendor Account to add products');
            return to_route('vendor.login');             
        }
    }
  
}
