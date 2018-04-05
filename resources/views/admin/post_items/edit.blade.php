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
                   {!! Form::model($postItems, ['route' => ['postItems.update', $postItems->id], 'method' => 'patch']) !!}

                        @include('post_items.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection