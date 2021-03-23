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
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách sản phẩm
        </div>
        <a class="btn btn-primary" href="{{ route('admin.product.create') }}" role="button" style="float: right"><i class="fa fa-plus-square" style="margin-right:10px"></i> Thêm sản phẩm</a>
        <div style="padding: 15px 10px 10px 10px">
            <form action="{{ route('admin.seach.products') }}" method="GET">
                <input type="text" class="form-control search" placeholder="Tìm kiếm sản phẩm" name="key">
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
                    $i=$products->firstItem();
                    @endphp
                    @foreach ($products as $product)
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price) }}</td>
                            <td>{{ number_format($product->sellprice) }}</td>
                            <td>{{ number_format($product->quantily) }}</td>
                            <td>
                                @if (isset($product->avatar->image))
                                    <img src="storage/{{ $product->avatar->image }}" alt="" class="list-img">
                                @endif
                            </td>
                            <td>
                                @if (isset($product->brands->name))
                                    {{ $product->brands->name }}
                                @endif
                            </td>
                            <td>
                                @if ($product->status == 1)
                                    {{ 'Hiện' }}
                                @else
                                    {{ 'Ẩn' }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.imageProduct.index', $product->id) }}" title="Quản lý ảnh">
                                    <i class="fa fa-picture-o style-icon"></i>
                                </a>
                                <a href="{{ route('admin.product.edit', $product->id) }}" class="a-icon" title="Chỉnh sửa">
                                    <i class="fa fa-pencil-square-o style-icon"></i>
                                </a>
                                <a data-toggle="modal" class="destroy" data-target="#destroyProduct"
                                    data-id="{{ $product->id }}">
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
    <!-- Modal -->
    <div class="modal fade" id="destroyProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                    <p>Bạn có chắc chắn xóa sản phẩm này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-danger" id="button-destroy">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        destroyItems('/admin/product/', '#destroyProduct');
    </script>
@endsection
