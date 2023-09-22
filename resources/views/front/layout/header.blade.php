<?php
    use App\Models\Section;
    $sections = Section::sections();
    $totalCartItem = getCartItems();
?>
<header>
    <!-- Top-Header -->
    <div class="full-layer-outer-header">
        <div class="container clearfix">
            <nav>
                <ul class="primary-nav g-nav">
                    <li>
                        <a href="tel:+111222333">
                            <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                            Telephone:+111-222-333</a>
                    </li>
                    <li>
                        <a href="mailto:info@sitemakers.in">
                            <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                            E-mail: kishorpun55@gmail.com
                        </a>
                    </li>
                </ul>
            </nav>
            <nav>
                <ul class="secondary-nav g-nav">
                    <li>
                        <a> @if (auth()->check())My Account @else Login/Register @endif
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:200px">
                            @if (auth()->check())
                            <li>
                                <a href="{{route('account')}}">
                                    <i class="fas fa-user u-s-m-r-9"></i>
                                    Account
                                </a>                            
                            </li>
                            <li>
                                <a href="{{route('cart')}}">
                                    <i class="fa-solid fa-cart-shopping u-s-m-r-9"></i>
                                    My Cart</a>
                            </li>
                            <li>
                                <a href="{{route('orders')}}">
                                    <i class="fa-solid fa-cart-shopping u-s-m-r-9"></i>
                                    Order</a>
                            </li>
                            <li>
                                <a href="{{route('checkout')}}">
                                    <i class="far fa-check-circle u-s-m-r-9"></i>
                                    Checkout</a>
                            </li>
                                <li>
                                    <a href="{{route('logout')}}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Logout</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{route('login')}}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Customer Login</a>
                                </li>
                                <li>
                                    <a href="{{route('vendor.login')}}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Vendor Login</a>
                                </li>
                            @endif

                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Top-Header /- -->
    <!-- Mid-Header -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">
                <div class="col-lg-3 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">
                        <a href="{{route('index')}}">
                            <img src="{{asset('front/images/main-logo/stack-developers-logo.png')}}" alt="Stack Developers" class="app-brand-logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 u-d-none-lg" >
                    <form class="form-searchbox" method='get' action='{{route('search.products')}}'>
                        <label class="sr-only" for="search-landscape">Search</label>
                        <input id="search-landscape" type="text" name='search' class="text-field" placeholder="Search everything"
                        @if (!empty($_GET['search']))
                            value="{{$_GET['search']}}"
                        @endif>
                        <div class="select-box-position">
                            <div class="select-box-wrapper select-hide">
                                <label class="sr-only" for="select-category">Choose category for search</label>
                                <select class="select-box" name="section_id" id="select-category">
                                    <option selected="selected" value="">
                                        All
                                    </option>
                                    @foreach ($sections as $section)
                                        <option value="{{$section['id']}}"
                                        @if (!empty($_REQUEST['section_id']) && $_REQUEST['section_id'] == $section['id'])
                                            selected="selected"
                                        @endif
                                        >{{$section['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                        <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <nav>
                        <ul class="mid-nav g-nav">
                            <li class="u-d-none-lg">
                                <a href="{{route('index')}}">
                                    <i class="ion ion-md-home u-c-brand"></i>
                                </a>
                            </li>
                            <li>
                                <a id="mini-cart-trigger">
                                    <i class="ion ion-md-basket"></i>
                                    <span class="item-counter totalCartItems">{{$totalCartItem}}</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-search" id="responsive-search"></button>
        </div>
        <div class="fixed-responsive-wrapper">
            <a href="{{route('cart')}}">
                <i class="far fa-heart"></i>
                <span class="fixed-item-counter">{{$totalCartItem}}</span>
            </a>
        </div>
    </div>
    <!-- Responsive-Buttons /- -->
    <!-- Mini Cart -->
    <div class="mini-cart-wrapper">
        <div class="mini-cart">
            <div class="mini-cart-header">
                YOUR CART
                <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
            </div>
            <div id="appendHeaderCartItems">
                @include('front.layout.header_cart_items')
            </div>
            <div class="mini-action-anchors">
                <a href="{{route('cart')}}" class="cart-anchor">View Cart</a>
                <a href="{{route('checkout')}}" class="checkout-anchor">Checkout</a>
            </div>
        </div>
    </div>
    <!-- Mini Cart /- -->
    <!-- Bottom-Header -->
    <div class="full-layer-bottom-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="v-menu v-close">
                        <span class="v-title">
                            <i class="ion ion-md-menu"></i>
                            All Categories
                            <i class="fas fa-angle-down"></i>
                        </span>
                        <nav>
                            <div class="v-wrapper">
                                <ul class="v-list animated fadeIn">
                                    @foreach ($sections as $section)
                                        @if(count($section['categories']) > 0)

                                        <li class="js-backdrop">
                                            <a href="javascript:void(0);">
                                                <i class="ion-ios-add-circle"></i>
                                                {{$section['name']}}
                                                <i class="ion ion-ios-arrow-forward"></i>
                                            </a>
                                            <button class="v-button ion ion-md-add"></button>
                                            <div class="v-drop-right" style="width: 700px;">
                                                <div class="row">
                                                    @forelse  ($section['categories'] as $category)
                                                        <div class="col-lg-4">
                                                            <ul class="v-level-2">
                                                                <li>
                                                                    <a href="{{route('listing', $category['url'])}}">{{$category['category_name']}}</a>
                                                                    <ul>
                                                                        @foreach ($category['subcategories'] as $subCategory)
                                                                        <li>
                                                                            <a href="{{route('listing', $subCategory['url'])}}">{{$subCategory['category_name']}}</a>
                                                                        </li>
                                                                        @endforeach
                                                                     
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                        </li>
                                        @endif

                                    @endforeach
                                    {{--                                     
                                    <li class="js-backdrop v-none" style="display: none">
                                        <a href="shop-v1-root-category.html">
                                            <i class="ion ion-md-rocket"></i>
                                            Accessories
                                            <i class="ion ion-ios-arrow-forward"></i>
                                        </a>
                                        <button class="v-button ion ion-md-add"></button>
                                        <div class="v-drop-right" style="width: 700px;">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <ul class="v-level-2">
                                                        <li>
                                                            <a href="listing.html">Watches</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.html">Casual Watches</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.html">Formal Watches
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <ul class="v-level-2">
                                                        <li>
                                                            <a href="listing.html">Belts</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.html">Casual Belts</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.html">Leather Belts
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="v-more">
                                            <i class="ion ion-md-add"></i>
                                            <span>View More</span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9">
                    <ul class="bottom-nav g-nav u-d-none-lg">
                        <li>
                            <a href="{{route('search.products','search=new-arrivals')}}">New Arrivals
                                <span class="superscript-label-new">NEW</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('search.products','search=best-sellers')}}">Best Seller
                                <span class="superscript-label-hot">HOT</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('search.products','search=featured')}}">Featured
                            </a>
                        </li>
                        <li>
                            <a href="{{route('search.products','search=discounted')}}">Discounted
                            </a>
                        </li>
                        <li class="mega-position">
                            <a>More
                                <i class="fas fa-chevron-down u-s-m-l-9"></i>
                            </a>
                            <div class="mega-menu mega-3-colm">
                                <ul>
                                    <li class="menu-title">COMPANY</li>
                                    <li>
                                        <a href="{{route('about')}}" class="u-c-brand">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{route('contact')}}">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="{{route('faq')}}">FAQ</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">ACCOUNT</li>
                                    <li>
                                        <a href="{{route('account')}}">My Account</a>
                                    </li>
                                    <li>
                                        <a href="{{route('orders')}}">My Orders</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom-Header /- -->
</header>