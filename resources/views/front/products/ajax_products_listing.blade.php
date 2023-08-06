<?php 
    use App\Models\Product;
?>
<div class="row product-container grid-style">
    @foreach ($categoryProducts as $product)
        @php $getRating = getRating($product['id']); @endphp

        <div class="product-item col-lg-4 col-md-6 col-sm-6">
            <div class="item">
                <div class="image-container">
                    <a class="item-img-wrapper-link" href="{{route('product.detail', $product['id'])}}">
                        <img class="img-fluid" src="{{asset('image/product_image/small/'. $product['product_image'])}}" alt="Product">
                    </a>
                    <div class="item-action-behaviors">
                        <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                        <a class="item-mail" href="javascript:void(0)">Mail</a>
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