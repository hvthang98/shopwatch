<form role="form" action="{{ route('admin.category.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="category">Tên danh mục</label>
        <input type="text" name="category_name" class="form-control" id="" placeholder="Nhập tên danh mục" required>
    </div>
    <div class="form-group">
        <label for="mota">Trạng thái</label>
        <select name="status" class="form-control input-sm m-bot15">
            <option value="0">Ẩn</option>
            <option value="1">Hiện</option>
        </select>
    </div>
    <div class="form-group">
        <label for="mota">Thứ tự</label>
        <select name="ordernum" class="form-control input-sm m-bot15">
            <option value="0">Đầu tiên</option>
            @if (isset($categories))
                @foreach ($categories as $category)
                    <option value="{{ $category->ordernum }}">Sau {{ $category->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-info" type="submit">Thêm danh mục</button>
    </div>
</form>
