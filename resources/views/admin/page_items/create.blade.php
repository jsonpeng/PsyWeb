@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            添加字段
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => ['pageItems.store',$page->id]]) !!}

                        @include('admin.page_items.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
