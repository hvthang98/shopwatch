<div class="header-top">
    <div class="wrap">
        <!-- <div class="header-top-left">
        </div> -->
        <div class="cssmenu">
            <ul>
                @if(Auth::check())
                    <li class="active">Xin chào {{ Auth::user()->name }}</li>
                    <li><a href="{{ route('user-logout') }}"
                            onclick="return confirm('Bạn muốn đăng xuất ?');">Đăng xuất</a></li>
                @else
                    <li class="active"><a href="">Liên hệ</a></li>
                    <li><a href="{{ route('user-login') }}">Đăng nhập</a></li>
                    <li><a href="{{ route('user-sign-up') }}">Đăng ký</a></li>
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
                <a href="{{ route('index') }}"><img src="images/logo.png" alt="" /></a>
            </div>
            <div class="menu">
                <ul class="megamenu skyblue">
                    <li class="active grid"><a href="index.php">Trang chủ</a></li>
                    <li><a class="color5" href="">Thương hiệu</a>
                        <div class="megapanel">
                            <div class="col1">
                                <div class="h_nav">
                                    <ul>
                                        @foreach($brand as $br)
                                            <li><a
                                                    href="{{ route('brand',['id'=>$br->id]) }}">{{ $br->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </li>
                    <li><a class="color5" href="{{ route('male-product') }}">Nam</a>
                        <div class="megapanel">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Thương hiệu</h4>
                                    <ul>
                                        @foreach($brand as $br)
                                            <li><a
                                                    href="{{ route('brand',['id'=>$br->id]) }}">{{ $br->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </li>
                    <li><a class="color5" href="{{ route('female-product') }}">Nữ</a>
                        <div class="megapanel">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Thương hiệu</h4>
                                    <ul>
                                        @foreach($brand as $br)
                                            <li><a
                                                    href="{{ route('brand',['id'=>$br->id]) }}">{{ $br->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- <li><a class="color6" href="other.html">Phụ kiện</a>
                        <div class="megapanel">
                            <div class="col1">
                                <div class="h_nav">
                                    <ul>
                                        <li><a href="mens.html">
                                                <h4>Dây da đồng hồ</h4>
                                            </a>
                                        </li>
                                        <li><a href="mens.html">
                                                <h4>Pin</h4>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>
        <div class="header-bottom-right">
            <div class="search">
                <form action="">
                    <input type="text" name="seach" class="textbox" placeholder="Tìm kiếm">
                    <input type="submit" value="Subscribe" id="submit" name="submit">
                    <div id="response"> </div>
                </form>
            </div>
            <div class="tag-list">
                <ul class="icon1 sub-icon1 profile_img">
                    <li><a class="icon-cart" href="#" title="Giỏ hàng">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <ul class="sub-icon1 list">
                            @if(session()->has('cart'))
                                <li>
                                    <table>
                                        <tr>
                                            <td class="name">Sản phẩm hạng a hiệu cotext</td>
                                            <td class="num">x100</td>
                                            <td class="money">40,000,000</td>
                                        </tr>
                                    </table>
                                </li>
                                <li>
                                    <table>
                                        <tr>
                                            <td class="name">Sản phẩm hạng a hiệu cotext</td>
                                            <td class="num">x100</td>
                                            <td class="money">40,000,000</td>
                                        </tr>
                                    </table>
                                </li>
                            @else
                                <li>
                                    <h3>Không có sản phẩm</h3>
                                </li>
                            @endif

                            <!-- khi có sản phẩm -->

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
