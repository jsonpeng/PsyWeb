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
			<img src="{{ asset('images/index/font02.png') }}" class="banner-img2 lazy">
		</div>
	</div>
	
	<div class="container">
		<div class="row crumb-wrapper">
			{{ Breadcrumbs::render('category', $category) }}
		</div>
	</div>
	
	<div class="container scroll-container" style="margin-bottom: 30px;">
		<div class="row hidden-xs">
			@foreach ($posts as $post)
				<div class="col-sm-6 col-xs-6 col-md-3 col-lg-3 scroll-post">
					<a class="zuanye reveal" href="/post/{{$post->id}}" style="background-image: url('{{asset($post->image2)}}');">
						<div class="cover transition">
							<div class="content">
								<img class="transition-quick lazy" lay-src="{{ asset($post->image) }}" >
								<div>{{$post->name}}</div>
								<div style="font-size: 10px; color: #ccc; margin-top: 5px;">{{$post->slug}}</div>
							</div>
						</div>
					</a>
				</div>
			@endforeach
		</div>
		<div class="row visible-xs-block">
			@foreach ($posts as $post)
				<div class="col-xs-6 scroll-post">
					<a class="index-service-mobile reveal2" href="/post/{{$post->id}}">
						<img lay-src="{{ asset($post->image) }}" class="lazy">
						<div class="title transition">{{$post->name}}</div>
					</a>
				</div>
			@endforeach
		</div>
	</div>
	<div style="opacity: 0;">{{$posts->links()}}</div>

@endsection