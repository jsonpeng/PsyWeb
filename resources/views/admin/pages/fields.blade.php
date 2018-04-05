<!-- Name Field -->
<div class="form-group col-sm-8">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">页面正文</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <!-- Name Field -->
            <div class="form-group">
                {!! Form::label('name', '标题(必填):') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        
            <div class="form-group">
                {!! Form::label('slug', '别名:') !!}
                {!! Form::text('slug', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Content Field -->
            <div class="form-group">
                {!! Form::label('content', '正文(必填):') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control intro']) !!}
            </div>
        </div><!-- /.box-body -->
    </div>    
</div>

<!-- Submit Field -->
<div class="form-group col-sm-4">

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">发布设置</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                <label class="fb">{!! Form::checkbox('status', 1, null, ['class' => 'field minimal']) !!}发布</label>
            </div>

            {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('pages.index') !!}" class="btn btn-default">取消</a>
        </div><!-- /.box-body -->
    </div>

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">其他设置</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('image', '图像:') !!}

                <div class="input-append">
                    {!! Form::text('image', null, ['class' => 'form-control', 'id' => 'image']) !!}
                    <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button">选择图片</a>
                    <img src="@if($page) {{$page->image}} @endif" style="max-width: 100%; max-height: 150px; display: block;">
                </div>

            </div>

            <div class="form-group">
                {!! Form::label('view', '浏览量:') !!}
                {!! Form::number('view', null, ['class' => 'form-control']) !!}
            </div>

        </div><!-- /.box-body -->
    </div>

    @if(!empty($page))
      <div class="box box-solid" >
        <div class="box-header with-border">
            <h3 class="box-title">自定义字段</h3>
            <p class="text-muted">为<strong style="color:black;">{!! $page->name !!}</strong>单独扩充的字段</p>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?php $items=$page->pageItems()->get();?>
            @if(count($items)==0)
            <div class="form-group">
              <a href="{!! route('customPageTypes.index')!!}" target="_blank">添加字段</a>
            </div>
            @else
            <?php $a=1;?>
            <!--添加文章时字段默认为空-->
            @foreach($items as $attachs)
            <div class="form-group">
                {!! Form::label($attachs->key, $attachs->name) !!}
                <?php $attr=$attachs->type;?>
                @if($attr=='image')
                <?php $a++;?>
                 <div class="input-append">
                   {!! Form::text($attachs->key.'[]', $attachs->value, ['class' => 'form-control','id'=>'image'.$a]) !!}
                    <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('image{!! $a !!}')">选择图片</a>
                    <img src="{!! $attachs->value !!}" style="max-width: 100%; max-height: 150px; display: block;">
                </div>
                @else
                {!! Form::$attr($attachs->key.'[]', $attachs->value, ['class' => 'form-control']) !!}
                @endif
            </div>
            @endforeach
            @endif
        </div><!-- /.box-body -->
    </div>
@endif

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">SEO设置</h3>
            <p class="text-muted">可以为页面单独设置SEO，如果不设置，将使用网站默认设置</p>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('seo_title', 'SEO标题:') !!}
                {!! Form::text('seo_title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('seo_des', 'SEO描述:') !!}
                {!! Form::text('seo_des', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('seo_keyword', 'SEO关键词:') !!}
                {!! Form::text('seo_keyword', null, ['class' => 'form-control']) !!}
            </div>
        </div><!-- /.box-body -->
    </div>
</div>


