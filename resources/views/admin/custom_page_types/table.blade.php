<table class="table table-responsive" id="customPageTypes-table">
    <thead>
        <tr>
        <th>名称</th>
        <th>别名</th>
        <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($customPageTypes as $customPageType)
        <tr>
            <td>{!! $customPageType->name !!}</td>
            <td>{!! $customPageType->slug !!}</td>
            <td>
                {!! Form::open(['route' => ['customPageTypes.destroy', $customPageType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pageItems.index', [$customPageType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('customPageTypes.edit', [$customPageType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>