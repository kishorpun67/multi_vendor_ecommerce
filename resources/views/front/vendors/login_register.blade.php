
@extends('front.layout.layout')
    @section('content')
        <div class="page-style-a">
            <div class="container">
                <div class="page-intro">
                    <h2>Account</h2>
                    <ul class="bread-crumb">
                        <li class="has-separator">
                            <i class="ion ion-md-home"></i>
                            <a href="{{route('index')}}">Home</a>
                        </li>
                        <li class="is-marked">
                            <a href="account.html">Account</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Introduction Wrapper /- -->
        <!-- Account-Page -->
        <div class="page-account u-s-p-t-80">
            <div class="container">
                @if(Session::has('success_message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success_message') }}
                    </div>
                @endif
                @if(Session::has('error_message'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error_message') }}
                </div>
            @endif
                <div class="row">
                     
                   
                    <!-- Login -->
                    <div class="col-lg-6">
                        <div class="login-wrapper">
                            <h2 class="account-h2 u-s-m-b-20">Login</h2>
                            <h6 class="account-h6 u-s-m-b-30">Welcome back! Sign in to your account.</h6>
                            <form action="{{route('vendor.login')}}" method="post">
                                @csrf
                                <div class="u-s-m-b-30">
                                    <label for="user-name-email">Email 
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="email" id="user-name-email" name="vendor_email" class="text-field" placeholder=" Email">
                                    @error('vendor_email')
                                        <p  style="color: red">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="login-password">Password
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="password" id="login-vendor_passowrd" name="vendor_password" class="text-field" placeholder="Password">
                                    @error('vendor_password')
                                        <p  style="color: red">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="group-inline u-s-m-b-30">
                                    <div class="group-1">
                                        @error('vendor_password')
                                            <p  style="color: red">{{$message}}</p>
                                        @enderror
                                        <input type="checkbox" class="check-box" id="remember-me-token">
                                        <label class="label-text" for="remember-me-token">Remember me</label>
                                    </div>
                                    <div class="group-2 text-right">
                                        <div class="page-anchor">
                                            <a href="lost-password.html">
                                                <i class="fas fa-circle-o-notch u-s-m-r-9"></i>Lost your password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-b-45">
                                    <button class="button button-outline-secondary w-100">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login /- -->
                    <!-- Register -->
                    <div class="col-lg-6">
                        <div class="reg-wrapper">
                            <h2 class="account-h2 u-s-m-b-20">Vendor Register</h2>
                            <h6 class="account-h6 u-s-m-b-30">Registering for this site allows you to access your order status and history.</h6>
                            <form method="post" action="{{route('vendor.register')}}">
                                @csrf
                                <div class="u-s-m-b-30">
                                    <label for="user-name">Username
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="user-name" class="text-field" name="name" value="{{old('name')}}" placeholder="Vendor Name">
                                    @error('name')
                                        <p  style="color: red">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="user-mobile">Mobile
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="user-mobile" name="mobile" class="text-field" value="{{old('mobile')}}" placeholder="Vendor Mobile">
                                    @error('mobile')
                                        <p  style="color: red">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="email">Email
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="email" name="email" class="text-field"  value="{{old('email')}}" placeholder="Vendor Email">
                                    @error('email')
                                        <p  style="color: red">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="password">Password
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="password" id="password" name="password"  value="{{old('password')}}" class="text-field" placeholder="Password">
                                    @error('password')
                                        <p  style="color: red">{{$message}}</p>
                                    @enderror                                </div>
                                <div class="u-s-m-b-30">
                                    <input type="checkbox" class="check-box" id="accept" name="accept" @if (old('accept'))
                                        checked
                                    @endif>
                                    <label class="label-text no-color" for="accept">I’ve read and accept the
                                        <a href="terms-and-conditions.html" class="u-c-brand">terms & conditions</a>
                                    </label>
                                    @error('accept')
                                        <p  style="color: red">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="u-s-m-b-45">
                                    <button class="button button-primary w-100">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Register /- -->
                </div>
            </div>
        </div>
    @endsection