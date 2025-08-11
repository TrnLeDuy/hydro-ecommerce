@extends('layouts.master')

@section('title')
{{ $page->title }} | @parent
@stop
@section('meta')
<meta name="title" content="{{ $page->meta_title }}" />
<meta name="description" content="{{ $page->meta_description }}" />
@stop

@section('content')
@php
    $image = $page->getImageAttribute();
    $urlBannerImage = Theme::url('images/acuasafe/background/page-title.jpg');
    if($image != ""){
        $urlBannerImage = $image->path_string;
    }
@endphp
<section class="page-title centred" style="background-image: url({{ Theme::url('images/acuasafe/background/page-title.jpg') }});">
    <div class="shape" style="background-image: url({{ Theme::url('images/acuasafe/shape/banner-shap.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>{{ $page->title }}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('homepage')}}">{{__('setting.home')}}</a></li>
                <li><a href="/tin-tuc">{{__('blog.title')}}</a></li>
                <li>{{__('blog.detail-title')}}</li>
            </ul>
        </div>
    </div>
</section>
<section class="sidebar-page-container blog-details">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-details-content">
                    <div class="news-block-one">
                        <div class="inner-box">
                            {{-- <figure class="image-box"><img src="{{ $urlBannerImage }}" alt=""></figure> --}}
                            <div class="lower-content">
                                @foreach ($page->categories as $category) 
                                <div class="category"><a>{{ $category->title }}</a></div>
                                @endforeach
                                <h3>{{ $page->title }}</h3>
                                <ul class="post-info clearfix">
                                    @foreach ($page->tags as $tag) 
                                        <li><a>{{ $tag->name }}</a></li>
                                    @endforeach
                                    <li>{{$page->created_at}}</li>
                                </ul>
                                <div class="text">
                                    <p>{{ $page->sumary }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-one">
                        {!! $page->body !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="blog-sidebar default-sidebar">
                    <div class="sidebar-widget post-widget">
                        <div class="widget-title">
                            <h3>{{__('blog.latest-news')}}</h3>
                        </div>
                        <div class="post-inner">
                            @foreach ($latestNews as $newsItem) 
                                @php
                                    $image = $newsItem->getImageAttribute();
                                    $urlImage = Theme::url('images/top-banner.png');
                                    if ($image != "") {
                                        $urlImage = $image->path_string;
                                    }
                                @endphp
                                <div class="post">
                                    <figure class="post-thumb"><a href="{{ route('page', $newsItem->slug) }}"><img src="{{ $urlImage }}" alt="" style="object-fit: cover; object-position:center; height: 90px;"></a></figure>
                                    <p>{{ $newsItem->created_at }}</p>
                                    <h5><a href="{{ route('page', $newsItem->slug) }}">{{ $newsItem->title }}</a></h5>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="sidebar-widget post-widget">
                        <div class="widget-title">
                            <h3>{{__('blog.related')}}</h3>
                        </div>
                    
                        @php
                            $relatedBlogs = getRelatePost($page->id); 
                        @endphp
                    
                        <div class="post-inner">
                            @foreach ( $relatedBlogs as $relatedBlog)
                                @php
                                    $image = $relatedBlog->getImageAttribute();
                                    $urlRelatedImage = $image != "" ? $image->path_string : Theme::url('images/top-banner.png');
                                @endphp
                    
                                <div class="post">
                                    <figure class="post-thumb">
                                        <a href="{{ route('page', $relatedBlog->slug) }}">
                                            <img src="{{ $urlRelatedImage }}" alt="" style="object-fit: cover; object-position:center; height: 90px;"> 
                                        </a>
                                    </figure>
                                    <p>{{ $relatedBlog->created_at }}</p>
                                    <h5>
                                        <a href="{{ route('page', $relatedBlog->slug) }}">
                                            {{ $relatedBlog->title }}
                                        </a>
                                    </h5>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop