<table class="table table-responsive" id="categories-table">
    <thead>
        <tr>
            <th>名称</th>
            <th>别名</th>
            <th>链接</th>
            <th>图像</th>
            <th>排序</th>
            <th>父分类</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td @if ($category->parent_id != 0) style="padding-left: 20px;" @endif>{!! $category->name !!}</td>
            <td>{!! $category->slug !!}</td>
            <td>{!! $baseurl !!}/cat/{!! $category->id !!} 或 {!! $baseurl !!}/cat/{!! $category->slug !!}</td>
            <td><img src="{{ asset($category->image) }}" style="height: 25px;"></td>
            <td>{!! $category->sort !!}</td>
            <td>{!! $category->parent !!}</td>
            
            <td>
                {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! $baseurl !!}/cat/{!! $category->id !!}" target="_blank" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('categories.edit', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>