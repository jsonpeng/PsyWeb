
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', '名称:') !!}
    <p>{!! $category->name !!}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', '别名:') !!}
    <p>{!! $category->slug !!}</p>
</div>

<!-- Sort Field -->
<div class="form-group">
    {!! Form::label('sort', '排序:') !!}
    <p>{!! $category->sort !!}</p>
</div>

<!-- Parent Id Field -->
<div class="form-group">
    {!! Form::label('parent_id', '父分类:') !!}
    <p>{!! $category->parent !!}</p>
    
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', '图像:') !!}
    <p> <img src="{!! $category->image !!}" style="height: 200px;">  </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', '创建时间:') !!}
    <p>{!! $category->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', '修改时间:') !!}
    <p>{!! $category->updated_at !!}</p>
</div>

