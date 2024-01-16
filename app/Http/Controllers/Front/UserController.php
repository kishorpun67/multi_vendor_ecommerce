<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Mail;
use Session;
use Auth;
use Validator;
use App\Models\Sms;
use App\Models\Cart;
use App\Models\Country;
use Laravel\Socialite\Facades\Socialite;


class UserController extends Controller
{
    public function loginRegister(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all(); //get request data
            // validation 
            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];
            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Enter valid email',
                'password.required' => 'Password is required',

            ];
            $validator = Validator::make($data, $rules, $customMessages);
            if($validator->passes()) {
                if(Auth::attempt(['email'=> $data['email'], 'password'=> $data['password']])) {
                    // chekc user status 
                    if(auth()->user()->status == 0) {
                        auth()->logout();
                        return response()->json(['message'=>'Your account is not activated! Please confirm your account to active
                         your account.', 'type'=>'inactive'], 200);
                    }
                    // update user cart with user id 
                    if(!empty(Session::get('session_id'))) {
                        Cart::where(['session_id'=>Session::get('session_id')])->update(['user_id'=>auth()->user()->id]);
                    }

                    $redirect = url('cart');
                    return response()->json(['url'=>$redirect, 'type'=>'success'], 200);
                } else {
                    return response()->json(['message'=>'Incorrect email or password!', 'type'=>'incorrect'], 200);
                }   
            } else {
                return response()->json(['type' => 'error', 'errors' => $validator->messages()], 200);
            }
        }
        return view('front.users.login_register');
    }

    public function register(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all(); //get request data
            // validation 
            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'mobile' => 'required|numeric',
                'password' => 'required|min:5',
                'accept' => 'required',
            ];
            $customMessages = [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.unique' => 'Email already exists',
                'mobile.required' => 'Mobile is required',
                'mobile.numeric' => 'Enter Valide Mobile',
                'accept.required' => 'Please accept T&C',
                'password.required' => 'Password is required',
                'password.min' => 'Enter at lest 5 length',
            ];
            $validator = Validator::make($data, $rules, $customMessages);

            if($validator->passes()) {
                    
                // careat User account 
                $user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->mobile = $data['mobile'];
                $user->password = Hash::make($data['password']);
                $user->status = 0;
                $user->save();
                // send confirmation email 
                $email = $data['email'];
                $messageData = [
                    'email' => $data['email'],
                    'name' => $data['name'],
                    'code' => base64_encode($data['email']),
                ];
                
                Mail::send('emails.user_confirmation', $messageData, function($message) use($email){
                    $message->to($email)->subject('Confirmaton your Account');
                });

                // send register message
                $message = 'Dear customer, you have been registered successfully';
                Sms::sendSms($message, $data['mobile']);
            
                $redirect = url('user/login-register');
                return response()->json(['url'=>$redirect, 'type'=>'success', 'message'=>'Please confirm your email to active your account'], 200);
            } else {
                return response()->json(['type' => 'error', 'errors' => $validator->messages()], 200);
            }
        }
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $userCount = User::where('email', $googleUser->email)->count();
        if($userCount <= 0){
            User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_token' => $googleUser->token,
                'google_id' => $googleUser->id,

            ]);
        } else {
            User::where('email', $googleUser->email)->update([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_token' => $googleUser->token,
                'google_id' => $googleUser->id,

            ]);
        }
        $user = User::where('email', $googleUser->email)->first();
        Auth::login($user);

        return redirect('/');
    }

    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    public function facebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();
        $userCount = User::where('email', $facebookUser->email)->count();
        if($userCount <= 0){
            User::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'facebook_token' => $facebookUser->token,
                'facebook_id' => $facebookUser->id,

            ]);
        } else {
            User::where('email', $facebookUser->email)->update([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'facebook_token' => $facebookUser->token,
                'facebook_id' => $facebookUser->id,

            ]);
        }
        $user = User::where('email', $googleUser->email)->first();
        Auth::login($user);

        return redirect('/');
    }


    public function userConfirm($code = null)
    {
        // decode user email
        $email = base64_decode($code);
        $userCount = User::where('email', $email)->count();
        if ($userCount>0) {
            $userDetails = User::where('email', $email)->first();
            if($userDetails->status== 1) {
                $message = 'Your Account is already confirmed. You can login';
            } else {
                User::where('email', $email)->update(['status'=>1]);
                $message = 'Your Email Account is confirmed. You can login.';

            }
            Session::flash('success_message', $message);
            return to_route('login');             
        }
    }

    public function logout()
    {
        auth()->logout();
        Session::flush();
        return to_route('index');
    }

    public function userAccount()
    {
        $countries = Country::get();
        return view('front.users.user_account', compact('countries'));
    }
    public function userCurrentPassword(Request $request)
    {
        $data = $request->all();
        if(Hash::check($data['current_password'],Auth::user()->password))
        {
            echo "true";
        }else{
            echo"false";
        }
    }

    public function userUpdatePassword()
    {
        if (request()->ajax()) {
            $data = request()->all(); //get request data
            // validation 
            $rules = [
                'current_password' => 'required',
                'new_password' => 'required|min:5',
                'confirm_password' => 'required',
            ];
            $customMessages = [
                'current_password.required' => 'Current password is required',
                'new_password.required' => 'New Password is required',
                'new_passwrod.min' => 'Enter at lest 5 length',
                'confirm_password.required' => 'Confrim password is required',
            ];
            $validator = Validator::make($data, $rules, $customMessages);
            if($validator->passes()) {
                // check current password
                if(Hash::check($data['current_password'],Auth::user()->password)) {
                    // check new password ana confirm password
                    if($data['new_password']==$data['confirm_password']){
                        User::where('id',Auth::user()->id)->update(['password' => bcrypt($data['new_password'])]);
                        return response()->json(['type'=>'success', 'message'=>'Password has been changed sucessfully'], 200);
                    }else{
                        return response()->json(['type'=>'notmatch', 'message'=>'New Password and Confirm Password is not Match'], 200);
                    }
                }else{
                    return response()->json(['type'=>'incorrect', 'message'=>'Your Current Password is Incorrect'], 200);
                }
            } else {
                return response()->json(['type' => 'error', 'errors' => $validator->messages()], 200);
            }
        }
    }

    public function userUpdateAccount() 
    {
        if(request()->ajax()) {
            $data = request()->all();
            // validation 
            $rules = [
                'name' => 'required',
                'mobile' => 'required|numeric',
            ];
            $customMessages = [
                'name.required' => 'Name is required',
                'mobile.required' => 'Mobile is required',
                'mobile.numeric' => 'Enter Valide Mobile',
            ];
            $validator = Validator::make($data, $rules, $customMessages);
            if($validator->passes()) {
                $user = User::find(auth()->user()->id);
                $user->name = $data['name'];
                $user->address = $data['address'];
                $user->city = $data['city'];
                $user->state = $data['state'];
                $user->country = $data['country'];
                $user->mobile = $data['mobile'];
                $user->pincode = $data['pincode'];
                $user->save();
                return response()->json(['type'=>'success', 'message'=>'Your account is updated successfully'], 200);
            } else {
                return response()->json(['type' => 'error', 'errors' => $validator->messages()], 200);
            }
        }

    }

}
