
@extends('front.layout.layout')
@section('content')
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Cart</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{route('index')}}">Home</a>
                </li>
                <li class="is-marked">
                    <a href="javascript:void(0);">Thanks</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="page-cart u-s-p-t-80">
    <div class="container">
        @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <Strong class="">Success: {{Session::get('success_message')}}</Strong>
            <button type="button" class="close" data-dismiss='alert' aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(Session::has('error_message'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <Strong>Error: {{Session::get('error_message')}}</Strong>
            <button type="button" class="close" data-dismiss='alert' aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
        <div class="row">
  
            <div class="col-lg-12 text-center">
                <h3>YOUR ORDER HAS BEEN PLACED SUCCESSFULLY.</h3>  
                <p>Your order number is {{Session::get('orderId')}} and Grand total is {{env('PRICE')}}{{Session::get('grandTotal')}}</p>              
            </div>
        </div>
    </div>
</div>
@endsection