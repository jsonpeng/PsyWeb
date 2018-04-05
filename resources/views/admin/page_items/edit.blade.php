@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
         {!! $page->name !!}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pageItems, ['route' => ['pageItems.update',$page->id, $pageItems->id], 'method' => 'patch']) !!}

                        @include('admin.page_items.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection