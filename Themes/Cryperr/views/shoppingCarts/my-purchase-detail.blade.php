@extends('layouts.private')

@section('title')
{{__('shopping.my-purchase-detail')}} {{$orders->order_code}} | @parent
@stop

@section('content')
    <div class="my-purchase-detail">
        <div class="d-flex justify-content-between mb-4">
            <a href="/shoppingcart/my-purchase" class="backlink">
                <img src="{{ Theme::url('images/left-outline.png') }}" alt="" class="me-2 out-line">
                <div class="label">{{__('shopping.my-purchase-detail')}}</div>
            </a>
        </div>
        <section class="box-history-order container-custom">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="box-table-history-order">
                        <div class="box-table-order">
                            <div class="table-title">
                                <img class="pointer" src="{{ Theme::url('images/icons/icon-delivery.png') }}" alt="">
                                <span>{{ __('shopping.order_summary') }} <strong>{{$orders->order_code}}</strong></span>
                            </div>
                            <div class="order-description" id="1">
                                <div class="group-content" id="group-1">
                                    <div id="customer">
                                        <span>{{__('shopping.order.customer')}}:</span> {{$orders->fullname}}
                                    </div>
                                    <div id="phone-number">
                                        <span>{{__('shopping.order.phone-number')}}:</span> {{$orders->phone_number}}
                                    </div>
                                </div>
                                <div class="group-content" id="group-2">
                                    <div id="email">
                                        <span>{{__('shopping.order.email')}}: </span>{{$orders->email}}
                                    </div>
                                    <div id="address">
                                        <span>{{__('shopping.order.address')}}: </span>{{$orders->address}}
                                    </div>
                                </div>
                                <div class="group-content" id="group-3">
                                    <div class="text" id="date">
                                        <span>{{__('shopping.order.purchase-time')}}: </span> {{ \Carbon\Carbon::parse($orders->created_at)->format('d-m-Y H:i:s') }}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php
                                switch ($orders->payment_method) {
                                    case 1:
                                        $paymentMethod = 'COD';
                                        break;
                                    case 2:
                                        $paymentMethod = trans('shopping.order.bank-transfer-method');
                                        break;
                                    case 3:
                                        $paymentMethod = 'Visa';
                                        break;
                                    default:
                                        $paymentMethod = trans('shopping.order.undefined-method');
                                }
                            @endphp
                            <div class="order-description" id="2">
                                <div class="group-content" id="group-3">
                                    <div id="payment-method">
                                        <span>{{__('shopping.order.payment_method')}}: </span> {{$paymentMethod}}
                                    </div>
                                    <div id="order-status">
                                        <span>{{__('shopping.order.order-status')}}: </span> {{$orders->status}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="box-table">
                                <ul class="clearfix">
                                    <li>
                                        <div class="thumb">
                                            {{ __('shopping.product') }}
                                        </div>
                                        <div class="prod-price-block">
                                            {{ __('shopping.price') }}
                                        </div>
                                        <div class="prod-product-number">
                                            {{ __('shopping.quantity') }}
                                        </div>
                                        <div class="prod-total-block">
                                            {{ __('shopping.total') }}
                                        </div>
                                    </li>
                                    @foreach($orderDetails as $orderDetail)
                                    @php
                                        $product = $products->firstWhere('id', $orderDetail->product_id);
                                        $image = $product->getAvatar()->path_string;
                                    @endphp
                                    @if($product)
                                        <li style="margin-top: 30px;">
                                            <div class="thumb">
                                                <a href="" class="img">
                                                    <img src={{ $image }} alt="Image" class="img-fluid" style="height: 100px; width: 100px; object-fit:cover">
                                                </a>
                                                <div class="desc">
                                                    <a href="">
                                                        <h2 class="title">
                                                            {{ $product->title }}
                                                        </h2>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="prod-price-block">
                                                <span class="price">{{  number_format($orderDetail->price, 0, '.', ',') }} đ</span>
                                            </div>
                                            <div class="prod-product-number">
                                                <span class="number">{{ $orderDetail->qty }}</span>
                                            </div>
                                            <div class="prod-total-block">
                                                <span class="price">{{  number_format($orderDetail->total, 0, '.', ',') }} đ</span>
                                            </div>
                                        </li>
                                    @endif
                                    @endforeach
                                    <hr>
                                        <li>
                                            <div class="last-total-price">
                                                <span class="total">{{ __('shopping.total') }}:</span>
                                            </div>
                                            <div class="last-total-value">
                                                <span class="price">{{  number_format($orders->total, 0, '.', ',') }} đ</span>
                                            </div>
                                        </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop