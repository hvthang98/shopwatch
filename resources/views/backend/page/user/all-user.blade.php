@extends('backend.master.admin_master')
@section('main-content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh mục người dùng
        </div>

        @if(session('status'))
            <div class="alert alert-info">
                <p style="text-align: center;color: red;">{{ session('status') }}</p>
            </div>
        @endif
        <table class="table table-striped b-t b-light">

            <tr>
                <th>STT</th>
                <th>Email</th>
                <th>Tên</th>
                <th>Ngày sinh</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Chức vụ</th>
                <th></th>
            </tr>

            @foreach($users as $user)
                @php
                    $birthday=date_create($user->birthday);
                    $birthday=date_format($birthday,"m/d/Y");
                @endphp
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $birthday }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->address }}</td>
                    <td>
                        @if($user->level==0)
                            <a
                                href="{{ route('active-admin',['id'=>$user->id]) }}">Khách
                                hàng</a>
                        @elseif($user->level==1)
                            <a
                                href="{{ route('unactive-admin',['id'=>$user->id]) }}">Quản
                                lý</a>
                        @endif
                    </td>

                    <td>
                        <a
                            href="{{ route('edit-user',['id'=>$user->id]) }}"><i
                                style="font-size: 20px" class="fa fa-pencil text-success text-active"></i></a>
                        <a href="{{ route('delete',['id'=>$user->id]) }}"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa ?');"><i class="fa fa-trash-o"
                                style="font-size:24px"></i></a>
                    </td>
                </tr>
            @endforeach

        </table>
        {{ $users->links() }}

    </div>
</div>
@if(session('notification'))
    @include('notify.note')
@endif
@endsection
