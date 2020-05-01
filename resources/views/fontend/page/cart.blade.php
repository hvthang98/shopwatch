@extends('fontend.master.master')
@section('title')
Giỏ hàng
@endsection
@section('main-content')
<style>
    .price-cart{
        font-size: 12px;
        text-decoration: line-through;
    }
    .note-cart{
        width: 100%;
        height: 100px;
    }
</style>
<div class="cart">
    <div class="wrap">
        <!-- cart empty -->
        @if(!isset($carts))
            <h4 class="title">Giỏ hàng chưa có sản phẩm</h4>
        @endif
        <a href="{{ route('home') }}">Tiếp tục mua sắm</a>
        <!-- cart not empty -->
        @if(isset($carts))
            <div>
                <div class="cart-table">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="name">Sản phẩm</th>
                                <th class="price">Đơn giá</th>
                                <th class="numb">Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                                <tr>
                                    <td>{{ $cart['product']->name }}</td>
                                    <td>
                                        {{ number_format($cart['product']->sellprice) }}
                                        <br>
                                        <span class="price-cart">{{ number_format($cart['product']->price) }}</span>
                                    
                                    </td>
                                    <td>
                                        <form action="{{ route('updateCart') }}" method="get">
                                            <div class="form-group" id="table-cart"
                                                id="productid{{ $cart['products_id'] }}">
                                                <input type="hidden" name="products_id"
                                                    value="{{ $cart['products_id'] }}">
                                                <input type="number" class="form-control" min=1
                                                    value="{{ $cart['quantily'] }}"
                                                    name="quantily"
                                                    id-product="{{ $cart['products_id'] }}">
                                                <button type="submit" class="btn btn-primary" id="">Cập
                                                    nhật</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="cart-total">
                    <form action="{{ route('createBill') }}" method="post">
                        @csrf
                        <div class="address">
                            <h4>Thông tin giao hàng</h4>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input id="msg" type="text" class="form-control" name="name" placeholder="Họ và Tên" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input id="msg" type="text" class="form-control" name="address" placeholder="Địa chỉ" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input id="msg" type="text" class="form-control" name="phone_number"
                                    placeholder="Số điện thoại" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                <textarea name="note" class="note-cart" placeholder="Ghi chú"></textarea>
                            </div>
                        </div>
                        <div class="bils">
                            <h4>Thông tin đơn hàng</h4>
                            <table class="table">
                                <tr>
                                    <td>Tạm tính</td>
                                    <td>
                                        {{ number_format($total) }} <span> đ</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phí giao hàng</td>
                                    <td>0 <span> đ</span></td>
                                </tr>
                                <tr class="text-total">
                                    <td>Tổng cộng</td>
                                    <td>
                                        {{ number_format($total + $ship) }} <span> đ</span>
                                        <input type="hidden" name="total" value="{{ $total + $ship }}">
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" value="Xác nhận giỏ hàng">
                        </div>
                    </form>
                </div>
                <div class="clear"></div>
            </div>
        @endif
    </div>
</div>
@include('notify.note')
@endsection
