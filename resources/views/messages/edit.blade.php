@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Message
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($message, ['route' => ['messages.update', $message->id], 'method' => 'patch']) !!}

                        @include('messages.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection