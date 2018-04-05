<table class="table table-responsive" id="messages-table">
    <thead>
        <tr>
            <th>姓名</th>
            <th>邮箱</th>
            <th>电话</th>
            <th>留言</th>
            <th>日期</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($messages as $message)
        <tr>
            <td>{!! $message->name !!}</td>
            <td>{!! $message->email !!}</td>
            <td>{!! $message->tel !!}</td>
            <td>{!! $message->info !!}</td>
            <td>{!! $message->created_at !!}</td>
            <td>
                {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确认删除?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>