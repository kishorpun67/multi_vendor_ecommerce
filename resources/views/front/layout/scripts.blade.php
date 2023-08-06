<?php 
    use App\Models\ProductsFilter;
    $productsFilters = ProductsFilter::productFilters();
?>
<script>
    $(document).ready(function() {
        $("#sort").on("change", function(){
            var  sort =$("#sort").val();
            var  url =$("#url").val();
            var  size = get_filter('size');
            var  color = get_filter('color');
            var  price = get_filter('price');
            var  brand = get_filter('brand');
            @foreach($productsFilters   as $filters)
                var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            console.log(sort, url);
            $.ajax({
                url:'/'+url,
                method: "Post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    sort: sort,
                    url: url,
                    size: size,
                    color: color,
                    price: price,
                    brand: brand,
                    @foreach($productsFilters   as $filters)
                        {{$filters['filter_column']}} : {{$filters['filter_column']}},
                    @endforeach
                }, success: function(data) {
                    $('.filter_products').html(data);
                }, error:function(){
                    alert('Error');
                }
            });
        });
        $(".size").on("change", function(){
            var  sort =$("#sort option:selected").text();
            var  url =$("#url").val();
            var  size = get_filter('size');
            var  color = get_filter('color');
            var  price = get_filter('price');
            var  brand = get_filter('brand');
            @foreach($productsFilters   as $filters)
                var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            console.log(sort, url);
            $.ajax({
                url:'/'+url,
                method: "Post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    sort: sort,
                    url: url,
                    size: size,
                    color: color,
                    price: price,
                    brand: brand,
                    @foreach($productsFilters   as $filters)
                        {{$filters['filter_column']}} : {{$filters['filter_column']}},
                    @endforeach
                }, success: function(data) {
                    $('.filter_products').html(data);
                }, error:function(){
                    alert('Error');
                }
            });
        });
        $(".color").on("change", function(){
            var  size = get_filter('size');
            var  color = get_filter('color');
            var  price = get_filter('price');
            var  brand = get_filter('brand');
            var  sort =$("#sort option:selected").text();
            var  url =$("#url").val();
            @foreach($productsFilters   as $filters)
                var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            console.log(sort, url);
            $.ajax({
                url:'/'+url,
                method: "Post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    sort: sort,
                    url: url,
                    size: size,
                    color: color,
                    price: price,
                    brand: brand,

                    @foreach($productsFilters   as $filters)
                        {{$filters['filter_column']}} : {{$filters['filter_column']}},
                    @endforeach
                }, success: function(data) {
                    $('.filter_products').html(data);
                }, error:function(){
                    alert('Error');
                }
            });
        });
        $(".price").on("change", function(){
            var  size = get_filter('size');
            var  color = get_filter('color');
            var  price = get_filter('price');
            var  brand = get_filter('brand');


            var  sort =$("#sort option:selected").text();
            var  url =$("#url").val();
            @foreach($productsFilters   as $filters)
                var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            console.log(sort, url);
            $.ajax({
                url:'/'+url,
                method: "Post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    sort: sort,
                    url: url,
                    size: size,
                    color: color,
                    price: price,
                    brand: brand,

                    @foreach($productsFilters   as $filters)
                        {{$filters['filter_column']}} : {{$filters['filter_column']}},
                    @endforeach
                }, success: function(data) {
                    $('.filter_products').html(data);
                }, error:function(){
                    alert('Error');
                }
            });
        });
        $(".brand").on("change", function(){
            var  size = get_filter('size');
            var  color = get_filter('color');
            var  price = get_filter('price');
            var  brand = get_filter('brand');


            var  sort =$("#sort option:selected").text();
            var  url =$("#url").val();
            @foreach($productsFilters   as $filters)
                var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            console.log(sort, url);
            $.ajax({
                url:'/'+url,
                method: "Post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    sort: sort,
                    url: url,
                    size: size,
                    color: color,
                    price: price,
                    brand: brand,

                    @foreach($productsFilters   as $filters)
                        {{$filters['filter_column']}} : {{$filters['filter_column']}},
                    @endforeach
                }, success: function(data) {
                    $('.filter_products').html(data);
                }, error:function(){
                    alert('Error');
                }
            });
        });
        @foreach($productsFilters   as $filter)
            $('.{{$filter['filter_column']}}').on('click', function(){
                var  sort =$("#sort option:selected").text();
                var  url =$("#url").val();
                var  size = get_filter('size');
                var  color = get_filter('color');
                var  price = get_filter('price');
                var  brand = get_filter('brand');
                @foreach($productsFilters   as $filters)
                    var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
                @endforeach
                console.log(sort, seleeves);
                $.ajax({
                    url:'/'+url,
                    method: "Post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        sort: sort,
                        url: url,
                        size: size,
                        color: color,
                        price: price,
                        brand: brand,

                        @foreach($productsFilters   as $filters)
                            {{$filters['filter_column']}} : {{$filters['filter_column']}},
                        @endforeach
                    }, success: function(data) {
                        $('.filter_products').html(data);
                    }, error:function(){
                        alert('Error');
                    }

                });
            })
        @endforeach
    

    })
</script>