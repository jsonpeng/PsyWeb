@extends('front.partial.base')

@section('css')
	<style type="text/css">
		
	</style>
@endsection

@section('seo')
	<title>{{$setting->site_name}}</title>
    <meta name="keywords" content="{{$setting->key_words}}">
    <meta name="description" content="{{$setting->description}}">
@endsection

@section('content')


<!--.PC-疾病医美整形-通栏横幅1-->
<fh-ad-plus fh-ad-pid="108"></fh-ad-plus>
<!--/.PC-疾病医美整形-通栏横幅1-->


        <div class="wrap-b pt-30 pb-50">
            <div class="wrap clearfix main">
                <div class="left fl">
                    
                    <!--.轮播图-->
                    <div class="sl mb-20">
    <div id="slideBox" class="slideBox">
        <div class="hd">
            <ul>
                <li class=""></li>
                <li class=""></li>
                <li class="on"></li>
                <li></li>
            </ul>
        </div>
        <div class="bd">
            <div class="tempWrap" style="overflow:hidden; position:relative; width:870px"><ul style="width: 5220px; position: relative; overflow: hidden; padding: 0px; margin: 0px; left: -2610px;">


            @foreach($banners as $banner)
                <li class="clone" style="float: left; width: 870px;">
                    <a href="{!! $banner->link !!}" target="_blank" class="sl-list">
                        <img src="{!! $banner->image !!}" class="all-img">
                        <div class="sl-list-bottom clearfix">
                            <p class="sl-list-bottom-text fl">{!! $banner->word !!}</p>
                        </div>
                    </a>
                </li>
             @endforeach
             
             
       
             
          </ul></div>
        </div>
    </div>  
</div>
                    <!--/.轮播图-->
                    
                    <!--.子导航-->
                    <div class="sonnav">
    <div class="ma-nav-wrap clearfix">
        <div class="ma-nav fl clearfix">
            <a href="" class="ma-nav-list ma-nav-list-hover fl">最新资讯</a>
            @foreach($RootCat as $cat)
            <a href="/cat/{!! $cat->id !!}" class="ma-nav-list fl">{!! $cat->name !!}</a>
            @endforeach
                                             
        </div>
                <div class="ma-nav-more fr">
         
            <div class="ma-nav-more-title clearfix">
                <span class="fl">查看更多</span>
                <i class="icon icon-ma-arrow fl"></i>
            </div>
        
            <div class="ma-nav-more-show">
                <div class="ma-nav-more-show-wrap clearfix">
                                        <!--<a href="/" class="ma-nms-a fl">星座趣闻</a>-->
                    
                                    </div>
            </div>
            
        </div>
            </div>
    
</div>                  <!--/.子导航-->
                    
                    <!--.文章列表-->
                    <div class="ls-main">

                        <!--最新资讯-->
                        <div class="ls-mod ls-mod-act"> 
                           @foreach($NewsestPosts as $post)
                                <div class="ma-modone clearfix">
                                    <a href="/post/{!! $post->id !!}" class="fl ma-modone-left">
                                        <img src="{!! $post->image !!}" class="all-img">
                                    </a>
                                    <div class="ma-modone-right fl">
                                        <a href="/post/{!! $post->id !!}" class="ma-modone-right-title">{!! $post->name !!}</a>
                                        <div class="ma-modone-right-content">
                                            {!! $post->brief !!}...<a href="/post/{!! $post->id !!}" class="a-hover">[详细]</a>
                                        </div>
                                        <div class="ma-modone-right-time">
                                            {!! $post->created_at !!}
                                        </div>
                                    </div>
                                </div>
                             @endforeach  
                        </div> 

                        <!--各个分类的文章列表-->
                        @foreach($RootCat as $cat)
                        <?php $posts=$cat->posts()->orderBy('created_at','desc')->where('status', 1)->take(10)->get();?>
                            <div class="ls-mod"> 
                                @foreach($posts as $post)
                                    <div class="ma-modone clearfix">
                                        <a href="/post/{!! $post->id !!}" class="fl ma-modone-left">
                                            <img src="{!! $post->image !!}" class="all-img">
                                        </a>
                                        <div class="ma-modone-right fl">
                                            <a href="/post/{!! $post->id !!}" class="ma-modone-right-title">{!! $post->name !!}</a>
                                            <div class="ma-modone-right-content">
                                                {!! $post->brief !!}...<a href="/post/{!! $post->id !!}" class="a-hover">[详细]</a>
                                            </div>
                                            <div class="ma-modone-right-time">
                                                {!! $post->created_at !!}
                                            </div>
                                        </div>
                                    </div>
                                 @endforeach       
                            </div> 
                        @endforeach

                    

                </div>

<div class="ls-main-addmore ls-main">
    <div class="ls-mod "></div>

    <!--大学成长-->
    <div class="ls-mod ">

            <div class="ma-addmore mt-10"> <a href="/cat/2" class="a-hover">查看更多&gt;&gt;</a> </div>

    </div>

    <!--校园社交-->
    <div class="ls-mod ">

            <div class="ma-addmore mt-10"> <a href="/cat/5" class="a-hover">查看更多&gt;&gt;</a> </div>

    </div>

    <!--每日心理学-->
   <div class="ls-mod ">

            <div class="ma-addmore mt-10"> <a href="/cat/9" class="a-hover">查看更多&gt;&gt;</a> </div>

    </div>

    <!--心灵鸡汤-->
    <div class="ls-mod ">

            <div class="ma-addmore mt-10"> <a href="/cat/12" class="a-hover">查看更多&gt;&gt;</a> </div>

    </div>

                </div>                  <!--/.文章列表-->
                    
                </div>
                <div class="right fr">
                    
                    <!--.搜索-->
                    <form class="search clearfix" target="_blank" action="http://zhannei.fh21.com.cn/cse/search">
                        <input type="text" name="q" class="fl search-inp" placeholder="请输入关键字">
                        <input type="hidden" name="s" value="6719305306906253443">          
                        <input type="hidden" name="nsid" value="0"> 
                        <button class="fl search-btn" type="submit">
                            <i class="icon icon-search"></i>
                        </button>
                    </form>
                    <!--/.搜索-->
                    
                    <!--.推荐文章-->

                    <div class="rea mb-20">
    <a href="/post/1" class="rea-first">
        <img src="https://file.fh21static.com/fhfile1/M00/52/67/ooYBAFkisU2AC4ZfAAA579akFGY30.jpeg" class="all-img">
        <h4 class="rea-first-bottom">小小白</h4>
    </a>
    <ul>
            @if(!empty($UniversityGrowth))
            <li class="clearfix rea-list">
                    <span class="fl rea-list-title">[大学成长]</span>
                        <a href="/post/{!! $UniversityGrowth->id !!}" class="a-hover fl">{!! $UniversityGrowth->name !!}</a>
            </li>
            @endif

            @if(!empty($CampusAssocia))
            <li class="clearfix rea-list">
                    <span class="fl rea-list-title">[校园社交]</span>
                        <a href="/post/{!! $CampusAssocia->id !!}" class="a-hover fl">{!! $CampusAssocia->name !!}</a>
            </li>
            @endif

            @if(!empty($Psychology))
            <li class="clearfix rea-list">
                    <span class="fl rea-list-title">[每日心理学]</span>
                        <a href="/post/{!! $Psychology->id !!}" class="a-hover fl">{!! $Psychology->name !!}</a>
            </li>
            @endif

            @if(!empty($ChickenSoup))
            <li class="clearfix rea-list">
                    <span class="fl rea-list-title">[心灵鸡汤]</span>
                        <a href="/post/{!! $ChickenSoup->id !!}" class="a-hover fl">{!! $ChickenSoup->name !!}</a>
            </li>
            @endif
       
    </ul>

</div>                  <!--/.推荐文章-->
                    
                    <!--.PC问答右侧关注广告位-->
                        <div style="margin-bottom: 20px">
        <fh-ad-plus fh-ad-pid="27"></fh-ad-plus>
    </div>
    <!--/.PC问答右侧关注广告位-->                    <!--/.图片广告-->
                    
                  @include('front.partial.right')
    
</div>
                    <!--/.猜你喜欢-图片-->
                    
                    <!--.热搜榜-->
                                        <!--/.热搜榜-->
                    
                </div>
            </div>
        </div>
        
        <!--.热搜榜
            <div class="footer-wrap">
                    <div class="wrap">
                        <div class="footer-top clr">
                            <div class="footer-code">
                                <ul class="clearfix">
                                    <li>
                                        <img src="http://static2.fh21.com.cn/chl/images/pic_wx_qrcode.jpg" alt="">
                                        <p>微信公众号</p>
                                    </li>
                                    <li>
                                        <img src="http://static2.fh21.com.cn/chl/images/pic_wap_qrcode.jpg" alt="">
                                        <p>飞华WAP站</p>
                                    </li>
                                    <li>
                                        <img src="http://static2.fh21.com.cn/chl/images/pic_wb_qrcode.jpg" alt="">
                                        <p>飞华健康微博</p>
                                    </li>

                                </ul>
                            </div>
                            <div class="footer-subnav fl">
                                <ul class="footer-subnav-fh">

                                        <li><a href="https://www.fh21.com.cn/company/aboutUs.htm" target="_blank" class="footer-subnav-fh-link">飞华简介</a></li>
                                        <li><a href="https://www.fh21.com.cn/ad/home/index.shtml" target="_blank" class="footer-subnav-fh-link">广告服务</a></li>
                                        <li><a href="https://www.fh21.com.cn/company/job.htm" target="_blank" class="footer-subnav-fh-link">招贤纳士</a></li>
                                        <li><a href="https://www.fh21.com.cn/company/contact.htm" target="_blank" class="footer-subnav-fh-link">联系飞华</a></li>
                                        <li><a href="http://passport.fh21.com.cn/personal/feedback" target="_blank" class="footer-subnav-fh-link">意见反馈</a></li>
                                        <li><a href="https://www.fh21.com.cn/company/law.htm" target="_blank" class="footer-subnav-fh-link">服务条款</a></li>
                                        <li><a href="https://www.fh21.com.cn/company/sitemap.htm" target="_blank" class="footer-subnav-fh-link">网站地图</a></li>

                                </ul>
                                                <ul class="footer-subnav-friend clr">
                                    <li><p class="friendship-link">友情链接</p></li>
                                                            <li><a href="http://ys.fh21.com.cn/" class="footer-subnav-friend-link">养生</a></li>
                                                            <li><a href="http://www.fh21.com.cn/pifu/bdf/by/" class="footer-subnav-friend-link">白癜风的发病原因</a></li>
                                                            <li><a href="http://www.fh21.com.cn/pifu/bdf/cr/" class="footer-subnav-friend-link">白癜风传染吗</a></li>
                                                            <li><a href="http://www.fh21.com.cn/pifu/bdf/zz/" class="footer-subnav-friend-link">白癜风的症状</a></li>
                                                            <li><a href="http://www.fh21.com.cn/pifu/bdf/zl/" class="footer-subnav-friend-link">白癜风治疗</a></li>
                                                            <li><a href="http://www.fh21.com.cn/pifu/bdf/fy/" class="footer-subnav-friend-link">白癜风治疗费用</a></li>
                                                            <li><a href="http://www.chunshuitang.com/nvxing/" class="footer-subnav-friend-link">女性成人用品</a></li>
                                                            <li><a href="http://www.taisui.org" class="footer-subnav-friend-link">太岁</a></li>
                                                            <li><a href="http://js.39.net/" class="footer-subnav-friend-link">精神科</a></li>
                                                            <li><a href="http://www.ys137.com/xinli/" class="footer-subnav-friend-link">心理健康</a></li>
                                                            <li><a href="http://www.luv66.com/" class="footer-subnav-friend-link">心理咨询</a></li>
                                                            <li><a href="http://www.169kang.com/" class="footer-subnav-friend-link">169健康网</a></li>
                                                            <li><a href="http://face.qm120.com/" class="footer-subnav-friend-link">全民美容网</a></li>
                                                            <li><a href="http://jb.999ask.com/" class="footer-subnav-friend-link">疾病百科</a></li>
                                                    </ul>
                                            </div>
                        </div>      
                    </div>
            </div>-->
    <!--/.热搜榜--> 

@endsection


@section('js')
<script type="text/javascript">

</script>
@endsection
