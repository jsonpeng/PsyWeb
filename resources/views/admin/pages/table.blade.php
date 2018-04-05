<table class="table table-responsive" id="pages-table">
    <thead>
        <tr>
            <th>标题</th>
            <th>别名</th>
            <th>状态</th>
            <th>链接</th>
            <th>浏览量</th>
            <!--th>SEO标题</th>
            <th>SEO关键词</th>
            <th>SEO描述</th-->
            <th>图像</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pages as $page)
        <tr>
            <td>{!! $page->name !!}</td>
            <td>{!! $page->slug !!}</td>
            <td>{!! $page->publish !!}</td>
            <td>{!! $baseurl !!}/page/{!! $page->id !!} 或 {!! $baseurl !!}/page/{!! $page->slug !!}</td>
            <td>{!! $page->view !!}</td>
            <!--td>{!! $page->seo_title !!}</td>
            <td>{!! $page->seo_keyword !!}</td>
            <td>{!! $page->seo_des !!}</td-->
            <td><img src="{{ asset($page->image) }}" style="height: 25px;"></td>
            <td>
                {!! Form::open(['route' => ['pages.destroy', $page->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! $baseurl !!}/page/{!! $page->id !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pages.edit', [$page->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>