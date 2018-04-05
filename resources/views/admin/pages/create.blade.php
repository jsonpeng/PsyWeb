@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            创建页面
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <!--div class="box box-primary">

            <div class="box-body"-->
                <div class="row">
                    {!! Form::open(['route' => 'pages.store']) !!}

                        @include('admin.pages.fields', ['page' => null])

                    {!! Form::close() !!}
                </div>
            <!--/div>
        </div-->
        @include('admin.partial.imagemodel')
    </div>
@endsection
