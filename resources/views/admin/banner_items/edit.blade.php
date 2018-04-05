@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{$banner->name}}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bannerItem, ['route' => ['bannerItems.update', $banner_id, $bannerItem->id], 'method' => 'patch']) !!}
                        <input type="hidden" name="banner_id" value="{{$bannerItem->banner_id}}">
                        @include('admin.banner_items.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
   @include('admin.partial.imagemodel')
@endsection