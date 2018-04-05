
<!-- Slug Field -->
<div class="form-group col-sm-12">
    {!! Form::label('slug', '选择一个页面进行自定义:') !!}
    @if(count($all)==0)
         <a href="{!! route('pages.create') !!}" class="btn btn-primary">创建页面</a>
      @else
      <select class="form-control"  name="slug">
             @foreach($all as $cat)
                    <option  value="{!! $cat->slug !!}"   @if(!empty($customPageType))@if($cat->slug== $customPageType->slug) selected @endif @endif>{!! $cat->name !!}</option>
             @endforeach
      </select>   
      @endif 
</div>

<!-- Des Field -->
<div class="form-group col-sm-12">
    {!! Form::label('des', '描述:') !!}
    {!! Form::text('des', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('下一步', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('customPageTypes.index') !!}" class="btn btn-default">返回</a>
</div>
