<div class="wrap-panel">
    <div class="panel">
        <div class="menu-list">
            {{-- <a class="menu-item {{ Route::currentRouteName() =='fe.wallet.wallet.list' ?'active':"" }}" href="{{route('fe.wallet.wallet.list')}}">
                <img src="{{ Theme::url('images/menu/wallet.png') }}" alt="" />
                <div class="name">Wallet</div>
            </a>
            <a class="menu-item {{ Route::currentRouteName() =='fe.wallet.wallet.convert' ?'active':"" }}" href="{{route('fe.wallet.wallet.convert')}}">
                <img src="{{ Theme::url('images/menu/convert.png') }}" alt="" />
                <div class="name">Convert</div>
            </a>
            <a class="menu-item {{ Route::currentRouteName() =='fe.staking.staking.mystaking' ?'active':"" }}" href="{{route('fe.staking.staking.mystaking')}}">
                <img src="{{ Theme::url('images/menu/staking.png') }}" alt="" />
                <div class="name">My Staking</div>
            </a> --}}
            <a class="menu-item {{ Route::currentRouteName() =='fe.customer.customer.account' ?'active':"" }}" href="{{route('fe.customer.customer.account')}}">
                <img src="{{ Theme::url('images/menu/account.png') }}" alt="" />
                <div class="name">{{ __('menu.account') }}</div>
            </a>
            <a class="menu-item {{ Route::currentRouteName() =='fe.shoppingcart.myPurchase' ?'active':"" }}"  href="{{route('fe.shoppingcart.myPurchase')}}" >
                <img src="{{ Theme::url('images/menu/prostore.png') }}" alt="">
                <div class="name">{{ __('menu.my-purchase') }}</div>
            </a>
            {{-- <a class="menu-item {{ Route::currentRouteName() =='fe.customer.customer.affiliate' ?'active':"" }}" href="{{route('fe.customer.customer.affiliate')}}">
                <img src="{{ Theme::url('images/navigator/icon-affiliate.png') }}" alt="" />
                <div class="name">Affiliate</div>
            </a> --}}
            <a class="menu-item {{ Route::currentRouteName() =='fe.customer.customer.setting' ?'active':"" }}" href="{{route('fe.customer.customer.setting')}}">
                <img src="{{ Theme::url('images/menu/setting.png') }}" alt="" />
                <div class="name">{{ __('menu.setting') }}</div>
            </a>
        </div>
    </div>
</div>
