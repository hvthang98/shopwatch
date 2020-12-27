@extends('fontend.master.master')
@section('title')
Tìm kiếm
@endsection
@section('content')
<style type="text/css">
    .active {
        color: red;
    }

</style>
<div class="mens">
    <div class="main">
        <div class="wrap">
            <div class="cont" style="width:100%">
                <h2 class="head">
                    Tìm kiếm: {{ $key }}
                </h2>
                <div class="mens-toolbar">
                    <div class="sort">
                        <div class="sort-by">
                            {{-- <form  method="get" action="" >
                            <label>Sắp xếp</label>
                            <select name="sort" onchange="javascript:this.form.submit()" >
                                <option value="id" @if(Request::get('sort')=='id'||Request::get('sort')==''){{ 'selected' }}
                            @endif>
                            Mặc định </option>
                            <option value="name" @if(Request::get('sort')=='name' ){{ 'selected' }}
                                @endif>
                                Tên giảm dần </option>
                            <option value="price_asc" @if(Request::get('sort')=='price_asc'
                                ){{ 'selected' }} @endif>
                                Giá tăng dần </option>
                            <option value="price_desc" @if(Request::get('sort')=='price_desc'
                                ){{ 'selected' }} @endif>
                                Giá giảm dần </option>
                            </select></form> --}}
                            <!-- <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a> -->
                        </div>
                    </div>
                    <div class="pager">
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="spsearch">
                    @foreach($product as $pro)
                        <div class="spbrand1">
                            <div class="img1" style="position: relative;">
                                <img width="260" height="280" src="storage/{{ $pro->avatar->image }}">
                                <div class="mua"><a class="btn btn-primary"
                                        href="{{ route('getProductSingle',$pro->id) }}">Xem
                                        chi tiết</a></div>
                            </div>
                            <div class="namesp">
                                <p>{{ $pro->name }}</p>
                            </div>
                            <div class="pri">
                                <div class=" boc-pri">
                                    <div class="sell">
                                        <span>{{ number_format($pro->price,0,',',',')."đ" }}</span>
                                    </div>
                                    <div class="normalp"><span
                                            style="color: red">{{ number_format($pro->sellprice,0,',',',')."đ" }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if(count($product)<=0)
                        <h2>Không tìm thấy từ khóa {{ $key }}</h2>
                    @endif
                </div>
                <div class="row">
                    {{-- {{ $product->links() }} --}}
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<script src="js/jquery.easydropdown.js"></script>
@endsection
