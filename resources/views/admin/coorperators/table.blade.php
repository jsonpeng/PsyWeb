<table class="table table-responsive" id="coorperators-table">
    <thead>
        <tr>
            <th>名称</th>
            <th>图像</th>
            <th>链接</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($coorperators as $coorperator)
        <tr>
            <td>{!! $coorperator->name !!}</td>
            <td><img src="{{ asset($coorperator->image) }}" style="height: 50px;"></td>
            <td>{!! $coorperator->link !!}</td>
            <td>
                {!! Form::open(['route' => ['coorperators.destroy', $coorperator->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!--a href="{!! route('coorperators.show', [$coorperator->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a-->
                    <a href="{!! route('coorperators.edit', [$coorperator->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确认删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>