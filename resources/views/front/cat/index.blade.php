@extends('front.partial.base')

@section('css')
	<style type="text/css">
	</style>
@endsection

@include('front.cat.seo')

@section('content')
<div class="wrap-b pt-30 pb-50">
            <div class="wrap clearfix main">
                <div class="left fl clearfix">
                    <div class="left-left fl">
                        
                        <!--.侧边导航-->
                        <div class="sidenav">
    <h3 class="sidenav-head">{!! $category->name !!}</h3>
    </div>

                        <!--/.侧边导航-->
                        
                    </div>
                    <div class="left-main fr">
                        
                        <!--.文章列表-->
                    <div class="ls-list mb-30">               
                        <div id="_elm" data-id="6721" data-page="1" data-channel="9">
     
                            <div class="news-wrapper">
                                @foreach ($posts as $post)
                                        <div class="ma-modone clearfix nbt pt-0"><a href="/post/{!! $post->id !!}" target="_blank" class="fl ma-modone-left"><img src="https://file.fh21static.com/fhfile1/M00/63/B4/ooYBAFp6onKAHkYwAAEERjSf26c719.png" class="all-img"></a><div class="ma-modone-right fl"><a href="/post/{!! $post->id !!}" target="_blank" class="ma-modone-right-title">{!! $post->name !!}</a><div class="ma-modone-right-content">{!! $post->brief !!}<a href="/post/{!! $post->id !!}" target="_blank" class="a-hover">[详细]</a></div><div class="ma-modone-right-time">{!! $post->created_at->format('Y-m-d') !!}</div></div></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                        <!--/.文章列表-->
                        
                        <!--.翻页-->
                        <div class="wrap-list-paging mt-20">
   <p><span class="current">1</span><a href="list_6721_2.html">2</a><a href="list_6721_3.html">3</a><a href="list_6721_4.html">4</a> ...&nbsp;&nbsp;<a href="list_6721_93.html">93</a><a href="list_6721_2.html">下一页</a><a href="list_6721_93.html">末页</a></p>
</div>
                        <!--/.翻页-->
                        
                    </div>
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
                    
                    
                    <!--.图片广告-->
                        <div style="margin-bottom: 20px">
        <fh-ad-plus fh-ad-pid="27"></fh-ad-plus>
    </div>
    <!--/.PC问答右侧关注广告位-->                    <!--/.图片广告-->
                    
                    <!--.热门推荐-->
                    <div class="hor mb-20">
    <div class="cm-sidetitle clearfix">
        <h3 class="cm-sidetitle-head fl">焦点关注</h3>
    </div>
            <div class="ar-mod clr">
        <a href="/xltm/452541.html" class="ar-mod-imglink fll" target="_blank">
            <img src="https://file.fh21static.com/fhfile1/M00/52/83/o4YBAFknjY-AHCSyAAAVgpmA6Ik55.jpeg" class="all-img">
        </a>
        <div class="ar-mod-right flr">
            <a href="/xltm/452541.html" target="_blank" class="a-hover">没有什么是你离不开的东西</a>
            <p class="ar-mod-right-time">2014-10-11</p>
        </div>
    </div>
                <div class="">
                <a href="/xltm/441343.html" class="hor-list">
            人生的承诺很多都是说给自己听
        </a>
                <a href="/xltm/432344.html" class="hor-list">
            过于炫耀优点总会让其变成缺点
        </a>
                <a href="/xltm/292461.html" class="hor-list">
            会毁掉你性心理的几种状态
        </a>
                <a href="/xltm/291870.html" class="hor-list">
            全职太太要注意的几种心理保健
        </a>
                <a href="/xltm/134164.html" class="hor-list">
            如何克服自负心理有绝招
        </a>
                <a href="/xltm/134012.html" class="hor-list">
            惊心男人一生会欠下多少感情账单
        </a>
            </div>
    </div>
                    <!--/.热门推荐-->
                    
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
                                                <em class="fl rr-list-num rr-list-num2 ">2</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/xzqw/444374.html" class="a-hover">哪些星座女生值得你去努力</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num">3</em>
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
                                                <em class="fl rr-list-num rr-list-num2 ">2</em>
                                                <h4 class="fl rr-list-title">
                            <a href="/qg/la/473245.html" class="a-hover">为什么多数男人有处女情结</a>
                        </h4>
                    </li>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num">3</em>
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
</div>
                    <!--/.热门推荐-切换-->
                    
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
                    
                    <!--.猜你喜欢-文章-->
                    <div class="gua mb-15">
    <div class="cm-sidetitle clearfix block-hide ">
        <h3 class="cm-sidetitle-head fl">大家都在看</h3>
    </div>
    <ul class="ar-main">
                <li class="ar-mod clr pt-0">
            <a href="/qg/la/5235866.html" class="ar-mod-imglink fll">
                <img src="https://file.fh21static.com/fhfile1/M00/59/E8/ooYBAFnCNuCAf-usAAI54nH3w6Q904.png">
            </a>
            <div class="ar-mod-right flr">
                <h4>
                    <a href="/qg/la/5235866.html" target="_blank" class="a-hover">女生约会时的小动作你了解哪些</a>
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
                    <a href="/qg/jh/472936.html" target="_blank" class="a-hover">如何让平淡的婚姻恢复激情</a>
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
                    <a href="/qg/la/472934.html" target="_blank" class="a-hover">爱情里女人别做哪些蠢事儿</a>
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
                    <a href="/qg/jh/472734.html" target="_blank" class="a-hover">男人结婚后心理有哪些变化</a>
                </h4>
                <p class="ar-mod-right-time">2015-01-29</p>
            </div>
        </li>
                <li class="ar-mod clr ">
            <a href="/rjgx/472743.html" class="ar-mod-imglink fll">
                <img src="https://file.fh21static.com/fhfile1/M00/54/F9/o4YBAFlQvO2Adl-WAABnfdPcehc82.jpeg">
            </a>
            <div class="ar-mod-right flr">
                <h4>
                    <a href="/rjgx/472743.html" target="_blank" class="a-hover">如何做能让别人乐意帮助你</a>
                </h4>
                <p class="ar-mod-right-time">2015-01-29</p>
            </div>
        </li>
            </ul>
    
        
    
</div>

                    <!--/.猜你喜欢-文章-->
                    
                </div>
            </div>
        </div>

@endsection