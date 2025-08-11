@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop

@section('meta')
    <meta name="title" content="{{ $page->meta_title }}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop

@section('content')
    <section class="page-title centred"
        style="background-image: url({{ Theme::url('images/acuasafe/background/page-title.jpg') }});">
        <div class="shape" style="background-image: url({{ Theme::url('images/acuasafe/shape/banner-shap.png') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{ __('about-us.title') }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('homepage') }}">{{ __('setting.home') }}</a></li>
                    <li>{{ __('about-us.title') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="about-section">
        <div class="auto-container">
            <div class="row align-items-center clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    @isset($dynamicfields['about_section_img'])
                        <figure class="image-box clearfix wow fadeInLeft animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms"><img
                                src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['about_section_img'])->path }}"
                                alt=""></figure>
                    @endisset
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_1">
                        <div class="content-box wow fadeInRight animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            @isset($dynamicfields['about_section_title'])
                                <div class="sec-title">
                                    <h2>{!! $dynamicfields['about_section_title'] !!}</h2>
                                </div>
                            @endisset
                            @isset($dynamicfields['about_section_content'])
                                <div class="text">
                                    {{-- <p></p> --}}
                                    {!! $dynamicfields['about_section_content'] !!}
                                </div>
                            @endisset
                            @isset($dynamicfields['about_section_btn_group'])
                                @foreach ($dynamicfields['about_section_btn_group'] as $key => $item)
                                    <div class="btn-box">
                                        <a href="{!! $item['about_btn_link'] !!}" class="theme-btn btn-one">{!! $item['about_btn_name'] !!}</a>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-section alternat-2 centred pt-0">
        <div class="auto-container">
            <div class="inner-container wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                @isset($dynamicfields['feature_section_header'])
                    <div class="title-text">
                        @foreach ($dynamicfields['feature_section_header'] as $key => $item)
                            @isset($item['feature_section_line_1'])
                                <h2>{!! $item['feature_section_line_1'] !!}</h2>
                            @endisset
                            @isset($item['feature_section_line_2'])
                                <h2>{!! $item['feature_section_line_2'] !!}</h2>
                            @endisset
                        @endforeach
                    </div>
                @endisset
                @isset($dynamicfields['feature_group_section'])
                    <div class="row clearfix">
                        @foreach ($dynamicfields['feature_group_section'] as $key => $item)
                            <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                                <div class="inner-box">
                                    @isset($item['feature_group_img'])
                                        {{-- <div class="shape" style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-3.png') }});"></div> --}}
                                        <div class="icon-box"><img
                                                src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['feature_group_img'])->path }}"
                                                alt=""></div>
                                    @endisset
                                    @isset($item['feature_group_title'])
                                        <h4>{!! $item['feature_group_title'] !!}</h4>
                                    @endisset
                                    @isset($item['feature_group_text'])
                                        <p>{!! $item['feature_group_text'] !!}</p>
                                    @endisset
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endisset
            </div>
        </div>
    </section>

    <section class="chooseus-section">
        <div class="bg-layer" style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-5.png') }});"></div>
        <div class="shape-layer">
            <div class="shape-1" style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-6.png') }});">
            </div>
            <div class="shape-2"></div>
            <div class="shape-3"></div>
            <div class="shape-4" style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-32.png') }});">
            </div>
        </div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_2">
                        <div class="content-box">
                            <div class="sec-title light">
                                @isset($dynamicfields['chooseus_section_title'])
                                    <h2>{!! $dynamicfields['chooseus_section_title'] !!}</h2>
                                @endisset
                            </div>
                            <div class="inner-box">
                                @isset($dynamicfields['chooseus_group_section'])
                                    @foreach ($dynamicfields['chooseus_group_section'] as $key => $item)
                                        <div class="single-item">
                                            @isset($item['chooseus_group_img'])
                                                <div class="icon-box"><img
                                                        src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['chooseus_group_img'])->path }}"
                                                        alt=""></div>
                                            @endisset
                                            <div class="text">
                                                @isset($item['chooseus_group_title'])
                                                    <h4>{!! $item['chooseus_group_title'] !!}</h4>
                                                @endisset
                                                @isset($item['chooseus_group_text'])
                                                    <p>{!! $item['chooseus_group_text'] !!}</p>
                                                @endisset
                                            </div>
                                        </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-box wow fadeInRight animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        @isset($dynamicfields['chooseus_section_img'])
                            <figure class="image"><img
                                    src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['chooseus_section_img'])->path }}"
                                    alt=""></figure>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section bg-color-1">
        <div class="shape-layer">
            <div class="shape-1" style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-8.png') }});">
            </div>
            <div class="shape-2" style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-9.png') }});">
            </div>
        </div>
        <div class="auto-container">
            <div class="sec-title">
                @isset($dynamicfields['testimonial_section_title'])
                    @foreach ($dynamicfields['testimonial_section_title'] as $key => $item)
                        <h2>{!! $item['testimonial_title_line_1'] !!}</h2>
                        <h2>{!! $item['testimonial_title_line_2'] !!}</h2>
                    @endforeach
                @endisset
            </div>
            <div class="two-column-carousel owl-carousel owl-theme owl-nav-none">
                @isset($dynamicfields['feedback_section_group'])
                    @foreach ($dynamicfields['feedback_section_group'] as $key => $item)
                        <div class="testimonial-block-one">
                            <div class="inner-box">
                                @isset($item['feedback_group_img'])
                                    <figure class="author-thumb"><img
                                            src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['feedback_group_img'])->path }}"
                                            alt=""></figure>
                                @endisset
                                <div class="inner">
                                    <ul class="rating clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    @isset($item['feedback_group_content'])
                                        <p>{!! $item['feedback_group_content'] !!}</p>
                                    @endisset
                                    @isset($item['feedback_group_author'])
                                        <h5>{!! $item['feedback_group_author'] !!}</h5>
                                    @endisset
                                    @isset($item['feedback_group_job'])
                                        <span class="designation">{!! $item['feedback_group_job'] !!}</span>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>

    <section class="team-section">
        <div class="auto-container">
            <div class="sec-title centred">
                @isset($dynamicfields['team_section_title'])
                    @foreach ($dynamicfields['team_section_title'] as $key => $item)
                        <h2>{!! $item['team_title_line_1'] !!}</h2>
                        <h2>{!! $item['team_title_line_2'] !!}</h2>
                    @endforeach
                @endisset
            </div>
            <div class="row clearfix">
                @isset($dynamicfields['team_group_card'])
                    @foreach ($dynamicfields['team_group_card'] as $key => $item)
                        <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                            <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500m">
                                <div class="inner-box">
                                    <div class="image-box">
                                        @isset($item['team_card_avatar'])
                                            <figure class="image"><img
                                                    src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['team_card_avatar'])->path }}"
                                                    alt=""></figure>
                                        @endisset
                                        <ul class="social-links clearfix">
                                            @isset($item['team_facebook_link'])
                                                <li><a href="{!! $item['team_facebook_link'] !!}"><i class="fab fa-facebook-f"></i></a></li>
                                            @endisset
                                            @isset($item['team_twitter_link'])
                                                <li><a href="{!! $item['team_twitter_link'] !!}"><i class="fab fa-twitter"></i></a></li>
                                            @endisset
                                            @isset($item['team_google_plus_link'])
                                                <li><a href="{!! $item['team_google_plus_link'] !!}"><i class="fab fa-google-plus-g"></i></a>
                                                </li>
                                            @endisset
                                        </ul>
                                    </div>
                                    <div class="lower-content">
                                        @isset($item['team_member_name'])
                                            <h4><a>{!! $item['team_member_name'] !!}</a></h4>
                                        @endisset
                                        @isset($item['team_member_job'])
                                            <span class="designation">{!! $item['team_member_job'] !!}</span>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>
@stop
