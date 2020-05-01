@extends('fontend.master.master')
@section('content')
<div class="main">
<div class="mens">
    <div class="main">
        <div class="wrap">
            <div class="cont span_2_of_3">
                <h2 class="head">@foreach($brand as $br)
                    {{$br->name}}
                @endforeach</h2>
                <div class="mens-toolbar">
                    <div class="sort">
                        <div class="sort-by">
                            <label>Sắp xếp</label>
                            <select>
                                <option value="">
                                    Position </option>
                                <option value="">
                                    Name </option>
                                <option value="">
                                    Price </option>
                            </select>
                            <!-- <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a> -->
                        </div>
                    </div>
                    <div class="pager">
                        <ul class="dc_pagination dc_paginationA dc_paginationA06">
                            <li><a href="#" class="previous">Trang</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="top-box">
                    @foreach($product as $pro)
                    <div class="col_1_of_3 span_1_of_3">
                        <a href="single.html">
                            <div class="inner_content clearfix">
                                <div class="product_image">
                                    <img src="../../{{$pro->img}}" alt="" />
                                </div>
                                <div class="sale-box"><span class="on_sale title_shop">New</span></div>
                                <div class="price">
                                    <div class="cart-left">
                                        <p class="title">{{$pro->name}}</p>
                                        <div class="price1">
                                            <span class="reducedfrom">{{$pro->price}}</span>
                                            <span class="actual">{{$pro->sellprice}}</span>
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
         
                <div class="mens-toolbar">
                    <div class="sort">
                        <div class="sort-by">
                            <label>Sắp xếp</label>
                            <select>
                                <option value="">
                                    Position </option>
                                <option value="">
                                    Name </option>
                                <option value="">
                                    Price </option>
                            </select>
                            <!-- <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a> -->
                        </div>
                    </div>
                    <div class="pager">
                        <ul class="dc_pagination dc_paginationA dc_paginationA06">
                            <li><a href="#" class="previous">Trang</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="rsidebar span_1_of_left">
                <!-- <h5 class="m_1">Categories</h5>
                <select class="dropdown" tabindex="8" data-settings='{"wrapperClass":"metro"}'>
                    <option value="1">Mens</option>
                    <option value="2">Sub Category1</option>
                    <option value="3">Sub Category2</option>
                    <option value="4">Sub Category3</option>
                </select>
                <select class="dropdown" tabindex="8" data-settings='{"wrapperClass":"metro"}'>
                    <option value="1">Womens</option>
                    <option value="2">Sub Category1</option>
                    <option value="3">Sub Category2</option>
                    <option value="4">Sub Category3</option>
                </select>
                <ul class="kids">
                    <li><a href="#">Kids</a></li>
                    <li class="last"><a href="#">Glasses Shop</a></li>
                </ul> -->
                <section class="sky-form">
                    <h4>Giới tính</h4>
                    <div class="row row1 scroll-pane">
                        <div class="col col-4">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Nam</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Nữ</label>
                        </div>
                    </div>
                </section>
                <section class="sky-form">
                    <h4>Giá tiền</h4>
                    <div class="row row1 scroll-pane">
                        <div class="col col-4">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Dưới 1,000,000</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Từ 1,000,000 - 2,000,000</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Trên 2,000,000</label>
                        </div>
                    </div>
                </section>
                <section class="sky-form">
                    <h4>Thương hiệu</h4>
                    <div class="row row1 scroll-pane">
                        <div class="col col-4">
                           @foreach($brands as $brand)
                            <label class="checkbox"><input type="checkbox" name="checkbox" value="{{$brand->id}}"><i></i>{{$brand->name}}</label>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!-- <section class="sky-form">
                    <h4>Colors</h4>
                    <ul class="color-list">
                        <li><a href="#"> <span class="color1"> </span>
                                <p class="red">Red</p>
                            </a></li>
                        <li><a href="#"> <span class="color2"> </span>
                                <p class="red">Green</p>
                            </a></li>
                        <li><a href="#"> <span class="color3"> </span>
                                <p class="red">Blue</p>
                            </a></li>
                        <li><a href="#"> <span class="color4"> </span>
                                <p class="red">Yellow</p>
                            </a></li>
                        <li><a href="#"> <span class="color5"> </span>
                                <p class="red">Violet</p>
                            </a></li>
                        <li><a href="#"> <span class="color6"> </span>
                                <p class="red">Orange</p>
                            </a></li>
                        <li><a href="#"> <span class="color7"> </span>
                                <p class="red">Gray</p>
                            </a></li>
                    </ul>
                </section> -->
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
</div>
<script src="js/jquery.easydropdown.js"></script>
@endsection