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
<section class="page-title centred" style="background-image: url({{$urlBannerImage}});">
    <div class="shape" style="background-image: url({{ Theme::url('images/acuasafe/shape/banner-shap.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>{{__('blog.title')}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('homepage')}}">{{__('setting.home')}}</a></li>
                <li>{{__('blog.title')}}</li>
            </ul>
        </div>
    </div>
</section>


<section class="sidebar-page-container blog-grid">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-grid-content">
                    <div class="row clearfix">
                        @foreach ($blogs as $blog)
                        @php
                            $image = $blog->getImageAttribute();
                            $urlImage =Theme::url('images/top-banner.png');
                            if($image != ""){
                                $urlImage = $image->path_string;
                            }

                            $tagLinks = '';
                            foreach ($blog->tags as $tag) {
                                $tagLinks .= '<a href="' . route('page',$blog->slug) . '">' . $tag['name'] . '</a> ';
                            }
                        @endphp
                        <div class="col-lg-6 col-md-6 col-sm-12 news-block">
                            <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500m">
                                <div class="inner-box" style="height: 500px;">
                                    <figure class="image-box"><a href="{{ route('page',$blog->slug) }}"><img src="{{ $urlImage }}" alt="" style="height: 200px; object-fit:cover"></a></figure>
                                    <div class="lower-content">
                                        <h4><a href="{{ route('page',$blog->slug) }}">{{ $blog->title }}</a></h4>
                                        <ul class="post-info clearfix">
                                            <li>{!! $tagLinks !!}</li>
                                            <li>{{ $blog->created_at }}</li>
                                        </ul>
                                        <div class="text">
                                            <p>{{ $blog->sumary }}</p>
                                        </div>
                                        <div class="btn-box">
                                            <a href="{{ route('page',$blog->slug) }}" class="theme-btn btn-two">{{__('button.learn-more')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="pagination-wrapper">
                    {!! $blogs->links('partials.pagination') !!}
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
                </div>
            </div>
        </div>
    </div>
</section>
@stop