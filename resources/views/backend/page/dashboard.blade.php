@extends('backend.master.admin_master')
@section('main-content')
<div class="market-updates">
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-1">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-users"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Người dùng</h4>
                <h3>{{ $users }}</h3>
                <p></p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-4">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Tổng đơn hàng</h4>
                <h3>{{ number_format($order) }}</h3>
                <p></p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
<div class="agileits-w3layouts-stats">
    {{-- <div class="col-md-12 stats-info stats-last widget-shadow">
        <div class="stats-last-agile">
            <p style="font-weight: bold; font-size: 20px; margin-bottom: 30px; text-align: center;">Lượng tiêu thụ sản phẩm trong tháng này</p>
            <table class="table stats-table ">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Trạng thái</th>
                        <th>Phát triển</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Đồng hồ Nữ Elio EL004-01</td>
                        <td><span class="label label-success">Còn sản phẩm</span></td>
                        <td>
                            <h5>85% <i class="fa fa-level-up"></i></h5>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Đồng hồ Nam MVMT D-MT01-BBRG</td>
                        <td><span class="label label-danger">Hết sản phẩm</span></td>
                        <td>
                            <h5>35% <i class="fa fa-level-up"></i></h5>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Đồng hồ Nam Citizen BM7451-89E</td>
                        <td><span class="label label-danger">Hết sản phẩm</span></td>
                        <td>
                            <h5 class="down">40% <i class="fa fa-level-down"></i></h5>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Đồng hồ Nam MVW MS005-02</td>
                        <td><span class="label label-success">Còn sản phẩm</span></td>
                        <td>
                            <h5>100% <i class="fa fa-level-up"></i></h5>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}
    <div class="clearfix"> </div>
</div>
@endsection
@section('js')
@include('notify.note');
@endsection
