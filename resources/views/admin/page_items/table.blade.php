<table class="table table-responsive" id="pageItems-table">
    <thead>
        <tr>
        <th>字段名</th>
        <th>描述</th>
        <th>表单类型</th>
        <th colspan="2">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pageItems as $pageItems)
        <tr>
            <td>{!! $pageItems->key !!}</td>
            <td>{!! $pageItems->name !!}</td>
            <td>{!! $pageItems->type !!}</td>     
             <td>
                {!! Form::open(['route' => ['pageItems.destroy', $page->id,$pageItems->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                 
                    <a href="{!! route('pageItems.edit', [$page->id,$pageItems->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>