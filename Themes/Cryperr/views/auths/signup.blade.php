@extends('layouts.master')

@section('title')
{{__('auth.register-title')}} | @parent
@stop

@section('content')
<div class="contact-style-two signup auth">
    <div class="auto-container auth-body">
        <div class="row clearfix" style="background-color: #caf0f8; padding: 20px; border-radius: 25px;">
            <h1 class="mb-3">{{__('auth.register-header')}}</h1>

            <form class="row" method="post" action="{{ route('fe.customer.customer.postRegister') }}">
                @csrf 

                <div class="col-12 col-md-6 mb-3">
                    <label for="firstname" class="form-label">{{__('auth.firstname')}}</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname') }}" required> 
                    @error('firstname')
                        <div class="form-text error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-12 col-md-6 mb-3">
                    <label for="lastname" class="form-label">{{__('auth.lastname')}}</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
                    @error('lastname')
                        <div class="form-text error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-12 col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="form-text error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <label for="country" class="form-label">{{__('auth.country')}}</label>
                    @php
                    $countries = \Modules\Customer\Entities\Country::all();
                    @endphp
                    <select class="form-select" id="country" name="country_id" data-theme="default" required>
                        <option value="">{{__('auth.p-country')}}</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                {{ $country->country_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('country_id')
                        <div class="form-text error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <label for="password" class="form-label">{{__('auth.password')}}</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                        <div class="form-text error">{{ $message }}</div>
                    @enderror 
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="confirm-password" class="form-label">{{__('auth.confirm-password')}}</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    @error('password_confirmation')
                        <div class="form-text error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <label for="ref_code" class="form-label">{{__('auth.ref-code')}}</label> 
                    <input type="text" class="form-control" id="ref_code" name="ref_code" value="{{ $ref_code }}">
                    @error('ref_code')
                        <div class="form-text error">{{ $message }}</div>
                    @enderror
                </div>
               
                <div class="d-flex justify-content-center w-100 mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="signup_agree" required>
                        <label class="form-check-label" for="remember">{{__('auth.uspp')}}</label>
                    </div>
                </div>

                <div class="action mt-3 d-flex justify-content-center">
                    <button type="submit" class="theme-btn btn-one">{{__('auth.register-title')}}</button>
                </div>

                <p class="description mt-4 text-center">{{__('auth.already-account')}}? <a style="color: #b0190f" href="{{ route('fe.customer.customer.login') }}">{{__('auth.sign-in')}}</a></p>
            </form>
        </div>
    </div>
</div>
@stop
