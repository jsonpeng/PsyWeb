@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            联系方式
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::model($setting, ['route' => ['settings.update', $setting->id], 'method' => 'patch']) !!}

                        <!-- Contactor Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('contactor', '联系人:') !!}
                            {!! Form::text('contactor', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Mobile Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('mobile', '联系电话(手机):') !!}
                            {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Tel Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('tel', '联系电话(座机):') !!}
                            {!! Form::text('tel', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Tel Tousu Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('tel_tousu', '投诉电话:') !!}
                            {!! Form::text('tel_tousu', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Weixin Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('weixin', '微信二维码:') !!}
                            <div class="input-append">
                                {!! Form::text('weixin', null, ['class' => 'form-control', 'id' => 'weixin']) !!}
                                <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('weixin')">选择图片</a>
                                <img src="@if($setting) {{$setting->weixin}} @endif" style="max-width: 100%; max-height: 150px; display: block;">
                            </div>
                        </div>

                        <!-- Qq Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('qq', 'QQ:') !!}
                            {!! Form::text('qq', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12">
                            {!! Form::label('email', '管理员邮箱(接收客户信息):') !!}
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Address Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('address', '地址:') !!}
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @include('admin.partial.imagemodel')
    </div>
@endsection
