<!DOCTYPE html>

<head>
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="public/backend/css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="public/backend/css/style.css" rel='stylesheet' type='text/css' />
    <link href="public/backend/css/style-responsive.css" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="public/backend/css/font.css" type="text/css" />
    <link href="public/backend/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons Login-->
    <script src="public/backend/js/jquery2.0.3.min.js"></script>
</head>

<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>{{ __('Login') }}</h2>
            <form action="{{ route('admin.login.isLogin') }}" method="post">
                @csrf
                @if (isset($tb))
                    <div><strong style="color: red;font-weight: italic;text-align: center">{{ $tb }}</strong></div>
                @endif
                <input type="email" class="ggg" name="Email" placeholder="E-MAIL">
                @if ($errors->has('Email'))

                    <strong style="color: red;font-weight: italic">{{ $errors->first('Email') }}</strong>

                @endif
                <input type="password" class="ggg" name="Password" placeholder="{{ __('Password') }}">
                @if ($errors->has('Password'))
                    <div>
                        <strong style="color: red;font-weight: italic">{{ $errors->first('Password') }}</strong>
                    </div>
                @endif
                <div class="clearfix"></div>
                <input type="submit" value="{{ __('Login') }}" name="login">
            </form>
        </div>
    </div>
    <script src="public/backend/js/bootstrap.js"></script>
    <script src="public/backend/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="public/backend/js/scripts.js"></script>
    <script src="public/backend/js/jquery.slimscroll.js"></script>
    <script src="public/backend/js/jquery.nicescroll.js"></script>
    <script src="public/backend/js/jquery.scrollTo.js"></script>
</body>

</html>
