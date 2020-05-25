@extends('backend.master.admin_master')
@section('title')
Chỉnh sửa sản phẩm
@endsection
@section('main-content')
<div class="form-w3layouts">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    thông tin sản phẩm
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal " id="" method="get"
                            action="{{ route('updateProduct',$product->id) }}"
                            novalidate="novalidate" enctype="multipart/form-data">
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-3">Tên sản phẩm</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="name" name="name" type="text"
                                        value="{{ $product->name }}" required>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="price" class="control-label col-lg-3">Giá bán</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="price" name="price" type="number" min=0
                                        value="{{ $product->price }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="sellprice" class="control-label col-lg-3">Giá khuyến mãi</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="sellprice" name="sellprice" type="number" min=0
                                        value="{{ $product->sellprice }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="sellprice" class="control-label col-lg-3">Số lượng</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="quantily" name="quantily" type="number" min=0
                                        value="{{ $product->quantily }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="" class="control-label col-lg-3">Thương hiệu</label>
                                <div class="col-lg-6">
                                    <select class="form-control m-bot15" name="brands_id">
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" @if ($product->brands->id==$brand->id)
                                                {{ 'selected' }}
                                        @endif
                                        >
                                        {{ $brand->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Mô tả</label>
                                <div class="col-lg-6">
                                    <textarea class="ckeditor" id="content"
                                        name="content">{{ $product->content }}</textarea>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="" class="control-label col-lg-3">Thứ tự sắp xếp</label>
                                <div class="col-lg-6">
                                    <select class="form-control m-bot15" name="ordernum">
                                        <option value="0" <?php if($product->ordernum==0) echo 'selected' ?>>Không hiển thị trang chủ</option>
                                       <option value="1" <?php if($product->ordernum==1) echo 'selected' ?>>Sản phẩm nổi bật</option>
                                       <option value="2" <?php if($product->ordernum==2) echo 'selected'?>>Sản phẩm mới</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="sellprice" class="control-label col-lg-3">Trạng thái</label>
                                <div class="col-lg-6">
                                    <label>
                                        <input type="radio" name="status" id="" value="1" @if ($product->status==1)
                                        {{ 'checked' }}
                                        @endif>
                                        Hiện
                                        <input type="radio" name="status" id="" value="0" @if ($product->status==0)
                                        {{ 'checked' }}
                                        @endif>
                                        Ẩn
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                    <a href="{{ route('editProduct',$product->id) }}"><button
                                            class="btn btn-default" type="button"
                                            onclick="loading()">Đặt
                                            lại</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <!-- information product -->
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thông tin kỹ thuật
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal " id="" method="get"
                            action="{{ route('updateInfoProduct',$product->id) }}"
                            novalidate="novalidate" enctype="multipart/form-data">
                            <div class="form-group ">
                                <label for="" class="control-label col-lg-3">Giới tính</label>
                                <div class="col-lg-6">
                                    <select class="form-control m-bot15" name="gender">
                                        <option value="1" @if ($info_product->gender==1)
                                            {{ 'selected' }}
                                            @endif>Nam</option>
                                        <option value="0" @if ($info_product->gender==0)
                                            {{ 'selected' }}
                                            @endif>Nữ</option>
                                        <option value="10" @if ($info_product->gender==10)
                                            {{ 'selected' }}
                                            @endif>Nam và nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-3">Loại máy</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="type" name="type" type="text"
                                        value="{{ $info_product->type }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="price" class="control-label col-lg-3">Chất liệu kính</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="glass_material" name="glass_material" type="text"
                                        value="{{ $info_product->glass_material }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="sellprice" class="control-label col-lg-3">Chất liệu khung viền</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="frames" name="frames" type="text"
                                        value="{{ $info_product->frames }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Chống nước</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="waterproof" name="waterproof" type="text"
                                        value="{{ $info_product->waterproof }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Đường kính mặt(mm)</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="diameter" name="diameter" type="number" min=0
                                        value="{{ $info_product->diameter }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Độ dày mặt(mm)</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="thickness" name="thickness" type="number" min=0
                                        value="{{ $info_product->thickness }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Chất liệu dây</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="strap_material" name="strap_material" type="text"
                                        value="{{ $info_product->strap_material }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Độ rộng dây (mm)</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="strap_width" name="strap_width" type="number" min=0
                                        value="{{ $info_product->strap_width }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Thay dây</label>
                                <div class="col-lg-6">
                                    <label>
                                        <input type="radio" name="strap_change" id="" value="1" @if ($info_product->strap_change==1)
                                        {{ 'checked' }}
                                        @endif>
                                        Có
                                        <input type="radio" name="strap_change" id="" value="0" @if ($info_product->strap_change==0)
                                        {{ 'checked' }}
                                        @endif>
                                        Không
                                    </label>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Thời gian sử dụng</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="expiry_date" name="expiry_date" type="text" min=0
                                        value="{{ $info_product->expiry_date }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Nơi sản xuất</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="address" name="address" type="text"
                                        value="{{ $info_product->address }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                    <a href="{{ route('editProduct',$product->id) }}"><button
                                            class="btn btn-default" type="button" onclick="loading()">Đặt
                                            lại</button>
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
@endsection
@section('js')
<script>
    CKEDITOR.replace('content');

</script>
@if(session()->has('notification'))
    @include('notify.note');
@endif
@endsection
