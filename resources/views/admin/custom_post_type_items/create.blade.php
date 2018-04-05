@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           {!! $customPostType->name !!}
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => ['customPostTypeItems.store',$customPostType->id]]) !!}
                        <input type="hidden" name="custom_post_type_id" value="{{$customPostType->id}}">
                        @include('admin.custom_post_type_items.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
