@extends('front.partial.base')

@section('css')

@endsection

@include('front.page.seo')

@section('content')
	<div class="swiper-container">
	    <!-- Additional required wrapper -->
	    <div class="swiper-wrapper">
	        <!-- Slides -->
	        @foreach ($banners as $banner)
	        	<a class="swiper-slide">
		        	<img src="{{ $banner->image }}" alt="">
		        </a>
	        @endforeach
	    </div>
	</div>

	<div class="page-wrapper article">
		<div class="post-title">{{$page->name}}</div>
		{!! $page->content !!}
	</div>

	@include('front.partial.footer', ['index' => 1])
@endsection


@section('js')
	<script type="text/javascript">
	    var mySwiper = new Swiper ('.swiper-container', {
		    // Optional parameters
		    loop: true,
	  	})
	</script>
@endsection