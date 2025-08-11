@extends('layouts.master')

@section('title')
    {{ __('shopping.order_detail') }} | @parent
@stop

@section('content')
    <div class="modal-form-custom">
        <section class="box-carts container-custom">
            <div class="row">
                <div class="col-12">
                    <div class="box-order-detail">
                        <div>
                            <h4><strong>{{ __('shopping.order_code') }}: </strong>{{ $order->order_code }}</h4>
                            <p><strong>{{ __('shopping.fname') }}: </strong>{{ $order->fullname }}</p>
                            <p><strong>{{ __('shopping.phone_num') }}: </strong>{{ $order->phone_number }}</p>
                            <p><strong>Email: </strong>{{ $order->email }}</p>
                            <p><strong>{{ __('shopping.address') }}: </strong>{{ $order->address }}</p>
                            <p><strong>{{ __('shopping.payment_method') }}: </strong>
                                @if ($order->payment_method == 1)
                                    COD
                                @elseif ($order->payment_method == 2)
                                    {{ __('shopping.bank_transfer') }}
                                @elseif ($order->payment_method == 3)
                                    Visa
                                @else
                                    {{ __('shopping.unknown_payment_method') }}
                                @endif
                            </p>
                            <p><strong>{{ __('shopping.order_status') }}: </strong>{{ $order_status }}</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"> {{ __('shopping.product') }}
                                        </th>
                                        <th scope="col">{{ __('shopping.price') }}</th>
                                        <th scope="col">{{ __('shopping.quantity') }}</th>
                                        <th scope="col">{{ __('shopping.total') }}</th>
                                        <th scope="col">{{ __('shopping.currency') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $orderTotal = 0;
                                    @endphp
                                    @foreach ($orderDetails as $orderDetail)
                                        @php
                                            $orderTotal += $orderDetail->total;
                                        @endphp
                                        <tr>
                                            <td>{{ $orderDetail->product->title }}</td>
                                            <td>{{ number_format($orderDetail->price) }}</td>
                                            <td>{{ $orderDetail->qty }}</td>
                                            <td>{{ number_format($orderDetail->total) }}</td>
                                            <td>VND</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="cart-total">
                            <div class="row">
                                <div class="col-xl-5 col-lg-12 col-md-12 offset-xl-7 cart-column">
                                    <div class="total-cart-box box-info clearfix">
                                        <ul class="list clearfix" style="background-color: #f2f9ff">
                                            <li class="order-detail_style">
                                                <strong>{{ __('products.cart_total') }}: </strong><span>{{ number_format($orderTotal) }} VND</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="action">
                            <a href="route('trans('product::products.router.product')')"
                                class="btn btn-success">{{ __('shopping.continue_shopping') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
