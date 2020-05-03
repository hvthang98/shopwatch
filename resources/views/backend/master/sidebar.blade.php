<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-book"></i>
                        <span>Quản lý đơn hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('listBill') }}">Danh sách đơn hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('add-category') }}">Thêm danh mục sản phẩm</a></li>
                        <li><a href="{{ route('all-category') }}">Danh sách danh mục sản phẩm</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-book"></i>
                        <span>Quản lý sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('addProduct') }}">Thêm sản phẩm mới</a></li>
                        <li><a href="{{ route('listProduct') }}">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-book"></i>
                        <span>Quản lý người dùng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('add-user') }}">Thêm người dùng</a></li>
                        <li><a href="{{ route('all-user') }}">Danh sách người dùng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý banner</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('add-banner') }}">Thêm banners</a></li>
                        <li><a href="{{ route('all-banner') }}">Danh sách Banners</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-book"></i>
                        <span>Quản lý thương hiệu</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('addBrand') }}">Thêm thương hiệu mới</a></li>
                        <li><a href="{{ route('listBrand') }}">Danh sách thương hiệu</a></li>
                    </ul>
                </li>
                <li>
                    <a href=" {{ route('adminlogout') }} ">
                        <i class="fa fa-user"></i>
                        <span>Login Page</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
