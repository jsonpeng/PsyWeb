@extends('front.partial.base')

@section('css')
	<style type="text/css">
	</style>
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

	<div class="page-wrapper">
		<div class="header-wrapper">
			<img src="{{ asset('images/yuyue.png') }}">
		</div>

		<form action="">
			<div class="form-item"><div class="header-text">所在城市</div> <input type="text" id="city"></div>
			<div style="overflow: hidden;">
				<div class="form-item name"><div class="header-text">宝宝姓名</div> <input type="text" id="name"></div>
				<div class="form-item birthday"><div class="header-text">宝宝生日</div> <input type="date" id="birthday"></div>
			</div>
			<div class="form-item"><div class="header-text">联系电话</div> <input type="text" id="phone"></div>
			<div class="form-item submit">立即申请</div>
		</form>
	</div>

	@include('front.partial.footer', ['index' => 3])

@endsection

@section('js')
	<script type="text/javascript">
	    var mySwiper = new Swiper ('.swiper-container', {
		    // Optional parameters
		    loop: true,
	  	})
	</script>
@endsection