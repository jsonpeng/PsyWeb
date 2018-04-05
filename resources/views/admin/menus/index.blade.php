@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">菜单管理</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="{!! route('menus.create') !!}">添加</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.menus.table')
            </div>
        </div>
    </div>
@endsection
