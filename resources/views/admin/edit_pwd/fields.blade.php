<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', '当前账号:') !!}
    {!! Form::text('email', null, ['class' => 'form-control','disabled'=>'disabled']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-12">
    {!! Form::label('passwords', '新密码:') !!}
    {!! Form::text('passwords', null, ['class' => 'form-control','id'=>'oldpwd']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('newpassword', '确认密码:') !!}
    {!! Form::text('newpassword', null, ['class' => 'form-control','id'=>'newpwd']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary','id'=>'save_pwd','disabled'=>'disabled']) !!}
    <a href="/zcjy" class="btn btn-default">返回</a>
</div>
