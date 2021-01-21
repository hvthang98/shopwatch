@extends('fontend.master.master')
@section('title')
    Trang chủ
@endsection
@section('content')
<script type="text/javascript" src="fontend/js/background.js"></script>
<!-- start slider -->
<div id="fwslider">
    <div class="slider_container">
        @foreach($banner as $ban)
            <div class="slide">
                <!-- Slide image -->
                <a target="_blank" href="{{ $ban->link }}" title="{{ $ban->name }}">
                    <img src="storage/{{ $ban->image }}" alt="" />
                </a>
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
<div class="main1">
    @if(count($highlight_product)!=0)
        <div class="main2">
            <div class="main21">
                <h2>Sản phẩm nổi bật</h2>
            </div>
            <div class="main22">
                @foreach($highlight_product as $hi)
                    <div class="main221">
                        <div class="img1" style="position: relative;">
                            <img width="260" height="280" src="storage/<?php if(isset($hi->avatar->image)) echo $hi->avatar->image?>">
                            <div class="mua nav-link"><a
                                    class="btn btn-primary" href="{{ route('fontend.product.show',['id'=>$hi->id]) }}">Xem
                                    chi tiết</a></div>
                        </div>
                        <div class="namesp">
                            <p>{{ $hi->name }}</p>
                        </div>
                        <div class="pri">
                            <div class=" boc-pri">
                                <div class="sell">
                                    <span>{{ number_format($hi->price,0,',',',')."đ" }}</span>
                                </div>
                                <div class="normalp"><span
                                        style="color: red">{{ number_format($hi->sellprice,0,',',',')."đ" }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="clear"></div>
    @if(count($new_product)!=0)
        <div class="main2">
            <div class="main21">
                <h2>Sản phẩm mới</h2>
            </div>
            <div class="main22">
                @foreach($new_product as $ne)
                    <div class="main221">
                        <div class="img1" style="position: relative;">
                            <img width="260" height="280" src="storage/<?php if(isset($ne->avatar->image)) echo $ne->avatar->image?>">
                            <div class="mua"><a
                                class="btn btn-primary"
                                    href="{{ route('fontend.product.show',['id'=>$ne->id]) }}">Xem
                                    chi tiết</a></div>
                        </div>
                        <div class="namesp">
                            <p>{{ $ne->name }}</p>
                        </div>
                        <div class="pri">
                            <div class=" boc-pri">
                                <div class="sell">
                                    <span>{{ number_format($ne->price,0,',',',')."đ" }}</span>
                                </div>
                                <div class="normalp"><span
                                        style="color: red">{{ number_format($ne->sellprice,0,',',',')."đ" }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="clear"></div>
    <div class="main3">
        <div class="main31">
            <div class="main311"><span>Tin Tức</span></div>
            <div class="main312">
                @foreach($new as $n)
                    <div class="main3121">
                        <div class="main3121img"><img width="137" height="137" src="storage/{{ $n->image }}">
                        </div>
                        <div class="main3121nd"><a
                                href="{{ route('fontend.news.show',['id'=>$n->id]) }}">{{ $n->title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="main32">
            <div class="main311"><span>Bản đồ</span>
                <div class="BD">
                    <iframe width="400" height="400"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15676.345735751129!2d106.7169677!3d10.8046919!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7a7006b269783a40!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBHaWFvIHRow7RuZyBW4bqtbiB04bqjaSBUUC5IQ00!5e0!3m2!1svi!2s!4v1589095980557!5m2!1svi!2s"
                        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
