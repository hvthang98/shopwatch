<select class="form-control m-bot15" name="brands">
    @if(isset($categories))
        @foreach($categories as $category)           
                <option value="{{ $category->brand->id }}">{{  $category->brand->name }}</option>
        @endforeach
    @endif
</select>
