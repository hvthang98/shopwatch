@extends('fontend.master.master')
@section('title')

@endsection
@section('main-content')
<div class="mens">
    <div class="main">
        <div class="wrap">
            <ul class="breadcrumb breadcrumb__t"><a class="home" href="">Home</a> / <a href="#">Dolor sit amet</a>
                / Lorem ipsum dolor sit amet</ul>
            <div class="cont span_2_of_3">
                <div class="grid images_3_of_2">
                    <ul id="etalage">
                        @if(isset($products->imageProduct))
                            @foreach($products->imageProduct as $image)
                                <li>
                                    <a href="optionallink.html">
                                        <img class="etalage_thumb_image" src="{{ asset($image->image) }}"
                                            class="img-responsive" />
                                        <img class="etalage_source_image" src="{{ asset($image->image) }}"
                                            class="img-responsive" title="" />
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="desc1 span_3_of_2">
                    <h3 class="m_3">{{ $products->name }}</h3>
                    <p class="m_5">{{ number_format($products->price) }}&nbsp;<span
                            class="reducedfrom">{{ number_format($products->sellprice) }}</span>
                    </p>
                    <div class="btn_form">
                        <form>
                            <input type="submit" value="Thêm vào giỏ hàng" title="">
                        </form>
                    </div>

                </div>
                <div class="clear"></div>
                <div class="content-product">
                    <h4>Giới thiệu sản phẩm</h4>
                    <p>
                        {!! $products->content !!}
                    </p>
                </div>
                <div class="clients">
                    <h3 class="m_3">Những sản phẩm liên quan</h3>
                    <ul id="flexiselDemo3">
                        @foreach($listProducts as $list)
                            {{ $list->avatar->image }}
                            <li><img src="{{ asset($list->avatar->image) }}" /><a href="#">{{ $list->name }}</a>
                                <p>{{ $list->price }}</p>
                            </li>
                        @endforeach
                    </ul>
                    <script type="text/javascript">
                        $(window).load(function () {
                            $("#flexiselDemo1").flexisel();
                            $("#flexiselDemo2").flexisel({
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 480,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint: 640,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 768,
                                        visibleItems: 3
                                    }
                                }
                            });

                            $("#flexiselDemo3").flexisel({
                                visibleItems: 5,
                                animationSpeed: 1000,
                                autoPlay: false,
                                autoPlaySpeed: 3000,
                                pauseOnHover: true,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 480,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint: 640,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 768,
                                        visibleItems: 3
                                    }
                                }
                            });

                        });

                    </script>
                    <script type="text/javascript" src="js/jquery.flexisel.js"></script>
                </div>
            </div>
            <div class="rsingle span_1_of_single">
                <section class="sky-form">
                    <h4>Thông số kỹ thuật</h4>
                    <div class="row rows scroll-pane">
                        <table class="technical-information">
                            <tr>
                                <td class="td1">Đường kính mặt</td>
                                <td>{{ $products->infoProduct->diameter }} <span>mm</span></td>
                            </tr>
                            <tr>
                                <td class="td1">Loại máy</td>
                                <td>{{ $products->infoProduct->type }}</td>
                            </tr>
                            <tr>
                                <td class="td1">Chất liệu mặt kính</td>
                                <td>{{ $products->infoProduct->glass_material }}</td>
                            </tr>
                            <tr>
                                <td class="td1">Chất liệu khung viền</td>
                                <td>{{ $products->infoProduct->frames }}</td>
                            </tr>
                            <tr>
                                <td class="td1">Chống nước</td>
                                <td>{{ $products->infoProduct->waterproof }}</td>
                            </tr>
                            <tr>
                                <td class="td1">Độ dày mặt</td>
                                <td>{{ $products->infoProduct->thickness }} <span>mm</span></td>
                            </tr>
                            <tr>
                                <td class="td1">Chất liệu dây</td>
                                <td>{{ $products->infoProduct->strap_material }}</td>
                            </tr>
                            {{-- <tr>
                                <td class="td1">Tiện ích</td>
                                <td>{{ $products->infoProduct->frames }}</td>
                            </tr> --}}
                            <tr>
                                <td class="td1">Độ rộng dây</td>
                                <td>{{ $products->infoProduct->strap_width }} <span>mm</span></td>
                            </tr>
                            <tr>
                                <td class="td1">Thay dây</td>
                                <td>Có</td>
                            </tr>
                            {{-- <tr>
                                <td class="td1">Nguồn năng lượng</td>
                                <td>{{ $products->infoProduct->frames }}</td>
                            </tr> --}}
                            <tr>
                                <td class="td1">Thời gian sử dụng pin</td>
                                <td>{{ $products->infoProduct->expiry_date }} <span>giờ</span></td>
                            </tr>
                            <tr>
                                <td class="td1">Đối tượng sử dụng</td>
                                <td>
                                    @if($products->infoProduct->gender==0)
                                        {{ 'Nữ' }}
                                    @elseif($products->infoProduct->gender==1)
                                        {{ 'Nam' }}
                                    @elseif($products->infoProduct->gender==10)
                                        {{ 'Nam/Nữ' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="td1">Thương hiệu</td>
                                <td>{{ $products->brands->name }}</td>
                            </tr>
                            <tr>
                                <td class="td1">Nơi sản xuất</td>
                                <td>{{ $products->infoProduct->address }}</td>
                            </tr>
                        </table>
                    </div>
                </section>
            </div>
            <div class="clear"></div>
            <div class="comment">
                <div class="form-group">
                    <label for="comment">Bình luận:</label>
                    <input type="text" class="form-control" id=""><br>
                    <button type="button" class="btn btn-info">Gửi</button>
                </div>
                <!-- comment 1 -->
                <div class="media">
                    <div class="media-left">
                        <img src="img_avatar1.png" class="media-object" style="width:45px">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">John Doe <small><i>Posted on February 19, 2016</i></small></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <div class="reply">Trả lời<small>&emsp;Có 2 trả lời</small>
                            <div class="detail-comment">
                                <div class="form-group">
                                    <!-- <label for="comment">Trả lời:</label> -->
                                    <input type="text" class="form-control" id="" placeholder="Trả lời"><br>
                                    <button type="button" class="btn btn-info">Gửi</button>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <img src="img_avatar1.png" class="media-object" style="width:45px">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">John Doe <small><i>Posted on February 19,
                                                    2016</i></small></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua.</p>


                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <img src="img_avatar1.png" class="media-object" style="width:45px">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">John Doe <small><i>Posted on February 19,
                                                    2016</i></small></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- comment 2 -->
                <div class="media">
                    <div class="media-left">
                        <img src="img_avatar1.png" class="media-object" style="width:45px">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">John Doe <small><i>Posted on February 19, 2016</i></small></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <div class="reply">Trả lời<small>&emsp;Có 2 trả lời</small>
                            <div class="detail-comment">
                                <div class="form-group">
                                    <!-- <label for="comment">Trả lời:</label> -->
                                    <input type="text" class="form-control" id="" placeholder="Trả lời"><br>
                                    <button type="button" class="btn btn-info">Gửi</button>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <img src="img_avatar1.png" class="media-object" style="width:45px">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">John Doe <small><i>Posted on February 19,
                                                    2016</i></small></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua.</p>

                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <img src="img_avatar1.png" class="media-object" style="width:45px">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">John Doe <small><i>Posted on February 19,
                                                    2016</i></small></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
@endsection
