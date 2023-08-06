<?php 
    use App\Models\Product;
?>
@extends('front.layout.layout')
@section('content')
<div class="default-height ph-item">
    <div class="slider-main owl-carousel">
        @foreach ($sliderBanners as $siderBanner)
            <div class="bg-image">
                <div class="slide-content">
                    <h1><img src="{{asset($siderBanner['image'])}}"></h1>
                    <h2>{{$siderBanner['title']}}</h2>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Main-Slider /- -->
<!-- Banner-Layer -->
@if (isset($fixBanner[0]['image']))
    <div class="banner-layer">
        <div class="container">
            <div class="image-banner">
                <a target="_blank" rel="nofollow" href="{{url($fixBanner[0]['link'])}}" class="mx-auto banner-hover effect-dark-opacity">
                    <img class="img-fluid" src="{{asset($fixBanner[0]['image'])}}" alt="{{$fixBanner[0]['alt']}}">
                </a>
            </div>
        </div>
    </div>  
@endif

<!-- Banner-Layer /- -->
<!-- Top Collection -->
<section class="section-maker">
    <div class="container">
        <div class="sec-maker-header text-center">
            <h3 class="sec-maker-h3">TOP COLLECTION</h3>
            <ul class="nav tab-nav-style-1-a justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#men-latest-products">New Arrivals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#men-best-selling-products">Best Sellers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#discounted-products">Discounted Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#men-featured-products">Featured Products</a>
                </li>
            </ul>
        </div>
        <div class="wrapper-content">
            <div class="outer-area-tab">
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="men-latest-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach ($newProducts as $product)
                                @php $getRating = getRating($product['id']); @endphp
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{route('product.detail', $product['id'])}}">
                                                <img class="img-fluid" src="{{asset('image/product_image/small/'. $product['product_image'])}}" alt="Product">
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                                </a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li>
                                                        <a href="{{route('product.detail', $product['id'])}}">{{$product['product_code']}}</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{route('product.detail', $product['id'])}}">{{$product['product_name']}}</a>
                                                </h6>
                                                <div class="item-stars">
                                                    @php $nonStar = 5-$getRating['avgStarRating']; @endphp
                                                    @if ($getRating['avgStarRating']> 0)
                                                        @php $star=1; @endphp
                                                        @while($star <=$getRating['avgStarRating'])
                                                            <span style="color:gold;">&#9733; </span>
                                                        @php $star++; @endphp
                                                        @endwhile
                                                    @endif
                                                    @if ($getRating > 0)
                                                        @php $counter=1; @endphp
                                                        @while($counter <= $nonStar)
                                                            <span>&#9733; </span>
                                                            @php $counter++; @endphp
                                                        @endwhile
                                                    @endif
                                                    <span>({{$getRating['avgRating']}})</span> 
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
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div> 
                                @endforeach
   
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane show fade" id="men-best-selling-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach ($bestSeller as $product)
                                @php $getRating = getRating($product['id']); @endphp
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{route('product.detail', $product['id'])}}">
                                                <img class="img-fluid" src="{{asset('image/product_image/small/'. $product['product_image'])}}" alt="Product">
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                                </a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li>
                                                        <a href="">{{$product['product_code']}}</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{route('product.detail', $product['id'])}}">{{$product['product_name']}}</a>
                                                </h6>
                                                <div class="item-stars">
                                                    @php $nonStar = 5-$getRating['avgStarRating']; @endphp
                                                    @if ($getRating['avgStarRating']> 0)
                                                        @php $star=1; @endphp
                                                        @while($star <=$getRating['avgStarRating'])
                                                            <span style="color:gold;">&#9733; </span>
                                                        @php $star++; @endphp
                                                        @endwhile
                                                    @endif
                                                    @if ($getRating > 0)
                                                        @php $counter=1; @endphp
                                                        @while($counter <= $nonStar)
                                                            <span>&#9733; </span>
                                                            @php $counter++; @endphp
                                                        @endwhile
                                                    @endif
                                                    <span>({{$getRating['avgRating']}})</span> 
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
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div> 
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="discounted-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach ($discountedProduct as $product)
                                @php $getRating = getRating($product['id']); @endphp
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{route('product.detail', $product['id'])}}">
                                                <img class="img-fluid" src="{{asset('image/product_image/small/'. $product['product_image'])}}" alt="Product">
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                                </a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li>
                                                        <a href="">{{$product['product_code']}}</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{route('product.detail', $product['id'])}}">{{$product['product_name']}}</a>
                                                </h6>
                                                <div class="item-stars">
                                                    @php $nonStar = 5-$getRating['avgStarRating']; @endphp
                                                    @if ($getRating['avgStarRating']> 0)
                                                        @php $star=1; @endphp
                                                        @while($star <=$getRating['avgStarRating'])
                                                            <span style="color:gold;">&#9733; </span>
                                                        @php $star++; @endphp
                                                        @endwhile
                                                    @endif
                                                    @if ($getRating > 0)
                                                        @php $counter=1; @endphp
                                                        @while($counter <= $nonStar)
                                                            <span>&#9733; </span>
                                                            @php $counter++; @endphp
                                                        @endwhile
                                                    @endif
                                                    <span>({{$getRating['avgRating']}})</span> 
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
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div> 
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="men-featured-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach ($featuredProduct as $product)
                                @php $getRating = getRating($product['id']); @endphp
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{route('product.detail', $product['id'])}}">
                                                <img class="img-fluid" src="{{asset('image/product_image/small/'. $product['product_image'])}}" alt="Product">
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                                </a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li>
                                                        <a href="">{{$product['product_code']}}</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{route('product.detail', $product['id'])}}">{{$product['product_name']}}</a>
                                                </h6>
                                                <div class="item-stars">
                                                    @php $nonStar = 5-$getRating['avgStarRating']; @endphp
                                                    @if ($getRating['avgStarRating']> 0)
                                                        @php $star=1; @endphp
                                                        @while($star <=$getRating['avgStarRating'])
                                                            <span style="color:gold;">&#9733; </span>
                                                        @php $star++; @endphp
                                                        @endwhile
                                                    @endif
                                                    @if ($getRating > 0)
                                                        @php $counter=1; @endphp
                                                        @while($counter <= $nonStar)
                                                            <span>&#9733; </span>
                                                            @php $counter++; @endphp
                                                        @endwhile
                                                    @endif
                                                    <span>({{$getRating['avgRating']}})</span> 
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
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div> 
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Top Collection /- -->
<!-- Banner-Layer -->
@if (isset($fixBanner[1]['image']))
    <div class="banner-layer">
        <div class="container">
            <div class="image-banner">
                <a target="_blank" rel="nofollow" href="{{url($fixBanner[1]['link'])}}" class="mx-auto banner-hover effect-dark-opacity">
                    <img class="img-fluid" src="{{asset($fixBanner[1]['image'])}}" alt="{{$fixBanner[1]['alt']}}">
                </a>
            </div>
        </div>
    </div>  
@endif

<!-- Banner-Layer /- -->
<!-- Site-Priorities -->
<section class="app-priority">
    <div class="container">
        <div class="priority-wrapper u-s-p-b-80">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-star"></i>
                        </div>
                        <h2>
                            Great Value
                        </h2>
                        <p>We offer competitive prices on our 100 million plus product range</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-cash"></i>
                        </div>
                        <h2>
                            Shop with Confidence
                        </h2>
                        <p>Our Protection covers your purchase from click to delivery</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-ios-card"></i>
                        </div>
                        <h2>
                            Safe Payment
                        </h2>
                        <p>Pay with the world’s most popular and secure payment methods</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-contacts"></i>
                        </div>
                        <h2>
                            24/7 Help Center
                        </h2>
                        <p>Round-the-clock assistance for a smooth shopping experience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Site-Priorities /- -->
@endsection