@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            添加一个自定义类型
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'customPageTypes.store']) !!}

                        @include('admin.custom_page_types.fields',['customPageType'=>''])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
