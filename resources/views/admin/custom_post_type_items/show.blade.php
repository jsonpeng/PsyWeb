@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Custom Post Type Items
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.custom_post_type_items.show_fields')
                    <a href="{!! route('customPostTypeItems.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
