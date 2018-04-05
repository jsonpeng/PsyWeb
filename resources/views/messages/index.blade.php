@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('messages.table')
            </div>
        </div>

        <div style="text-align: center;">{{$messages->links()}}</div>
    </div>
@endsection

