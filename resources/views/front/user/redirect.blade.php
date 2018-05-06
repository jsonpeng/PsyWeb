@extends('front.partial.base')

@section('css')
    <style type="text/css">
    .container{
        width:970px;
    }
    .mt30{
        margin-top:30px;
    }
    .pb25{
        padding-bottom: 25px;
    }
    </style>
@endsection



@section('content')


    <div class="container mt30">
       <div class="add_friend_access access_option" style="text-align: left;font-size: 16px;">
                        <p>主人设置了权限，您可通过以下方式访问</p>
                        <p class="access_tips"><i class="ico_add"></i>加为好友后访问&nbsp;&nbsp;</p>
                        <p class="links"><a class="btn_v2" href="javascript:;" data-cmd="add_friend" data-click="addfriends.applyfriends">✚&nbsp;加为好友</a>
                        </p>
                        <p class="access_tips"><i class="ico_apply"></i>你还可以&nbsp;&nbsp;<a href="javascript:;" data-cmd="apply_request" data-click="application_access.button">申请访问</a></p>   
                 
        </div>
    </div>

</div>
@endsection


@section('js')
<script type="text/javascript" src="{!! asset('vendor/layui/layui.js') !!}"></script>

<script type="text/javascript">
    $(function(){
        // alert('你没有权限访问我的空间!');
        // location.href="/";
    });
</script>

</script>
@endsection
