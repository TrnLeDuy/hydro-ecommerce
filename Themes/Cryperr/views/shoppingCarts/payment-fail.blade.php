@extends('layouts.master')

@section('title')
{{ __('shopping.order_status') }} | @parent
@stop

@section('content')
<div class="modal-form-custom">
    <section class="box-carts-detail container-custom">
        <div class="row">
            <div class="col-12">
                <div class="box-order-status">
                    <div class="title">
                        <h3>{{ __('shopping.order_payment_fail_title') }}</h3>
                        <p>{{ __('shopping.order_payment_fail_description') }}</p>
                    </div>
                    <div class="image">
                        <img src="{{ Theme::url('images/carbon_task-fail.png') }}" alt="" />
                    </div>
                    <div class="action">
                        <a href="{{ route('fe.shoppingcart.getOrderDetail',$code) }}" class="btn">{{ __('shopping.view') }}</a>
                        <a href="/san-pham" class="btn btn-success">{{ __('shopping.continue_shopping') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop