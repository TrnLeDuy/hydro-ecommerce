@php
$logo = (setting('core::logo')) ? setting('core::logo') : Theme::url('images/logo.png');
$logo2 = (setting('core::logo_footer')) ? setting('core::logo_footer') : Theme::url('images/acuasafe/logo-2.png');

$checkAuth = auth()->guard('customer')->check();
$balance_usd = 0;

if($checkAuth){
    $customer = auth()->guard('customer')->user();
    if($customer->wallets){
        foreach ($customer->wallets as $wallet) {
            $walletCurrency = $wallet->currency;
            if($walletCurrency){
                $balance_usd += $wallet->balance * $wallet->currency->usd_rate;   
            }
        }
    }
}
@endphp

<!-- main header -->
<header class="main-header">
    <!-- header-lower -->
    <div class="header-lower">
        <div class="shape" style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-1.png') }});"></div>
        <div class="outer-box">
            <div class="logo-box">
                <figure class="logo"><a href="{{route('homepage')}}"><img src="{{ $logo }}" alt="" /></a></figure>
            </div>
            <div class="menu-area clearfix">
                <div class="mobile-nav-toggler">
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                </div>
                <nav class="main-menu navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                        @menu('main_menu', 'main_menu')
                    </div>
                </nav>
            </div>
            <ul class="nav-right main-menu">
                <li class="search-box-outer">
                    <div class="dropdown">
                        <button class="search-box-btn" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-search"></i></button>
                        <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">
                            <div class="form-container">
                                <form method="post" action="blog.html">
                                    <div class="form-group">
                                        <input type="search" name="search-field" value="" placeholder="Search...." required="">
                                        <button type="submit" class="search-btn"><span class="fas fa-search"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="cart-box">
                    <a href="{{ route('fe.shoppingcart.getCart') }}"><i class="fal fa-shopping-cart"></i></a>
                </li>
                <li class="main-menu">
                @if (!$checkAuth)
                <div style="margin: 0 20px; display: flex; justify-content: space-around">
                    <div style="margin-right: 5px;">
                        <a class="theme-btn btn-one" href="{{route('fe.customer.customer.login')}}">{{__('auth.sign-in')}}</a>
                    </div>
                    <div>
                        <a class="theme-btn btn-one" href="{{route('fe.customer.customer.register')}}">{{__('auth.register-title')}}</a>
                    </div>
                </div>
                @else
                <div class="d-flex align-items-center">
                    {{-- <div>
                        <button type="button" style="width:120px; height: 43px" class="btn btn-success">
                            $<span class="total_balance_usd" style="color: #fff;">
                            </span>
                            <img class="pointer" style="filter: brightness(0) invert(1);" width="20px"
                                src="{{ Theme::url('images/icons/eye.png') }}" alt="">
                        </button>
                    </div> --}}
                    <div class="ms-3">
                        <a href="{{route('fe.customer.customer.account')}}">
                            <div class="d-flex align-items-center login-username_custom">
                                <span style="color: #fff" >{{$customer->profile->firstname}}
                                    {{$customer->profile->lastname}}</span>
                            </div>
                        </a>
                    </div>
                </div>
                @endif
                </li>
                {{-- <li class="btn-box">
                    <a href="#" class="theme-btn btn-one">Request A Quote</a>
                </li> --}}
            </ul>
        </div>
    </div>
</header>

<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    
    <nav class="menu-box">
        <div class="nav-logo"><a href="{{route('homepage')}}"><img src="{{ $logo2 }}" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        @if (!$checkAuth)
        <div style="margin: 20px; display: flex; justify-content: space-around">
            <div style="margin-right: 5px;">
                <a class="theme-btn btn-one" href="{{route('fe.customer.customer.login')}}">{{__('auth.sign-in')}}</a>
            </div>
            <div>
                <a class="theme-btn btn-one" href="{{route('fe.customer.customer.register')}}">{{__('auth.register-title')}}</a>
            </div>
        </div>
        @else
        <div style="margin: 20px; display: flex; justify-content: space-around">
            {{-- <div>
                <button type="button" style="width:120px; height: 43px" class="btn btn-success">
                    $<span class="total_balance_usd" style="color: #fff;">
                    </span>
                </button>
            </div> --}}
            <div class="d-flex align-items-center">
                <a href="{{route('fe.customer.customer.account')}}">
                    <div class="login-username_custom">
                        <span class="ms-2">{{$customer->profile->firstname}}
                            {{$customer->profile->lastname}}</span>
                    </div>
                </a>
            </div>
        </div>
        @endif
        <div style="margin: 20px; display: flex; justify-content: space-around">
            <div style="margin-right: 5px;">
                <a class="theme-btn btn-one" href="{{ route('fe.shoppingcart.getCart') }}"><i class="fal fa-shopping-cart"></i> {{__('products.carts')}}</a>
            </div>
        </div>
    </nav>
</div><!-- End Mobile Menu -->
