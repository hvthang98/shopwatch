<!DOCTYPE html>
<html>

<head>
    <title>Đăng ký</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" type="text/javascript"></script>
    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
            text-decoration: none;
            font-family: montserrat;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background-image: linear-gradient(120deg, #3498db, #8e44ad);
        }

        .login-form {
            width: 400px;
            background: #f1f1f1;
            min-height: 580px;
            padding: 80px 40px;
            border-radius: 10px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .login-form h1 {

            text-align: center;
            margin-bottom: 40px;
        }

        .txtb {
            border-bottom: 2px solid #adadad;
            position: relative;
            margin: 20px 0;
        }

        .txtb input {
            font-size: 15px;
            color: #333;
            border: none;
            width: 100%;
            outline: none;
            background: none;
            padding: 0 5px;
            height: 40px;

        }

        .txtb input {
            font-size: 15px;
            color: #333;
            border: none;
            width: 100%;
            outline: none;
            background: none;
            padding: 0 5px;
            height: 40px;

        }

        .txtb span::before {
            content: attr(data-placehoder);
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            z-index: -1;
            transition: .5s;
        }

        .txtb span ::after {
            content: '';
            position: absolute;
            width: 0%;
            height: 2px;
            background: linear-gradient(120deg, #3498db, #8e44ad);
            transition: .5s;

        }

        .focus+span::before {
            top: -5px;
        }

        .focus+span::after {
            width: 100%;
        }

        .logbtn {
            display: block;
            width: 100%;
            height: 50px;
            border: none;
            background: linear-gradient(120deg, #3498db, #8e44ad, #3498db);
            background-size: 200%;
            color: #fff;
            outline: none;
            cursor: pointer;
            transition: .5s;
        }

        .logbtn:hover {
            background-position: right;
        }

        .mk {
            margin-left: 230px;
            margin-top: 10px;
            font-size: 15px;
        }

        .bottom-text {
            margin-top: 40px;
            text-align: center;
            font-size: 15px;
        }

    </style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @csrf
    <script>
        $(document).ready(function() {
            $(".notification-email").hide();
            $(".notification-password").hide();
            $("#singup-email").change(function() {
                var email = $(this).val();
                var url = "http://localhost:8080/shopwatch/ajax/check-email";
                $.post(url, {
                    email: email
                }, function(data) {
                    if (data == 'true') {
                        $(".notification-email").show();
                        $("#singup-email").css('border-bottom', '1px solid #ff0000');
                    }
                    if (data == 'false') {
                        $(".notification-email").hide();
                        $("#singup-email").css('border-bottom', '');
                    }
                });
            });
            //password
            $("#password_confi").change(function() {
                var password = $('#password').val();
                var passwordConfi = $(this).val();
                if (password != passwordConfi) {
                    $(".notification-password").show();
                    $(this).css('border-bottom', '1px solid #ff0000');
                } else {
                    $(".notification-password").hide();
                    $(this).css('border-bottom', '');
                }
            });
        });

    </script>
</head>

<body>
    <div class="login">
        <div class="wrap">
            <div class="col_1_of_login span_1_of_login">
                <div class="login-title">

                    <div id="loginbox" class="loginbox">
                        <form action="{{ route('post-user-signup') }}" method="post" name="login" class="login-form">
                            <h1 class="title">Đăng ký tài khoản</h1>
                            @csrf
                            @if (count($errors) > 0)
                                <div>
                                    <strong style="color: red">{{ $errors->first() }}</strong>
                                </div>
                            @endif
                            <div class="txtb">
                                <input type="text" name="name" required>
                                <span data-placehoder="Họ và Tên"></span>
                            </div>
                            <div class="txtb">
                                <input type="date" name="birthday" required>
                                <span data-placehoder="Ngày sinh"></span>
                            </div>
                            <div class="txtb">
                                <input type="email" name="email" id="singup-email" required>
                                <span data-placehoder="Email / Tài khoản đăng nhập"></span>
                            </div>
                            <p class="notification-email" style="color:#f00">Tài khoản đã tồn tại</p>
                            <div class="txtb">
                                <input type="password" name="password" id="password" required>
                                <span data-placehoder="Mật khẩu"></span>
                            </div>
                            <div class="txtb">
                                <input type="password" name="password_confirmation" id="password_confi" required>
                                <span data-placehoder="Nhập lại mật khẩu"></span>
                            </div>
                            <p class="notification-password" style="color:#f00">Nhập lại mật khẩu sai</p>
                            <div class="txtb">
                                <input type="text" name="address" required>
                                <span data-placehoder="Địa chỉ"></span>
                            </div>
                            <div class="txtb">
                                <input type="text" name="phonenumber" required class="only-number">
                                <span data-placehoder="Số điện thoại"></span>
                            </div>
                            <div>
                                <input type="submit" class="logbtn" name="signup" value="Đăng ký">
                                <div class="mk"><a href="{{ route('index') }}">Về trang chủ</a></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>

    </div>
    <script type="text/javascript">
        $(".txtb input").on("focus", function() {
            $(this).addClass("focus");
        });

        $(".txtb input").on("blur", function() {
            if ($(this).val() == "")
                $(this).removeClass("focus");
        });
        $(".only-number").on('keyup',function(){
            let value=$(this).val().replace(/[^0-9]/g, '');
            console.log(value);
            this.value=value;
        })

    </script>
</body>

</html>
