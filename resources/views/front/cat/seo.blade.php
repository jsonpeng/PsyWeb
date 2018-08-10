@section('seo')


	@if(empty($category->seo_keyword))
		<meta name="keywords" content="{{$setting->key_words}}">
	@else
		<meta name="keywords" content="{{$category->seo_keyword}}">
	@endif

	@if(empty($category->seo_des))
		<meta name="description" content="{{$setting->description}}">
	@else
		<meta name="description" content="{{$category->seo_des}}">
	@endif
	
@endsection