@extends('front.partial.base')

@section('css')
    <style type="text/css">
    .container{
        width:970px;
    }
    .mt30{
        margin-top:30px;
    }
    .usercenter-bg-box{
        width: 100%;
        height: 300px;
        overflow: hidden;
        z-index: 2;
        position:relative;
    }
    .usercenter-head-image-box{
        position:absolute;
        bottom:0;
        height:80px;
        left:0;
    }
    .usercenter-head-image-box>img{
        width: 58px;
        height: 58px;
        margin-top: 6px;
        overflow: hidden;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        margin-right: 6px;
        margin-left:50px;
    }
    .usercenter-head-image-box>span{
        color:white;
        font-size:16px;
    }
    .usercenter-touxiang-change-text{
        position:absolute;
        bottom:-3px;
        margin-left:55px;
        font-size:12px;
        color:#ff5f5f;
    }
    .usercenter-qianming{
       position:absolute;
        bottom:0px;
        margin-left:120px;
        font-size:12px;
        color:white;
        display:inline-block;
        width: 128px;
    }
    .content-tab{
        height: 50px;
        padding-top: 12px;
        background: #fff;
        padding-left: 20px;
        border-right: 1px solid #c7d8ee;
        border-left: 1px solid #c7d8ee;
    }
    .content-tab li{
        float: left;
        border-width: 1px 1px 0 0;
        border-radius: 3px 3px 0 0;
        -moz-border-radius: 3px 3px 0 0;
        -webkit-border-radius: 3px 3px 0 0;
        border-style: solid;
        border-color: #c4cdd6;
        background-color: #f7f7f7;
        padding: 14px 30px;
        font-family: arial,\5b8b\4f53,sans-serif;
    }
    .content-tab>.li-tab.active{
        background-color: #639bd3;
        border-color: #5f9edd;

    }
    .content-tab>.li-tab.active>a{
        color:white;
    }
    #cnthld .content-tab .tab-title {
        display: inline-block;
        padding: 0 20px;
        height: 38px;
        line-height: 38px;
        color: #555;
        font-size: 14px;
        font-weight: bold;
   }
   .pl0pr0{
         padding-left:0px !important;
         padding-right:0px !important;
   }
   .usercenter-content-box{
        border-top: solid;
        border-color: #6699c9 #c7d8ee #c7d8ee;
        border-width: 2px 1px 1px;
        padding-left:20px;
        padding-top:15px;
   }
   .header-b-box {
    background-color:#d5e7ff;
    }
    </style>
@endsection



@section('content')
<div class="usercenter-box" style="width:100%;background-color:#d5e7ff;min-height:800px;">

    <div class="container mt30">
        <div class="usercenter-bg-box" style="background:url('/uploads/head_bg_f5cf0b2f.jpg')">
            <div class="usercenter-head-image-box">
                <img src="{!! empty($user->head_image)?'/uploads/touuxiang.jpg':$user->head_image !!}">
                <span>{!! $user->name !!}</span>

                <div class="usercenter-qianming">暂时没有留下什么签名...</div>
            </div>
            <span class="usercenter-touxiang-change-text">更换头像</span>

        </div>
    </div>

    <div class="container">

        <div class="pl0pr0" style="min-height:500px;background:#fff;">
                <ul class="content-tab"> 

                <li class="li-tab active"><a id="baidutab" href="#" class="tab-title songti tabbtn" hidefocus="" data-click="baidu"><span class="tab-title-tag">我的首页</span></a> </li>

                <li class="li-tab"><a id="tiebatab" href="#" class="tab-title songti tabbtn" hidefocus="" data-click="tieba"><span class="tab-title-tag">我的收藏</span></a> </li>

                <li class="li-tab"><a id="zhidaotab" href="#" class="tab-title songti tabbtn" hidefocus="" data-click="zhidao"><span class="tab-title-tag">我的评论</span></a>        </li>

                </ul> 

                <div class="usercenter-content-box" >首页内容</div>
        </div>
    </div>

</div>
@endsection


@section('js')
<script type="text/javascript">
$(function(){
    $('.li-tab').click(function(){
            $('.li-tab').removeClass('active');
            $(this).addClass('active');
            $('.usercenter-content-box').html($(this).find('a').text());
    });
});
</script>
@endsection
