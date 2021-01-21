<div class="header-top">
    <div class="wrap">
        <!-- <div class="header-top-left">
        </div> -->
        <div class="cssmenu">
            <ul>
                @if (Auth::check())
                    <div class="drop">
                        <p><i class="fa fa-user" style="color: #fff; font-size:15px"></i> Xin chào
                            {{ Auth::user()->name }}
                        </p>
                        <div class="sub-drop">
                            <ul>
                                <li>
                                    <a href="{{ route('fontend.user.show', ['id' => Auth::user()->id]) }}">Xem
                                        thông tin</a>
                                </li>
                                <li><a href="{{ route('fontend.user.logout') }}"
                                        onclick="return confirm('Bạn muốn đăng xuất ?');">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="drop">
                        <p style="color: #fff;">Kiểm tra đơn hàng</p>
                        <div class="sub-drop" style="width:250px">
                            <ul>
                                <li>Các đơn hàng gần đây:</li>
                                @foreach ($bills as $bill)
                                    <li><a href="{{ route('getBillUser', $bill->id) }}">
                                            {{ date('d/m/Y', strtotime($bill->created_at)) }}
                                            - Mã ĐH: {{ $bill->id }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <li class="active"><a href="{{ route('fontend.contact.create') }}">Liên hệ</a></li>
                @else
                    <li class="active"><a href="{{ route('fontend.contact.create') }}">Liên hệ</a></li>
                    <li><a href="{{ route('fontend.user.login') }}">Đăng nhập</a></li>
                    <li><a href="{{ route('fontend.user.create') }}">Đăng ký</a></li>
                @endif
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="header-bottom">
    <div class="wrap">
        <div class="header-bottom-left">
            <div class="logo">
                <a href="{{ route('fontend.index') }}"><img src="fontend/images/logo.png" alt="" /></a>
            </div>
            <div class="menu">
                <ul class="megamenu skyblue">
                    <li class="active grid"><a href="{{ route('fontend.index') }}">Trang chủ</a></li>
                    <li><a href="" class="color5" style="cursor: pointer;">Menu1<span><i class="fa fa-caret-down"></i></span></a>
                        <div class="megapanel">
                            <div class="col1">
                                <div class="h_nav">
                                    <ul>
                                        <li><a href="">Menu</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a class="color5" href="{{ route('fontend.news.index') }}">Tin tức</a></li>
                </ul>
            </div>
        </div>
        <div class="header-bottom-right">
            <div class="search">
                <form action="{{ route('seachFE') }}" method="get">
                    <input type="text" name="seach" class="textbox-seach" placeholder="Tìm kiếm">
                    <input type="submit" value="seach" id="submit" name="submit">
                    <div id="response"></div>
                </form>
            </div>
            <div class="tag-list">
                <ul class="icon1 sub-icon1 profile_img">
                    <li><a class="icon-cart" href="{{ route('getCart') }}" title="Giỏ hàng">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <ul class="sub-icon1 list">
                            @if (Auth::check())
                                {{-- sign in user --}}
                                @if (count($carts) != 0)
                                    <li>
                                        <table>
                                            <tr>
                                                <td class="name" style="font-weight:bold">Tên</td>
                                                <td class="num" style="font-weight:bold">Số lượng</td>
                                                <td class="money" style="font-weight:bold">Thành tiền</td>
                                            </tr>
                                        </table>
                                    </li>
                                    @foreach ($carts as $cart)
                                        <li>
                                            <table>
                                                <tr>
                                                    <td class="name">
                                                        {{ $cart->products->name }}
                                                    </td>
                                                    <td class="num"><span>x
                                                        </span>{{ $cart->quantily }}</td>
                                                    <td class="money">
                                                        {{ number_format($cart->products->sellprice * $cart->quantily) }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <h3>Không có sản phẩm</h3>
                                    </li>
                                @endif
                            @else
                                {{-- not sign in user --}}
                                @if (session()->has('cart'))
                                    <li>
                                        <table>
                                            <tr>
                                                <td class="name" style="font-weight:bold">Tên</td>
                                                <td class="num" style="font-weight:bold">Số lượng</td>
                                                <td class="money" style="font-weight:bold">Thành tiền</td>
                                            </tr>
                                        </table>
                                    </li>
                                    @foreach ($carts as $cart)
                                        <li>
                                            <table>
                                                <tr>
                                                    <td class="name">
                                                        {{ $cart['product']->name }}
                                                    </td>
                                                    <td class="num"><span>x
                                                        </span>{{ $cart['quantily'] }}</td>
                                                    <td class="money">
                                                        {{ number_format($cart['product']->sellprice * $cart['quantily']) }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <h3>Không có sản phẩm</h3>
                                    </li>
                                @endif
                            @endif
                            <!-- khi có sản phẩm -->

                        </ul>
                    </li>
                </ul>
                {{-- show number product in cart --}}
                @if (Auth::check())
                    @if (isset($carts) && count($carts) != 0)
                        <div class="icon-cart-on">
                            <span>{{ count($carts) }}</span>
                        </div>
                    @endif
                @else
                    @if (session()->has('cart'))
                        <div class="icon-cart-on">
                            <span>{{ count($carts) }}</span>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
