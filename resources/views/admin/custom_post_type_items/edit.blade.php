@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           {!! $customPostType->name !!}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($customPostTypeItems, ['route' => ['customPostTypeItems.update',$customPostType->id, $customPostTypeItems->id], 'method' => 'patch']) !!}

                        @include('admin.custom_post_type_items.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection