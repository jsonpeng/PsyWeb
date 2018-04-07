<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>注册</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/iCheck/1.0.2/skins/all.css">
    
    <link rel="stylesheet" href="{{ asset('vendor/adminLTE/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminLTE/css/skins/skin-black.min.css') }}">
    <link rel="stylesheet" href="https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .login-page, .register-page{
            background-image: url({{ asset('images/loginPsy_bg.jpg') }});
            background-size: cover;
            background-repeat: no-repeat;
        }
        .login-box, .register-box{
            margin: 0 auto;
        }

       .login-logo{
         /*   background-image: url({{ asset('images/login_bg3.png') }});*/
            background-size: cover;
            background-repeat: no-repeat;
            color: #7b2525;
            height: 135px;
            line-height: 110px;
        }
        .login-logo a{

            color: #7b2525;
            font-family: "华文楷体";
            font-size: 40px;

        }   
        .login-box-body{
            position: relative;
            max-width: 380px;
        }
        .login-bg-img{
            position: absolute;
            top: -88px;
            left: 100px;
            z-index: -1;
        }
    </style>

</head>
<body class="hold-transition login-page">
<div style="padding-top: 7%;">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/home') }}">大学生心理健康网站</a>
            <br>
            
        </div>

        <!-- /.login-logo -->
        <div class="login-box-body">
            <!--p class="login-box-msg">Sign in to start your session</p-->
            <img class="login-bg-img" src="{{ asset('images/loginCat_bg2.png') }}"></img>
            <form method="post" action="{{ url('/auth/reg') }}">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="邮箱">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="name" value="" placeholder="昵称">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>

                    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" placeholder="密码" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif

                    </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> 记住我
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">注册</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>



        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

</div>

<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/iCheck/1.0.2/icheck.min.js"></script>
<script type="text/javascript" src="{{ asset('vendor/adminLTE/js/app.min.js') }}"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '50%' // optional
        });
    });
</script>
</body>
</html>
