@extends('layouts.master')

@section('title')
{{ __('shopping.title_cart') }} | @parent
@stop

@section('content')
<section class="page-title centred" style="background-image: url({{ Theme::url('images/acuasafe/background/page-title.jpg') }});">
    <div class="shape" style="background-image: url({{ Theme::url('images/acuasafe/shape/banner-shap.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>{{__('products.carts')}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('homepage')}}">{{__('setting.home')}}</a></li>
                <li>{{__('products.carts')}}</li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title -->


<!-- cart section -->
<section class="cart-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 table-column">
                <div class="table-outer">
                    <table class="cart-table">
                        <thead class="cart-header">
                            <tr>
                                <th>&nbsp;</th>
                                <th class="prod-column">{{__('products.product_name')}}</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th class="price">{{__('products.product_price')}}</th>
                                <th class="quantity">{{__('products.product_quantity')}}</th>
                                <th>{{__('products.product_subtotal')}}</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @if (Cart::count() > 0)
                            @foreach (Cart::content() as $cart)
                            @php
                                $image = $cart->options->avatar;
                                if ($image == '') {
                                    $image = Theme::url('images/acuasafe/resource/shop/shop-3.jpg');
                                }
                            @endphp
                            <tr class="item-cart-{{ $cart->rowId }}">
                                <td colspan="4" class="prod-column">
                                    <div class="column-box">
                                        <a href="javascript:void(0);" class="func-remove btn-delete-item-cart" data-row-id="{{ $cart->rowId }}">
                                            <div class="remove-btn remove">
                                                <i class="fal fa-times"></i>
                                            </div>
                                        </a>
                                        <div class="prod-thumb">
                                            <img src="{{ $image }}" alt="" style="object-fit: cover; object-position:center;">
                                        </div>
                                        <div class="prod-title">
                                            {{ $cart->name }}
                                        </div>    
                                    </div>
                                </td>
                                <td class="price">
                                    @include('shoppingCarts.partials.price',['price'=>$cart->price])
                                </td>
                                <td class="qty product-number" style="text-align: center">
                                    <div class="group-btn-cart-custom">
                                        <button type="button" class="btn func-minus"
                                            data-row-id="{{ $cart->rowId }}">-</button>
                                        <input value="{{ $cart->qty }}" data-row-id="{{ $cart->rowId }}"
                                            class="input-quantity-custom num-frm box-number-{{ $cart->rowId }}">
                                        <button type="button" class="btn func-plus"
                                            data-row-id="{{ $cart->rowId }}">+</button>
                                    </div>
                                </td>
                                <td class="total-block sub-total"><span class="price">{{ number_format($cart->price * $cart->qty)}} VND</span></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>    
                    </table>
                </div>
            </div>
        </div>
        <div class="othre-content clearfix">
        </div>
        <div class="cart-total">
            <div class="row">
                <div class="col-xl-5 col-lg-12 col-md-12 offset-xl-7 cart-column">
                    <div class="total-cart-box box-info clearfix">
                        {{-- <h6>{{__('products.cart_total')}}</h6> --}}
                        <ul class="list clearfix" style="background-color: #f2f9ff">
                            {{-- <li class="sub-total price">{{__('products.cart_subtotal')}}:<span>{{ $subtotal }} VND</span></li> --}}
                            <li class="total-payment price">{{__('products.cart_total')}}:<span>{{ $total }} VND</span></li>
                        </ul>
                        <a href="{{ route('fe.shoppingcart.getCheckout') }}" class="theme-btn btn-one">{{__('products.checkout_btn')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop