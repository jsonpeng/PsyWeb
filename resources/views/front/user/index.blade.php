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
        z-index: 0;
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
    input[type=file] {
    display: none;
    }
    .usercenter-content-box > a{
        display: inline-block;
        /*border: 1px solid black;*/
        width:100%;
        padding-left: 15px;
        padding-top: 15px;
        padding-bottom: 15px;
        border-bottom: .6px solid #ddd;
    }
    .usercenter-content-box > a > img{
        max-height: 80px;
        width: 80px;
    }
    .usercenter-content-box > a:hover{
        color: #ff5f5f;
    }
    .pb25{
        padding-bottom: 25px;
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
            <span class="usercenter-touxiang-change-text" id="user_image">更换头像</span>

        </div>
    </div>

    <div class="container pb25">

        <div class="pl0pr0" style="min-height:500px;background:#fff;">
            <ul class="content-tab"> 

                <li class="li-tab active"><a id="baidutab" href="#" class="tab-title songti tabbtn" hidefocus="" data-click="baidu"><span class="tab-title-tag">我的首页</span></a> 
                </li>

                <li class="li-tab"><a id="tiebatab" href="#" class="tab-title songti tabbtn" hidefocus="" data-click="tieba"><span class="tab-title-tag">我的收藏</span></a> 
                </li>

                <li class="li-tab"><a id="zhidaotab" href="#" class="tab-title songti tabbtn" hidefocus="" data-click="zhidao"><span class="tab-title-tag">我的评论</span></a>   
                 </li>

            </ul> 

                <div class="usercenter-content-box" >
                    首页
              
               </div>

               <div class="usercenter-content-box" style="display: none;">
                        @foreach($collections_list as $item)
                        <a href="/post/{!! $item->id !!}" target="_blank">{!! $item->name !!}</a>
                        @endforeach
               </div>

               <div class="usercenter-content-box pb25" style="display: none;">
                        @foreach($my_pinglun as $item)
                        <a style="position: relative;"><span style="color: #bbb;">{!! $item->time !!}:</span>吐槽内容:{!! $item->info !!}
                        @endforeach
              
               </div>
               
        </div>
    </div>

</div>
@endsection


@section('js')
<script type="text/javascript" src="{!! asset('vendor/layui/layui.js') !!}"></script>
<script type="text/javascript">
$(function(){
    //tab切换
    $('.li-tab').click(function(){
            $('.li-tab').removeClass('active');
            $(this).addClass('active');
            $('.usercenter-content-box').hide();
            $('.usercenter-content-box').eq($(this).index()).show(500);
    });
    //头像上传
    layui.use('upload', function(){
      var upload = layui.upload;
       
      //执行实例
      var uploadInst = upload.render({
        elem: '#user_image' //绑定元素
        ,url: '/auth/uploads' //上传接口
        ,done: function(res){
          //上传完毕回调
          if(res.code==0){
            //替换当前头像
            $('#user_image').parent().find('img').attr('src',res.message.src
                );
            //替换网页的图标
            $('link[rel=icon]').attr('href',res.message.src);
            $('.all-img').attr('src',res.message.src);

          }
        }
        ,error: function(){
          //请求异常回调
          alert('上传异常');
          return false;
        }
      });
    });
});
</script>
@endsection
