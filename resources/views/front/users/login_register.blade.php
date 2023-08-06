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
                    <div class="alert alert-success" role="alert" >
                        {{ session('success_message') }}
                    </div>
                @endif
                <div class="alert alert-success" role="alert" style="display: none">
                </div>
                <div class="alert alert-danger" role="alert" style="display: none">
                </div>
                <div class="row">
                    <!-- Login -->
                    <div class="col-lg-6">
                        <div class="login-wrapper">
                            <h2 class="account-h2 u-s-m-b-20">Login</h2>
                            <h6 class="account-h6 u-s-m-b-30">Welcome back! Sign in to your account.</h6>
                            <span id="error_message" style="color:red;"></span>
                            <form action="javascript:" method="post" id="loginForm">
                                @csrf
                                <div class="u-s-m-b-30">
                                    <label for="user-name-email">Email 
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="email" id="login-email" name="email" class="text-field" placeholder=" Email">
                                    <p style="color:red;" id="login_email"></p>
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="login-password">Password
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="password" id="login-password" name="password" class="text-field" placeholder="Password">
                                    <p style="color:red;" id="login_password"></p>
                                </div>
                                <div class="group-inline u-s-m-b-30">
                                    <div class="group-1">
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
                            <h2 class="account-h2 u-s-m-b-20">User Register</h2>
                            <h6 class="account-h6 u-s-m-b-30">Registering for this site allows you to access your order status and history.</h6>
                            <form id="registerForm" >
                                @csrf
                                <div class="u-s-m-b-30">
                                    <label for="user-name">Username
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="name" class="text-field" name="name" value="{{old('name')}}" placeholder="Vendor Name">
                                    <p style="color:red;" id="register-name"></p>
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="user-mobile">Mobile
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="number" id="mobile" name="mobile" class="text-field" value="{{old('mobile')}}" placeholder=" Mobile">
                                    <p style="color:red;" id="register-mobile"></p>
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="email">Email
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="email" name="email" class="text-field"  value="{{old('email')}}" placeholder=" Email">
                                    <p style="color:red;" id="register-email"></p>
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="password">Password
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="password" id="password" name="password"  value="{{old('password')}}" class="text-field" placeholder="Password">
                                    <p style="color:red;" id="register-password"></p>
                                </div>
                                <div class="u-s-m-b-30">
                                    <input type="checkbox" class="check-box" id="accept" name="accept" @if (old('accept'))
                                        checked
                                    @endif>
                                    <label class="label-text no-color" for="accept">I’ve read and accept the
                                        <a href="/" class="u-c-brand">terms & conditions</a>
                                    </label>
                                    <p style="color:red;" id="register-accept"></p>
                                </div>
                                    <button type="submit" id="user-button" class="button button-primary w-100">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Register /- -->
                </div>
            </div>
        </div>
    @endsection