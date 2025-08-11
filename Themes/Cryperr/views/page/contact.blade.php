@extends('layouts.master')

@php
    $checkAuth = auth()->guard('customer')->check();
    if($checkAuth) {
        $customer = auth()->guard('customer')->user();
        $customerName = $customer->profile->firstname . ' ' . $customer->profile->lastname;
        $customerEmail = $customer->email;
        $customerPhone = $customer->profile->phone_number;
    }
    else {
        $customerName = null;
        $customerEmail = null;
        $customerPhone = null;
    }
    
@endphp

@section('title')
    {{__('contact.title')}} | @parent
@stop

@section('content')
    <section class="page-title centred" style="background-image: url({{ Theme::url('images/acuasafe/background/page-title.jpg') }});">
        <div class="shape" style="background-image: url({{ Theme::url('images/acuasafe/shape/banner-shap.png') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{__('contact.title')}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{route('homepage')}}">{{__('setting.home')}}</a></li>
                    <li>{{__('contact.title')}}</li>
                </ul>
            </div>
        </div>
    </section>


    <section class="contact-style-two">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="form-column d-flex justify-content-center"> <div class="form-inner">
                        <h3>{{__('contact.leave-a-message')}}</h3>
                        <form method="POST" action="{{ route('fe.contact.contact.store') }}" id="contact-form" class="default-form">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="name" id="name" placeholder="{{__('contact.form.your-name')}}" value="{{$customerName}}" required="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" id="email" placeholder="{{__('contact.form.email-address')}}" value="{{$customerEmail}}" required="">
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="phone" id="phone" required="" value="{{$customerPhone}}" placeholder="{{__('contact.form.phone')}}">
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="title" id="title" required="" placeholder="{{__('contact.form.title')}}">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="message" id="message" placeholder="{{__('contact.form.message')}}"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                    <button class="theme-btn btn-one" type="submit" name="submit-form">{{__('contact.form.submit-now')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
