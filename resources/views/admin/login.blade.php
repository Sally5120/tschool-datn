<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trang Quản Trị</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('public/login/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('public/login/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/login/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form action="{{URL::to('/admin-dashboard')}}" method="post" class="login100-form validate-form">
                {{ csrf_field() }}
{{--                @foreach($errors->all() as $val)--}}
{{--                <ul>--}}
{{--                    <li>{{$val}}</li>--}}
{{--                </ul>--}}
{{--                @endforeach--}}

                <span class="login100-form-title p-b-48">
						<img src="{{asset('public/login/images/logo.png')}}" width="200px" height="200px">
                </span>



                <div class="wrap-input100 validate-input"  data-validate="Vui lòng nhập username">
                    <input class="input100" type="text" name="admin_account">
                    <span class="focus-input100" data-placeholder="Tài khoản"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Vui lòng nhập password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" type="password" name="admin_password">
                    <span class="focus-input100" data-placeholder="Mật khẩu"></span>

                </div>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span style="color: red;font-size: 11px;width: 100%;font-weight: bold; padding-left:35px">' . $message . '</span>';
                    echo '<br>';
                    Session::put('message', null);
                }
                ?>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" id="button_login">
                            Đăng nhập
                        </button>
                    </div>
                </div>
<br>


    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('public/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/login/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/login/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('public/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/login/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('public/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/login/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/login/js/main.js')}}"></script>


</body>
</html>
