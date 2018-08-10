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
    .usercenter-guanzhu{
        position: absolute;
        bottom: 40px;
        margin-left: 168px;
        border: 1px solid red;
        color: white;
        padding: 0px 5px;
        border-radius: 25px;
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
                <span data-id="{!! $user->id !!}" data-name="{!! $user->name !!}" >{!! $user->name !!}</span>

                <div class="usercenter-qianming">{{ $user->motto }}</div>   
            </div>
          <!--   @if($user->id != Auth::user()->id)<a class="usercenter-guanzhu">加好友</a>@endif -->
           @if($user->id == Auth::user()->id)<span class="usercenter-touxiang-change-text" id="user_image">更换头像</span>@endif

        </div>
    </div>
    @if($access)
    <div class="container pb25">

        <div class="pl0pr0" style="min-height:500px;background:#fff;">
            <ul class="content-tab"> 

                <li class="li-tab active"><a id="baidutab" href="#" class="tab-title songti tabbtn" hidefocus="" data-click="baidu"><span class="tab-title-tag">我的首页</span></a> 
                </li>

                <li class="li-tab"><a id="tiebatab" href="#" class="tab-title songti tabbtn" hidefocus="" data-click="friends"><span class="tab-title-tag">我的好友</span></a> 
                </li>

                <li class="li-tab"><a id="tiebatab" href="#" class="tab-title songti tabbtn" hidefocus="" data-click="tieba"><span class="tab-title-tag">我的收藏</span></a> 
                </li>

                <li class="li-tab"><a id="zhidaotab" href="#" class="tab-title songti tabbtn" hidefocus="" data-click="zhidao"><span class="tab-title-tag">我的吐槽</span></a>   
                 </li>

            </ul> 

                <div class="usercenter-content-box" >
                     <form id="form_user" >
                        <div style='width:350px; padding: 0 15px;'><div style='width:320px;' class='form-group has-feedback'><p>昵称</p><input  class='form-control' type='text'  name='name' value='{{ $user->name }}' /></div>
                        <div style='width:320px;' class='form-group has-feedback'><p>性别</p><select class="form-control" name="sex" ><option style="font-size:16px;font-family:'微软雅黑';font-style:italic ;" value="男" @if($user->sex == '男') selected="selected" @endif>男</option><option style="font-size:16px;font-family:'微软雅黑';font-style:italic ;" value="女" @if($user->sex == '女') selected="selected" @endif>女</option></select></div>
                        <div style='width:320px;' class='form-group has-feedback'><p>生日</p><input  class='form-control' type='text'  name='birthday' value='{{ $user->birthday }}' /></div>
                        <div style='width:320px;' class='form-group has-feedback'><p>星座</p><select class="form-control" name="xingzuo">@foreach($config_user['星座'] as $v)<option style="font-size:16px;font-family:'微软雅黑';font-style:italic ;"           value="{{ $v }}" @if($user->xingzuo == $v) selected="selected" @endif>{{ $v }}</option>@endforeach</select></div>
                        <div style='width:320px;' class='form-group has-feedback'><p>兴趣爱好</p><select class="form-control" name="like">@foreach($config_user['兴趣爱好'] as $v)<option  style="font-size:16px;font-family:'微软雅黑';font-style:italic ;"       value="{{ $v }}" @if($user->like == $v) selected="selected" @endif>{{ $v }}</option>@endforeach</select></div>
                        <div style='width:320px;' class='form-group has-feedback'><p>座右铭</p><input  class='form-control' type='text'  name='motto' value='{{ $user->motto }}' /></div>
                        <div style='width:320px;' class='form-group has-feedback'><p>地址</p><input  class='form-control' type='text'  name='addresss' value='{{ $user->addresss }}' /></div>
                        <div style='width:320px;' class='form-group has-feedback'><p>职业</p><select class="form-control" name="job">@foreach($config_user['职业'] as $v)<option   style="font-size:16px;font-family:'微软雅黑';font-style:italic ;"            value="{{ $v }}" @if($user->job == $v) selected="selected" @endif>{{ $v }}</option>@endforeach</select></div>
                        <button style='margin-top:5%;margin-bottom:5%;' type='button' class='btn  btn-primary btn-lg' onclick="updateUserInfo('{{ $user->id }}')">保存</button>
                    </div>
                    </form>
               </div>

               <div class="usercenter-content-box" style="display: none;">
                       @foreach($friends_list as $item)
                        <a href="/usercenter/{!! $item->id !!}" target="_blank"><img src="{!! empty($item->head_image) ? '/uploads/touuxiang.jpg' : $item->head_image !!}"/>&nbsp;&nbsp;{!! $item->name !!}</a>
                        @endforeach
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
    @else
    <div class="container mt30" style="padding-left: 0px;padding-right: 0px;">
       <div class="add_friend_access access_option" style="text-align: left;font-size: 16px;margin-left: 15px;">
                        <p>主人设置了权限，您可通过以下方式访问</p>
                        <p class="access_tips"><i class="ico_add"></i>加为好友后访问&nbsp;&nbsp;</p>
                        <p class="links"><a class="btn_v2" data-id="{!! $user->id !!}" href="javascript:;">✚&nbsp;加为好友</a>
                        </p>
                        <p class="access_tips"><i class="ico_apply"></i>你还可以&nbsp;&nbsp;<a href="javascript:;" data-cmd="apply_request" data-click="application_access.button">申请访问</a></p>   
                 
        </div>
    </div>
    @endif
</div>


</div>
@endsection


@section('js')
<script type="text/javascript" src="{!! asset('vendor/layui/layui.js') !!}"></script>
<script type="text/javascript">

@if($user->id != Auth::user()->id)
$(function(){
    $('input').attr('readOnly','readOnly');
    $('select,button').attr('disabled','disabled');

});
@endif

//加好友
$(function(){
    $('.btn_v2').click(function(){
        var friend_id = $(this).data('id');
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        $.ajax({
            url: '/auth/make_friends/'+friend_id,
            type: 'POST',
            success: function(data) {
                if(data.code == 0){
                    alert(data.message);
                    location.reload();
                }else{
                    alert(data.message);
                }
            }
        });

    });
});
//更新用户信息
function updateUserInfo(id){
       console.log($('#form_user').serialize());
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        $.ajax({
            url: '/auth/update/'+id,
            type: 'POST',
            data:$('#form_user').serialize(),
            success: function(data) {
                if(data.code == 0){
                    alert('更新成功');
                    location.reload();
                }
                else{
                    alert('更新失败');
                }
            }
        });
}

$(function(){
    //tab切换
    $('.li-tab').click(function(){
            $('.li-tab').removeClass('active');
            $(this).addClass('active');
            $('.usercenter-content-box').hide();
            $('.usercenter-content-box').eq($(this).index()).show(500);
    });


    $('.usercenter-head-image-box > span').click(function(){
        var user_id= $(this).data('id');
        var name =$(this).data('name');
       layer.open({
        type: 1,
        closeBtn: false,
        shift: 7,
        shadeClose: true,
        title:name+'的个人信息',
        content:$('#userinfo').html()
         });
     
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
