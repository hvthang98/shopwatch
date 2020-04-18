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
                <th >STT</th>
                <th >Tên danh mục</th>
                <th >Trạng thái</th>
                
            </tr>
            
                @foreach($categories as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>
                            @if($cat->status==0)
                            <a href="{{route('active-category',['id'=>$cat->id])}}">Ẩn</a>
                            @else 
                            <a href="{{route('unactive-category',['id'=>$cat->id])}}">Hiện</a>
                            @endif
                        </td>
                        
                        
                        <td>
                            <a
                                href="{{route('edit-category',['id'=>$cat->id])}}"><i
                                    style="font-size: 20px" class="fa fa-pencil text-success text-active"></i></a>
                            <a href="{{route('delete-category',['id'=>$cat->id])}}"
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