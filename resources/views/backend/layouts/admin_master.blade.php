<!DOCTYPE html>

<head>
    <title>@yield('title')</title>
    <base href="{{ asset('/public') }}">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="shortcut icon" href="#">
    <!-- bootstrap -->
    <link rel="stylesheet" href="public/backend/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link href="public/backend/css/style.css?v={{ time() }}" rel='stylesheet' type='text/css' />
    <link href="public/backend/css/style-responsive.css?v={{ time() }}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="public/backend/css/font.css" type="text/css" />
    <link href="public/backend/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="public/backend/css/morris.css" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="public/backend/css/monthly.css">
    <script src="public\backend\js\jquery_v3.5.1.min.js"></script>
    <script src="public/backend/js/morris.js"></script>
    <link href="public\backend\js\select2.min.css" rel="stylesheet" />
    <script src="public\backend\js\select2.min.js"></script>

    <!-- ckeditor -->
    <script src={{ url('public/ckeditor/ckeditor.js') }}></script>
    <script src="public\backend\js\sweetalert2.js"></script>
</head>

<body>
    <section id="container">
        <!--header-->
        @include('backend.layouts.header')
        <!--sidebar-->
        @include('backend.layouts.sidebar')
        <!--main content-->
        <section id="main-content">
            <section class="wrapper">
                @yield('main-content')
            </section>
            <!-- footer -->
            @include('backend.layouts.footer')
        </section>
    </section>
    <script src="public/backend/js/bootstrap.js"></script>
    <script src="public/backend/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="public/backend/js/scripts.js"></script>
    <script src="public/backend/js/jquery.slimscroll.js"></script>
    <script src="public/backend/js/jquery.nicescroll.js"></script>
    <script src="public/backend/js/jquery.scrollTo.js"></script>

    @if (session()->has('notification'))
        @include('notify.success')
    @endif
    @if (session()->has('error'))
        @include('notify.error')
    @endif
    @include('backend.footerjs')

    @yield('scripts')

</body>

</html>
