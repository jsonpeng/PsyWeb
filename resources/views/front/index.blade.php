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
                        <?php $posts=$cat->posts()->orderBy('created_at','desc')->take(10)->get();?>
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
    <a href="/qg/jh/473241.html" class="rea-first">
        <img src="https://file.fh21static.com/fhfile1/M00/52/67/ooYBAFkisU2AC4ZfAAA579akFGY30.jpeg" class="all-img">
        <h4 class="rea-first-bottom">遭遇婚外情一定要离婚吗？</h4>
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
                    
                    <!--.热门推荐-切换-->
                    <div class="hrt mb-25">
    <div class="cm-sidetitle clearfix">
        <h3 class="cm-sidetitle-head fl">精彩必读</h3>
    </div>
    
        <a href="/czxl/473236.html" class="hrt-imgbox">
        <img src="https://file.fh21static.com/fhfile1/M00/52/62/oYYBAFkisa6AdSY9AAAu4BZcCkM64.jpeg" class="all-img">
    </a>
        <div class="hrt-tab">

        <div class="hrt-head clearfix">
            <span class="fl hrt-head-list hrt-head-list-hover">热门推荐</span>
            <span class="fl hrt-head-list">点击排行</span>
        </div>
        <div class="hrt-main">
            <div class="hrt-main-list hrt-main-list-show">
                <ul>
                   
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num rr-list-num1 ">1</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/zhc/gw/463045.html" class="a-hover">如何找到最适合你的工作呢</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num  rr-list-num2 ">2</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/xzqw/444374.html" class="a-hover">哪些星座女生值得你去努力</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num rr-list-num3">3</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/xltm/444366.html" class="a-hover">我无数次幻想过未来的模样</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num">4</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/rjgx/444367.html" class="a-hover">修补夫妻关系帮你找回爱情</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num">5</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/qg/la/444355.html" class="a-hover">男女间4种暧昧你了解多少</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num">6</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/xzqw/444057.html" class="a-hover">盘点那些为爱情流泪最多的星座</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num">7</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/zhc/444055.html" class="a-hover">远离四大饮食陋习 做健康白领</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num">8</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/xltm/444053.html" class="a-hover">男人选择仕途放弃爱情有错吗</a>
                        </h4>
                    </li>
                                    </ul>
                
                    
                
            </div>
        
            <div class="hrt-main-list">
                <ul>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num rr-list-num1 ">1</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/qg/473259.html" class="a-hover">女人哪些小动作最能诱惑人</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num  rr-list-num2 ">2</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/qg/la/473245.html" class="a-hover">为什么多数男人有处女情结</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num rr-list-num3">3</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/czxl/472937.html" class="a-hover">家长说哪些话容易伤害孩子</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num">4</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/xzqw/472945.html" class="a-hover">12星座坐冷板凳该怎么办？</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num">5</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/rjgx/yx/472944.html" class="a-hover">男人恋爱为什么会忽冷忽热</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num">6</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/rjgx/yx/472741.html" class="a-hover">恋人分手时如何好聚好散？</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num">7</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/zhc/gw/463878.html" class="a-hover">职场中如何理解和把握信任</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num">8</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/cs/293934.html" class="a-hover">测测你老公是否会有恋母症</a>
                        </h4>
                    </li>
                                    </ul>
                
            </div>
        
        
        
        </div>
    </div>
</div>                  <!--/.热门推荐-切换-->
                    
                    <!--.猜你喜欢-文章-->
                    <div class="gua mb-15">
    <div class="cm-sidetitle clearfix">
        <h3 class="cm-sidetitle-head fl">大家都在看</h3>
    </div>
    <ul class="ar-main">
                <li class="ar-mod clr pt-0">
            <a href="/qg/la/5235866.html" class="ar-mod-imglink fll">
                <img src="https://file.fh21static.com/fhfile1/M00/59/E8/ooYBAFnCNuCAf-usAAI54nH3w6Q904.png">
            </a>
            <div class="ar-mod-right flr">
                <h4>
                    <a href="/qg/la/5235866.html" class="a-hover">女生约会时的小动作你了解哪些</a>
                </h4>
                <p class="ar-mod-right-time">2017-09-20</p>
            </div>
        </li>
                <li class="ar-mod clr ">
            <a href="/qg/jh/472936.html" class="ar-mod-imglink fll">
                <img src="https://file.fh21static.com/fhfile1/M00/54/F2/oYYBAFlQttqAZ9-SAABlbts9XLE93.jpeg">
            </a>
            <div class="ar-mod-right flr">
                <h4>
                    <a href="/qg/jh/472936.html" class="a-hover">如何让平淡的婚姻恢复激情</a>
                </h4>
                <p class="ar-mod-right-time">2015-01-30</p>
            </div>
        </li>
                <li class="ar-mod clr ">
            <a href="/qg/la/472934.html" class="ar-mod-imglink fll">
                <img src="https://file.fh21static.com/fhfile1/M00/54/F9/o4YBAFlQx_yAe6YgAABHSPL126Y28.jpeg">
            </a>
            <div class="ar-mod-right flr">
                <h4>
                    <a href="/qg/la/472934.html" class="a-hover">爱情里女人别做哪些蠢事儿</a>
                </h4>
                <p class="ar-mod-right-time">2015-01-30</p>
            </div>
        </li>
                <li class="ar-mod clr ">
            <a href="/qg/jh/472734.html" class="ar-mod-imglink fll">
                <img src="https://file.fh21static.com/fhfile1/M00/54/F3/oYYBAFlQuiaAHjMYAABXKAvsQKU33.jpeg">
            </a>
            <div class="ar-mod-right flr">
                <h4>
                    <a href="/qg/jh/472734.html" class="a-hover">男人结婚后心理有哪些变化</a>
                </h4>
                <p class="ar-mod-right-time">2015-01-29</p>
            </div>
        </li>
            </ul>
    </div>                  <!--/.猜你喜欢-文章-->
                    
                    <!--.猜你喜欢-图片-->
                    <div class="gup mb-20">
    <div class="cm-sidetitle clearfix">
        <h3 class="cm-sidetitle-head fl">猜你喜欢</h3>
        <div class="cm-sidetitle-right fr clearfix">
                        <a href="/zhc/" target="_blank" class="a-hover a-hover-act fl">职场心理</a>
                        <a href="/qg/" target="_blank" class="a-hover  fl">婚恋心理</a>
                        <a href="/rjgx/" target="_blank" class="a-hover  fl">人际关系</a>
                    </div>
    </div>
    
    <div class="eyf-main ">
        <div class="eyfs-list clr eyfs-list-show ">
                    <div class="eyf-mod fll">
                <a href="/zhc/gw/457511.html" class="eyf-mod-piclink">
                    <img src="https://file.fh21static.com/fhfile1/M00/52/6C/oYYBAFklHFyAGulmAAAOYI-XYg859.jpeg">
                </a>
                <a href="/zhc/gw/457511.html" class="eyf-mod-title a-hover">职场人士如何学习拒绝他人</a>
            </div>
                    <div class="eyf-mod fll">
                <a href="/zhc/gw/457288.html" class="eyf-mod-piclink">
                    <img src="https://file.fh21static.com/fhfile1/M00/52/70/ooYBAFklHG-AYDBQAAASI_FvcaU15.jpeg">
                </a>
                <a href="/zhc/gw/457288.html" class="eyf-mod-title a-hover">职场领导者要具备什么素质</a>
            </div>
                    <div class="eyf-mod fll">
                <a href="/zhc/456669.html" class="eyf-mod-piclink">
                    <img src="https://file.fh21static.com/fhfile1/M00/52/6C/oYYBAFklHJaAZ--EAAAXw2QSIRo85.jpeg">
                </a>
                <a href="/zhc/456669.html" class="eyf-mod-title a-hover">职场人士求加薪该怎么做？</a>
            </div>
                    <div class="eyf-mod fll">
                <a href="/zhc/gw/456670.html" class="eyf-mod-piclink">
                    <img src="https://file.fh21static.com/fhfile1/M00/52/71/o4YBAFklHIGAVRrBAAAVd8e1n5w99.jpeg">
                </a>
                <a href="/zhc/gw/456670.html" class="eyf-mod-title a-hover">做销售很容易得抑郁症吗？</a>
            </div>
                </div>
        <div class="eyfs-list clr">
                    <div class="eyf-mod fll">
                <a href="/qg/472557.html" class="eyf-mod-piclink">
                    <img src="https://file.fh21static.com/fhfile1/M00/52/6C/oYYBAFklHOCAaa2IAAASmEJCrng81.jpeg">
                </a>
                <a href="/qg/472557.html" class="eyf-mod-title a-hover">男人和女人怎么样电话调情</a>
            </div>
                    <div class="eyf-mod fll">
                <a href="/qg/472310.html" class="eyf-mod-piclink">
                    <img src="https://file.fh21static.com/fhfile1/M00/52/70/ooYBAFklHPSAMbJUAAATj0L8-MU12.jpeg">
                </a>
                <a href="/qg/472310.html" class="eyf-mod-title a-hover">恐归族为何一到过年就害怕</a>
            </div>
                    <div class="eyf-mod fll">
                <a href="/qg/444042.html" class="eyf-mod-piclink">
                    <img src="https://file.fh21static.com/fhfile1/M00/54/F4/oYYBAFlQvtiARwn_AABvkwvqBhc39.jpeg">
                </a>
                <a href="/qg/444042.html" class="eyf-mod-title a-hover">是什么原因让男人后悔结婚</a>
            </div>
                    <div class="eyf-mod fll">
                <a href="/qg/442304.html" class="eyf-mod-piclink">
                    <img src="https://file.fh21static.com/fhfile1/M00/54/F7/ooYBAFlQwD6AGtC5AAA__jpwxp010.jpeg">
                </a>
                <a href="/qg/442304.html" class="eyf-mod-title a-hover">女人在婚姻中有什么角色</a>
            </div>
                </div>
        <div class="eyfs-list clr">
                    <div class="eyf-mod fll">
                <a href="/rjgx/472555.html" class="eyf-mod-piclink">
                    <img src="https://file.fh21static.com/fhfile1/M00/52/72/o4YBAFklHUKARrf8AAAYh0TsKJk30.jpeg">
                </a>
                <a href="/rjgx/472555.html" class="eyf-mod-title a-hover">你不喜欢朋友炫耀时怎么办</a>
            </div>
                    <div class="eyf-mod fll">
                <a href="/rjgx/yx/472307.html" class="eyf-mod-piclink">
                    <img src="https://file.fh21static.com/fhfile1/M00/52/72/o4YBAFklHViAdm0HAAAX_sIwDPA82.jpeg">
                </a>
                <a href="/rjgx/yx/472307.html" class="eyf-mod-title a-hover">婚前试性女人因为什么分手</a>
            </div>
                    <div class="eyf-mod fll">
                <a href="/rjgx/yx/472054.html" class="eyf-mod-piclink">
                    <img src="https://file.fh21static.com/fhfile1/M00/52/70/ooYBAFklHWqAG8_tAAAZMNL5JUc85.jpeg">
                </a>
                <a href="/rjgx/yx/472054.html" class="eyf-mod-title a-hover">你可以通过哪些途径遇见她</a>
            </div>
                    <div class="eyf-mod fll">
                <a href="/rjgx/yx/471693.html" class="eyf-mod-piclink">
                    <img src="https://file.fh21static.com/fhfile1/M00/52/72/o4YBAFklHX2AKMMiAAAPgrF-v5U82.jpeg">
                </a>
                <a href="/rjgx/yx/471693.html" class="eyf-mod-title a-hover">好的伴侣是苛责出来的吗？</a>
            </div>
                </div>
    </div>  
    
</div>
                    <!--/.猜你喜欢-图片-->
                    
                    <!--.热搜榜-->
                                        <!--/.热搜榜-->
                    
                </div>
            </div>
        </div>
        
        <!--.热搜榜-->
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
</div>
    <!--/.热搜榜--> 

@endsection


@section('js')
<script type="text/javascript">

</script>
@endsection
