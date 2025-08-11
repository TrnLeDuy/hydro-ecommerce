@extends('layouts.master')

@section('title')
    {{ $product->title }} | @parent
@stop

@section('meta')
    <meta name="title" content="{{ $product->meta_title }}" />
    <meta name="description" content="{{ $product->meta_description }}" />
@stop
@section('content')
    @php
        $image = $product->getAvatar();
        $authCheck = auth()->guard('customer')->check();
        $user = auth()->guard('customer')->user();
        $price_sale = $product->price;
        $urlImage = Theme::url('images/top-banner.png');
        if ($image != '') {
            $urlImage = $image->path_string;
        }
    @endphp
    <section class="page-title centred"
        style="background-image: url({{ Theme::url('images/acuasafe/background/page-title.jpg') }});">
        <div class="shape" style="background-image: url({{ Theme::url('images/acuasafe/shape/banner-shap.png') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{ $product->title }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('homepage') }}">{{ __('setting.home') }}</a></li>
                    <li><a href="/san-pham">{{ __('products.title') }}</a></li>
                    <li>{{ __('products.detail') }}</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="shop-details">
        <div class="auto-container">
            <div class="product-details-content">
                <div class="shape" style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-39.png') }});">
                </div>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image-box">
                            <figure class="image"><img src="{{ $urlImage }}" alt=""></figure>
                            <div class="preview-link"><a href="{{ $urlImage }}" class="lightbox-image"
                                    data-fancybox="gallery"><i class="far fa-search-plus"></i></a></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="product-details">
                            <h3>{{ $product->title }}</h3>
                            <div class="customer-rating clearfix">
                                <div class="star-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= floor($product->rating))
                                            <span class="star filled">&#9733;</span> <!-- Full star -->
                                        @elseif ($i - $product->rating < 1 && $i - $product->rating > 0.75)
                                            <span class="star third-fourth">&#9733;</span> <!-- 3/4 star -->
                                        @elseif ($i - $product->rating <= 0.75 && $i - $product->rating >= 0.5)
                                            <span class="star half">&#9733;</span> <!-- Half star -->
                                        @elseif ($i - ($product->rating = 0.5 && $i - $product->rating > 0.1))
                                            <span class="star third">&#9733;</span> <!-- 1/3 star -->
                                        @else
                                            <span class="star">&#9733;</span> <!-- Empty star -->
                                        @endif
                                    @endfor
                                </div>
                                {{-- <div class="review pull-left">
                                <a href="shop-details.html">( 5 Reviews )</a>
                            </div> --}}
                            </div>
                            <h5 class="box-price" style="text-align: left">
                                @include('shoppingCarts.partials.price-product', [
                                    'is_promotion' => $product->is_promotion,
                                    'price_sale' => $product->price_sale,
                                    'price' => $product->price,
                                    'price_member' => $authCheck ? $product->price_member : 0,
                                ])
                            </h5>
                            <div class="text">
                                <p>{{ $product->sumary }}</p>
                            </div>
                            <div class="addto-cart-box">
                                <ul class="clearfix">
                                    <li class="quantity quantity-custom">
                                        <button class="btn func-minus" type="button">-</button>
                                        <input class="input-quantity-custom" id="product-quantity"
                                            value="1" />
                                        <button class="btn func-plus" type="button" name="button">+</button>
                                    </li>
                                </ul>
                                <li>
                                    <div class="action-btn row" style="margin-left: 10px">
                                        @if ($product->product_status == 1)
                                            <button type="button" class="theme-btn btn-one btn-add-to-cart"
                                                data-product-id="{{ $product->id }}">
                                                <span class="pay_btn">{{ __('products.add_to_cart_btn') }}</span>
                                            </button>
                                        @else
                                            <button type="button" class="theme-btn btn-one btn-add-to-cart"
                                                data-product-id="{{ $product->id }}" disabled>
                                                <span class="pay_btn">{{ __('products.add_to_cart_btn') }}</span>
                                            </button>
                                        @endif
                                        @if ($user)
                                            <button type="button" class="btn col-md-1 col-3 btn-copy-link-aff"
                                                data-product-url="{{ route('fe.product.product.detail', $product->slug) }}?ref={{ $user->ref_code }}"
                                                data-copy-link-message="{{ __('products.copy_link_success') }}">
                                                <img src="{{ Theme::url('images/icons/share.png') }}">
                                            </button>
                                        @endif
                                    </div>
                                </li>
                            </div>
                            <div class="other-option">
                                <ul class="list">
                                    <li>SKU:</li>
                                    <li>{{ $product->code }}</li>
                                </ul>
                                <ul class="category list">
                                    <li>{{ __('products.categories') }}:</li>
                                    <li>{{ $category->title }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-discription">
                <div class="shape" style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-39.png') }});">
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1">{{ __('products.description') }}</li>
                            {{-- <li class="tab-btn" data-tab="#tab-2">Reviews (2)</li> --}}
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="content-box">
                                {!! $product->product_info !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="related-product">
                <div class="title-box">
                    <h3>{{ __('products.related-products') }}</h3>
                </div>
                <div class="row clearfix">
                    @php
                        // $products = getAllProducts();
                        $authCheck = auth()->guard('customer')->check();
                        $customer = auth()->guard('customer')->user();
                    @endphp
                    @foreach ($productRelated as $product)
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
                                                style="object-fit: cover; object-position:center; height: 200px;"></figure>
                                        <div class="lower-content">
                                            <div class="shape"
                                                style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-7.png') }});">
                                            </div>
                                            <h4><a href="shop-details.html">{{ $product->title }}</a></h4>
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
                                                    <button type="button" class="theme-btn btn-one btn-add-to-cart"
                                                        data-product-id="{{ $product->id }}">
                                                        {{ __('products.add_to_cart_btn') }}
                                                    </button>
                                                @else
                                                    <button type="button" class="theme-btn btn-one btn-add-to-cart"
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
        </div>
    </section>
@stop
