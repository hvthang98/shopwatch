@extends('fontend.master.master')
@section('content')
<!-- start slider -->
<div id="fwslider">
    <div class="slider_container">
        @foreach($banner as $ban)
            <div class="slide">
                <!-- Slide image -->
                <a target="_blank" href="{{ $ban->link }}">
                    <img src="{{ asset($ban->image) }}" alt="" />
                </a>
                {{-- public/upload/images/banner1.jpg --}}
                <!-- /Slide image -->
                <!-- Texts container -->
                <!-- <div class="slide_content">
                <div class="slide_content_wrap">
                    <h4 class="title">Aluminium Club</h4>

                    <p class="description">Experiance ray ban</p>
                </div>
            </div> -->
                <!-- /Texts container -->
            </div>
        @endforeach
        <!-- /Duplicate to create more slides -->

        <!--/slide -->
    </div>
    <div class="timers"></div>
    <div class="slidePrev"><span></span></div>
    <div class="slideNext"><span></span></div>
</div>
<!-- end slider -->
<!-- main-content -->
<div class="main">
    <div class="wrap" style="width: 90%">
        <div class="section group">
            <div class="cont span_2_of_4">
                <h2 class="head">Sản phẩm nổi bật</h2>

                @foreach($highlight_product as $hpro)

                    <div class="top-box">

                        <div class="col_1_of_3 span_1_of_3 " @if($i==1) style="margin-top: 29px;" @endif>
                            <a href="{{ route('getProductSingle',$hpro->id) }}">
                                <div class="inner_content clearfix">
                                    <div class="product_image">
                                        <img src="{{ asset($hpro->img) }}" alt="" />
                                    </div>
                                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>
                                    <div class="price">
                                        <div class="cart-left">
                                            <p class="title">{{ $hpro->name }}</p>
                                            <div class="price1">
                                                <span class="reducedfrom">{{ number_format($hpro->price) }}</span>
                                                <span class="actual">{{ number_format($hpro->sellprice) }}</span>
                                            </div>
                                            <div class="price1">
                                            </div>
                                        </div>
                                        <a href="#">
                                            <div class="cart-right">
                                            </div>
                                        </a>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    <input type="hidden" value="{{ $i++ }}" name="">
                @endforeach
                <div class="clear"></div>

                <!-- </div> -->


                <h2 class="head">Sản phẩm mới</h2>
                @foreach($new_product as $npro)
                    <div class="top-box">

                        <div class="col_1_of_3 span_1_of_3 " @if($j==1) style="margin-top: 29px;" @endif>
                            <a href="single.html">

                                <div class="inner_content clearfix">

                                    <div class="product_image">

                                        <img src="{{ asset($npro->img) }}" alt="" />

                                    </div>

                                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>
                                    <div class="price">
                                        <div class="cart-left">
                                            <p class="title">{{ $npro->name }}</p>
                                            <div class="price1">
                                                <span class="reducedfrom">{{ $npro->price }}</span>
                                                <span class="actual">{{ $npro->sellprice }}</span>
                                            </div>
                                            <div class="price1">
                                            </div>
                                        </div>
                                        <a href="#">
                                            <div class="cart-right">
                                            </div>
                                        </a>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    <input type="hidden" value="{{ $j++ }}" name="">
                @endforeach

                <div class="clear"></div>

            </div>
            {{-- <div class="rsidebar span_1_of_left">
                <div class="top-border"> </div>
                <div class="border">
                    <link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
                    <link href="css/nivo-slider.css" rel="stylesheet" type="text/css" media="all" />
                    <script src="js/jquery.nivo.slider.js"></script>
                    <script type="text/javascript">
                        $(window).load(function () {
                            $('#slider').nivoSlider();
                        });

                    </script>
                    <div class="slider-wrapper theme-default">
                        <div id="slider" class="nivoSlider">
                            <a href="#"><img src="images/t-img1.jpg" alt="" /></a>
                            <a href="#"><img src="images/t-img2.jpg" alt="" /></a>
                            <a href="#"><img src="images/t-img3.jpg" alt="" /></a>
                        </div>
                    </div>
                    <!-- <div class="btn"><a href="single.html"></a></div> -->
                </div>
            </div> --}}
            <div class="clear"></div>
        </div>
    </div>
</div>
@endsection
