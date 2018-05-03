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
        不好意思，对方并未把你加入允许访问列表==<a href="javascript:history.go(-1);">点击返回</a>
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
