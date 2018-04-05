
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
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://cdn.bootcss.com/Swiper/4.0.6/css/swiper.min.css" rel="stylesheet">
        <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
  
        <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
        <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
            

        <style type="text/css">
            .breadcrumb {
                 padding: 0px; 
                 margin-bottom: 0px; 
                background: none !important; 
            }
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
        @yield('content')
        @include('front.partial.footer')

        <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ asset('vendor/jquery-1.12.4.min.js') }}"><\/script>')</script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ asset('vendor/scrollreveal.min.js') }}"></script>
        <script src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
        <script src="{{ asset('js/vendor/swiper.animate1.0.2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/layui/layui.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/infinite-scroll.pkgd.min.js') }}"></script>
        <script src="{{ asset('js/main.min.js') }}"></script>
        <script type="text/javascript" charset="utf-8">
            layui.use('flow', function(){
              var flow = layui.flow;

              //按屏加载图片
              flow.lazyimg({
                elem: 'img.lazy'
              });
              
            });
            // JavaScript
            window.sr = ScrollReveal({ reset: true });

            sr.reveal('.reveal', { duration: 2000 }, 50);
            sr.reveal('.reveal2', { duration: 2000 }, 50);
            sr.reveal('.reveal3', { duration: 2000 }, 50);
            sr.reveal('.reveal4', { duration: 2000 }, 50);
            sr.reveal('.reveal5', { duration: 2000 }, 50);

            $('.scroll-container').infiniteScroll({
                // options
                path: "a[rel='next']",
                append: '.scroll-post',
                history: false,
            });
        </script>
        @yield('js')
        
        <!-- JS统计代码 -->
        {!! $setting->js_tongji !!}


    </body>
</html>
