@extends('backend.master.admin_master')
@section('title')
Danh sách sản phẩm
@endsection
@section('main-content')
<style>
    .style-icon {
        color: black;
        font-size: 22px;
        margin-right: 10px;
    }

    .style-icon:hover {
        color: red;
    }

    .table>thead>tr>th {
        color: #000;
    }

    .table>tbody>tr>td {
        color: #5f5b5b;
    }

    .list-img {
        width: 140px;
        height: 140px;
    }

</style>
<div class="">
    <div class="">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách sản phẩm
            </div>
            <div style="padding: 15px 10px 10px 10px">
                <form action="{{ route('seachProducts') }}" method="GET">
                    <input type="text" class="form-control search" placeholder="#Mã hoặc tên sản phẩm" name="key">
                </form>
            </div>
            <div class="table-responsive">
                <table class="table" ui-jq="footable">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th style="width:320px;">Tên sản phẩm</th>
                            <th style="width:150px;">Giá sản phẩm</th>
                            <th style="width:150px;">Giá khuyến mãi</th>
                            <th style="width:100px;">Số lượng</th>
                            <th style="width:150px;">Ảnh sản phẩm</th>
                            <th style="width:150px;">Thương hiệu</th>
                            <th style="width:100px;">Trạng thái</th>
                            <th style="width:150px;">Tùy Chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=$products->firstItem()-1;
                        @endphp
                        @foreach($products as $product)
                            @php
                                $i++;
                            @endphp
                            <tr>
                                
                                <td>{{ $i }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ number_format($product->price) }}</td>
                                <td>{{ number_format($product->sellprice) }}</td>
                                <td>{{ number_format($product->quantily) }}</td>
                                <td>
                                    @if(isset($product->avatar->image))
                                        <img src="../storage/{{$product->avatar->image}}" alt="" class="list-img">
                                    @endif
                                </td>
                                <td>
                                    @if(isset($product->brands->name))
                                    {{ $product->brands->name }}
                                    @endif
                                </td>
                                <td>
                                    @if($product->status==1)
                                        {{ 'Hiện' }}
                                    @else
                                        {{ 'Ẩn' }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('imageProduct',$product->id) }}"
                                        title="Quản lý ảnh">
                                        <i class="fa fa-picture-o style-icon"></i>
                                    </a>
                                    <a href="{{ route('editProduct',$product->id) }}"
                                        class="a-icon" title="Chỉnh sửa">
                                        <i class="fa fa-pencil-square-o style-icon"></i>
                                    </a>
                                    <a href="{{ route('delProduct',$product->id) }}"
                                        class="a-icon" title="Xóa" onclick="loading()">
                                        <i class="fa fa-times style-icon"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    {{ $products->links() }}
                </div>
            </footer>
        </div>
    </div>
</div>
@endsection
@section('js')
@include('notify.note');
@endsection
