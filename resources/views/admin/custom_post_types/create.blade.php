@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            创建自定义文章类型
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'customPostTypes.store']) !!}

                        @include('admin.custom_post_types.fields',['customPostType'=>''])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
