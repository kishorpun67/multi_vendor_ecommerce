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
                            <a href="{{route('account')}}">Account</a>
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
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <Strong>Success: {{Session::get('success_message')}}</Strong>
                    <button type="button" class="close" data-dismiss='alert' aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <Strong>Error: {{Session::get('error_message')}}</Strong>
                    <button type="button" class="close" data-dismiss='alert' aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                <div class="alert alert-success" role="alert" style="display: none">
                </div>
                <div class="alert alert-danger" role="alert" style="display: none">
                </div>
                <div class="row">
                    <!-- Update account -->
                    <div class="col-lg-6">
                        <div class="login-wrapper">
                            <h2 class="account-h2 u-s-m-b-20">Update Account</h2>
                            <span id="error_message" style="color:red;"></span>
                            <form action="javascript:" method="post" id="updateAccount">
                                @csrf
                                <div class="u-s-m-b-30">
                                    <label for="user-name-email">Email 
                                    </label>
                                    <input type="email" id="user-email" name="email" readonly class="text-field" placeholder="" value="{{auth()->user()->email}}">
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="user-name">Username
                                    </label>
                                    <input type="text" id="name" class="text-field" name="name" value="{{auth()->user()->name}}" placeholder="User Name">
                                    <p style="color:red;" id="user-name"></p>
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="user-address">Address
                                    </label>
                                    <input type="text" id="address" class="text-field" name="address" value="{{auth()->user()->address}}" placeholder="Address">
                                    <p style="color:red;" id="user-address"></p>
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="user-city">City
                                    </label>
                                    <input type="text" id="city" class="text-field" name="city" value="{{auth()->user()->city}}" placeholder="City">
                                    <p style="color:red;" id="user-city"></p>
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="user-state">State
                                    </label>
                                    <input type="text" id="state" class="text-field" name="state" value="{{auth()->user()->state}}" placeholder="State">
                                    <p style="color:red;" id="user-state"></p>
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="user-country">Country
                                    </label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($countries as $item)
                                          <option value="{{$item->nicename}}"
                                            @if (!empty(auth()->user()->country) && auth()->user()->country==$item->nicename)
                                              selected=""  
                                            @endif>{{$item->nicename}}</option>                      
                                        @endforeach
                                      </select>                                      
                                      <p style="color:red;" id="user-country"></p>
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="user-pincode">Pincode
                                    </label>
                                    <input type="text" id="pincode" class="text-field" name="pincode" value="{{auth()->user()->pincode}}" placeholder="pincode">
                                    <p style="color:red;" id="user-pincode"></p>
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="user-mobile">Mobile
                                    </label>
                                    <input type="text" id="mobile" class="text-field" name="mobile" value="{{auth()->user()->mobile}}" placeholder="Mobile">
                                    <p style="color:red;" id="user-mobile"></p>
                                </div>
                                <div class="m-b-45">
                                    <button class="button button-outline-secondary w-100">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end update account /- -->
                    <!-- update password -->
                    <div class="col-lg-6">
                        <div class="reg-wrapper">
                            <h2 class="account-h2 u-s-m-b-20">Update Password</h2>
                            <form id="updatePassword" action="javascript:" >
                                @csrf
                                <div class="u-s-m-b-30">
                                    <label for="current_password">Current Password
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="password" id="current_password" name="current_password" class="text-field" placeholder="Current Password">
                                    <p style="color:red;" id="user-current_password"></p>
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="new_password">New Password
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="password" id="new_password" name="new_password" class="text-field" placeholder="New Password">
                                    <p style="color:red;" id="user-new_password"></p>
                                </div>
           
                                <div class="u-s-m-b-30">
                                    <label for="confirm_password">Confirm Password
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="password" id="confirm_password" name="confirm_password" class="text-field" placeholder="Confirm Password">
                                    <p style="color:red;" id="user-confirm_password"></p>
                                </div>
                                <button type="submit" id="user-button" class="button button-primary w-100">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end password /- -->
                </div>
            </div>
        </div>
    @endsection