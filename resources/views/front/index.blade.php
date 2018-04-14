@extends('front.partial.base')

@section('css')
	<style type="text/css">
		
	</style>
@endsection

@section('seo')
	<title>{{$setting->site_name}}  @if($loginStatus)({!! Auth::user()->name !!}已登录)@endif</title>
    <meta name="keywords" content="{{$setting->key_words}}">
    <meta name="description" content="{{$setting->description}}">
@endsection

@section('content')


<!--.-通栏横幅1-->
<fh-ad-plus fh-ad-pid="108"></fh-ad-plus>
<!--/.通栏横幅1-->

@if(array_key_exists('word',$input))
<h1 style="text-align:center;">搜索结果:{!! count($serach_word ) !!}个</h1>
        @if(count($serach_word)>0)
           <!--  <div style="text-align:center;">搜索到的相关文章列表:</div> -->
            <ul>
                <?php $i=0;?>
                 @foreach($serach_word as $item)
                 <?php $i++;?>
                    <li style="margin-left:42%;display:inline-block;padding-bottom: 15px;border: 1px solid black;padding-top:15px;padding-left:10px;
    width: 300px;"><a href="/post/{!! $item->id !!}" target="_blank">{!! $i !!} . {!! $item->name !!}</a></li>
                 @endforeach
             
            </ul>
       @endif
@else
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
                            <div class="tempWrap" style="overflow:hidden; position:relative; width:870px">
                                <ul style="width: 5220px; position: relative; overflow: hidden; padding: 0px; margin: 0px; left: -2610px;">
                                @foreach($banners as $banner)
                                    <li class="clone" style="float: left; width: 870px;">
                                        <a href="{!! empty($banner->link)?'javascript:;':$banner->link !!}" target="_blank" class="sl-list">
                                            <img src="{!! $banner->image !!}" class="all-img">
                                            <div class="sl-list-bottom clearfix">
                                                <p class="sl-list-bottom-text fl">{!! $banner->word !!}</p>
                                            </div>
                                        </a>
                                    </li>
                                 @endforeach
                                 
                                 
                              </ul>
                          </div>
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
                                        <a href="http://127.0.0.2/post/20" class="ma-nms-a fl">心理电影、心理书籍推荐</a>
                                
                            </div>
                        </div>
            
                        </div>
                    </div>
                </div> 
                <!--/.子导航-->
                    
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
                    <?php $posts=app('cat')->getCachePostOfCatIncludeChildren($cat,10); ?>
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
                 <!--/文章列表-->

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
                    </div>  

                    <!--/.文章列表-->
                    
                </div>

                <div class="right fr">
                    <!--.搜索-->
                        <form class="search clearfix"  action="">
                            <input type="text" name="word" class="fl search-inp" placeholder="请输入关键字">
                  
                            <button class="fl search-btn" type="submit">
                                搜索
                            </button>
                        </form>
                    <!--/.搜索-->
                    
                    <!--.推荐文章-->
                        <div class="rea mb-20">
                            <a href="/post/1" class="rea-first">
                                <img src="{{ asset('images/rea_tu.png') }}"  class="all-img">
                                <h4 class="rea-first-bottom">遇见未知的自己</h4>
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

                                    @if(!empty($Criminalnformation))
                                    <li class="clearfix rea-list">
                                            <span class="fl rea-list-title">[罪恶情报局]</span>
                                                <a href="/post/{!! $Criminalnformation->id !!}" class="a-hover fl">{!! $Criminalnformation->name !!}</a>
                                    </li>
                                    @endif
                               
                            </ul>
                        </div>  
                     <!--/.推荐文章-->
                    
                    <!--.P-->
                        <div style="margin-bottom: 20px">
                            <fh-ad-plus fh-ad-pid="27"></fh-ad-plus>
                        </div>
                    <!--/.P-->                 
                    
                   @include('front.partial.right')

                </div>
                    <!--/.猜你喜欢-图片-->
                    
                
                </div>
                </div>
            </div>
        </div>
    
@endif

@endsection


