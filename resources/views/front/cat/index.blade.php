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
                                        <div class="ma-modone clearfix nbt pt-0"><a href="/post/{!! $post->id !!}" target="_blank" class="fl ma-modone-left"><img src="{!! $post->image !!}" class="all-img"></a><div class="ma-modone-right fl"><a href="/post/{!! $post->id !!}" target="_blank" class="ma-modone-right-title">{!! $post->name !!}</a><div class="ma-modone-right-content">{!! $post->brief !!}<a href="/post/{!! $post->id !!}" target="_blank" class="a-hover">[详细]</a></div><div class="ma-modone-right-time">{!! $post->created_at->format('Y-m-d') !!}</div></div></div>
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
                        <?php $i=0;?>
                            @foreach($AttentionPosts as $item)
                                @if($i==0)
                                <div class="ar-mod clr">
                                        <a href="/post/{!! $item->id !!}" class="ar-mod-imglink fll" target="_blank">
                                            <img src="{!! $item->image !!}" class="all-img">
                                        </a>
                                        <div class="ar-mod-right flr">
                                            <a href="/post/{!! $item->id !!}" target="_blank" class="a-hover">{!! $item->name !!}</a>
                                            <p class="ar-mod-right-time">{!! $item->created_at->format('Y-m-d') !!}</p>
                                        </div>
                                </div>
                              
                                @else
                                <div class="">

                                    <a href="/post/{!! $item->id !!}" class="hor-list">
                                      {!! $item->name !!}
                                    </a>

                                </div>

                                  @endif
                                <?php $i++;?>
                            @endforeach
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
                                        <?php $r=0;?>
                                        @foreach($Remen as $item)
                                        <?php $r++;?>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num rr-list-num{!! $r<=2?$r:'' !!}">{!! $r !!}</em>
                                                <h4 class="fl rr-list-title">
                                                <a href="/post/{!! $item->id !!}" class="a-hover">{!! $item->name !!}</a>
                                            </h4>
                                        </li>
                                        @endforeach                 
                                    </ul>
                                </div>
                                <div class="hrt-main-list">
                                     <ul>
                                        <?php $r=0;?>
                                        @foreach($ClickSortPosts as $item)
                                        <?php $r++;?>
                                        <li class="rr-list clearfix">
                                                <em class="fl rr-list-num rr-list-num{!! $r<=2?$r:'' !!}">{!! $r !!}</em>
                                                <h4 class="fl rr-list-title">
                                                <a href="/post/{!! $item->id !!}" class="a-hover">{!! $item->name !!}</a>
                                            </h4>
                                        </li>
                                        @endforeach 
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
                                            <?php $c=0;?>

                                            @foreach($CaiYouLike as $item)
                                             <?php $c++;?>
                                                <a href="/cat/{!! $item->id !!}" target="_blank" class="a-hover {!! $c==1?'a-hover-act':'' !!} fl">{!! $item->name !!}</a>
                                            @endforeach
                                        </div>
                        </div>
                        
                        <div class="eyf-main ">
                          <?php $c2=0;?>
                           @foreach($CaiYouLike as $items)
                               <?php $c2++;?>
                            <div class="eyfs-list clr {!! $c2==1?'eyfs-list-show':'' !!} ">
                             <?php $posts=$items->posts()->orderBy('created_at','desc')->where('status', 1)->take(4)->get();?>

                                @foreach($posts as $post)
                                    <div class="eyf-mod fll">
                                            <a href="/post/{!! $post->id !!}" class="eyf-mod-piclink">
                                                <img src="{!! $post->image !!}">
                                            </a>
                                            <a href="/post/{!! $post->id !!}" class="eyf-mod-title a-hover">{!! $post->name !!}</a>
                                        </div>
                                     </div>
                                @endforeach
                            
                             @endforeach
                        </div>  
                        
                    </div>
                    <!--/.猜你喜欢-图片-->
                    
                    <!--.猜你喜欢-文章-->
                    <div class="gua mb-15">
                        <div class="cm-sidetitle clearfix block-hide ">
                            <h3 class="cm-sidetitle-head fl">大家都在看</h3>
                        </div>
                        <ul class="ar-main">

                            @foreach($WeSeePosts as $item)
                                <li class="ar-mod clr pt-0">
                                    <a href="/post/{!! $item->id !!}" class="ar-mod-imglink fll">
                                        <img src="{!! $item->image !!}">
                                    </a>
                                    <div class="ar-mod-right flr">
                                        <h4>
                                            <a href="/post/{!! $item->id !!}" target="_blank" class="a-hover">{!! $item->name !!}</a>
                                        </h4>
                                        <p class="ar-mod-right-time">{!! $item->created_at->format('Y-m-d') !!}</p>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                                 
                    </div>
                    <!--/.猜你喜欢-文章-->
                    
                </div>
            </div>
        </div>
</div>
@endsection