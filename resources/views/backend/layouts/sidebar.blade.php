<!--sidebar-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{ route('admin.dashboard.index') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{ route('admin.menu.index') }}">
                        <i class="fa fa-align-left"></i>
                        <span>{{ __('Menu') }}</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Quản lý đơn hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('admin.order.index') }}">Danh sách đơn hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Quản lý danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('admin.category.index') }}">Danh sách danh mục sản phẩm</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-briefcase"></i>
                        <span>Quản lý sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('admin.product.create') }}">Thêm sản phẩm mới</a></li>
                        <li><a href="{{ route('admin.product.index') }}">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-users"></i>
                        <span>Quản lý người dùng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('admin.user.create') }}">Thêm người dùng</a></li>
                        <li><a href="{{ route('admin.user.index') }}">Danh sách người dùng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-list-ul"></i>
                        <span>Quản lý banner</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('admin.banner.create') }}">Thêm banners</a></li>
                        <li><a href="{{ route('admin.banner.index') }}">Danh sách Banners</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-adn"></i>
                        <span>Quản lý thương hiệu</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('admin.brand.create') }}">Thêm thương hiệu mới</a></li>
                        <li><a href="{{ route('admin.brand.index') }}">Danh sách thương hiệu</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-bullhorn"></i>
                        <span>Quản lý tin tức</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('admin.news.create') }}">Thêm tin tức mới</a></li>
                        <li><a href="{{ route('admin.news.index') }}">Danh sách tin tức</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-phone"></i>
                        <span>Quản lý liên hệ</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('admin.contact.index') }}">Danh sách liên hệ</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-cogs"></i>
                        <span>Cài đặt</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('admin.setting.general') }}">{{ __('Setting General') }}</a></li>
                        <li><a href="{{ route('admin.company.index') }}">Thông tin cửa hàng</a></li>
                    </ul>
                </li>
                <li>
                    <a href=" {{ route('admin.logout') }} ">
                        <i class="fa fa-power-off"></i>
                        <span>Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
