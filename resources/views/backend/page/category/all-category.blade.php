@extends('backend.master.admin_master')
@section('main-content')
<style>
    .fa-plus-square:hover {
        cursor: pointer;
    }

</style>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh mục Menu
        </div>

        @if(session('status'))
            <div class="alert alert-info">
                <p style="text-align: center;color: red;">{{ session('status') }}</p>
            </div>
        @endif
        <table class="table table-striped b-t b-light">

            <tr>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Tên thương hiệu</th>
                <th>Thứ tự</th>
                <th>Trạng thái</th>
                <th>Tùy chọn </th>
            </tr>

            @foreach($categories as $cat)
                <tr>
                    <td>{{ $stt++ }}</td>
                    <td>
                        {{ $cat->name }}
                    </td>
                    <td>
                        <ul class="list-group">
                            @if(isset($cat->brandCategories))
                                @foreach( $cat->brandCategories as $item)
                                    <li>{{ $item->brand->name }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </td>
                    <td>
                        {{ $cat->ordernum }}
                    </td>
                    <td>
                        @if($cat->status==0)
                            <a
                                href="{{ route('active-category',['id'=>$cat->id]) }}">Ẩn</a>
                        @else
                            <a
                                href="{{ route('unactive-category',['id'=>$cat->id]) }}">Hiện</a>
                        @endif
                    </td>
                    <td>
                        <a
                            href="{{ route('edit-category',['id'=>$cat->id]) }}"><i
                                style="font-size: 20px" class="fa fa-pencil text-success text-active"></i></a>
                        <a href="{{ route('delete-category',['id'=>$cat->id]) }}"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa ?');"><i class="fa fa-trash-o"
                                style="font-size:24px"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
    <div>
        <div class="panel-heading">
            Thêm thương hiệu cho menu
        </div>

        <form action="{{ route('store-brand') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="my-input">Tên category</label>
                <select class="form-control m-bot15" name="category">
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="my-input">Tên thương hiệu</label>
                <select class="form-control m-bot15" name="brand">
                    @if(isset($brands))
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <button class="btn btn-success" type="submit">Lưu</button>
        </form>
    </div>
</div>
@if(session()->has('notification'))
    @include('notify.note')
@endif
@endsection
