@extends('fontend.master.master')
@section('title')
    Thương hiệu sản phẩm
@endsection
@section('content')
    <style type="text/css">
        .active {
            color: red;
        }

        .br {
            width: 800px;
            min-height: 250px;
            /* background-color: red;*/
            margin: auto;
        }

        .br2 {
            text-align: center;
        }

    </style>
    <div class="main">
        <div class="mens">
            <div class="main">
                <div class="wrap">
                    @if (isset($brands))

                        <div class="br">
                            <div class="br1">
                                <h2 class="br2">
                                    Thương hiệu
                                    {{ $brands->name }}
                                </h2>
                            </div>
                            <div class="con">{!! $brands->info !!}</div>
                        </div>
                    @endif
                    <div class="cont span_2_of_3">
                        <div class="mens-toolbar">
                            <div class="sort">
                                <div class="sort-by">
                                    <form method="get" action="">
                                        <label>Sắp xếp</label>
                                        <select name="sort" onchange="javascript:this.form.submit()">
                                            <option value="id" @if (Request::get('sort') == 'id' || Request::get('sort') == '') {{ 'selected' }} @endif>
                                                Mặc định </option>
                                            <option value="name" @if (Request::get('sort') == 'name') {{ 'selected' }} @endif>
                                                Tên giảm dần </option>
                                            <option value="price_asc" @if (Request::get('sort') == 'price_asc') {{ 'selected' }} @endif>
                                                Giá tăng dần </option>
                                            <option value="price_desc" @if (Request::get('sort') == 'price_desc') {{ 'selected' }} @endif>
                                                Giá giảm dần </option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="spbrand">
                            @foreach ($products as $product)
                                <div class="spbrand1">
                                    <div class="img1" style="position: relative;">
                                        <img width="260" height="280" src="storage/{{ $product->avatar->image }}">
                                        <div class="mua"><a class="btn btn-primary"
                                                href="{{ route('fontend.product.show', $product->id) }}">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="namesp">
                                        <p>{{ $product->name }}</p>
                                    </div>
                                    <div class="pri">
                                        <div class=" boc-pri">
                                            <div class="sell">
                                                <span>{{ number_format($product->price, 0, ',', ',') . 'đ' }}</span>
                                            </div>
                                            <div class="normalp"><span
                                                    style="color: red">{{ number_format($product->sellprice, 0, ',', ',') . 'đ' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.easydropdown.js"></script>
@endsection
