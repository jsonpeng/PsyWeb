@extends('layouts.app')

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($link, ['route' => ['links.update', $link->id], 'method' => 'patch']) !!}

                        @include('admin.links.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection