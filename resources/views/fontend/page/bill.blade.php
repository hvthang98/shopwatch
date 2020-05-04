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

    .total p {
        font-size: 20px;
        margin-top: 13px;
    }

    .total p span {
        font-weight: bold;
    }

    .bill-img-product {
        width: 100px;
        height: 100px;
    }

    .info-bill {
        border-left: 1px solid #ccc;
    }

</style>
<div class="bill-user">
    <div class="wrap">
        <div class="col-lg-12 content">
            <div class="col-lg-6">
                <p class="id-bill">Đơn hàng #{{ $bill->id }}</p>
                <p class="date-bill">Đặt ngày
                    {{ date('d/m/Y H:i',strtotime($bill->created_at)) }}</p>
            </div>
            <div class="col-lg-6 right total">
                <p><span>Tổng cộng: </span>{{ number_format($bill->total) }} đ</p>
            </div>
        </div>
        <div class="col-lg-8 content">
            <div class="progress">
                @if($bill->status==0||$bill->status==1)
                    <div class="progress-bar progress-bar-success" style="width: 8%"></div>
                @elseif($bill->status==2)
                    <div class="progress-bar progress-bar-success" style="width: 50%"></div>
                @elseif($bill->status==3)
                    <div class="progress-bar progress-bar-success" style="width: 99%"></div>
                @endif
                <div class="progress-bar progress-bar-danger" style="width: 0.5%"></div>
            </div>
            <div class="col-lg-12 ">
                <div class="col-lg-4 left">Đang xử lý</div>
                <div class="col-lg-4 center">Đang vận chuyển</div>
                <div class="col-lg-4 right">Đã giao hàng</div>
            </div>
            {{--  bill detail  --}}
            <div class="col-lg-12 content">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th style="width:120px">Giá bán</th>
                            <th style="width:100px">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--  {{ dd($billDetail->toarray()) }}  --}}
                        @foreach ($billDetail as $detail)
                        <tr>
                            <td><img src="{{ asset($detail->products->avatar->image) }}"
                                    alt="" class="bill-img-product"></td>
                            <td >{{ $detail->products->name }}</td>
                            <td>{{ number_format($detail->price) }}</td>
                            <td>{{ $detail->quantily }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        {{--  information bill  --}}
        <div class="col-lg-4 content info-bill">
            <h4>Thông tin đơn hàng</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 32%"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Khách hàng</td>
                        <td>{{ $bill->name }}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ giao</td>
                        <td>{{ $bill->address }}</td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>{{ $bill->phone_number }}</td>
                    </tr>
                    <tr>
                        <td>Ghi chú</td>
                        <td>{{ $bill->note }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-8 content">
            <h4>Tổng cộng</h4>
            <table class="table">
                <tbody>
                    <tr>
                        <td class="left">
                            <p>Tạm tính</p>
                            <p>Phí vận chuyển</p>
                        </td>
                        <td class="right">
                            <p>{{ number_format($bill->total) }} <span>đ</span></p>
                            <p>0 <span>đ</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="left">Tổng cộng:</td>
                        <td class="right">{{ number_format($bill->total) }} <span>đ</span></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>Hình thức thanh toán: Thanh toán khi nhận hàng</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="clear"></div>
    </div>
</div>
@include('notify.note')
@endsection
