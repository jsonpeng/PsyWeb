<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', '名称(必填):') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->

<div class="form-group col-sm-12">
    {!! Form::label('slug', '别名:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-12">
    {!! Form::label('image', '图像:') !!}

    <div class="input-append">
        {!! Form::text('image', null, ['class' => 'form-control', 'id' => 'image']) !!}
        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button">选择图片</a>
        <img src="@if($category) {{$category->image}} @endif" style="max-width: 100%; max-height: 150px; display: block;">
    </div>
</div>

<!-- Sort Field -->
<div class="form-group col-sm-12">
    {!! Form::label('sort', '排序:') !!}
    {!! Form::number('sort', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('parent_id', '父分类:') !!}
    {!! Form::select('parent_id', $categories, $parent_id , ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('seo_title', 'SEO标题:') !!}
    {!! Form::text('seo_title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('seo_keyword', 'SEO关键字:') !!}
    {!! Form::text('seo_keyword', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('seo_des', 'SEO描述:') !!}
    {!! Form::text('seo_des', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categories.index') !!}" class="btn btn-default">取消</a>
</div>
