@extends('backend.master.admin_master')
@section('main-content')
    <style>
        .fa-plus-square:hover {
            cursor: pointer;
        }

    </style>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div>
                <a class="btn btn-primary" href="{{ route('admin.category.create') }}" role="button">Thêm danh mục sản
                    phẩm</a>
            </div>
            <div class="panel-heading">
                Danh mục Menu
            </div>

            @if (session('status'))
                <div class="alert alert-info">
                    <p style="text-align: center;color: red;">{{ session('status') }}</p>
                </div>
            @endif
            <table class="table table-striped b-t b-light">

                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th>Tùy chọn </th>
                </tr>

                @foreach ($categories as $cat)
                    <tr class="itemsCategory">
                        <td>{{ $stt++ }}</td>
                        <td>
                            {{ $cat->name }}
                        </td>
                        <td id="status{{ $cat->id }}">
                            @if ($cat->status == 0)
                                <a <button class="btn btn-danger btnUnactive" type="button"
                                    data-id="{{ $cat->id }}">Ẩn</button>
                                @else
                                    <button class="btn btn-success btnActive" type="button"
                                        data-id="{{ $cat->id }}">Hiện</button>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.category.edit', ['id' => $cat->id]) }}"><i style="font-size: 20px"
                                    class="fa fa-pencil text-success text-active"></i></a>
                            <a href="{{ route('admin.category.getListProduct', ['id' => $cat->id]) }}" title="Danh sách sản phẩm"><i
                                    class="fa fa-list-alt" style="font-size:24px"></i></a>
                            <a data-toggle="modal" data-target="#destroyCategory" data-id="{{ $cat->id }}"
                                class="destroy"><i class="fa fa-trash-o" style="font-size:24px"></i></a>

                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{-- <div>
            <div class="panel-heading">
                Thêm thương hiệu cho menu
            </div>
            <form action="{{ route('admin.category.storeBrand') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="my-input">Tên category</label>
                    <select class="form-control m-bot15" name="category">
                        @if (isset($categories))
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-input">Tên thương hiệu</label>
                    <select class="form-control m-bot15" name="brand">
                        @if (isset($brands))
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button class="btn btn-success" type="submit">Lưu</button>
            </form>
        </div> --}}
    </div>
    <!-- Modal -->
    <div class="modal fade" id="destroyCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                    <p>Bạn có chắc chắn xóa banner này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-danger" id="button-destroy">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        destroyItems('/admin/category/', '#destroyCategory');
        //active or unactive
        $('.itemsCategory').on('click', '.btnUnactive', function() {
            let id = $(this).data('id');
            let url = '/admin/category/active/' + id;
            $.get(url, function(data, status) {
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
        $('.itemsCategory').on('click', '.btnActive', function() {
            let id = this.dataset.id;
            let url = '/admin/category/unactive/' + id;
            $.get(url, function(data, status) {
                if (data.status == true) {
                    let elementStatus = $('#status' + id);
                    elementStatus.html(
                        `<button class="btn btn-danger btnUnactive" type="button" data-id="${id}">Ẩn</button>`
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

    </script>
@endsection
