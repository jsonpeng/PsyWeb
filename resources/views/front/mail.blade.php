
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width">
        
    </head>
    <body>
    	<div>芸来软件提醒您，您收到了顾客留言：</div>
       	<div>姓名：@if($name){{$name}}@endif</div>
		    <div>邮箱：@if($email){{$email}}@endif</div>
       	<div>电话：@if($tel){{$tel}}@endif</div>
       	<div>信息：@if($info){{$info}}@endif</div>

       	<a style="margin-top: 50px; display: block;" href="http://www.yunlike.cn" >芸来软件 www.yunlike.cn</a>
    </body>
</html>