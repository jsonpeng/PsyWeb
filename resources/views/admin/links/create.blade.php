@extends('layouts.app')

@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'links.store']) !!}

                        @include('admin.links.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
