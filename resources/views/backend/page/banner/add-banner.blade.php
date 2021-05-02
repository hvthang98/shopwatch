@extends('backend.master.admin_master')
@section('title')
    Thêm banner
@endsection
@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Banner
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('admin.banner.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @if (count($errors->all()) > 0)
                                @include('error.Note')
                            @endif()
                            <div class="form-group">
                                <label for="product">Tên Banner</label>
                                <input type="text" name="banner_name" class="form-control" id=""
                                    placeholder="Nhập tên banner " required>
                            </div>
                            <div class="form-group">
                                <label for="product">Liên kết Banner</label>
                                <input type="text" name="banner_link" class="form-control" id="banner">
                            </div>
                            <div>
                                <label for="mota">Hình ảnh Banner</label>
                                <input type="file" name="banner_image" required>

                            </div>
                            <div class="form-group">
                                <label for="mota">Trạng thái</label>
                                <select name="banner_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mota">Sắp xếp</label>
                                <select id="my-select" class="form-control" name="ordernum">
                                    @if (isset($banners))
                                        <option value="0">Đầu tiên</option>
                                        @foreach ($banners as $banner)
                                            <option value="{{ $banner->ordernum }}">Sau {{ $banner->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="0">Đầu tiên</option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Thêm banner</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
