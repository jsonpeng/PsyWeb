@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Post Items
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'postItems.store']) !!}

                        @include('post_items.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
