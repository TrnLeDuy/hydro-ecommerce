@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop

@section('meta')
    <meta name="title" content="{{ $page->meta_title }}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop

@php
    // dd($dynamicfields);
    // @inject('fileService', 'Modules\Media\Repositories\FileRepository');

    // $file = app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['home_01_image'])->path;
    // dd($file);
    $backgroundColor = isset($dynamicfields['home_banner_background_color'])
        ? $dynamicfields['home_banner_background_color']
        : '#002c8f';
@endphp

@section('content')
    <section class="banner-section" style="background-color: {{ $backgroundColor }};">
        <div class="shape" style="background-image: url({{ Theme::url('images/acuasafe/shape/banner-shap.png') }});"></div>
        <div class="banner-carousel owl-theme owl-carousel owl-nav-none owl-dots-none">
            @isset($dynamicfields['home_banner_content'])
                @foreach ($dynamicfields['home_banner_content'] as $key => $item)
                    <div class="slide-item">
                        <div class="pattern-box">
                            <div class="pattern-1"></div>
                            <div class="pattern-2"></div>
                            <div class="pattern-3"
                                style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-2.png') }});"></div>
                        </div>
                        <div class="auto-container">
                            <div class="inner-box">
                                <div class="image-box">
                                    @isset($item['home_banner_vector_object_1'])
                                        <figure class="image image-1"><img
                                                src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['home_banner_vector_object_1'])->path }}"
                                                alt=""></figure>
                                    @endisset
                                    @isset($item['home_banner_vector_object_2'])
                                        <figure class="image image-2"><img
                                                src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['home_banner_vector_object_2'])->path }}"
                                                alt=""></figure>
                                    @endisset
                                </div>
                                <div class="content-box">
                                    @isset($item['home_banner_header_content'])
                                        <h2>{!! $item['home_banner_header_content'] !!}</h2>
                                    @endisset
                                    @isset($item['home_banner_text_content'])
                                        <p>{!! $item['home_banner_text_content'] !!}</p>
                                    @endisset
                                    <div class="btn-box clearfix">
                                        @isset($item['home_banner_btn_1'])
                                            <a href="{!! $item['home_banner_btn_1_href'] !!}" class="theme-btn btn-one">{!! $item['home_banner_btn_1'] !!}</a>
                                        @endisset
                                        @isset($item['home_banner_btn_2'])
                                            <a href="{!! $item['home_banner_btn_2_href'] !!}"
                                                class="theme-btn banner-btn">{!! $item['home_banner_btn_2'] !!}</a>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </section>

    <section class="feature-section centred">
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
                            <div class="col-lg-3 col-md-6 col-sm-12 feature-block"
                                style="padding-left: 22px; padding-right:22px;">
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
                                        <a href="{!! $item['about_btn_link'] !!}"
                                            class="theme-btn btn-one">{!! $item['about_btn_name'] !!}</a>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="service-section bg-color-1">
        <div class="shape" style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-4.png') }});"></div>
        @isset($dynamicfields['service_section_figure_img'])
            <figure class="image-layer"><img
                    src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['service_section_figure_img'])->path }}"
                    alt=""></figure>
        @endisset
        <div class="bg-shape">
            <div class="bg-shape-1"></div>
            <div class="bg-shape-2"></div>
            <div class="bg-shape-3"></div>
        </div>
        <div class="auto-container">
            <div class="sec-title centred">
                @isset($dynamicfields['service_section_title'])
                    @foreach ($dynamicfields['service_section_title'] as $key => $item)
                        <h2>{!! $item['service_title_line_1'] !!}</h2>
                        <h2>{!! $item['service_title_line_2'] !!}</h2>
                    @endforeach
                @endisset
            </div>
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 big-column">
                    <div class="left-column text-right">
                        @isset($dynamicfields['service_group_content_left'])
                            @foreach ($dynamicfields['service_group_content_left'] as $key => $item)
                                <div class="service-block-one wow fadeInLeft animated" data-wow-delay="00ms"
                                    data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="icon-box"><img
                                                src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['service_group_content_img'])->path }}"
                                                alt=""></div>
                                        <h4>{!! $item['service_group_content_title'] !!}</h4>
                                        <p>{!! $item['service_group_content_text'] !!}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 big-column">
                    <div class="right-column text-left">
                        @isset($dynamicfields['service_group_content_right'])
                            @foreach ($dynamicfields['service_group_content_right'] as $key => $item)
                                <div class="service-block-one wow fadeInRight animated" data-wow-delay="00ms"
                                    data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="icon-box"><img
                                                src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['service_group_content_img'])->path }}"
                                                alt=""></div>
                                        <h4>{!! $item['service_group_content_title'] !!}</h4>
                                        <p>{!! $item['service_group_content_text'] !!}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
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
                                                    <h4 style="font-weight: 600">{!! $item['chooseus_group_title'] !!}</h4>
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

    <section class="shop-section centred">
        <div class="auto-container">
            <div class="sec-title">
                @isset($dynamicfields['news_section_title'])
                    @foreach ($dynamicfields['shop-section_title'] as $key => $item)
                        <h2>{!! $item['shop_title_line_1'] !!}</h2>
                        <h2>{!! $item['shop_title_line_2'] !!}</h2>
                    @endforeach
                @endisset
            </div>
            <div class="row clearfix">
                @php
                    $products = getAllProducts()->take(3);
                    $authCheck = auth()->guard('customer')->check();
                    $customer = auth()->guard('customer')->user();
                @endphp
                @foreach ($products as $product)
                    @php
                        $image = $product->getAvatar();
                        $urlImage = Theme::url('images/acuasafe/resource/shop/shop-3.jpg');
                        if ($image != '') {
                            $urlImage = $image->path_string;
                        }
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                        <a href="{{ route('fe.product.product.detail', $product->slug) }}">
                            <div class="shop-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                data-wow-duration="1500m">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="{{ $urlImage }}"
                                            alt="{{ $product->title }}"
                                            style="object-fit: cover; object-position:center;"></figure>
                                    <div class="lower-content">
                                        <div class="shape"
                                            style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-7.png') }});">
                                        </div>
                                        <div class="star-rating product-list-rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= floor($product->rating))
                                                    <span class="star filled">&#9733;</span> <!-- Full star -->
                                                @elseif ($i - $product->rating < 1 && $i - $product->rating > 0.75)
                                                    <span class="star third-fourth">&#9733;</span>
                                                    <!-- 3/4 star -->
                                                @elseif ($i - $product->rating <= 0.75 && $i - $product->rating >= 0.5)
                                                    <span class="star half">&#9733;</span> <!-- Half star -->
                                                @elseif ($i - $product->rating < 0.5 && $i - $product->rating > 0.1)
                                                    <span class="star third">&#9733;</span> <!-- 1/3 star -->
                                                @else
                                                    <span style="color: gainsboro !important">&#9733;</span>
                                                    <!-- Empty star -->
                                                @endif
                                            @endfor
                                        </div>
                                        <h4><a
                                                href="{{ route('fe.product.product.detail', $product->slug) }}">{{ $product->title }}</a>
                                        </h4>
                                        <h6>
                                            @include('shoppingCarts.partials.price', [
                                                'is_promotion' => $product->is_promotion,
                                                'price_sale' => $product->price_sale,
                                                'price' => $product->price,
                                                'price_member' => $authCheck ? $product->price_member : 0,
                                            ])
                                        </h6>
                                        <p>{{ $product->sumary }}</p>
                                        <div class="btn-box">
                                            @if ($product->product_status == 1)
                                                <button type="button" class="theme-btn btn-one btn-add-to-cart-quick"
                                                    data-product-id="{{ $product->id }}">
                                                    {{ __('products.add_to_cart_btn') }}
                                                </button>
                                            @else
                                                <button type="button" class="theme-btn btn-one btn-add-to-cart-quick"
                                                    data-product-id="{{ $product->id }}" disabled>
                                                    {{ __('products.add_to_cart_btn') }}
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
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
                            <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                data-wow-duration="1500m">
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

    <section class="cta-section bg-color-2">
        <div class="pattern-layer">
            <div class="pattern-1"
                style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-10.png') }});"></div>
            <div class="pattern-2" style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-2.png') }});">
            </div>
            <div class="pattern-3"
                style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-33.png') }});"></div>
            <div class="pattern-4"
                style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-34.png') }});"></div>
        </div>
        <div class="auto-container">
            <div class="row align-items-center clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    @isset($dynamicfields['cta_section_figure'])
                        <figure class="image-box wow slideInLeft animated" data-wow-delay="00ms"
                            data-wow-duration="1500m clearfix"><img
                                src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['cta_section_figure'])->path }}"
                                alt=""></figure>
                    @endisset
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_3">
                        <div class="content-box">
                            <div class="sec-title light">
                                @isset($dynamicfields['cta_section_title'])
                                    <h2>{!! $dynamicfields['cta_section_title'] !!}</h2>
                                @endisset
                            </div>
                            <div class="text">
                                @isset($dynamicfields['cta_section_text'])
                                    <p>{!! $dynamicfields['cta_section_text'] !!}</p>
                                @endisset
                            </div>
                            <ul class="list clearfix">
                                @isset($dynamicfields['cta_section_list'])
                                    @foreach ($dynamicfields['cta_section_list'] as $key => $item)
                                        <li>{!! $item['cta_list_content'] !!}</li>
                                    @endforeach
                                @endisset
                            </ul>
                            <div class="btn-box">
                                @isset($dynamicfields['cta_section_btn'])
                                    @foreach ($dynamicfields['cta_section_btn'] as $key => $item)
                                        <a href="{!! $item['cta_btn_link'] !!}"
                                            class="theme-btn btn-one">{!! $item['cta_btn_name'] !!}</a>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news-section">
        <div class="auto-container">
            <div class="sec-title centred">
                @isset($dynamicfields['news_section_title'])
                    @foreach ($dynamicfields['news_section_title'] as $key => $item)
                        <h2>{!! $item['news_title_line_1'] !!}</h2>
                        <h2>{!! $item['news_title_line_2'] !!}</h2>
                    @endforeach
                @endisset
            </div>
            <div class="row clearfix">
                @foreach ($latestNews as $newsItem)
                    @php
                        $image = $newsItem->getImageAttribute();
                        $urlImage = Theme::url('images/top-banner.png');
                        if ($image != '') {
                            $urlImage = $image->path_string;
                        }
                        $tagLinks = '';
                        foreach ($newsItem->tags as $tag) {
                            $tagLinks .= '<a href="' . route('page', $newsItem->slug) . '">' . $tag['name'] . '</a> ';
                        }
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500m">
                            <div class="inner-box" style="height: 500px">
                                <figure class="image-box"><a href="{{ route('page', $newsItem->slug) }}"><img
                                            src="{{ $urlImage }}"
                                            style="height: 200px; object-fit: cover; object-position:center;"
                                            alt=""></a></figure>
                                <div class="lower-content">
                                    <h4><a href="{{ route('page', $newsItem->slug) }}">{{ $newsItem->title }}</a></h4>
                                    <ul class="post-info clearfix">
                                        <li><a>{!! $tagLinks !!}</a></li>
                                        <li>{{ $newsItem->created_at }}</li>
                                    </ul>
                                    <div class="text">
                                        <p>{{ $newsItem->sumary }}</p>
                                    </div>
                                    <div class="btn-box">
                                        <a href="{{ route('page', $newsItem->slug) }}"
                                            class="theme-btn btn-two">{{ __('button.learn-more') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop
