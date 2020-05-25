@extends('backend.master.admin_master')
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
                        @php
                            $stt=$bills->firstItem();
                        @endphp
                        @foreach($bills as $bill)
                            <tr>
                                <td>{{ $stt++ }}</td>
                                <td>{{ $bill->id }}</td>
                                <td>{{ $bill->name }}</td>
                                <td>{{ $bill->phone_number }}</td>
                                <td>{{ $bill->address }}</td>
                                <td>{{ number_format($bill->total) }}</td>
                                <td>{{ date('d-m-Y H:m',strtotime($bill->created_at))}}</td>
                                <td>
                                    @if($bill->status==0)
                                        <p class="text-danger">
                                            {{ 'Chưa xử lý' }}</p>
                                    @elseif($bill->status==1)
                                        <p class="text-primary">
                                            {{ 'Đã xử lý' }}</p>
                                    @elseif($bill->status==2)
                                        <p class="text-primary"> {{ 'Đang giao hàng' }}
                                        </p>
                                    @elseif($bill->status==3)
                                        <p class="text-success">
                                            {{ 'Đã giao hàng' }}</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('detailBill',$bill->id) }}" class="a-icon"
                                        title="Chi tiết đơn hàng">
                                        <i class="fa fa-file-text style-icon"></i>
                                    </a>
                                    <a href="{{ route('deleteBill',$bill->id) }}" title="xóa" onclick="questionLoading('Bạn có chắc chắn xóa đơn hàng này không?')">
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
                    {{ $bills->links() }}
                </div>
            </footer>
        </div>
    </div>
</div>
@endsection
@section('js')
@include('notify.note')
@endsection
