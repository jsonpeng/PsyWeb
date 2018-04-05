@extends('front.partial.base')

@section('css')
    <style type="text/css">
    </style>
@endsection

@include('front.post.seo')

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
        <div class="post-title">{{$post->title}}</div>
        {!! $post->content !!}

        <div class="row paginate">
            <div class="pre-page">
                @if(!empty($prePost))
                <a href="/post/{{$prePost->id}}">上一篇：{{$prePost->name}}</a>
                @endif
            </div>
            <div class="next-page">
                @if(!empty($nextPost))
                <a href="/post/{{$nextPost->id}}">下一篇：{{$nextPost->name}}</a>
                @endif
            </div>
        </div>
    </div>

    @include('front.partial.footer', ['index' => 1])

@endsection
