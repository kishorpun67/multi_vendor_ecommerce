<?php 
    use App\Models\Product;
?>
@extends('front.layout.layout')
@section('content')
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Shop</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{route('index')}}">Home</a>
                </li>
               <li>{{$vendorShop['shop_name']}}</li>
            </ul>
        </div>
    </div>
</div>

<div class="page-shop u-s-p-t-80">
    <div class="container">
        <!-- Shop-Intro -->
        <div class="shop-intro">
            <ul class="bread-crumb">
                <li class="has-separator">
                    <a href="{{route('index')}}">Home</a>
                </li>
                <li>{{$vendorShop['shop_name']}}</li>
            </ul>
        </div>
        <!-- Shop-Intro /- -->
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="page-bar clearfix">
                    <div class="row product-container list-style">
                        @foreach ($vendorProducts as $product)
                            <div class="product-item col-lg-4 col-md-6 col-sm-6">
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="{{route('product.detail', $product['id'])}}">
                                            <img class="img-fluid" src="{{asset('image/product_image/small/'. $product['product_image'])}}" alt="Product">
                                        </a>
                                        <div class="item-action-behaviors">
                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                            <a class="item-mail" href="javascript:void(0)">Mail</a>
                                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <div class="what-product-is">
                                            <ul class="bread-crumb">
                                                <li class="has-separator">
                                                    <a href="{{route('product.detail', $product['id'])}}">{{$product['product_code']}}</a>
                                                </li>
                                                <li class="has-separator">
                                                    <a href="{{route('product.detail', $product['id'])}}">{{$product['product_color']}}</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product.detail', $product['id'])}}">{{$product['brand']['brands']}}</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a href="{{route('product.detail', $product['id'])}}">{{$product['product_name']}}</a>
                                            </h6>
                                            <div class="item-description">
                                                <p> {{$product['description']}} 
                                                </p>
                                            </div>
                                            <div class="item-stars">
                                                <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                    <span style='width:67px'></span>
                                                </div>
                                                <span>(23)</span>
                                            </div>
                                        </div>
                                        <?php  $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                        @if ($getDiscountPrice > 0)
                                            <div class="price-template">
                                                <div class="item-new-price">

                                                    {{env('PRICE')}}{{$getDiscountPrice}}
                                                </div>
                                                <div class="item-old-price">
                                                    {{env('PRICE')}}{{$product['product_price']}}
                                                </div>
                                            </div>
                                        @else 
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    {{env('PRICE')}}{{$product['product_price']}} 
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <?php $isProductNew = Product::isProductNew($product['id']); ?>
                                    @if($isProductNew == "Yes")
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    @else
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if (isset($_GET['sort']))
                    <div>{{$vendorProducts->appends(['sort'=>$_GET['sort']])->links()}}</div>
                @else
                    <div>{{$vendorProducts->links()}}</div>
                @endif
                <div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi perspiciatis consequatur id illum sit dolorum ducimus fugit, tenetur ex quidem sequi ipsa dicta eos itaque in modi. Minus, aperiam vero?
                </div>
            </div>
        </div>
    </div>
</div>
@endsection