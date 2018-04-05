@section('seo')
	@if(empty($page->seo_title))
		<title>{{$setting->site_name}}</title>
	@else
		<title>{{$page->seo_title}}</title>
	@endif

	@if(empty($page->seo_keyword))
		<meta name="keywords" content="{{$setting->key_words}}">
	@else
		<meta name="keywords" content="{{$page->seo_keyword}}">
	@endif

	@if(empty($page->seo_des))
		<meta name="description" content="{{$setting->description}}">
	@else
		<meta name="description" content="{{$page->seo_des}}">
	@endif
@endsection