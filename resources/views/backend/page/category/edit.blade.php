<form role="form" action="{{ route('admin.category.update', $category->id) }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="category">Tên danh mục</label>
        <input type="text" name="edit_category_name" class="form-control" id="" placeholder="Nhập tên danh mục "
            required value="{{ $category->name }}">
    </div>
    <div class="form-group">
        <label for="mota">Trạng thái</label>
        <select name="edit_status" class="form-control input-sm m-bot15">
            <option value="0" @if ($category->status == 0) {{ 'selected' }} @endif>Ẩn</option>
            <option value="1" @if ($category->status == 1) {{ 'selected' }} @endif>Hiện</option>
        </select>
    </div>
    <div class="form-group">
        <label for="mota">Trạng thái</label>
        <select name="ordernum" class="form-control input-sm m-bot15">
            <option value="0">Đầu tiên</option>
            @if (isset($categories))
                @foreach ($categories as $cate)
                    @if ($cate->id == $category->id)
                        <option value="null" selected>Không đổi</option>
                    @endif
                    <option value="{{ $cate->ordernum }}">Sau {{ $cate->name }}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="form-group">
        <button class="btn btn-info" type="submit">Cập nhật danh mục</button>
    </div>
</form>
