@extends('backend.master.admin_master')
@section('title')
    Thêm người dùng
@endsection
@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Người Dùng
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('admin.user.store') }}" method="post">
                            @csrf
                            @if (count($errors) > 0)
                                @include('error.Note')
                            @endif
                            <div class="form-group">
                                <label for="mail">Email </label>
                                <input type="text" name="email" class="form-control" id="" placeholder="Nhập email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="pass">Mật khẩu </label>
                                <input type="password" name="password" class="form-control" id="pas">
                            </div>
                            <div class="form-group">
                                <label for="pass">Nhập lại mật khẩu</label>
                                <input type="password" name="password_confirmation" class="form-control" id="pas">
                            </div>
                            <div class="form-group">
                                <label for="name">Tên </label>
                                <input type="text" name="name" class="form-control"  value="{{ old('name') }}">

                            </div>
                            <div class="form-group">
                                <label for="day">Ngày sinh</label>
                                <input type="date" name="birthday" class="form-control"  value="{{ old('birthday') }}">

                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" name="phone_number" class="form-control only-number"  value="{{ old('phonenumber') }}">

                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" class="form-control"  value="{{ old('address') }}">

                            </div>
                            <div class="form-group">
                                <label for="level">Chức vụ</label>
                                <select name="roles_id" class="form-control input-sm m-bot15">
                                    @if ($roles)
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Thêm người dùng</button>
                            <a href="{{ route('admin.user.create') }}"><button class="btn btn-default" type="button"
                                    onclick="loading()">Xóa</button>
                            </a>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
