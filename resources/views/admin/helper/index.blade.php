@extends('layouts.app')

@section('content')
    <style type="text/css">
        h1,h2,h3,h4,h5,h6{
            font-size: 24px;
            margin-top: 30px;
            margin-bottom: 15px;
            color: #666;
        }
        .box-body ul{list-style: none; margin-left: 15px; padding-left: 0;}
        .box-body ul li{font-size: 18px; line-height: 36px; color: #999;}

    </style>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <h1>横幅设置</h1>
                <ul>
                    <li>新建“首页横幅”，别名设置为main</li>
                    <li>在main下添加图片，目前图片大小为640x320</li>
                </ul>
                <h1>设置文章分类</h1>
                <ul>
                    <li>设置分类名称 课程介绍，别名默认</li>
                    <li>--课程介绍的图片大小为240x150</li>
                    <li>设置分类名称 父母课堂，别名默认</li>
                    <li>--父母课堂的图片大小为580x195</li>
                </ul>
                <h1>设置页面</h1>
                <ul>
                    <li>设置页面 师资团队，别名teacher</li>
                    <li>设置页面 在线报名，别名appointment</li>
                    <li>设置页面 为什么选择我们，别名reason</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
