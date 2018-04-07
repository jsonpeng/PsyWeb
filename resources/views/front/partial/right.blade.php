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
                             <?php $posts=app('cat')->getCachePostOfCatIncludeChildren($items,4);?>

                                @foreach($posts as $post)
                                    <div class="eyf-mod fll">
                                            <a href="/post/{!! $post->id !!}" class="eyf-mod-piclink">
                                                <img src="{!! $post->image !!}">
                                            </a>
                                            <a href="/post/{!! $post->id !!}" class="eyf-mod-title a-hover">{!! $post->name !!}</a>
                                    </div>
                                     
                                @endforeach
                                </div>
                             @endforeach
                          
                        
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