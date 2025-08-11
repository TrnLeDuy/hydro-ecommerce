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
                <h1>{{ __('products.title') }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('homepage') }}">{{ __('setting.home') }}</a></li>
                    <li>{{ __('products.title') }}</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="shop-page-section">
        <div class="auto-container">
            <div class="row clearfix">
                {{-- <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="shop-sidebar default-sidebar">
                    <div class="sidebar-widget sidebar-search">
                        <div class="widget-title">
                            <h3>Search</h3>
                        </div>
                        <div class="search-inner">
                            <form action="shop.html" method="post">
                                <div class="form-group">
                                    <input type="search" name="search-field" placeholder="Search" required="">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget sidebar-category">
                        <div class="widget-title">
                            <h3>{{__('products.categories')}}</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="category-list clearfix">
                                <li><a href="#"><i class="far fa-long-arrow-right"></i>Safety Tips</a></li>
                                <li><a href="#"><i class="far fa-long-arrow-right"></i>Chemical free</a></li>
                                <li><a href="#"><i class="far fa-long-arrow-right"></i>Mineral Water</a></li>
                                <li><a href="#"><i class="far fa-long-arrow-right"></i>Filteration</a></li>
                                <li><a href="#"><i class="far fa-long-arrow-right"></i>Uncategorized</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
                <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                    <div class="our-shop">
                        {{-- <div class="item-shorting clearfix">
                        <div class="left-column pull-left clearfix">
                            <div class="text"><p>Showing 1–12 of 50 Results</p></div>
                        </div>
                        <div class="right-column pull-right clearfix">
                            <div class="short-box clearfix">
                                <p>Sort by</p>
                                <div class="select-box">
                                    <select class="wide">
                                        <option data-display="Popularity">Popularity</option>
                                        <option value="1">New Collection</option>
                                        <option value="2">Top Sell</option>
                                        <option value="4">Top Ratted</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                        <div class="row clearfix">
                            @php
                                $products = getAllProducts();
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
                                                        alt="{{ $product->title }}" style="object-fit: cover; object-position:center;"></figure>
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
                                                                <span style="color: gainsboro !important">&#9733;</span> <!-- Empty star -->
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
                                                            'price_member' => $authCheck
                                                                ? $product->price_member
                                                                : 0,
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
                        {!! $products->links('partials.pagination') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
