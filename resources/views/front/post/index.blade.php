@extends('front.partial.base')

@section('css')
	<style type="text/css">
	</style>
@endsection

@include('front.post.seo')

@section('content')
<fh-ad-plus fh-ad-pid="108"></fh-ad-plus>
<div class="wrap-b pt-30 pb-50">
        <div class="wrap clearfix main">
            <div class="left fl">

                <!--.面包屑-->
                    <div class="bread clearfix">
                        <i class="icon icon-home fl"></i>
                        <span class="fl">您的位置：</span>
                        <a href="/" target="_blank" class="fl bread-a">首页</a>
                                    <span class="fl bread-arrow">&gt;</span>
                        @if(!empty($category))
                        <a href="/cat/{!! $category->id !!}" class="fl bread-a">{!! $category->name !!}</a>

                                    <span class="fl bread-arrow">&gt;</span>
                        @endif
                        <span class="fl">正文</span>
                    </div>
                <!--/.面包屑-->

                <!--.文章-->
                <div class="arti mb-20">
                    <div class="arti-head">
                        <h1 style="font-size:30px;">{!! $post->name !!}</h1>
                        <div class="arti-head-info clearfix">
                            <span class="fl arti-hi-left">发布时间：{!! $post->created_at !!}  阅读：{!! $post->view !!} 收藏：{!! $post->collect !!} </span>
                            <div class="arti-share-box clearfix fl">
                                <i class="icon icon-share-qzone icon-share-common" data-share="qzone"></i>
                                <i class="icon icon-share-wb icon-share-common" data-share="weibo"></i>
                                <i class="icon icon-share-people icon-share-common" data-share="people"></i>
                                <i class="icon icon-share-wx icon-share-common"></i>
                                <div class="arti-wxwrap">
                                    <div class="clearfix">
                                        <h3 class="fl arti-wxwrap-title">分享到微信朋友圈</h3>
                                        <span class="fr arti-wxwrap-close">×</span>
                                    </div>
                                    <div class="arti-wxwrap-img" id="qrcodewx" title="http://psy.fh21.com.cn/xltm/5298870.html">
                                        
                                    <canvas width="185" height="185" style="display: none;"></canvas><img alt="Scan me!" style="display: block;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALkAAAC5CAYAAAB0rZ5cAAAOoElEQVR4Xu3d0XbjuA5E0fT/f3TusrPm4TrS9KYLppVM9WuDBFg4BCFZUv58fHx8flzg3+enhfHnzx+Kdno+cnoT82AdRzEn8U370LXpOjRH6je1uxFjdKWe/jI+SfrR1NPz6fKnAUzAUg10bUks6uMVdoUcTwYVv5B/fLSSn9CiVUcFnJ6vkB/Dq5ta9XuF3bdKrnAkweixN+1D25pkIyVjj+LT+XRt05oq5O/i6rbeQo4XigqRQqlJ1/k0vkJ+cncgEUarkyZdY1E4tBIpRIlf1Uo12KGp6jcdy4pWreSt5LpnDi8oC/mJfO3Jj++nr1QnIXO6emre1E7WsGJzdopSJdcjODnSNSEai863IuKzttNJ1/lUK12XarojPj1B+MIzEUuDSQTUzaXJnLbTpKtfnS/JW6LpjviUq0KuVIV2mnR1o/MV8i9F264oWYGdQqkudL5CXsiVqdhOoVRHOl8h/6GQJyDoWO33dtjpHZfkmmZ67I5NqNr/yHZFQU2qmAq4w66QH2dctS/kJztGBdxhV8gL+WlhbyU/lkZbiWRzqY8dOWolbyW/K9Ce/HafMXixYMeRnsR3xHmS9GQ+vd5QO9VFc6RrayU/2TQqtNopCJo4Pb6T+ZKYp+Ob3iDTeVuZ79I/Bu2oCAmUCQjTQBfy846jkB/Q0XbFW1StqGqnm39lvkJeyPkzGnrq7TiBxyHX3aV2KoLON31Uq9+kXUk0UL/TUCa66OmoPlZyTpU8cazBTIugICR+Ex+FfJqqsCefDidJsMaSALjDR6KBrq2V/EuBVnL8PJ2eSDvAKuTHZehMl0JeyPkF5eSES9rCxO9hJdcJp+30arl22Zes3qXfNC8r8136W4jat9Yu+5ruDv1WoJy2LeT43ZV3VcDf4nca3JX5Cnkh5548qfgrUE7bFvJC/vsh/9xx2fvk1nzXrTL1q9LpfE/KdB/2rljUb7K2dOyfQv79D20olJpgnS9J5rtiUb/J2tKxhRzbFf2RJ/nRKEmmwja94dRvsrZ0bCEv5BFDhTySz59p1io7fXdAEzxdPXW9O04V1SBEIRpOlVyTpAvW+TSZO+ZL1jY9dnqzRgTh4OR+P7o4NSvk2K5Mg6pVNoEj2fwpWI/jk3WksRTyQp4yROMLOcn0ZaRi6ZQ6Xyu5KnpsN63zSjSt5K3kK7w8bftrIFcFdMHTF547qrH22ro2nU81ndYguQjWWJSrM7vRSq7BaEIUBL3AUlE1cbred8WXrEPHTtuppit2hfxALU2cCl3I/UUP1XTFrpAX8kNedKNP263Aq7aFvJD/fshvd+X+tiOme1k9vv8W1z///64eP7lmUE1Vg8ROq3FyEaxjk3WcaUovTWhCVKxC7s9/J0nXsZo3BTXhRWPWAnOzK+R4n1zF11NFQVC/iV0hD9860aQnSUp8JGO1miQQJbro2CS+6bEas2rfSv4DHhNIkq5jp0HVU2pH23qH/PH1t2TBKuqO3i4Rerq6qy6J3+n1asxqp0CrBmpXyMM/7aIJVruVxD3OWcj/5au2reS3a+///5fApkBrT5lUwOkTM1lbsg7tLs58tF05+Mt2hTzB+XhsIV9oG6arU1olJnFINlfblfAj/O8CIUm6wqc+pu2S+HSsVs+kdVJdNOZkPv7FU52onS4uEXqHD12v2mnMWqH1hEv87ih2iX6F/CS7Kuq0XQKbjm0l/1KK/tLEjh3cSn6Mbiu5f3+nlbyVXA+Au92VTi49kcYhTyqvCqhZSapd0svqOjS+5MS8uo8klwr5mY+n25VCnlU73Vy/ZSMV8pP75IkwOlZhm97U6reQe0/eSr5AvR6PvwXAHetQ+TUWnS+6uzJd2RQs9bsiwqOtxqIJuXq/vGMdmg+NRee7Qz75gFZy4ZTAq1C+y8e031eA8BijbkyFTdnQNm5F00KOf5E52UgrCZFTpZAfb63TW4it5H/9WMFd0UKuNfvYrpX8RD89MhMAd/hoJc++oKX5bSV/40Yq5G+GXD4upEmaPpK099RqnBy4O9aWXHRpjtSHap9omsS84pe+u6LB7AAh8bEizLMXgAlEOlbXoZtfNdW2QeNTrpL57tdTreQmoYKgoCYAWsT+lS5dWyHf9AqbJkRBULvE7/RYjTnZSG1Xwkcxk2qXAKNwJPHtGKvrKORfSr3lKUTtxfR41KqT2ClYSczJBlG/uo4kR4nOug71UcjDFkuhVGB0vpUEJ1A/jlW/03aq39kGaSXH764oLEklKuT+y7JupFbyVnLdu3c7BWvarpV8k/hKQyv5/GaIIX98QCtJpl7NJz7SBatvsbtaxXpHD60t1nTeVPt7u1LIBedjGxVa7d4FgsanRSw5zV4xtpA/z/h4j1rIX3Th2Ur+POVJBXxFxWq78v0z3G1Xnuf7JXcbWsk3VXKtMJoQvTDRfk/nS+JTH0klD/fXt+HTeUvmU+2nfZxpSu94akIU1OnnT1Qsja+Qe0VN2NC8qY9CvvCnGgt5IT/dWFopW8nT2vR9fFIVte1Kot7ho5W8lXypOCWb5vI9ebJbVRjd1XoyaMwan86XrENjUR8KlrZiOl9yKk9rcMbL0z8GXUkshVJF1fkUQLVLwNKxV8qb5kP1K+SbPhCklW06wYX8/J3WVnIt2wd2SYUp5H4HJ9H5lrZCXsj5E3gpbI9ST2/003bl8ZMUV7rYU1EDTg+HJhpMJy5pQ6Z1Sdam1wKv0J5ef0vEUmE0mcl8uo5XCP3oO9nASXyqgUKpedP5krVF73juEEbFKuT+0aAkbwql5k3nK+QvuEOSJEkTpz50AycgJOBPx6d3ojTmVnJV6gW/jBbyY/G3Qf7sSxPTVUznS3rZadh030xX3h1wXCnm9AS5zC3EQq5bJvvWd6KzR/jdMtmYhTzs06dPBj0t3gVMIU+UX4BNj0Ld/brTFcBkPvWRSK26qI/p+aY3kubj8s+uJMKoCApgMp/6UAATXdTHfw7yHQlWH0kroafFlSBS2FQ/3XCJ32mddWPq2m52o+94qmNNUiH3T64pHKppYqexKAc6H7crOxyrDxVaN5eKpZVtej71q/qpLonfVvKFj3EmCdGx01BOz5fAprFo4UjsNJZks67kvO3KgVoKW5LMBKIEjmm/P6KSy6O2KmqyYL0AXNnBj7YJvDpWtUrWkWwuHbsjvh05v194FvJPynsh3/P0oxaJlYJayD8LOe3y8ME19VHIT5TSXa3VWI9R7W81wboOnU+B0fmm41Od09aplbyVXBk//B47D0ZD3ZgrG+4tTyHqzkwqL2q65SXe6XVMz6daTVdeXYfana2jkB/8icPpTZgmafIuUQJ0IV94CnEaoiRxyfGo8KqdrmN6PvVbyAv5nQG9GF3pKVvJv/+ZlBX92q60XUkK+Y+4piHIdxzpqrTGsqMl0rZhh52ud4fO6iOJeYWDQn5QyfUo3AGvtj8JMEmvnQCdxFzIT5RXYAq5f4yzkJ9cjCpE0xWmkDuSK5XSZ/27pbKxEl/blbYrh+StQPR3dN1iC+RJn+lL+W6pVVZ9vEKsR9/qIzmRVJfETjVVu2SD6DpW+nl6aSJxrMJM+1AApxOi61W/qktipzGrna5NQdX5znJeyPE+uSZkGoQEXj2VNWa1UyhVU52vkJ9kSAXUhEyDUMj9Tk8hL+R3BbSN082aXG9o4dBCdAr5s6+/XUksrXaauGQ+1UVbCbVT2JK1KZQay3Q+CrkquvCQ1XTSFcAdG0nlSmJJfKxs/qffDNLF6UKS3a9waCzJfKqLJkntVL9kbdObejofreSqaCv5glLe42tfrRtpZfO3kh+omlS7VvLjPfJWyOXPqWiA03Cs7NZHaXWs2iXtgJZGjUXzoX6TvKkPtUti4VuImszkWEnG/sRKqQku5P5mlTJ0s3vLA1oaoCZdN6ZWiemNVMhVgUJ+V2oawB0bSVOssbRdOVa07crCXZPpjVTIVYE3VnIPcdZSK9us1+xZCY05qcbvart0bZqPHRpwT65BT9tNi6rxqfgJbOrjt1y/6HWT5ki1L+QniiqAKrTaTSd4uu2aLjqqc7LRC3khvyug8KqdbtZCviC+iqp2Kr5WaLXT+HS+VvIvRb/9rK9CT9tp4vTo0vi0OiV2GnPiI9Hv6vElm7WQL5wWCYBXh+jq8RXyhR+I9Apfq6LaXR2iq8dXyAv5ndFkwxVybW5DuyRJutNbyT1Jmo9pO91wmsvDnjwBRiXU/nZlIY+2uo7pWN6V9CutI+EggfzML700oUGr3XRCEmGmYynkSkH2+IR7wT9WuzKh2E6DVcj9Bx09HZPNKgzc2wj8sJOeyq3kJwpMb7gEjiTpV1pHIV+4N61Vp5W8lfzfNhb15FphFLak6iTga4XRdSTzTY9NNNWxCQfJerVdOYuvkKP6KjRON26moGqR0LZrfCEHE6r2hTzMhgodunl6eCE/v5BtJUesCrnfDUFJ2Uy1byVnSY8NVejQzdPDW8l/aCXXCx0FUOfTC88ELKVZY0400LFJzNM9/krMl25XdiRYE6dJWhFffO/QYEfMqp9ocrNZibmQo6qapBXxxXUhz9vHQi6kLTzKWsj9hyndwNo+nqWykBfypaNf5NJrlUK+8PO/ijVdZSXhN5skvmTsdHw6X2KnOdKNdNf/2b8ZpAtJelldyA4QdL1Hdkl8yViNWX3ofIldIV/ojdM+LknU41iFSAvC9No0vklNzuYq5IX8lDOFIzlpCvmJAlqdpu2mq12SYK2UqsH02jS+RAMdq5tVW1nuyTVAtVsJUObU+RI7BUt9aEVNki7avaJtUL/J2nRsIX9B+1PIFXH/1TLRtJAX8rjHT1odrcaFPLyfPt0HJwmZHus19btlAqD6TXzo2FbyVvL/ZiXXXThtpztTq11yjO5Ym8a3Qxf1Ma3Lrlxe+tPNyR0IhWg6ccldGB07rUsh30HBwvPBu3b/5LKn+/5CvpadVvI1vZ6yLuTHsu0qWIX8KWzXBhXyQn5XQPvCXbt/DeN/ty7k74X8f3aZlR/Kp1r0AAAAAElFTkSuQmCC"></div>
                                    <div class="arti-wxwrap-bottom">
                                        <p>打开微信，点击底部的“发现”，</p>
                                        <p>使用“扫一扫”即可将网页分享至朋友圈。</p>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>

                    <div class="arti-content">
                        {!! $post->content !!}
                    </div>
    

                    <div class="wrap-list-paging mt-20">
                       <p> @if(!empty($prePost))
                               <a class="prev" href="/post/{!! $prePost->id !!}">上一篇:{!! $prePost->name !!}</a>
                           @else
                               <a class="prev" href="javascript:;">上一篇:没有了</a>
                           @endif

                           @if(!empty($nextPost))
                               <a href="/post/{!! $nextPost->id !!}">下一篇: {!! $nextPost->name !!}</a>
                           @else
                               <a href="javascript:;">下一篇:没有了</a>
                           @endif

                        </p>
                    </div>
    
    
    
                    <div class="casedetail-bottom clr">
                                        <div class="casedetail-share flr">
                            <div class="bshare-custom"><div class="bsPromo bsPromo2"></div>
                                <div class="bsPromo bsPromo2"></div>
                                <a title="分享到QQ空间" class="bshare-qzone"></a>
                                <a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
                                <a title="分享到微信" class="bshare-weixin" href="javascript:void(0);"></a>
                            </div>
                            <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script>
                            <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
                        </div>
                        <span class="fr artical-share-txt">分享到</span>
                            </div>
                    
                    
                   </div>

<!--.PC内容页横幅-->
<fh-ad-plus fh-ad-pid="110"></fh-ad-plus>
<!--/.PC内容页横幅-->
                <!--/.文章-->

                <!--.猜你喜欢-中部-->
                <div class="gum mb-20">
    <div class="cm-title clearfix">
        <h2 class="cm-title-word fl">相关热点</h2>
    </div>
    <div class="gum-main clearfix">

    @foreach($HotPostsList as $item)
        <a href="/post/{!! $item->id !!}" class="gum-list fl" target="_blank">
            <div class="gum-list-imgbox">
                <img src="{!! $item->image !!}" class="all-img">
            </div>
            <h4 class="gum-list-title">{!! $item->name !!}</h4>
        </a>
    @endforeach
            </div>
</div>
                <!--/.猜你喜欢-中部-->

                <!--.推荐阅读-->
                <div class="rer">
    <div class="cm-title clearfix">
        <h2 class="cm-title-word fl">推荐阅读</h2>
    </div>
    <div class="rer-main">
        
    </div>
    <div id="_elm" >

                    <div class="news-wrapper">
                        @foreach ($TuiJianRead as $post)
                                <div class="ma-modone clearfix nbt pt-0"><a href="/post/{!! $post->id !!}" target="_blank" class="fl ma-modone-left"><img src="{!! $post->image !!}" class="all-img"></a><div class="ma-modone-right fl"><a href="/post/{!! $post->id !!}" target="_blank" class="ma-modone-right-title">{!! $post->name !!}</a><div class="ma-modone-right-content">{!! $post->brief !!}<a href="/post/{!! $post->id !!}" target="_blank" class="a-hover">[详细]</a></div><div class="ma-modone-right-time">{!! $post->created_at->format('Y-m-d') !!}</div></div></div>
                        @endforeach
                    </div>

    </div>

</div>

                <!--/.推荐阅读-->

            </div>
            <div class="right fr">

                <!--.搜索-->
                    
                        <form class="search clearfix"  action="/">
                            <input type="text" name="word" class="fl search-inp" placeholder="请输入关键字">
                  
                            <button class="fl search-btn" type="submit">
                                搜索
                            </button>
                        </form>
                  
                <!--/.搜索-->


                <!--.图片广告-->
                    <div style="margin-bottom: 20px">
        <fh-ad-plus fh-ad-pid="27"></fh-ad-plus>
    </div>
    <!--/.PC问答右侧关注广告位-->                <!--/.图片广告-->

             

              @include('front.partial.right')
    
            </div>

                <!--/.猜你喜欢-文章-->
            </div>

        </div>
    </div>
</div>
@endsection
