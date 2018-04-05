<table class="table table-responsive" id="postItems-table">
    <thead>
        <tr>
            <th>Key</th>
        <th>Name</th>
        <th>Value</th>
        <th>Post Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($postItems as $postItems)
        <tr>
            <td>{!! $postItems->key !!}</td>
            <td>{!! $postItems->name !!}</td>
            <td>{!! $postItems->value !!}</td>
            <td>{!! $postItems->post_id !!}</td>
            <td>
                {!! Form::open(['route' => ['postItems.destroy', $postItems->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('postItems.show', [$postItems->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('postItems.edit', [$postItems->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>