@extends('layouts.private')

@section('title')
Order History | @parent
@stop

@section('content')
    <div class="my-purchase" style="margin-bottom: 400px; margin-right: 20px">
        <form action="{{route('fe.shoppingcart.myPurchase')}}" method="GET" class="form-my-purchase row g-2 g-lg-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="form-item mb-0">
                    <label for="order_code" class="form-label">
                        {{ __('shopping.order.order_code') }}
                    </label>
                    <input type="text" class="input secondary form-control" name="order_code" value="{{request()->get('order_code')}}">
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="form-item mb-0">
                    <label for="payment_code" class="form-label">
                        {{ __('shopping.order.payment_code') }}
                    </label>
                    <input type="text" class="input secondary form-control" name="payment_code" value="{{request()->get('payment_code')}}">
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="form-item mb-0">
                    <label for="status" class="form-label">
                        {{ __('shopping.order.order-status') }}
                    </label>
                </div>
                <select name="status" class="input secondary" data-theme="default secondary" data-placeholder="Select Status">
                    <option selected value="">All</option> 
                    @foreach($statuses as $status)
                        <option value="{{$status}}" {{request()->get('status')==$status ?'selected':""}}>{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 col-md-3">
                <div class="form-item mb-0">
                    <label for="searchnow" class="form-label">
                        {{ __('shopping.searchnow') }}
                    </label>
                    <button class="btn btn-primary secondary" type="submit" style="width:100%;">{{ __('shopping.search-btn') }}</button>
                </div>
            </div>
        </form>
        <div class="recent-purchase">
            <h2 class="fs-4 mb-3">{{ __('shopping.my-purchase') }}</h2>
            <div class="wrap-table" style="overflow-x: auto; overflow-y: hidden;">
                @if($orders->count() > 0)
                <table class="table" style="min-width: 700px">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('shopping.order_code') }}</th>
                            <th scope="col">{{ __('shopping.total_payment') }}</th>
                            <th scope="col">{{ __('shopping.order.payment_code') }}</th>
                            <th scope="col">{{ __('shopping.order.purchase-time') }}</th>
                            <th scope="col text-end">{{ __('shopping.order.status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="order-code-style">
                                    <a href="{{route('fe.shoppingcart.myPurchaseDetail', ['order_id' => $order->id])}}">{{$order->order_code}}</a>
                                </td>
                                <td>{{ number_format($order->total, 0, '.', ',') }} VND</td>
                                <td>{{$order->payment_code}}</td>
                                <td class="text">{{$order->created_at}}</td>
                                <td id="{{$order->status}}">{{$order->status}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <br>
                <div class="table-empty" style="display: flex; justify-content:center">
                    <img class="" width="36px" height="40px" src="{{ Theme::url('images/empty.png') }}" alt="">
                    {{__('shopping.order.empty-order')}}
                </div>
                @endif
            </div>
        </div>
        <div style="display: flex; justify-content:center">    
            {!! $orders->links('partials.pagination') !!}
        </div>
    </div>
@stop