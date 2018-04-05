@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            编辑自定义文章类型
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($customPostType, ['route' => ['customPostTypes.update', $customPostType->id], 'method' => 'patch']) !!}

                        @include('admin.custom_post_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection