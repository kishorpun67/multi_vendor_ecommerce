<?php 
    use App\Models\ProductsFilter;
    use App\Models\Product;
    use App\Models\ProductsAttribute;
    $productsFilters = ProductsFilter::productFilters();
    // dd($productsFilters);
?>
@extends('front.layout.layout')
@section('content')
<style>
    *{
    margin: 0;
    padding: 0;
    }
    .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
    }
    .rate:not(:checked) > input {
        position: inherit;;
        top:-9999px;
    }
    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;    
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;  
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }

</style>
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Detail</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{route('index')}}">Home</a>
                </li>
                <?php echo $categoryDetails['brandscrumbs']; ?>
            </ul>
        </div>
    </div>
</div>
<!-- Page Introduction Wrapper /- -->
<!-- Single-Product-Full-Width-Page -->
<div class="page-detail u-s-p-t-80">
    <div class="container">
        <!-- Product-Detail -->

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!-- Product-zoom-area -->
                <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                    <a href="{{asset('image/product_image/medium/'. $productDetails['product_image'])}}">
                        <img src="{{asset('image/product_image/medium/'. $productDetails['product_image'])}}" width="500" height="500" alt="" />
                    </a>
                </div>
                <div class="thumbnails mt-3">
                    <a href="{{asset('image/product_image/medium/'. $productDetails['product_image'])}}"
                        data-standard="{{asset('image/product_image/medium/'. $productDetails['product_image'])}}">
                        <img src="{{asset('image/product_image/medium/'.  $productDetails['product_image'])}}" 
                        height="150" width="150" alt="" />
                    </a>
                    @if(count($productDetails['images']) > 0)
                        @foreach ($productDetails['images'] as $image)
                        <a herf="{{asset('image/product_image/medium/'. $image['image'])}}" data-standard="{{asset('image/product_image/medium/'. $image['image'])}}" >
                            <img src="{{asset('image/product_image/medium/'. $image['image'])}}" height="150" width="150" alt="Product">
                        </a>
                        @endforeach
                    @endif
                </div>
                {{-- </div> --}}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!-- Product-details -->
                <div class="all-information-wrapper">
                    @if(Session::has('success_message'))
                        <div class="alert alert-success" role="alert">
                           <?php echo session('success_message'); ?>
                        </div>
                    @endif
                    @if(Session::has('error_message'))
                    <div class="alert alert-danger" role="alert">
                       <?php echo session('error_message'); ?>
                        </div>
                    @endif
                    <div class="section-1-title-breadcrumb-rating">
                        <div class="product-title">
                            <h1>
                                <a href="javascript:void(0)">{{$productDetails['product_name']}}</a>
                            </h1>
                        </div>
                        <ul class="bread-crumb">
                            <li class="has-separator">
                                <a href="{{route('index')}}">Home</a>
                            </li>
                            <?php echo $categoryDetails['brandscrumbs']; ?>

                        </ul>
                        @php $getRating = getRating($productDetails['id']); @endphp
                        <div class="product-rating">
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
                    <div class="section-2-short-description u-s-p-y-14">
                        <h6 class="information-heading u-s-m-b-8">Description:</h6>
                        <p> {{$productDetails['description']}}</p>
                        </p>
                    </div>
                    <div class="section-3-price-original-discount u-s-p-y-14">
                        <?php  $getDiscountPrice = Product::getDiscountPrice($productDetails['id']); ?>
                        <span class="getAttributePrice">
                            @if ($getDiscountPrice > 0)
                                <div class="price">
                                    <h4>{{env('PRICE')}}{{$getDiscountPrice}}</h4>
                                </div>
                                <div class="original-price">
                                    <span>Original Price:</span>
                                    <span> {{env('PRICE')}}{{$productDetails['product_price']}}</span>
                                </div>
                            @else
                                <div class="original-price">
                                    <span>Original Price:</span>
                                    <span> {{env('PRICE')}}{{$productDetails['product_price']}}</span>
                                </div>
                            @endif
                        </span>
                        {{-- <div class="discount-price">
                            <span>Discount:</span>
                            <span>15%</span>
                        </div> --}}
                        {{-- <div class="total-save">
                            <span>Save:</span>
                            <span>$20</span>
                        </div> --}}
                    </div>

                    <div class="section-4-sku-information u-s-p-y-14">
                        <h6 class="information-heading u-s-m-b-8">Sku Information:</h6>
                        <span class="" style="color:black; display:block;">Product Code: <span> {{$productDetails['product_code']}}</span> </span>
                        <span class="" style="color:black;">Product Color: <span> {{$productDetails['product_color']}}</span></span>
                        <div class="availability">
                            <span>Availability:</span>
                            @if ($totalStock > 0)
                                <span>In Stock</span>
                            @else
                                <span style="color:red;">Out Stock</span>
                            @endif
                        </div>
                        @if ($totalStock > 0)
                            <div class="left">
                                <span>Only:</span>
                                <span>{{$totalStock}}</span>
                            </div>                        
                        @endif


                    </div>
                    @if (!empty($productDetails['vendor']['vendor_business_details']['shop_name']))
                        Sold by <a href="{{route('vendor.product', $productDetails['vendor_id'])}}">
                            {{ $productDetails['vendor']['vendor_business_details']['shop_name']}}
                        </a>
                    @endif
                    <form action="{{route('add.cart')}}" method="post" class="post-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$productDetails['id']}}">
                        <div class="section-5-product-variants u-s-p-y-14">
                            {{-- <h6 class="information-heading u-s-m-b-8">Product Variants:</h6>
                            <div class="color u-s-m-b-11">
                                <span>Available Color:</span>
                                <div class="color-variant select-box-wrapper">
                                    <select class="select-box product-color">
                                        <option value="1">Heather Grey</option>
                                        <option value="3">Black</option>
                                        <option value="5">White</option>
                                    </select>
                                </div>
                            </div> --}}
                            @if (count($groupProducts) > 0)
                                <div>
                                    <div><strong>Product Colors</strong></div>
                                    @foreach ($groupProducts as $product) 
                                        <a href="{{route('product.detail', $product['id'])}}">
                                            <img style="width: 50px" src="{{asset('image/product_image/small/'. $product['product_image'])}}" alt="">
                                        </a>
                                    @endforeach
                                </div>
                            @endif

                            <div class="sizes u-s-m-b-11 mt-2">
                                <span>Available Size:</span>
                                <div class="size-variant select-box-wrapper">
                                    <select name="size" id="getPrice" required="" product_id={{$productDetails['id']}} class="select-box product-size ">
                                        <option value="">Select</option>
                                        @if(!empty($productDetails['attributes']))
                                            @foreach ($productDetails['attributes'] as $size)
                                                <option value="{{$size['size']}}">{{$size['size']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                            <div class="quick-social-media-wrapper u-s-m-b-22">
                                <span>Share:</span>
                                <ul class="social-media-list">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-rss"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="quantity-wrapper u-s-m-b-22">
                                <span>Quantity:</span>
                                <div class="quantity">
                                    {{-- <input type="text" class="quantity-text-field" value="1">
                                    <a class="plus-a" data-max="1000">&#43;</a>
                                    <a class="minus-a" data-min="1">&#45;</a> --}}
                                    <input type="number" name="quantity"  class="quantity-text-field" value="1">
                                </div>
                            </div>
                            <div>
                                <button class="button button-outline-secondary" type="submit">Add to cart</button>
                                <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                                <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>
                            </div>
                        </div>
                    </form>
                    <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                        <input type="text" id="pincode" placeholder="Check Pincode">
                        <button class="checkpincode" type="submit">Go</button>
                    </div>
                </div>
                <!-- Product-details /- -->
            </div>
        </div>
        <!-- Product-Detail /- -->
        <!-- Detail-Tabs -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="detail-tabs-wrapper u-s-p-t-80">
                    <div class="detail-nav-wrapper u-s-m-b-30">
                        <ul class="nav single-product-nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#specification">Product Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#review">Reviews ({{count($ratings)}})</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <!-- Specifications-Tab -->
                        <div class="tab-pane fade active show" id="specification">
                            <div class="specification-whole-container">
                                <div class="spec-table u-s-m-b-50">
                                    <h4 class="spec-heading">Product Details</h4>
                                    <table>
                                        <tr>
                                            <td>Color</td>
                                            <td>{{$productDetails['product_color']}} </td>
                                        </tr>
                                        @forelse($productsFilters as $filter)
                                            @if (isset($productDetails['category_id']))
                                                <?php 
                                                    $filterAvailable = ProductsFilter::fitlerAvalable($filter['id'], 
                                                    $productDetails['category_id']); 
                                                ?>
                                                @if ($filterAvailable == 'Yes')
                                                    <tr>
                                                        <td>{{$filter['filter_name']}}</td>
                                                        <td>
                                                            @foreach ($filter['filter_values'] as $value)
                                                                @if (!empty($productDetails[$filter['filter_column']])  && 
                                                                    $value['filter_value'] == $productDetails[$filter['filter_column']])
                                                                    {{$value['filter_value']}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endif
                                        @endforeach
                                        @if ($productDetails['product_weight'] > 0)
                                            <tr>
                                                <td>Shipping Weight (kg)</td>
                                                <td>{{$productDetails['product_weight']}}</td>
                                            </tr>
                                        @endif

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Specifications-Tab /- -->
                        <!-- Reviews-Tab -->
                        <div class="tab-pane fade" id="review">
                            <div class="review-whole-container">
                                <div class="row r-1 u-s-m-b-26 u-s-p-b-22">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="total-score-wrapper">
                                            <h6 class="review-h6">Average Rating</h6>
                                            <div class="circle-wrapper">
                                                <h1>{{($getRating['avgRating'])}}</h1>
                                            </div>
                                            <h6 class="review-h6">Based on {{$getRating['ratingCount']}} Reviews</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="total-star-meter">
                                            <div class="star-wrapper">
                                                <span>5 Stars</span>
                                                    <span style="color:gold;">&#9733; </span>
                                                    <span style="color:gold;">&#9733; </span>
                                                    <span style="color:gold;">&#9733; </span>
                                                    <span style="color:gold;">&#9733; </span>
                                                    <span style="color:gold;">&#9733; </span>
                                                <span>({{$getRating['ratingFiveStrCount']}})</span>
                                            </div>
                                            <div class="star-wrapper">
                                                <span>4 Stars</span>
                                                    <span style="color:gold;">&#9733; </span>
                                                    <span style="color:gold;">&#9733; </span>
                                                    <span style="color:gold;">&#9733; </span>
                                                    <span style="color:gold;">&#9733; </span>
                                                    <span style="color:;">&#9733; </span>

                                                <span>({{$getRating['ratingFourStrCount']}})</span>
                                            </div>
                                            <div class="star-wrapper">
                                                <span>3 Stars</span>
                                                    <span style="color:gold;">&#9733; </span>
                                                    <span style="color:gold;">&#9733; </span>
                                                    <span style="color:gold;">&#9733; </span>
                                                    <span style="color:;">&#9733; </span>
                                                    <span style="color:;">&#9733; </span>

                                                <span>({{$getRating['ratingThreeStrCount']}})</span>
                                            </div>
                                            <div class="star-wrapper">
                                                <span>2 Stars</span>
                                                    <span style="color:gold;">&#9733; </span>
                                                    <span style="color:gold;">&#9733; </span>
                                                    <span style="color:;">&#9733; </span>
                                                    <span style="color:;">&#9733; </span>
                                                    <span style="color:;">&#9733; </span>

                                                <span>({{$getRating['ratingTwoStrCount']}})</span>
                                            </div>
                                            <div class="star-wrapper">
                                                <span>1 Stars</span>
                                                    <span style="color:gold;">&#9733; </span>
                                                    <span style="color:;">&#9733; </span>
                                                    <span style="color:;">&#9733; </span>
                                                    <span style="color:;">&#9733; </span>
                                                    <span style="color:;">&#9733; </span>
                                                <span>({{$getRating['ratingOneStrCount']}})</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row r-2 u-s-m-b-26 u-s-p-b-22">
                                    <form method="post" action="{{route('add.rating')}}">
                                        @csrf
                                        <div class="col-lg-12">
                                            <div class="your-rating-wrapper">
                                                <h6 class="review-h6">Your Review is matter.</h6>
                                                <h6 class="review-h6">Have you used this product before?</h6>
                                                <div class="star-wrapper u-s-m-b-8">
                                                    <input type="hidden" name="product_id" value="{{$productDetails['id']}}">
                                                    <div class="rate">
                                                        <input style="display: none" type="radio" id="star5" name="rate" value="5" />
                                                        <label for="star5" title="text">5 stars</label>
                                                        <input style="display: none" type="radio" id="star4" name="rate" value="4" />
                                                        <label for="star4" title="text">4 stars</label>
                                                        <input style="display: none" type="radio" id="star3" name="rate" value="3" />
                                                        <label for="star3" title="text">3 stars</label>
                                                        <input style="display: none" type="radio" id="star2" name="rate" value="2" />
                                                        <label for="star2" title="text">2 stars</label>
                                                        <input style="display: none" type="radio" id="star1" name="rate" value="1" />
                                                        <label for="star1" title="text">1 star</label>
                                                    </div>
                                                </div>
                                                <textarea class="text-area u-s-m-b-8 form-control" name="review" id="review-text-area" placeholder="Review"></textarea>
                                                <button class="button button-outline-secondary">Submit Review</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Get-Reviews -->
                                <div class="get-reviews u-s-p-b-22">
                                    <!-- Review-Options -->
                                    <div class="review-options u-s-m-b-16">
                                        <div class="review-option-heading">
                                            <h6>Reviews
                                                <span>  ({{count($ratings)}})</span>
                                            </h6>
                                        </div>
                                        {{-- <div class="review-option-box">
                                            <div class="select-box-wrapper">
                                                <label class="sr-only" for="review-sort">Review Sorter</label>
                                                <select class="select-box" id="review-sort">
                                                    <option value="">Sort by: Best Rating</option>
                                                    <option value="">Sort by: Worst Rating</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- Review-Options /- -->
                                    <!-- All-Reviews -->
                                    <div class="reviewers">
                                        @if (count($ratings) > 0)
                                            @foreach ($ratings as $rating)
                                                <div class="review-data">
                                                    <div class="reviewer-name-and-date">
                                                        <h6 class="reviewer-name">{{$rating['user']['name']}}</h6>
                                                        <h6 class="review-posted-date">{{date("d-m-y H:i:s", strtotime($rating['created_at']))}}</h6>
                                                    </div>
                                                    <div class="reviewer-stars-title-body">
                                                        <div class="reviewer-stars">
                                                            <?php $count = 0;  while($count<$rating['rating']) { ?>
                                                                <span style="color:gold;">&#9733;</span>
                                                            <?php $count++; } ?>
                                                        </div>
                                                        <p class="review-body">
                                                            {{$rating['review']}}
                                                        </p>
                                                    </div>
                                                </div>    
                                            @endforeach
                                        @endif
                                    </div>
                                    <!-- All-Reviews /- -->
                                </div>
                                <!-- Get-Reviews /- -->
                            </div>
                        </div>
                        <!-- Reviews-Tab /- -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Detail-Tabs /- -->
        <!-- Different-Product-Section -->
        <div class="detail-different-product-section u-s-p-t-80">
            <!-- Similar-Products -->
            <section class="section-maker">
                <div class="container">
                    <div class="sec-maker-header text-center">
                        <h3 class="sec-maker-h3">Similar Products</h3>
                    </div>
                    <div class="slider-fouc">
                        <div class="products-slider owl-carousel" data-item="4">
                            @foreach ($similarProuducts as $product)
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
                            @endforeach 
                        </div>
                    </div>
                </div>
            </section>
            <!-- Similar-Products /- -->
            <!-- Recently-View-Products  -->
            <section class="section-maker">
                <div class="container">
                    <div class="sec-maker-header text-center">
                        <h3 class="sec-maker-h3">Recently View</h3>
                    </div>
                    <div class="slider-fouc">
                        <div class="products-slider owl-carousel" data-item="4">
                            @foreach ($recentViewProducts as $product)
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!-- Recently-View-Products /- -->
        </div>
        <!-- Different-Product-Section /- -->
    </div>
</div>
@endsection