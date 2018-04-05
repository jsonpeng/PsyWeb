@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">自定义文章类型列表</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('customPostTypes.create') !!}">添加一个新的文章类型</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.custom_post_types.table')
            </div>
        </div>
    </div>
@endsection

