@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            创建分类
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'categories.store']) !!}

                        @include('admin.categories.fields', ['categories' => $categories, 'parent_id' => 0, 'category' => null])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @include('admin.partial.imagemodel')
@endsection
