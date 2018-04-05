@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            其他设置
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="">
                    {!! Form::model($setting, ['route' => ['settings.update', $setting->id], 'method' => 'patch']) !!}

                        <!-- Logo Field -->
                        <!--div class="form-group">
                            {!! Form::label('logo', '网站LOGO:') !!}
                            {!! Form::text('logo', null, ['class' => 'form-control']) !!}
                        </div-->

                        <div class="form-group">
                            <label class="fb">{!! Form::checkbox('share', 1, null, ['class' => 'field minimal']) !!}显示社交分享按钮</label>
                        </div>

                        <div class="form-group">
                            <label class="fb">{!! Form::checkbox('yunlai', 1, null, ['class' => 'field minimal']) !!}显示芸来技术支持</label>
                        </div>

                        <!-- Logo Field -->
                        <div class="form-group">
                            {!! Form::label('banquan', '版权信息:') !!}
                            {!! Form::text('banquan', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Logo Field -->
                        <div class="form-group">
                            {!! Form::label('beian', '备案信息:') !!}
                            {!! Form::text('beian', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Logo Field -->
                        <div class="form-group">
                            {!! Form::label('js_tongji', 'JS访问量统计代码:') !!}
                            {!! Form::textarea('js_tongji', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
