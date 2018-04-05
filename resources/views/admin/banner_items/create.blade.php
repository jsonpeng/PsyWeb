@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{$banner->name}}
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => ['bannerItems.store', $banner_id]]) !!}
                        <input type="hidden" name="banner_id" value="{{$banner_id}}">
                        @include('admin.banner_items.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @include('admin.partial.imagemodel')
@endsection
