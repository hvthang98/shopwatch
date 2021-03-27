<form role="form" action="{{ route('admin.menu.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="product">Tên Menu</label>
        <input type="text" name="name" class="form-control" id="" placeholder="Nhập tên menu " required>
    </div>
    <div class="form-group">
        <label for="mota">Trạng thái</label>
        <select name="status" class="form-control input-sm m-bot15">
            <option value="1">Hiện</option>
            <option value="0">Ẩn</option>
        </select>
    </div>
    <div class="form-group">
        <label for="mota">Odernum</label>
        <select id="my-select" class="form-control" name="ordernum">
            @if (isset($menus))
                <option value="0">Đầu tiên</option>
                @foreach ($menus as $menu)
                    <option value="{{ $menu->ordernum }}">Sau {{ $menu->name }}</option>
                @endforeach
            @else
                <option value="0">Đầu tiên</option>
            @endif
        </select>
    </div>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-info">Thêm menu</button>
</form>
