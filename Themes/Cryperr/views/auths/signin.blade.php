@extends('layouts.master')
@section('title')
{{__('auth.login-title')}} | @parent
@stop
@section('content')
<section class="page-title centred" style="background-image: url({{ Theme::url('images/acuasafe/background/page-title.jpg') }});">
    <div class="shape" style="background-image: url({{ Theme::url('images/acuasafe/shape/banner-shap.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>{{__('auth.welcomeback')}}</h1>
        </div>
    </div>
</section>
<section class="contact-style-two">
    <div class="auto-container" style="max-width: 600px;">
        <div class="row clearfix" style="background-color: #caf0f8; padding: 20px; border-radius: 25px;">
            <p class="description mb-4" style="color: #000000;">{{__('auth.no-account')}} <a style="color: #b0190f" href="{{ route('fe.customer.customer.register') }}">{{__('auth.register-title')}}</a></p>
            <form-signin :link-forgot="'{{ route('fe.customer.customer.forgot') }}'"></form-signin>
        </div>
    </div>
</section>
@stop