<!DOCTYPE HTML>
<html>

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
        integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <base href="{{ asset('') }}">
    <link href="fontend/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="fontend/css/form.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="fontend/js/jquery1.min.js"></script>
    <!-- start menu -->
    <link href="fontend/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- bootstrap CSS -->
    <link href="fontend/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="fontend/css/font.css" type="text/css" />
    <link href="fontend/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="fontend/css/morris.css" type="text/css" />

    <script type="text/javascript" src="fontend/js/megamenu.js"></script>
    <script>
        $(document).ready(function() {
            $(".megamenu").megamenu();
        });

    </script>
    <!--start slider -->
    <link rel="stylesheet" href="fontend/css/fwslider.css" media="all">
    <script src="fontend/js/jquery-ui.min.js"></script>
    <script src="fontend/js/css3-mediaqueries.js"></script>
    <script src="fontend/js/fwslider.js"></script>
    <!--end slider -->
    <script src="fontend/js/jquery.easydropdown.js"></script>
    <!-- start details -->
    <script src="fontend/js/slides.min.jquery.js"></script>
    <script>
        $(function() {
            $('#products').slides({
                preload: true,
                preloadImage: 'img/loading.gif',
                effect: 'slide, fade',
                crossfade: true,
                slideSpeed: 350,
                fadeSpeed: 500,
                generateNextPrev: true,
                generatePagination: false
            });
        });

    </script>
    <link rel="stylesheet" href="fontend/css/etalage.css">
    <script src="fontend/js/jquery.etalage.min.js"></script>
    <script>
        jQuery(document).ready(function($) {

            $('#etalage').etalage({
                thumb_image_width: 360,
                thumb_image_height: 360,
                source_image_width: 900,
                source_image_height: 900,
                show_hint: true,
                click_callback: function(image_anchor, instance_id) {
                    alert('Callback example:\nYou clicked on an image with the anchor: "' +
                        image_anchor +
                        '"\n(in Etalage instance: "' + instance_id + '")');
                }
            });

        });
        //scroll in home
        $(document).ready(function() {
            $("#scroll-top").hide();
            $(window).scroll(function() {
                //$("#scroll-top").show();
                var scrollTop = $(window).scrollTop();
                if (scrollTop > 0) {
                    $("#scroll-top").show();
                } else {
                    $("#scroll-top").hide();
                }
            })
            $("#scroll-top").click(function() {
                // $(window).animate({scrollTop:0}, '800');
                $(window).scrollTop(0);
            });
        });

    </script>
    <script src="fontend/js/comment.js"></script>
    <style>
        .tag-list {
            position: relative;
        }

        .icon-cart-on {
            width: 16px;
            height: 16px;
            background: red;
            border-radius: 50%;
            text-align: center;
            position: absolute;
        }

        .icon-cart-on span {
            color: #fff;
            font-size: 15px;
        }

        #scroll-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        #scroll-top .fa-arrow-circle-o-up {
            font-size: 60px;
        }

        #scroll-top:hover {
            cursor: pointer;
        }

    </style>
</head>

<body>
    @include('fontend.master.header')
    @yield('main-content')
    @yield('content')
    @include('fontend.master.footer')
    <div id="scroll-top">
        <i class="fa fa-arrow-circle-o-up" title="Lên đầu trang"></i>
    </div>
</body>
@if (session('notification'))
    @include('notify.note')
@endif
<script>
    function questionLoading(mes) {
        if (confirm(mes) == false) {
            event.preventDefault();
        }
    }

</script>

</html>
