
<?php 
    use App\Models\ProductsFilter;
    $productsFilters = ProductsFilter::productFilters();
    if(isset($productdata['category_id']))
    {
        $category_id = $productdata['category_id']; 
    }
?>
@forelse($productsFilters as $filter)
    @if (isset($category_id))
        <?php 
            $filterAvailable = ProductsFilter::fitlerAvalable($filter['id'], 
            $category_id); 
        ?>
        @if ($filterAvailable == 'Yes')
            <div class="form-group">
            <label for="{{$filter['filter_column']}}">{{$filter['filter_name']}}</label>
                <select name="{{$filter['filter_column']}}" id="{{$filter['filter_column']}}" class="form-control select2" style="width: 100%;">
                    <option Value="">Select</option>
                    @foreach ($filter['filter_values'] as $value)
                        <option value="{{$value['filter_value']}}" @if(!empty($productdata[$filter['filter_column']]) && 
                        $productdata[$filter['filter_column']]==$value['filter_value']) selected="" @endif>
                            {{ucwords($value['filter_value'])}}
                        </option>
                    @endforeach
                </select>
            </div> 
        @endif
    @endif
   
  @empty
  @endforelse