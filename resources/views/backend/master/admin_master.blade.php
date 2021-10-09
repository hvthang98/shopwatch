<!DOCTYPE html>

<head>
    <title>@yield('title')</title>
    <base href="{{ asset('') }}">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="backend/css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="backend/css/style.css" rel='stylesheet' type='text/css' />
    <link href="backend/css/style-responsive.css" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="backend/css/font.css" type="text/css" />
    <link href="backend/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="backend/css/morris.css" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="backend/css/monthly.css">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="backend/js/morris.js"></script>
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="js/helpers.js"></script>
    <script src="js\sweetalert2.js"></script>
</head>

<body>
    <section id="container">
        <!--header start-->
        @include('backend.master.header')
        <!--header end-->
        <!--sidebar start-->
        @include('backend.master.sidebar')
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('main-content')
            </section>
            <!-- footer -->
            @include('backend.master.footer')
            <!-- / footer -->
        </section>
        <!--main content end-->
    </section>
    <script src="backend/js/bootstrap.js"></script>
    <script src="backend/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="backend/js/scripts.js"></script>
    <script src="backend/js/jquery.slimscroll.js"></script>
    <script src="backend/js/jquery.nicescroll.js"></script>
    <script src="backend/js/jquery.scrollTo.js"></script>

    @if (session()->has('notification'))
        @include('notify.success')
    @endif
    @if (session()->has('error'))
        @include('notify.error')
    @endif
    @include('backend.footerjs')
   
</body>

</html>
