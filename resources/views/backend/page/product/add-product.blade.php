@extends('backend.master.admin_master')
@section('title')
    Thêm sản phẩm mới
@endsection
@section('main-content')
    <div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">

                <section class="panel">
                    <header class="panel-heading">
                        thêm sản phẩm mới
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            @if (count($errors) > 0)
                                @include('error.Note')
                            @endif
                            <form class="cmxform form-horizontal " id="" method="POST"
                                action=" {{ route('admin.product.store') }} " enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="control-label col-lg-3">Tên sản phẩm</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="name" name="name" type="text" required
                                            value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="price" class="control-label col-lg-3">Giá bán</label>
                                    <div class="col-lg-6">
                                        <input class="form-control numberFormat" id="price" name="price" type="text"
                                            required value="{{ old('price') }}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="sellprice" class="control-label col-lg-3">Giá khuyến mãi</label>
                                    <div class="col-lg-6">
                                        <input class="form-control numberFormat" id="sellprice" name="sellprice" type="text"
                                            required value="{{ old('sellprice') }}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="sellprice" class="control-label col-lg-3">Số lượng</label>
                                    <div class="col-lg-6">
                                        <input class="form-control numberFormat" id="quantily" name="quantily" type="text"
                                            value="{{ old('quantily') }}" required>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="" class="control-label col-lg-3">Ảnh đại diện</label>
                                    <div class="col-lg-6">
                                        <input class="form-control " id="image" name="image" type="file"
                                            value="{{ old('image') }}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="" class="control-label col-lg-3">Danh mục</label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-bot15" name="category" id="category" required>
                                            <option value="" selected>Chọn danh mục</option>
                                            @if (isset($categories))
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div>
                                        <a data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus-square-o"
                                                style="font-size: 2rem;
                                                                                        padding-top: 2px;"></i></a>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="" class="control-label col-lg-3">Thương hiệu</label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-bot15" id="brands" name="brands" required>
                                            <option value="">Chọn thương hiệu</option>
                                        </select>
                                    </div>
                                    <div id="formAddBrand">
                                        <a data-toggle="modal" data-target="#addBrand"><i class="fa fa-plus-square-o" style="font-size: 2rem;
                                                                                        padding-top: 2px;"></i></a>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="password" class="control-label col-lg-3">Mô tả</label>
                                    <div class="col-lg-6">
                                        <textarea class="ckeditor" id="content"
                                            name="content">{{ old('content') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="" class="control-label col-lg-3">Danh mục trang chủ</label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-bot15" name="ordernum" required>
                                            <option value="0" checked>Không hiển thị trang chủ</option>
                                            <option value="1">Sản phẩm nổi bật</option>
                                            <option value="2">Sản phẩm mới</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="sellprice" class="control-label col-lg-3">Trạng thái</label>
                                    <div class="col-lg-6">
                                        <label>
                                            <input type="radio" name="status" id="" value="1" checked="checked">
                                            Hiện
                                            <input type="radio" name="status" id="" value="0">
                                            Ẩn
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-left:0.8rem">
                                    <label class="control-label col-lg-3">Nhập vào tag cho tin tức</label>
                                    <select name="tags[]" class="form-control multi-tag" style="width: 500px"
                                        multiple="multiple">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit">Lưu</button>
                                        <a href="{{ route('admin.product.create') }}"><button class="btn btn-default"
                                                type="button" onclick="loading()">Xóa</button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Tên danh mục</label>
                        <input class="form-control" name="name" type="text" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-primary" id="btn-save-category">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addBrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm thương hiệu sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-lg-12">Tên thương hiệu</label>
                        <input class="form-control" name="name" type="text" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-12">Mô tả</label>
                        <input class="form-control" name="info" type="text" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-primary" id="btn-save-brand">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('content');
        $(".multi-tag").select2({
            tags: true,
            tokenSeparators: [',']
        })
        $('#formAddBrand').hide();
        /**
         * ajax brand
         */
        $('#category').change(function() {
            let idCategory = this.value;
            let url = '/ajax/brand';
            $.get(url, {
                id: idCategory
            }, function(data) {
                let brand = data.data;
                let html = `<option value="">Chọn thương hiệu</option>`;
                brand.forEach(function(e) {
                    html += `<option value="${e.id}">${e.name}</option>`;
                })
                $('#brands').html(html);
            });
            if (idCategory == '') {
                $('#formAddBrand').hide();
            } else {
                $('#formAddBrand').show();
            }
        });

        $('#btn-save-category').on('click', function() {
            let url = '/api/category';
            let name = $('#addCategory input[name="name"]').val();
            $.post(url, {
                name: name,
            }, function(data) {
                let html = `<option value="${data.data.id}">${data.data.name}</option>`;
                $('#category').append(html);
                Swal.fire({
                    position: 'top-end',
                    width: 600,
                    icon: 'success',
                    title: 'Thêm danh mục thành công',
                    showConfirmButton: false,
                    timer: 800
                })
            })
            $('#addCategory input[name="name"]').val('');
            $('#addCategory').modal('hide');
        });

        $('#btn-save-brand').on('click', function(event) {
            let url = '/api/brand';
            let name = $('#addBrand input[name="name"]').val();
            let info = $('#addBrand input[name="info"]').val();
            let category_id = $('select[name="category"]').val();
            $.post(url, {
                name: name,
                info: info,
                status: 1,
            }, function(data) {
                if (data.status == true) {
                    $.post('/api/brand/category', {
                        categories_id: category_id,
                        brands_id: data.data.id,
                    }, function(data2) {
                        if (data.status == true) {
                            let html = `<option value="${data.data.id}">${data.data.name}</option>`;
                            $('#brands').append(html);
                            Swal.fire({
                                position: 'top-end',
                                width: 600,
                                icon: 'success',
                                title: 'Thêm thương hiệu thành công',
                                showConfirmButton: false,
                                timer: 800
                            })
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                width: 600,
                                icon: 'error',
                                title: 'Thêm thương hiệu không thành công',
                                showConfirmButton: false,
                                timer: 800
                            })
                        }
                    })
                } else {
                    Swal.fire({
                        position: 'top-end',
                        width: 600,
                        icon: 'error',
                        title: 'Thêm thương hiệu không thành công',
                        showConfirmButton: false,
                        timer: 800
                    })
                }
            })
            $('#addBrand input[name="name"]').val('');
            $('#addBrand input[name="info"]').val('');
            $('#addBrand').modal('hide')
        });

    </script>
@endsection
