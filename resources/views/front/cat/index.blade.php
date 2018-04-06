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
                                                        <div class="ma-modone clearfix nbt pt-0"><a href="/post/{!! $post->id !!}" target="_blank" class="fl ma-modone-left"><img src="{!! $post->image !!}" class="all-img"></a><div class="ma-modone-right fl"><a href="/post/{!! $post->id !!}" target="_blank" class="ma-modone-right-title">{!! $post->name !!}</a><div class="ma-modone-right-content">{!! $post->brief !!}<a href="/post/{!! $post->id !!}" target="_blank" class="a-hover">[详细]</a></div><div class="ma-modone-right-time">{!! $post->created_at !!}</div></div></div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                <!--/.文章列表-->
                                
                                <!--.翻页
                                    <div class="wrap-list-paging mt-20">
                                       <p><span class="current">1</span><a href="list_6721_2.html">2</a><a href="list_6721_3.html">3</a><a href="list_6721_4.html">4</a> ...&nbsp;&nbsp;<a href="list_6721_93.html">93</a><a href="list_6721_2.html">下一页</a><a href="list_6721_93.html">末页</a></p>
                                    </div>-->
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
                              搜索
                            </button>
                        </form>
                    <!--/.搜索-->
                    
                    
                    <!--.图片广告-->
                        <div style="margin-bottom: 20px">
                            <fh-ad-plus fh-ad-pid="27"></fh-ad-plus>
                        </div>
                    <!--/.图片广告-->
                    
         @include('front.partial.right')
                    
                </div>
                </div>
                </div>
            </div>
</div>
@endsection