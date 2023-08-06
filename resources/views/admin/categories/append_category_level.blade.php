<div class="form-group">
    <label for="parent_id">Select Category Level *</label>
    <select name="parent_id" id="" class="form-control">
        <option value="0" @if(isset($categorydata['parent_id']) && $categorydata['parent_id']==0) selected="" @endif>Main Category</option>
        @if(!empty($categories))
            @foreach($categories as $category)
            <option value="{{ $category['id'] }}"  @if(isset($categorydata['parent_id']) && $categorydata['parent_id']==$category['id']) selected="" @endif>{{ $category['category_name'] }}</option>
               @if(!empty($category['subcategories']))
                 @foreach($category['subcategories'] as $subcategory)
                 <option value="{{ $subcategory['id'] }}">&nbsp;&raquo;&nbsp;{{  $subcategory['category_name'] }}</option>
              @endforeach
                @endif
            @endforeach
        @endif
        </select>                
    </select>
    @error('parent_id')
        <p  style="color: red">{{$message}}</p>
    @enderror
</div>