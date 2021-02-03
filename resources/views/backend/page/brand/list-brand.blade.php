@extends('backend.master.admin_master')
@section('title')
    Danh sách thương hiệu
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
            color: #747171;
        }

    </style>
    <div class="">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách thương hiệu
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
                                <th style="width:100px;">STT</th>
                                <th>Tên thương hiệu</th>
                                <th style="width: 500px;">Thông tin</th>
                                <th>Trạng thái</th>
                                <th style="width:150px;">Tùy Chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $stt=$brands->firstItem()
                            @endphp
                            @foreach ($brands as $brand)

                                <tr>
                                    <td>{{ $stt++ }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{!! $brand->info !!}</td>
                                    <td>
                                        @if ($brand->status == 1)
                                            {{ 'Hiện' }}
                                        @else
                                            {{ 'Ẩn' }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.brand.edit', $brand->id) }}" class="a-icon"
                                            title="Chỉnh sửa">
                                            <i class="fa fa-pencil-square-o style-icon"></i>
                                        </a>
                                        <a class="a-icon destroy" data-toggle="modal" data-target="#destroyBrand"
                                            title="Xóa" data-id="{{ $brand->id }}">
                                            <i class="fa fa-times style-icon"></i>
                                        </a>
                                        <a href="{{ route('admin.brand.getListProduct', ['id' => $brand->id]) }}"
                                            title="Danh sách sản phẩm"><i class="fa fa-list-alt"
                                                style="font-size:24px"></i></a>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        {{ $brands->links() }}
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="destroyBrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa thương hiệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="formDestroyBanner" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                    <p>Bạn có chắc chắn xóa thương hiệu này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-danger" id="button-destroy">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        destroyItems('/admin/brand/', '#destroyBrand');

    </script>
@endsection
