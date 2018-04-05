
<!-- Slug Field -->
<div class="form-group col-sm-12">
  {!! Form::label('slug', '选择一个分类进行自定义:') !!}
    @if(count($cats)==0)
         <a href="{!! route('categories.create') !!}" class="btn btn-primary">创建分类</a>
      @else
      <select class="form-control"  name="slug" id="cat_select" >
             @foreach($cats as $cat)
                    <option  value="{!! $cat->slug !!}"   @if(!empty($customPostType))@if($cat->slug== $customPostType->slug) selected @endif @endif>{!! $cat->name !!}</option>
             @endforeach
      </select>   
      @endif 
</div>

<!-- Des Field -->
<div class="form-group col-sm-12">
    {!! Form::label('des', '自定义文章类型描述:') !!}
    {!! Form::text('des', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('下一步', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('customPostTypes.index') !!}" class="btn btn-default">返回</a>
</div>
