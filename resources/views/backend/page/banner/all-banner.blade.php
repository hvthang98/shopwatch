@extends('backend.master.admin_master')
@section('main-content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh mục banner
        </div>

        @if(session('status'))
            <div class="alert alert-info">
                <p style="text-align: center;color: red;">{{ session('status') }}</p>
            </div>
        @endif
        <table class="table table-striped b-t b-light">

            <tr>
                <th style="text-align: center;">STT</th>
                <th style="text-align: center;">Tên Banner</th>
                <th style="text-align: center;">Liên kết</th>
                <th style="text-align: center;">Hình Ảnh</th>
                <th style="text-align: center;">Trạng thái</th>
                <th style="text-align: center;">Ordernum</th>
            </tr>
            
                @foreach($banners as $ban)
                    <tr>
                        <td>{{ $ban->id }}</td>
                        <td>{{ $ban->name }}</td>
                        <td>{{ $ban->link }}</td>
                        <td><img src="../upload/images/{{ $ban->image }}" width="100" height="100"></td>
                        <td style="text-align: center;">
                            @if($ban->status==0)
                                <a
                                    href="{{ route('active_banner',['id'=>$ban->id]) }}">Ẩn</a>
                            @elseif($ban->status==1)
                                <a
                                    href="{{ route('unactive_banner',['id'=>$ban->id]) }}">Hiện</a>
                            @endif
                        </td>
                        <td style="text-align: center;">{{ $ban->ordernum }}</td>
                        <td>
                            <a
                                href="{{ route('edit-banner',['id'=>$ban->id]) }}"><i
                                    style="font-size: 20px" class="fa fa-pencil text-success text-active"></i></a>
                            <a href="{{ route('delete-banner',['id'=>$ban->id]) }}"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa ?');"><i class="fa fa-trash-o"
                                    style="font-size:24px"></i></a>
                        </td>
                    </tr>
                @endforeach
        
        </table>
    </div>
</div>
@if(session()->has('notification'))
@include('notify.note')
@endif
@endsection
