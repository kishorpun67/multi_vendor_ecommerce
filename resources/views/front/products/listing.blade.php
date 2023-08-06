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
                <?php echo($categoryDetails['brandscrumbs']); ?>
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
                <?php echo($categoryDetails['brandscrumbs']); ?>
            </ul>
        </div>
        <!-- Shop-Intro /- -->
        <div class="row">
            @include('front.products.filters')
            <!-- Shop-Right-Wrapper -->
            <div class="col-lg-9 col-md-9 col-sm-12">
                <!-- Page-Bar -->
                <div class="page-bar clearfix">
                    <div class="shop-settings">
                        <a id="list-anchor" >
                            <i class="fas fa-th-list"></i>
                        </a>
                        <a id="grid-anchor" class="active">
                            <i class="fas fa-th"></i>
                        </a>
                    </div>
                    <!-- Toolbar Sorter 1  -->
                    @if(!empty($url))
                        <form name="sortProducts" id="sortProducts">
                            <input type="hidden" name="url" id="url" value="{{$url}}">
                            <div class="toolbar-sorter">
                                <div class="select-box-wrapper">
                                    <label class="sr-only" for="sort-by">Sort By</label>
                                    <select class="select-box" name="sort" id="sort">
                                        <option value="" selected>Select</option>
                                        <option value="product_latest">Sort By: Latest</option>
                                        <option value="product_lowest">Sort By: Lowest Price</option>
                                        <option value="product_highest">Sort By: Highest Price</option>
                                        <option value="name_a_z">Sort By: Name A - Z</option>
                                        <option value="name_z_a">Sort By: Name Z - A</option>

                                    </select>
                                </div>
                            </div>
                        </form>
                    @endif

                    <div class="toolbar-sorter-2">
                        <div class="select-box-wrapper">
                            <label class="sr-only" for="show-records">Show Records Per Page</label>
                            <select class="select-box" id="show-records">
                                <option selected="selected" value="">Showing : {{count($categoryProducts)}}</option>
                                <option value="">Showing: All</option>
                            </select>
                        </div>
                    </div>
                    <!-- //end Toolbar Sorter 2  -->
                </div>
                <!-- Page-Bar /- -->
                <!-- Row-of-Product-Container -->
                <div class="filter_products">
                    @include('front.products.ajax_products_listing')
                </div>
                @if(!empty($_REQUEST['serach']))
                    <div>{{$categoryProducts->links()}}</div>
                @endif

                <!-- Row-of-Product-Container /- -->
                <div>
                    {{$categoryDetails['categoryDetails']['description']}}
                </div>
            </div>

            <!-- Shop-Right-Wrapper /- -->
            <!-- Shop-Pagination -->
            <?php /*
            <div class="pagination-area">
                <div class="pagination-number">
                    <ul>
                        <li style="display: none">
                            <a href="shop-v1-root-category.html" title="Previous">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </li>
                        <li class="active">
                            <a href="shop-v1-root-category.html">1</a>
                        </li>
                        <li>
                            <a href="shop-v1-root-category.html">2</a>
                        </li>
                        <li>
                            <a href="shop-v1-root-category.html">3</a>
                        </li>
                        <li>
                            <a href="shop-v1-root-category.html">...</a>
                        </li>
                        <li>
                            <a href="shop-v1-root-category.html">10</a>
                        </li>
                        <li>
                            <a href="shop-v1-root-category.html" title="Next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> */?>
            <!-- Shop-Pagination /- -->
        </div>
    </div>
</div>
@endsection