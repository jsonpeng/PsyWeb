<!-- Key Field -->
<div class="form-group col-sm-12">
    {!! Form::label('key', '字段名:') !!}
    {!! Form::text('key', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', '描述:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-12">
    {!! Form::label('type', '表单类型:') !!}
     <select class="form-control"  name="type" >
    <option  value="image"   @if(!empty($pageItems))@if($pageItems->type=="image") selected @endif @endif>image(适用于上传图片)</option>
    <option  value="text"   @if(!empty($pageItems))@if($pageItems->type=="text") selected @endif @endif>text(适用于单行文本)</option>
    <option  value="textarea"   @if(!empty($pageItems))@if($pageItems->type=="textarea") selected @endif @endif>textarea(适用于多行文本,可编辑添加图片)</option>
    <option  value="number"   @if(!empty($pageItems))@if($pageItems->type=="number") selected @endif @endif>number(适用于简单的数字)</option>
  </select>  
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pageItems.index',$page->id) !!}" class="btn btn-default">返回</a>
</div>
