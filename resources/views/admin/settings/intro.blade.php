@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            公司介绍
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::model($setting, ['route' => ['settings.update', $setting->id], 'method' => 'patch']) !!}

                        <!-- Intro Field -->
                        <div class="form-group col-sm-12 col-lg-12">
                            {!! Form::label('intro', '网站介绍:') !!}
                            {!! Form::textarea('intro', null, ['class' => 'form-control intro']) !!}
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
