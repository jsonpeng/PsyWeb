@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            SEO设置
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::model($setting, ['route' => ['settings.update', $setting->id], 'method' => 'patch']) !!}

                        <!-- Site Name Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('site_name', '网站名称:') !!}
                            {!! Form::text('site_name', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Key Words Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('key_words', '网站关键字:') !!}
                            {!! Form::text('key_words', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Description Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('description', '网站描述:') !!}
                            {!! Form::text('description', null, ['class' => 'form-control']) !!}
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
