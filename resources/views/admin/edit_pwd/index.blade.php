@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            修改密码
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['settings.pwd_update', $user->id], 'method' => 'post']) !!}

                        @include('admin.edit_pwd.fields', ['user'=>$user])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
   @include('admin.partial.imagemodel')
@endsection


@section('scripts')
<script type="text/javascript">
  $('#newpwd,#oldpwd').keyup(function(){
    var oldpwd=$('#oldpwd').val();
    var newpwd=$('#newpwd').val();
    if(newpwd==oldpwd && newpwd!='' && oldpwd !=''){
       $('#save_pwd').removeAttr("disabled");
       console.log('解除');
    }else{
       $('#save_pwd').attr('disabled','disabled');
       console.log('禁用');
    }
  });
</script>
@endsection