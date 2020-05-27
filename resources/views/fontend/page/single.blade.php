@extends('fontend.master.master')
@section('title')
{{ $products->name }}
@endsection
@section('main-content')
<style>
    .nbs-flexisel-item .price-deco {
        margin: 0px;
        margin-bottom: 10px;
        padding: 0px;
        text-decoration: line-through;
        font-size: 12px;
    }

</style>
<div class="mens">
    <div class="main">
        <div class="wrap">
            <ul class="breadcrumb breadcrumb__t"><a class="home" href="{{ route('index') }}">Trang
                    chủ</a> / {{ $products->name }}</ul>
            <div class="cont span_2_of_3">
                <div class="grid images_3_of_2">
                    <ul id="etalage">
                        @if(isset($products->imageProduct))
                            @foreach($products->imageProduct as $image)
                                @if($image->status==1)
                                    <li>
                                        <a>
                                            <img class="etalage_thumb_image" src="{{ asset($image->image) }}"
                                                class="img-responsive" />
                                            <img class="etalage_source_image" src="{{ asset($image->image) }}"
                                                class="img-responsive" title="" />
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="desc1 span_3_of_2">
                    <h3 class="m_3">{{ $products->name }}</h3>
                    <p class="m_5">{{ number_format($products->sellprice) }}&nbsp;<span
                            class="reducedfrom">{{ number_format($products->price) }}</span>
                    </p>
                    <form action="{{ route('addCart') }}">
                        <div class="form-group col-sm-6">
                            <input type="hidden" name="products_id" value="{{ $products->id }}">
                            <label for="">Số lượng</label>
                            <input type="number" class="form-control" id="quantily" name="quantily" placeholder=""
                                min="1" max="{{ $products->quantily }}" value="1">
                        </div>
                        <div class="col-sm-8">
                            @if($products->quantily > 0)
                                <button type="submit" class="btn btn-primary" style="z-index: 1;">Thêm vào giỏ
                                    hàng</button>
                            @else
                                <p class="text-danger" style="font-size: 20px">Hết hàng</p>
                            @endif

                        </div>
                    </form>
                </div>
                <div class="clear"></div>
                <div class="content-product">
                    <h4>Giới thiệu sản phẩm</h4>
                    <p>
                        {!! $products->content !!}
                    </p>
                </div>
                <div class="clients">
                    <h3 class="m_3">Những sản phẩm khác nổi bật</h3>
                    <ul id="flexiselDemo3">
                        @foreach($listProducts as $list)
                            {{-- {{ $list->avatar->image }} --}}
                            <li>
                                <img src="{{ asset($list->avatar->image) }}" style="height:140px" />
                                <a href="{{ route('getProductSingle',$list->id) }}">
                                    {{ $list->name }}
                                </a>
                                <p style="font-size:15px">{{ number_format($list->sellprice) }} <span>đ</span></p>
                                <p class="price-deco">{{ number_format($list->price) }}</p>
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
                                <td>{{ $products->infoProduct->expiry_date }}</td>
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
                    <input type="text" class="form-control" id="input-comment" id-product="{{ $products->id }}"><br>
                    <button type="button" class="btn btn-info" id="submit-commnent">Gửi</button>
                </div>
                <input type="hidden" name="user" id="id-user"
                    id-user="<?php if(Auth::check()){echo Auth::user()->id;}?>">
                <div class="comment-main">
                    <!-- comment -->
                    @foreach($comments as $comment)
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ asset('public/upload/avatar_user/default-avatar.png') }}"
                                    class="media-object" style="width:65px">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $comment->users->name }}<small>&emsp;<i>{{ date('d-m-Y',strtotime($comment->created_at)) }}</i></small>
                                </h4>
                                <p>{{ $comment->content }}</p>
                                <div class="reply">Trả lời<small>&emsp;Có {{ count($comment->replyComment) }} trả
                                        lời </small>
                                        @if (Auth::check() && Auth::user()->id==$comment->users_id)
                                        <a href="{{ route('deleteComment',$comment->id) }}" onclick="questionLoading('Bạn chắc chắn muốn xóa bình luận')">Xóa</a>                                            
                                        @endif
                                    <div class="detail-comment">
                                        <div class="form-group">
                                            <br>
                                            <input type="text" class="form-control" id-comment="{{ $comment->id }}"
                                                placeholder="Trả lời"><br>
                                            <button type="button" class="btn btn-info">Gửi</button>
                                        </div>
                                        <div class="detail-comment-content" id="reply{{ $comment->id }}">
                                            @foreach($comment->replyComment as $reply)
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img src="{{ asset('public/upload/avatar_user/default-avatar.png') }}"
                                                            class="media-object" style="width:55px">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            {{ $reply->users->name }}<small>&emsp;<i>{{ date('d-m-Y',strtotime($reply->created_at)) }}</i></small>
                                                            @if (Auth::check() && Auth::user()->id==$reply->users_id)
                                                            <a href="{{ route('deleteReplyComment',$reply->id) }}" onclick="questionLoading('Bạn chắc chắn muốn xóa bình luận')">Xóa</a>                                            
                                                            @endif</h4>
                                                        <p>{{ $reply->content }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
@include('notify.note')
@endsection
