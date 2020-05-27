@extends('backend.master.admin_master')
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
                    @foreach($user as $user)
                        <form role="form"
                            action="{{ route('post-edit-user',['id'=>$user->id]) }}"
                            method="post">
                            @csrf
                            @if(count($errors)>0)
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
                                <input type="text" name="phonenumber" class="form-control"
                                    value="{{ $user->phone_number }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" value="{{ $user->address }}">

                            </div>
                            <div class="form-group">
                                <label for="level">Chức vụ</label>
                                <select name="level" class="form-control input-sm m-bot15">
                                    <option value="0" @if ($user->level==0)
                                        {{ 'selected' }}
                                    @endif>Khách hàng</option>
                                    <option value="1"  @if ($user->level==1)
                                        {{ 'selected' }}
                                    @endif>Quản lý</option>
                                </select>
                            </div>
                            <button type="submit" name="add-user" class="btn btn-info">Cập nhật người dùng</button>
                            <a
                                href="{{ route('edit-user',['id'=>$user->id]) }}"><button
                                    class="btn btn-default" type="button" onclick="loading()">Xóa</button>
                            </a>
                        </form>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
