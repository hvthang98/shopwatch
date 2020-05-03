@extends('fontend.master.master')
@section('content')
<style type="text/css">
    .active {
        color: red;
    }

</style>
<div class="main">
    <div class="mens">
        <div class="main">
            <div class="wrap">
                <div class="cont span_2_of_3">
                    <h2 class="head">
                        thương hiệu
                        {{ $brand->name }}
                    </h2>
                    <div class="mens-toolbar">
                        <div class="sort">
                            <div class="sort-by">
                                <form method="get" action="">
                                    <label>Sắp xếp</label>
                                    <select name="sort" onchange="javascript:this.form.submit()">
                                        <option value="id" @if(Request::get('sort')=='id' ||Request::get('sort')==''
                                            ){{ 'selected' }} @endif>
                                            Mặc định </option>
                                        <option value="name" @if(Request::get('sort')=='name'
                                            ){{ 'selected' }} @endif>
                                            Tên giảm dần </option>
                                        <option value="price_asc" @if(Request::get('sort')=='price_asc'
                                            ){{ 'selected' }} @endif>
                                            Giá tăng dần </option>
                                        <option value="price_desc" @if(Request::get('sort')=='price_desc'
                                            ){{ 'selected' }} @endif>
                                            Giá giảm dần </option>
                                    </select></form>
                            </div>
                        </div>
                        <div class="pager">
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="top-box">
                        @foreach($product as $pro)
                            <div class="col_1_of_3 span_1_of_3 span_1_of_31">
                                <a href="{{ route('getProductSingle',$pro->id) }}">
                                    <div class="inner_content clearfix">
                                        <div class="product_image">
                                            <img src="../../{{ $pro->image }}" alt="" />
                                        </div>
                                        <div class="sale-box"><span class="on_sale title_shop">New</span></div>
                                        <div class="price">
                                            <div class="cart-left">
                                                <p class="title">{{ $pro->name }}</p>
                                                <div class="price1">
                                                    <span
                                                        class="reducedfrom">{{ number_format($pro->price,0,',',',')."đ" }}</span>
                                                    <span
                                                        class="actual">{{ number_format($pro->sellprice,0,',',',')."đ" }}</span>
                                                </div>
                                            </div>
                                            <div class="cart-right"> </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        @endforeach

                        <div class="clear"></div>

                    </div>
                    <div class="row">
                        {{ $product->links() }}
                    </div>
                </div>
                <div class="rsidebar span_1_of_left">
                    <section class="sky-form">
                        <h4>Giới tính</h4>
                        <div class="row row1 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><a
                                        class="{{ Request::get('gender')==1?'active':'' }}"
                                        href="{{ request()->fullUrlWithQuery(['gender'=>1]) }}"><i></i>Nam</a></label>
                                <div class="col col-4">
                                    <label class="checkbox"><i></i><a
                                            class="{{ Request::get('gender')==0 ?'active':'' }}"
                                            href="{{ request()->fullUrlWithQuery(['gender'=>0]) }}">Nữ</a></label>

                                </div>
                                <div class="col col-4">
                                    <label class="checkbox"><i></i><a
                                            class="{{ Request::get('gender')==10 ?'active':'' }}"
                                            href="{{ request()->fullUrlWithQuery(['gender'=>10]) }}">Cả
                                            nam nữ</a></label>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="sky-form">
                        <h4>Giá tiền</h4>
                        <div class="row row1 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><i></i><a
                                        class="{{ Request::get('pri')==1?'active':'' }}"
                                        href="{{ request()->fullUrlWithQuery(['pri'=>1]) }}">Dưới
                                        5,000,000 VNĐ</a></label>
                                <label class="checkbox"><i></i><a
                                        class="{{ Request::get('pri')==2?'active':'' }}"
                                        href="{{ request()->fullUrlWithQuery(['pri'=>2]) }}">Từ
                                        5,000,000 đến 10,000,000 VNĐ</a></label>
                                <label class="checkbox"><i></i><a
                                        class="{{ Request::get('pri')==3?'active':'' }}"
                                        href="{{ request()->fullUrlWithQuery(['pri'=>3]) }}">Trên
                                        10,000,000 VNĐ</a></label>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.easydropdown.js"></script>
@endsection
