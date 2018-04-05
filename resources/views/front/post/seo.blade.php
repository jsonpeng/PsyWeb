@section('seo')
	@if($post->seo_title == '')
		<title>{{$setting->site_name}}</title>
	@else
		<title>{{$post->seo_title}}</title>
	@endif

	@if($post->seo_keyword == '')
		<meta name="keywords" content="{{$setting->key_words}}">
	@else
		<meta name="keywords" content="{{$post->seo_keyword}}">
	@endif

	@if($post->seo_des == '')
		<meta name="description" content="{{$setting->description}}">
	@else
		<meta name="description" content="{{$post->seo_des}}">
	@endif
@endsection
