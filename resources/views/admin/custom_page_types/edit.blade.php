@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            修改自定义类型
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($customPageType, ['route' => ['customPageTypes.update', $customPageType->id], 'method' => 'patch']) !!}

                        @include('admin.custom_page_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection