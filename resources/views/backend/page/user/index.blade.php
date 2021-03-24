@extends('backend.master.admin_master')
@section('main-content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh mục người dùng
            </div>
            @if (session('status'))
                <div class="alert alert-info">
                    <p style="text-align: center;color: red;">{{ session('status') }}</p>
                </div>
            @endif
            <table class="table table-striped b-t b-light">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Tên</th>
                    <th>Ngày sinh</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Chức vụ</th>
                    <th></th>
                </tr>
                @foreach ($users as $user)
                    @php
                        $birthday = date_create($user->birthday);
                        $birthday = date_format($birthday, 'm/d/Y');
                    @endphp
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $birthday }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            <a>{{ $user->roles->name }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}"><i style="font-size: 20px"
                                    class="fa fa-pencil text-success text-active"></i></a>
                            <a href="javascript:void(0)">
                                <i class="fa fa-trash-o destroy-button" style="font-size:24px" data-toggle="modal"
                                    data-target="#destroyForm"
                                    data-link="{{ route('admin.user.destroy', ['id' => $user->id]) }}"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection
