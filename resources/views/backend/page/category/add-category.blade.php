@extends('backend.master.admin_master')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{ route('post-add-category') }}" method="post">
                        @csrf
                        @if(count($errors->all())>0)
                            <div>
                                <h4 align="center" style="color: red">Thông tin không hợp lệ</h4>
                            </div>
                        @endif()
                        <div class="form-group">
                            <label for="category">Tên danh mục</label>
                            <input type="text" name="category_name" class="form-control" id=""
                                placeholder="Nhập tên danh mục ">
                        </div>
                        <div class="form-group">
                            <label for="mota">Trạng thái</label>
                            <select name="status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mota">Trạng thái</label>
                            <select name="ordernum" class="form-control input-sm m-bot15">
                                <option value="0">Đầu tiên</option>
                                @if(isset($categories))
                                    @foreach($categories as $category)
                                        <option value="{{ $category->ordernum }}">Sau {{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-info" type="submit">Thêm danh mục</button>
                                <a href="{{ route('add-category') }}"><button class="btn btn-default"
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

@if(session()->has('notification'))
    @include('notify.note');
@endif
@endsection
