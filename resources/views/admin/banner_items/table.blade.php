<table class="table table-responsive" id="bannerItems-table">
    <thead>
        <tr>
            <th>图片</th>
            <th>链接</th>
            <th>排序</th>
            <th>描述</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($bannerItems as $bannerItem)
        <tr>
            <td><img src="{!! $bannerItem->image !!}" style="height: 50px;"> </td>
            <td>{!! $bannerItem->link !!}</td>
            <td>{!! $bannerItem->sort !!}</td>
            <td>{!! $bannerItem->word !!}</td>
            <td>
                {!! Form::open(['route' => ['bannerItems.destroy',$banner_id,  $bannerItem->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('bannerItems.edit', [$banner_id, $bannerItem->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>