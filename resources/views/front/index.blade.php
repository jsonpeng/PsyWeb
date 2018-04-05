@extends('front.partial.base')

@section('css')
	<style type="text/css">
		
	</style>
@endsection

@section('seo')
	<title>{{$setting->site_name}}</title>
    <meta name="keywords" content="{{$setting->key_words}}">
    <meta name="description" content="{{$setting->description}}">
@endsection

@section('content')
	 <h1>首页开始</h1>

@endsection


@section('js')
<script type="text/javascript">

</script>
@endsection
