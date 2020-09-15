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
                        @if(count($errors)>0)
                            @include('error.Note')
                        @endif
                        <form class="cmxform form-horizontal " id="" method="POST"
                            action=" {{ route('postProduct') }} " enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-3">Tên sản phẩm</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="name" name="name" type="text" required
                                        oninvalid="this.setCustomValidity('Không được để trống')"
                                        oninput="this.setCustomValidity('')">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="price" class="control-label col-lg-3">Giá bán</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="price" name="price" type="number" min="0" required
                                        oninvalid="this.setCustomValidity('Không được để trống')"
                                        oninput="this.setCustomValidity('')">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="sellprice" class="control-label col-lg-3">Giá khuyến mãi</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="sellprice" name="sellprice" type="number" min="0"
                                        required oninvalid="this.setCustomValidity('Không được để trống')"
                                        oninput="this.setCustomValidity('')">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="sellprice" class="control-label col-lg-3">Số lượng</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="quantily" name="quantily" type="number" min="0"
                                        required oninvalid="this.setCustomValidity('Không được để trống')"
                                        oninput="this.setCustomValidity('')">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="" class="control-label col-lg-3">Ảnh đại diện</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="image" name="image" type="file">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="" class="control-label col-lg-3">Danh mục</label>
                                <div class="col-lg-6">
                                    <select class="form-control m-bot15" name="category" id="category">
                                        <option value="0" selected>Chọn danh mục</option>
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="" class="control-label col-lg-3">Thương hiệu</label>
                                <div class="col-lg-6" id="brands"></div>
                            </div>

                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Mô tả</label>
                                <div class="col-lg-6">
                                    <textarea class="ckeditor" id="content" name="content"></textarea>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="" class="control-label col-lg-3">Danh mục trang chủ</label>
                                <div class="col-lg-6">
                                    <select class="form-control m-bot15" name="ordernum">
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
                            <div class="form-group">
                                <label class="control-label col-lg-3">Nhập vào tag cho tin tức</label>
                                <select name="tags[]" class="form-control multi-tag" style="width: 500px"
                                    multiple="multiple">
                                </select>
                                <script type="text/javascript">
                                    $(".multi-tag").select2({
                                        tags: true,
                                        tokenSeparators: [',']
                                    })

                                </script>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                    <a href="{{ route('addProduct') }}"><button
                                            class="btn btn-default" type="button" onclick="loading()">Xóa</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</div>
<script>
    CKEDITOR.replace('content');

</script>
<script>
    $('#category').change(function () {
        let idCategory = this.value;
        let url = location.origin + '/shopwatch/ajax/brand';
        $.get(url, {
            id: idCategory
        }, function (data) {
            $('#brands').html(data);
        });
    });

</script>
@include('notify.note');
@endsection
