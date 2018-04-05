@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">页面列表</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" href="{!! route('pages.create') !!}">添加</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="box box-primary">
            <div class="box-body">
                <form id="form_search">           
                    <div class="form-group col-md-2">
                        <label>名称</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="" @if (array_key_exists('name', $input)) value="{{$input['name']}}"@endif >
                    </div>

                    <div class="form-group col-md-2">
                        <label>发布状态</label>
                        <select class="form-control" name="status">
                            <option value="全部" @if (!array_key_exists('status', $input) || $input['status'] == '全部') selected="selected" @endif>全部</option>
                            <option value="1" @if (array_key_exists('status', $input) && $input['status'] == '1') selected="selected" @endif>已发布</option>
                            <option value="0" @if (array_key_exists('status', $input) && $input['status'] == '0') selected="selected" @endif>草稿</option>
                        </select>
                    </div>

                    <div class="form-group col-md-1">
                        <label>操作</label>
                        <button type="submit" class="btn btn-primary pull-right form-control" onclick="search()">查询</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.pages.table')
            </div>
        </div>
    </div>
@endsection

