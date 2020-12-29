@extends('backend.master.admin_master')
@section('title')
Chi tiết đơn hàng #{{ $bills->id  }}
@endsection
@section('main-content')
<style>
    @media (min-width: 768px) {
        .col-sm-3 {
            width: 30%;
        }

        .col-sm-9 {
            width: 70%;
        }
    }

    .panel {
        padding: 10px;
    }

    .style-icon {
        color: black;
        font-size: 22px;
        margin-right: 10px;
    }

    .style-icon:hover {
        color: red;
    }

    .table {
        margin-top: 20px;
    }

    .table>thead>tr>th {
        color: #000;
    }

    .table>tbody>tr>td {
        color: #747171;
    }

</style>

<div>
    <div class="panel-heading">
        Đơn hàng {{ $bills->id }}
    </div>
    <div class="row">
        <div class="col-sm-3">
            <section class="panel">
                <header class="panel-heading wht-bg">
                    <h5 class="gen-case">Chi tiết đơn hàng</h5>
                </header>
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 130px;">Mã đơn hàng</td>
                            <td>{{ $bills->id }}</td>
                        </tr>
                        <tr>
                            <td>Khách hàng</td>
                            <td>{{ $bills->name }}</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>{{ $bills->phone_number }}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>{{ $bills->address }}</td>
                        </tr>
                        <tr>
                            <td>User</td>
                            <td><?php if(isset($bills->users)) echo $bills->users->email?></td>
                        </tr>
                        <tr>
                            <td>Ngày đặt</td>
                            <td>
                                {{ date('d-m-Y',strtotime($bills->created_at))}}
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày giao</td>
                            <td>
                                <p class="text-danger">
                                   {{  date('d-m-Y',strtotime($bills->created_at.'+ 7 days'))}}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>Trạng thái</td>
                            <td>
                                @if ($bills->status==0)
                                <p class="text-danger">Chưa xử lý</p>
                                @elseif($bills->status==1)
                                <p class="text-primary">Đã xử lý</p>
                                @elseif($bills->status==2) 
                                <p class="text-primary">Đang giao hàng</p>
                                @elseif($bills->status==3) 
                                <p class="text-success">Đã giao hàng</p>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <section class="panel">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Tạm tính</td>
                                <td>{{ number_format($bills->total) }}<span> VNĐ</span></td>
                            </tr>
                            <tr>
                                <td>Phí vận chuyển</td>
                                <td>0 <span>VNĐ</span></td>
                            </tr>
                            <tr>
                                <td>Tổng tiền</td>
                                <td>{{ number_format($bills->total) }} <span>VNĐ</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="panel">
                <header class="panel-heading wht-bg">
                    <h5 class="gen-case">Tùy chọn trạng thái đơn hàng</h5>
                </header>
                <form action="{{ route('admin.bill.update',$bills->id) }}" method="post">
                    @method('patch')
                    @csrf
                    <select class="form-control m-bot15" name="status">
                        <option selected value="0" <?php if($bills->status==0) echo 'selected' ?>>Chưa sử lý</option>
                        <option value="1" <?php if($bills->status==1) echo 'selected' ?>>Đã xử lý</option>
                        <option value="2" <?php if($bills->status==2) echo 'selected' ?>>Đang giao hàng</option>
                        <option value="3" <?php if($bills->status==3) echo 'selected' ?>>Đã giao hàng</option>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-success"
                        onclick="questionLoading('Bạn có chắc chắn lưu trạng thái đơn hàng này')">Lưu</button>
                </form>
            </section>
        </div>
        <div class="col-sm-9 mail-w3agile">
            <section class="panel">
                <header class="panel-heading wht-bg">
                    <h4 class="gen-case">Danh sách sản phẩm
                    </h4>
                </header>
                <div class="panel-body minimal">
                    <div class="table-inbox-wrap ">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">STT</th>
                                        <th style="width: 180px;">Mã sản phẩm</th>
                                        <th style="width: 300px;">Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th>Ghi chú</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt=1;
                                    @endphp
                                    @foreach ($billDetails as $billDetail)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $billDetail->products_id }}</td>
                                        <td>{{ $billDetail->products->name }}</td>
                                        <td>{{ number_format($billDetail->price) }}</td>
                                        <td>{{ $billDetail->quantily }}</td>
                                        <td>{{ number_format($billDetail->price*$billDetail->quantily) }}</td>
                                        <td>
                                            @if(($billDetail->products->quantily)+($billDetail->quantily)<=0)
                                            <p style="color: red">hết hàng</p>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection
