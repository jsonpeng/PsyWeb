<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', '菜单名称:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('slug', '别名(英文字母):') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('menus.index') !!}" class="btn btn-default">取消</a>
</div>
