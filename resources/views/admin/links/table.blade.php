<table class="table table-responsive" id="links-table">
    <thead>
        <tr>
            <th>名称(必填)</th>
            <th>链接(必填)</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($links as $link)
        <tr>
            <td>{!! $link->name !!}</td>
            <td>{!! $link->link !!}</td>
            <td>
                {!! Form::open(['route' => ['links.destroy', $link->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!--a href="{!! route('links.show', [$link->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a-->
                    <a href="{!! route('links.edit', [$link->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确认删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>