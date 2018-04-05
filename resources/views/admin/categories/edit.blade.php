@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            编辑分类
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch']) !!}

                        @include('admin.categories.fields', ['categories' => $categories, 'parent_id' => $category->parent_id, 'category' => $category])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
   @include('admin.partial.imagemodel')
@endsection