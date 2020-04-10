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
                <form action="">
                    <input type="text" class="form-control search" placeholder=" Search" name="seach">
                </form>
            </div>
            <div class="table-responsive">
                <table class="table" ui-jq="footable" ui-options="{
        " paging": { "enabled" : true }, "filtering" : { "enabled" : true }, "sorting" : { "enabled" : true }}">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th style="width:400px;">Tên sản phẩm</th>
                            <th style="width:150px;">Giá sản phẩm</th>
                            <th style="width:150px;">Giá khuyến mãi</th>
                            <th style="width:160px;">Ảnh sản phẩm</th>
                            <th style="width:150px;">Thương hiệu</th>
                            <th style="width:100px;">Trạng thái</th>
                            <th style="width:150px;">Tùy Chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach($products as $product)
                            @php
                                $i++;
                            @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->sellprice }}</td>
                                <td>
                                    @if(
                                        isset($product->imgProduct->image)&&($product->imgProduct->level==1)
                                        )
                                        <img src="{{ asset($product->imgProduct->image) }}" alt="" class="list-img">
                                    @endif
                                </td>
                                <td>{{ $product->brands->name }}</td>
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
                                    <a href="" class="a-icon" title="Chỉnh sửa">
                                        <i class="fa fa-pencil-square-o style-icon"></i>
                                    </a>
                                    <a href="" class="a-icon" title="Xóa"
                                        onclick="confirm('Bạn có muốn xóa sản phẩm hay không?')">
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
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
</div>
@endsection
