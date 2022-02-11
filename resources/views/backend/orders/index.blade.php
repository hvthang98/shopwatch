@extends('backend.layouts.admin_master')
@section('title')
    Danh sách đơn hàng
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
                    Danh sách các đơn hàng
                </div>
                <div style="padding: 15px 10px 10px 10px">
                    <form action="" method="GET">
                        <input type="text" class="form-control search" placeholder="mã ĐH hoặc tên KH" name="key">
                    </form>
                </div>
                <div class="table-responsive">
                    @if (count($orders) != 0)
                        <table class="table" ui-jq="footable" ui-options="{
                " paging": { "enabled" : true }, "filtering" : { "enabled" : true }, "sorting" : { "enabled" : true }}">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đặt hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th style="width: 300px">Địa chỉ</th>
                                    <th>Tổng tiền</th>
                                    <th>Thời gian đặt</th>
                                    <th>Trạng thái</th>
                                    <th>Tùy Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone_number }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ number_format($order->total) }}</td>
                                        <td>{{ date('d-m-Y H:m', strtotime($order->created_at)) }}</td>
                                        <td>
                                            @if ($order->status == 0)
                                                <p class="text-danger">
                                                    {{ 'Chưa xử lý' }}</p>
                                            @elseif($order->status == 1)
                                                <p class="text-primary">
                                                    {{ 'Đã xử lý' }}</p>
                                            @elseif($order->status == 2)
                                                <p class="text-primary"> {{ 'Đang giao hàng' }}
                                                </p>
                                            @elseif($order->status == 3)
                                                <p class="text-success">
                                                    {{ 'Đã giao hàng' }}</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.order.show', $order->id) }}" class="a-icon"
                                                title="Chi tiết đơn hàng">
                                                <i class="fa fa-file-text style-icon"></i>
                                            </a>
                                            <a class="destroy" data-toggle="modal" data-target="#destroyorder"
                                                title="Xóa" data-id="{{ $order->id }}">
                                                <i class="fa fa-times style-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="bg-warning" style="text-align: center; font-size: 30px;">Không tìm thấy đơn hàng</p>
                    @endif
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        {{ $orders->links() }}
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="destroyorder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <p>Bạn có chắc chắn xóa thương đơn hàng này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-danger" id="button-destroy">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        destroyItems('/admin/order/', '#destroyorder');
    </script>
@endsection
