@extends('layouts.master')

@section('title')
{{ __('shopping.title_checkout') }} | @parent
@stop

@section('content')
<section class="page-title centred" style="background-image: url({{ Theme::url('images/acuasafe/background/page-title.jpg') }});">
    <div class="shape" style="background-image: url({{ Theme::url('images/acuasafe/shape/banner-shap.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>{{__('shopping.title_checkout')}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('homepage')}}">{{__('setting.home')}}</a></li>
                <li>{{__('shopping.title_checkout')}}</li>
            </ul>
        </div>
    </div>
</section>
<section class="checkout-section">
    <div class="container">
        <form action="{{ route('fe.shoppingcart.checkout') }}" method="POST" id="form_checkout">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 left-column">
                    <div class="inner-box">
                        <div class="billing-info">
                            <h4 class="sub-title">{{__('shopping.bill_detail')}}</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label>{{__('shopping.fname')}}</label>
                                    <div class="field-input">
                                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label>{{__('shopping.email')}}</label>
                                    <div class="field-input">
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label>{{__('shopping.phone_num')}}</label>
                                    <div class="field-input">
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label>{{__('shopping.address')}}</label>
                                    <div class="field-input">
                                        <input type="text" class="form-control" id="address" name="address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="box-table-cart mb-4">
                                <div class="table-title">
                                    <img class="pointer" src="{{ Theme::url('images/icons/icon-delivery.png') }}" alt="">
                                    <span>{{__('shopping.delivery_option')}}</span>
                                </div>
                                <div class="box-form">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="delivery_method" id="delivery1"
                                            value="1" checked>
                                        <label class="form-check-label" for="delivery1"><span>{{__('shopping.standard_delivery')}}</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="delivery_method" id="delivery2"
                                            value="2">
                                        <label class="form-check-label" for="delivery2"><span>{{__('shopping.vip_delivery')}}</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="box-table-cart mb-4">
                                <div class="table-title">
                                    <span>{{__('shopping.payment_method')}}</span>
                                </div>
                                <div class="box-form">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment_method" id="payment_method1"
                                            value="1" checked>
                                        <label class="form-check-label" for="payment_method1"> <img class="pointer"
                                                src="{{ Theme::url('images/icons/icon-cod.png') }}"
                                                alt=""><span>COD</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment_method" id="payment_method2"
                                            value="2">
                                        <label class="form-check-label" for="payment_method2"><img class="pointer"
                                                src="{{ Theme::url('images/icons/icon-bank.png') }}" alt=""><span>
                                                    {{__('shopping.bank_transfer')}}  
                                                </span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment_method" id="payment_method3"
                                            value="3">
                                        <label class="form-check-label" for="payment_method3"> <img class="pointer"
                                                src="{{ Theme::url('images/icons/icon-visa.png') }}"
                                                alt=""><span> Visa</span></label>
                                    </div>
                                </div>
                            </div>
                            <!-- Add any additional fields you need for the checkout process here -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 right-column">
                    <div class="inner-box">
                        <div class="order-summary">
                            <h4 class="sub-title">{{__('shopping.order_summary')}}</h4>
                            <div class="box-table-cart">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>{{__('shopping.product')}}</th>
                                            <th>{{__('shopping.price')}}</th>
                                            <th>{{__('shopping.currency')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($carts as $cart)
                                        <tr>
                                            <td>{{ $cart->name }} x {{ $cart->qty }}</td>
                                            <td>{{ number_format($cart->price * $cart->qty) }}</td>
                                            <td>VND</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{__('shopping.total')}}</th>
                                            <th>{{ $subtotal }}</th>
                                            <th>VND</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="place-order">
                                <button type="submit" class="btn btn-primary btn-block">{{__('shopping.place_order')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@stop