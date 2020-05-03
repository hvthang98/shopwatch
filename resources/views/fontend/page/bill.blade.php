@extends('fontend.master.master')
@section('title')
Giỏ hàng
@endsection
@section('main-content')
<style>
    .bill-user {
        padding-top: 20px;
        background: #eff0f5;
    }

    .bill-user .content {
        margin-top: 20px;
        background: #fff;
        padding: 20px;
    }

    .id-bill {
        font-size: 18px;
        font-weight: bold;
    }

    .date-bill {
        font-size: 13px;
        color: #767373;
    }

    .right {
        text-align: right;
    }

    .left {
        text-align: left;
    }

    .center {
        text-align: center;
    }

    .right p {
        font-size: 20px;
        margin-top: 13px;
    }

    .right p span {
        font-weight: bold;
    }

</style>
<div class="bill-user">
    <div class="wrap">
        <div class="col-lg-12 content">
            <div class="col-lg-6">
                <p class="id-bill">Đơn hàng #12345</p>
                <p class="date-bill">Đặt ngày 12/2/2020 ..</p>
            </div>
            <div class="col-lg-6 right">
                <p><span>Tổng tiền: </span>12,000,000</p>
            </div>
        </div>
        <div class="col-lg-8 content">
            <div class="progress">
                <div class="progress-bar progress-bar-success" style="width: 50%"></div>
            </div>
            <div class="col-lg-12 ">
                <div class="col-lg-4 left">Đang xử lý</div>
                <div class="col-lg-4 center">Đang vận chuyển</div>
                <div class="col-lg-4 right">Đã giao hàng</div>
            </div>
            <div class="col-lg-12 content">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4"></div>
        <div class="clear"></div>
    </div>
</div>
@include('notify.note')
@endsection
