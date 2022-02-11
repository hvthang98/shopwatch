@extends('backend.layouts.admin_master')
@section('title')
Chỉnh sửa banner
@endsection
@section('main-content')
<div class="row">
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Chỉnh sửa banner
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" method="post"
                                action="{{ route('admin.banner.update',$banner->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="product">Tên Banner</label>
                                    <input type="text" name="edit_banner_name" class="form-control" id="banner"
                                        value="{{ $banner->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="product">Liên kết Banner</label>
                                    <input type="text" name="edit_banner_link" class="form-control" id="product"
                                        value="{{ $banner->link }}">
                                </div>
                                <div class="form-group">
                                    <label for="product">Hình ảnh </label>
                                    <input type="file" name="edit_banner_img" class="form-control" id="product">

                                </div>

                                <div class="form-group">
                                    <label for="mota">Trạng thái</label>
                                    <select name="edit_banner_status" class="form-control input-sm m-bot15">
                                        <option value="0" @if ($banner->status==0)
                                            {{ 'selected' }}
                                            @endif>Ẩn</option>
                                        <option value="1" @if ($banner->status==1)
                                            {{ 'selected' }}
                                            @endif>Hiện</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="mota">Ordernum</label>
                                    <select id="my-select" class="form-control" name="ordernum">
                                        <option value="0">Đầu tiên</option>
                                        @foreach($banners as $item)
                                            @if($item->id==$banner->id)
                                                <option value="{{ $item->ordernum }}" selected>Không đổi</option>
                                            @else
                                                <option value="{{ $item->ordernum }}">Sau {{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" name="edit_banner" class="btn btn-info">Cập nhật banner</button>
                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>
@endsection
