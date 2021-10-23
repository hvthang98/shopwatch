@extends('backend.layouts.admin_master')
@section('title')
    {{ __('Menu') }}
@endsection
@section('main-content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-action">
                <a class="btn btn-primary" href="javascript:void(0)" data-popup-ajax="true" data-target = {{ route('admin.menu.create') }} data-title="{{ __('Create') }}" role="button">Thêm menu</a>
            </div>
            <div class="panel-heading">
                {{ __('List menu') }}
            </div>
            @if (session('status'))
                <div class="alert alert-info">
                    <p style="text-align: center;color: red;">{{ session('status') }}</p>
                </div>
            @endif
            @if (count($errors->all()) > 0)
                @include('error.Note')
            @endif()
            {{-- <table class="table table-striped b-t b-light tableData">
                <tr>
                    <th>STT</th>
                    <th>Tên menu</th>
                    <th>Trạng thái</th>
                    <th>Sub menu</th>
                    <th>Thứ tự</th>
                    <th></th>
                </tr>
                <?php $stt = 1; ?>
                @isset($menus)
                    @foreach ($menus as $key => $menu)
                        <tr class="itemsMenu">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $menu->name }}</td>
                            <td id="status{{ $menu->id }}">
                                @if ($menu->status == 0)
                                    <button class="btn btn-danger btnUnactive" type="button"
                                        data-id="{{ $menu->id }}">Ẩn</button>
                                @elseif($menu->status==1)
                                    <button class="btn btn-success btnActive" type="button"
                                        data-id="{{ $menu->id }}">Hiện</button>
                                @endif
                            </td>
                            <td id="submenu{{ $menu->id }}" data-id="{{ $menu->id }}" class="submenu">
                                <ul></ul>
                                <button class="btn btn-primary add-submenu" data-toggle="modal" data-target="#addSubMenu"
                                    type="button" data-id="{{ $menu->id }}">Chỉnh sửa</button>
                            </td>
                            <td>{{ $menu->ordernum }}</td>
                            <td>
                                <a href="#" data-popup-ajax="true" data-target="{{ route('admin.menu.edit', ['id' => $menu->id]) }}"><i
                                        style="font-size: 20px" class="fa fa-pencil text-success text-active"></i></a>
                                <a href="#" data-toggle="modal" data-target="#destroy" data-id="{{ $menu->id }}"
                                    class="destroy"><i class="fa fa-trash-o" style="font-size:24px"></i></a>
                            </td>
                        </tr>
                    @endforeach

                @endisset
            </table> --}}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="destroy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="formDestroyBanner" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                    <p>Bạn có chắc chắn xóa menu này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-danger" id="button-destroy">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addSubMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa submenu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="font-weight-bold">Danh mục sản phẩm</label>
                            @isset($categories)
                                @foreach ($categories as $category)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="category"
                                            value="{{ $category->id }}">
                                        <label class="form-check-label">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                        <div class="col-lg-6">
                            <label class="font-weight-bold">Thương hiệu</label>
                            @isset($brands)
                                @foreach ($brands as $brand)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="brand"
                                            value="{{ $brand->id }}">
                                        <label class="form-check-label">
                                            {{ $brand->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-primary" id="button-save-submenu">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // destroyItems('/admin/menu/', '#destroy');
        //active or unactive
        $('.itemsMenu').on('click', '.btnUnactive', function() {
            let id = $(this).data('id');
            let url = '/admin/menu/active';
            $.post(url, {
                id: id
            }, function(data, status) {
                if (data.status == true) {
                    let elementStatus = $('#status' + id);
                    elementStatus.html(
                        `<button class="btn btn-success btnActive" type="button" data-id="${id}">Hiện</button>`
                    );
                    Swal.fire({
                        position: 'top-end',
                        width: 600,
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 800
                    })
                } else {
                    Swal.fire({
                        position: 'top-end',
                        width: 600,
                        icon: 'error',
                        title: 'Lỗi server',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

            })
        })
        $('.itemsMenu').on('click', '.btnActive', function() {
            let id = this.dataset.id;
            let url = '/admin/menu/unactive';
            $.post(url, {
                id: id
            }, function(data, status) {
                if (data.status == true) {
                    let elementStatus = document.querySelector('#status' + id);
                    elementStatus.innerHTML =
                        `<button class="btn btn-danger btnUnactive" type="button" data-id="${id}">Ẩn</button>`;
                    Swal.fire({
                        position: 'top-end',
                        width: 600,
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 800
                    })
                } else {
                    Swal.fire({
                        position: 'top-end',
                        width: 600,
                        icon: 'error',
                        title: 'Lỗi server',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        })
    </script>

@endsection
