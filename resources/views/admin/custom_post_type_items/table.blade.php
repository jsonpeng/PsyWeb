<table class="table table-responsive" id="customPostTypeItems-table">
    <thead>
        <tr>
        <th>字段名称</th>
        <th>描述</th>
        <th>表单类型</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($customPostTypeItems as $customPostTypeItems)
        <tr>
            <td>{!! $customPostTypeItems->name !!}</td>
            <td>{!! $customPostTypeItems->des !!}</td>
            <td>{!! $customPostTypeItems->type !!}</td>
            <td>
                {!! Form::open(['route' => ['customPostTypeItems.destroy', $customPostType->id,$customPostTypeItems->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                 
                    <a href="{!! route('customPostTypeItems.edit', [$customPostType->id,$customPostTypeItems->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>