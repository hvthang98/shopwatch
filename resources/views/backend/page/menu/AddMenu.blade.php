@extends('backend.master.admin_master')
@section('title')
    Thêm Menu
@endsection
@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Menu
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('admin.menu.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @if (count($errors->all()) > 0)
                                @include('error.Note')
                            @endif()
                            <div class="form-group">
                                <label for="product">Tên Menu</label>
                                <input type="text" name="name" class="form-control" id="" placeholder="Nhập tên menu "
                                    required>
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
                            <button type="submit" class="btn btn-info">Thêm menu</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
