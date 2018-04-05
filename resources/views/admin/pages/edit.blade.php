@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            编辑页面
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <!--div class="box box-primary">
           <div class="box-body"-->
               <div class="row">
                   {!! Form::model($page, ['route' => ['pages.update', $page->id], 'method' => 'patch']) !!}

                        @include('admin.pages.fields', ['page' => $page])

                   {!! Form::close() !!}
               </div>
           <!--/div>
       </div-->
       @include('admin.partial.imagemodel')
   </div>
@endsection