@extends('backend.layouts.admin_master')
@section('title')
    Chỉnh sửa thông tin người dùng
@endsection
@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Chỉnh sửa thông tin người Dùng
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach ($user as $user)
                            <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="post">
                                @method('PATCH')
                                @csrf
                                @if (count($errors) > 0)
                                    @include('error.Note')
                                @endif
                                <div class="form-group">
                                    <label for="mail">Email </label>
                                    <input type="text" name="email" class="form-control" id="" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên </label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="day">Ngày sinh</label>
                                    <input type="date" name="birthday" class="form-control" value="{{ $user->birthday }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" name="phone_number" class="form-control"
                                        value="{{ $user->phone_number }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" value="{{ $user->address }}">

                                </div>
                                <div class="form-group">
                                    <label for="level">Chức vụ</label>
                                    <select name="role_id" class="form-control input-sm m-bot15">
                                        <option value="2" {{ $user->role_id == 2 ?'selected':''  }}>Khách hàng</option>
                                        <option value="1" {{ $user->role_id == 1 ?'selected':'' }}>Quản lý</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info">Cập nhật người dùng</button>
                                <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}"><button class="btn btn-default"
                                        type="button" onclick="loading()">Đặt lại</button>
                                </a>
                            </form>
                        @endforeach
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection
