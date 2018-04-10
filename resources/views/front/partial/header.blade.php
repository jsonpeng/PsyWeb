    <!--.头部-->
<div class="wrap-b header-b">
    <div class="wrap header clearfix">
        <div class="logo fl clearfix">
            <!--<a href="https://www.fh21.com.cn" class="fl"><img src="http://static2.fh21.com.cn/chl/images/logo-fh.png" class="fl"></a>-->
            <a href="/" class="fl"><span class="fl logo-word" style="width:auto;">大学生心理健康网</span></a>
        </div>
        <div class="nav fl clearfix">
            @foreach($menus as $menu)
                    <!--如果还有子分类 -->
                    @if($menu->children->count())
                         <div class="fl nav-list " >
                            <a href="{!! $menu->link !!}" class="clearfix nav-list-head">
                                <span class="nav-list-head-word">{!! $menu->name !!}</span>
                                <i class="icon icon-header-down"></i>               
                            </a>
                            <div class="nav-list-show">
                            @foreach ($menu->children as $child)
                                 @if(!empty($child->children))
                                    <a href="{!! $child->link !!}" class="nav-list-show-list a-hover">{!! $child->name !!}</a>
                                 @else
                                 @endif
                            @endforeach
                            </div>
                        </div>
                    @else
                     <!--如果没有子分类 -->
                           <div class="fl nav-list">
                            <a href="{!! $menu->link !!}" class="clearfix nav-list-head">
                                <span class="nav-list-head-word">{!! $menu->name !!}</span>
                            </a>
                        </div>
                    @endif

            @endforeach


        </div>
    
   

        <div class="fr head-login" id="state-login">

         <!--未登录-->
        @if(!$loginStatus) 
        <div class="head-tologin">
            <div class="head-tologin-head clearfix">
                <i class="icon icon-login-user fl"></i>
             
                <span class="fl head-tologin-word">登录</span>
            
            </div>

            <form method="post" action="{{ url('auth/login') }}">
                {!! csrf_field() !!}

            <div class="head-tologin-show" >
                <div class="head-tls-tips">
                </div>
                <div class="head-tls-inpwrap clearfix">
                    <input type="text" class="head-tls-inp fl" id="email" name="email" value="" placeholder="请输入邮箱">
                </div>
                <div class="head-tls-inpwrap clearfix">
                    <input type="password" class="head-tls-inp fl" id="password" name="password" value="" placeholder="请输入密码">
                </div>
                <div class="head-tls-choose clearfix">
               <!--      <a href="http://passport.fh21.com.cn/public/retrievepassword" class="fl a-hover">忘记密码?</a> -->
                    <a href="{!! route('reg') !!}" class="fr a-hover">注册</a>
                </div>
                <button class="head-tls-sub" type="submit" disabled="disabled" id="btn-login" style="background:#ddd;">登录</button>
 
                
                 
            </div>
            </form>
        </div>
        @else
          <!--已登录-->
         <div class="head-logined">
                <div class="head-logined-head clearfix">
                    <a href="http://passport.fh21.com.cn" class="fl head-logined-head-left">
                        <img src="{{ empty(Auth::user()->head_image)?'/uploads/touuxiang.jpg':Auth::user()->head_image }}" class="all-img"/>
                    </a>
                    <i class="icon icon-login-arrow fl"></i>
                </div>
                <div class="head-logined-show">
                    <div class="head-les-head">
                        <a href="http://passport.fh21.com.cn" class="head-les-head-img">
                            <img src="{{ empty(Auth::user()->head_image)?'/uploads/touuxiang.jpg':Auth::user()->head_image }}" class="all-img"/>
                        </a>
                        <h4 class="head-les-head-name">
                            <a href="http://passport.fh21.com.cn">{{ Auth::user()->name }}</a>
                        </h4>
                        <h5  class="head-les-head-grade">
                           
                        </h5>
                    </div>
                
                    <a href="#" class="clearfix head-les-list">
                        <i class="icon icon-login-mypro fl"></i>
                        <span class="fl head-les-list-tosolve">我的个人中心</span>
                    </a>
      
                    <a href="{!! route('logout') !!}" class="head-les-exit">退出登录</a>
                </div>
         </div>
         @endif
        </div>
        
  

<script type="text/html" id="tpl-login-status">
      
         
      
       
        
        



</script>     

    </div>
</div>
<div class="header-b-box">
    
</div>

<!--/.头部-->