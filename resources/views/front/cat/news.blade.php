@extends('front.partial.base')

@section('css')
	<style type="text/css">
	</style>
@endsection

@include('front.cat.seo')

@section('content')
	@include('front.partial.nav', ['page' => 'notindex'])
	<div class="header-holder" style="background-image: url('{{ asset('images/index/banner2.jpg') }}'); padding-top: 15px;">
		<div class="container tc">
			<img src="{{ asset('images/index/font02.png') }}" class="banner-img2">
		</div>
	</div>
	
	<div class="container">
		<div class="row crumb-wrapper">
			{{ Breadcrumbs::render('category', $category) }}
		</div>
	</div>
	<div class="container scroll-container" style="margin-bottom: 30px;">
		<div class="row" style="padding-top: 60px;">
			<div class="col-lg-12">
				<div class="news-title">新闻中心</div>
				<div>
				<div style="height: 15px; line-height: 15px; font-size: 14px;">NEWS</div>
				<div style="height: 15px; line-height: 15px; font-size: 10px; color: #ccc;">News browsing center</div>
				</div>
			</div>
		</div>

		@foreach ($posts as $post)
			@if ($post->image == '')
				<a class="row news-item reveal scroll-post" href="/post/{{$post->id}}">
					<div class="col-lg-1 col-sm-3">
						<div class="date">{{$post->created_at->format('d')}}</div>
						<div class="year">{{$post->created_at->format('m月 Y')}}</div>
					</div>
					<div class="col-lg-11 col-sm-9">
						<div class="title transition">{{$post->name}}</div>
						<div class="des">{{$post->brief}}</div>
					</div>
				</a>
			@else
				<a class="row news-item reveal scroll-post" href="/post/{{$post->id}}">
					<div class="col-lg-3 col-sm-3">
						<div class="image-wrapper">
							<img lay-src="{{$post->image}}" class="lazy">
						</div>
					</div>
					<div class="col-lg-9 col-sm-9">
						<div class="title transition">{{$post->name}}</div>
						<div class="time">{{$post->created_at->format('Y-m-d')}}</div>
						<div class="des">{{$post->brief}}</div>
					</div>
				</a>
			@endif
		@endforeach

		<div style="opacity: 0;">{{$posts->links()}}</div>
	</div>

@endsection