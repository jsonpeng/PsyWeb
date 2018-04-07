
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<html class="no-js" style="font-size: 40px;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <!-- seo 里包含title meta 
            <title></title>
            <meta name="keywords" content="">
            <meta name="description" content="">
        -->
        @yield('seo')

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="{{ asset('css/front.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
  
        <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
         a{color:black;}
         a:hover{text-decoration:none;}
         .h4, .h5, .h6, h4, h5, h6 {
             margin-top: 0px; 
             margin-bottom: 0px;
        }
        </style>
        <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
            

        <style type="text/css">
        .breadcrumb {
                 padding: 0px; 
                 margin-bottom: 0px; 
                background: none !important; 
        }
       .main-relative {
            position: relative;
        }
        .nav-position {
            width: 300px;
            background: #fff;
        }
        body .nav-fixed{
            position: fixed;
            top: 0;
            z-index: 1;
        }
        body .nav-absolute{
            position: absolute;
            top: auto;
            bottom: 0;
        }
        .ad-m{margin: 10px 0;}
        .ls-main .all-img{
            height: 100%;
            width: 100%;
            max-width: initial;
        }
        .search .search-btn{
            font-size:15px;
        }
        /*
        文章列表悬停样式
         */
        .ma-modone .ma-modone-right-title:hover { color: #ff5f5f; }
        </style>

        @yield('css')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="{{ asset('vendor/html5shiv.min.js') }}"></script>
            <script src="{{ asset('vendor/respond.min.js') }}"></script>
        <![endif]-->
    </head>
    <body>
        <!--[if lte IE 8]>
            <p class="chromeframe">您正在使用<strong>过时的</strong> 浏览器. 请 <a href="http://browsehappy.com/">升级您的浏览器（点击进入下载页面）</a> 以提升上网体验。</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        @include('front.partial.header')
        @yield('content')
        @include('front.partial.footer')

        <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ asset('vendor/jquery-1.12.4.min.js') }}"><\/script>')</script>
        <script src="http://static2.fh21.com.cn/chl/js/jquery.SuperSlide.2.1.1.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
            $(function(){
                
                jQuery(".slideBox").slide({mainCell:".bd ul",effect:"leftLoop",autoPlay:true});
                
                $('.hrt-head .hrt-head-list').on('mouseover',function(){
                    $(this).addClass('hrt-head-list-hover').siblings().removeClass('hrt-head-list-hover');
                    $('.hrt-main .hrt-main-list').eq($(this).index()).addClass('hrt-main-list-show').siblings().removeClass('hrt-main-list-show');
                });
                
                $('.ma-nav .ma-nav-list').on('mouseover',function(){
                    $(this).addClass('ma-nav-list-hover').siblings().removeClass('ma-nav-list-hover');
                    $('.ls-main .ls-mod').eq($(this).index()).addClass('ls-mod-act').siblings().removeClass('ls-mod-act');
                    $('.ls-main-addmore .ls-mod').eq($(this).index()).addClass('ls-mod-act').siblings().removeClass('ls-mod-act');
                });
            });
        </script>



        <script type="text/javascript">
            $(function () {
                $('.cm-sidetitle-right > .a-hover').on('mouseover', function () {
                    $(this).addClass('a-hover-act').siblings().removeClass('a-hover-act');
                    $('.eyf-main > .eyfs-list').eq($(this).index()).addClass('eyfs-list-show').siblings().removeClass('eyfs-list-show');
                });
            });
        </script>

    
        @yield('js')
        
        <!-- JS统计代码 -->
        {!! $setting->js_tongji !!}


    </body>
</html>
