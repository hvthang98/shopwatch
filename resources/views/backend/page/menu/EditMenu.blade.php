<form role="form" method="post" action="{{ route('admin.menu.update', $menu->id) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="product">Tên Menu</label>
        <input type="text" name="name" class="form-control" id="menu" value="{{ $menu->name }}">
    </div>
    <div class="form-group">
        <label for="mota">Trạng thái</label>
        <select name="status" class="form-control input-sm m-bot15">
            <option value="0" @if ($menu->status == 0) {{ 'selected' }} @endif>Ẩn</option>
            <option value="1" @if ($menu->status == 1) {{ 'selected' }} @endif>Hiện</option>
        </select>
    </div>
    <div class="form-group">
        <label for="mota">Ordernum</label>
        <select id="my-select" class="form-control" name="ordernum">
            <option value="0">Đầu tiên</option>
            @isset($menus)
                @foreach ($menus as $item)
                    @if ($item->id == $menu->id)
                        <option value="{{ $item->ordernum }}" selected>Không đổi</option>
                    @else
                        <option value="{{ $item->ordernum }}">Sau {{ $item->name }}</option>
                    @endif
                @endforeach
            @endisset
        </select>
    </div>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="edit_menu" class="btn btn-info">Cập nhật menu</button>
</form>
