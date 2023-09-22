
<?php 
    use App\Models\ProductsFilter;
    $productsFilters = ProductsFilter::productFilters();
    if(!empty($url)) {
        $getSizes = ProductsFilter::getSizes($url);
        $getColors = ProductsFilter::getColors($url);
        $getBrands = ProductsFilter::getBrands($url);

    }
  

?>
<!-- Shop-Left-Side-Bar-Wrapper -->
<div class="col-lg-3 col-md-3 col-sm-12">
    <!-- Fetch-Categories-from-Root-Category  -->
    {{-- <div class="fetch-categories">
        <h3 class="title-name">Browse Categories</h3>
        
            <h3 class="fetch-mark-category">
                <a href="{{route('listing', $categoryDetails['categoryDetails'] ['url'])}}">{{$categoryDetails['categoryDetails'] ['category_name']}}
                </a>
            </h3>   
            <ul>
                @foreach ($categoryDetails['categoryDetails']['subcategories'] as $subCategory)
                    <li>
                        <a href="{{route('listing', $subCategory['url'])}}">{{$subCategory['category_name']}}
                        </a>
                    </li>   
                @endforeach 
            </ul>
    </div> --}}
    <!-- Fetch-Categories-from-Root-Category  /- -->
    <!-- Filters -->
    @if(!empty($url))
        {{-- brand filter  --}}
        <div class="facet-filter-associates">
            <h3 class="title-name">Brand</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">
                    @foreach ($getBrands as $key => $brand)
                        <input type="checkbox" class="check-box brand" name="brand[]" id="brand{{$brand['id']}}" value="{{$brand['id']}}">
                        <label class="label-text" for="brand{{$brand['id']}}">{{$brand['brands']}}
                        </label>
                    @endforeach
                </div>
            </form>
        </div>
        <!-- Filter-Color -->
        <div class="facet-filter-associates">
            <h3 class="title-name">Color</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">
                    @foreach ($getColors as $key => $color)
                        <input type="checkbox" class="check-box color" name="color[]" id="color{{$key}}" value="{{$color['product_color']}}">
                        <label class="label-text" for="color{{$key}}">{{$color['product_color']}}
                        </label>
                    @endforeach
                </div>
            </form>
        </div>
        <div class="facet-filter-associates">
            <h3 class="title-name">Size</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">
                    @foreach ($getSizes as $key => $size)
                        <input type="checkbox" name="size[]" class="check-box size" id="size{{$key}}" value="{{$size['size']}}">
                        <label class="label-text" for="size{{$key}}">{{$size['size']}}
                        </label>
                    @endforeach
                </div>
            </form>
        </div>
        <!-- Filter /- -->
        <!-- Filter-Price -->
        <?php $prices = array('0-1000','1000-2000','2000-5000','5000-10000','10000-100000'); ?>
        <div class="facet-filter-associates">
            <h3 class="title-name">Price</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">
                    @foreach ($prices as $price)
                        <input type="checkbox" name="price[]" class="check-box price" id="price{{$price}}" value="{{$price}}">
                        <label class="label-text" for="price{{$price}}">{{$price}}
                        </label>
                    @endforeach
                </div>
            </form>
        </div>
        
        <!-- Filter-Price /- -->
        <!-- Filter-Color /- -->
        <!-- Filter -->
        @foreach ($productsFilters as $filter)
            <?php 
                $filterAvailable = ProductsFilter::fitlerAvalable($filter['id'], 
                $categoryDetails['categoryDetails']['id']); 
            ?>
            @if ($filterAvailable == 'Yes')
                <div class="facet-filter-associates">
                    <h3 class="title-name">{{$filter['filter_name']}} </h3>
                    <form class="facet-form" action="#" method="post">
                        <div class="associate-wrapper">
                            @foreach ($filter['filter_values'] as $value)
                                <input type="checkbox" class="check-box {{$filter['filter_column']}}" value="{{$value['filter_value']}}"
                                id="{{$value['filter_value']}}" name="{{$filter['filter_column']}}[]">
                                <label class="label-text" for="{{$value['filter_value']}}">{{$value['filter_value']}}
                                    <span class="total-fetch-items"></span>
                                </label>
                            @endforeach
                        </div>
                    </form>
                </div>
            @endif
        @endforeach
    @endif

    
    <?php  /*
    <!-- Filter-Free-Shipping -->
    <div class="facet-filter-by-shipping">
        <h3 class="title-name">Shipping</h3>
        <form class="facet-form" action="#" method="post">
            <input type="checkbox" class="check-box" id="cb-free-ship">
            <label class="label-text" for="cb-free-ship">Free Shipping</label>
        </form>
    </div>
    <!-- Filter-Free-Shipping /- -->
    <!-- Filter-Rating -->
    <div class="facet-filter-by-rating">
        <h3 class="title-name">Rating</h3>
        <div class="facet-form">
            <!-- 5 Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:76px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">(0)</span>
            </div>
            <!-- 5 Stars /- -->
            <!-- 4 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:60px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (5)</span>
            </div>
            <!-- 4 & Up Stars /- -->
            <!-- 3 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:45px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (0)</span>
            </div>
            <!-- 3 & Up Stars /- -->
            <!-- 2 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:30px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (0)</span>
            </div>
            <!-- 2 & Up Stars /- -->
            <!-- 1 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:15px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (0)</span>
            </div>
            <!-- 1 & Up Stars /- -->
        </div>
    </div>
    <!-- Filter-Rating -->
    <!-- Filters /- -->
    */ ?>
</div>
<!-- Shop-Left-Side-Bar-Wrapper /- -->