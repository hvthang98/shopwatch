<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
            background-image: linear-gradient(120deg, #3498db, #8e44ad);
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
            width: 600px;
            margin: auto;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type=password] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type=date] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        <blade media|%20(max-width%3A%20800px)%20%7B%0D>.row {
            flex-direction: column-reverse;
        }

        .col-25 {
            margin-bottom: 20px;
        }
        }

        h3 {
            text-align: center;
        }

        button {
            background: #00d0ff;
            color: white;
        }

        a {
            text-decoration: none;
        }

    </style>
    <title>Thông tin người dùng</title>
</head>

<body>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <div class="row">
                    <div class="col-50">
                        <h3>Thông tin cá nhân</h3>
                        <label for="fname"><i class="fa fa-user"></i> Tên người dùng</label>
                        <input type="text" id="fname" name="name" value="{{ $user->name }}">
                        <label for="email"><i class="fa fa-envelope"></i> Email / Tên đăng nhập</label>
                        <input type="text" id="email" name="email" value="{{ $user->email }}">
                        <label for="phone"><i class="fa fa-phone"></i> Số điện thoại</label>
                        <input type="text" id="phone" name="phonenumber" value="{{ $user->phone_number }}">
                        <label for="birth"><i class="fa fa-calendar"></i> Ngày sinh</label>
                        <input type="date" id="birth" name="birthday" value="{{ $user->birthday }}">
                        <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ</label>
                        <input type="text" id="adr" name="address" value="{{ $user->address }}">
                        {{-- <input type="submit" name="submit" value="Đồng ý"> --}}
                        <button><a href="{{ route('dashboard') }}">Quay lại trang chủ</a></button>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
