@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            阅读设置
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::model($setting, ['route' => ['settings.update', $setting->id], 'method' => 'patch']) !!}

                        <!-- Post Page Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('post_page', '每页显示文章数量:') !!}
                            {!! Form::number('post_page', null, ['class' => 'form-control']) !!}
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
