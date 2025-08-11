@php
    $lang = LaravelLocalization::setLocale() ? LaravelLocalization::setLocale() : 'en';
    $favicon = setting('core::favicon') ? setting('core::favicon') : Theme::url('favicon.ico');
    $site_name = setting('core::site-name') ? setting('core::site-name') : 'Cryperr Trading';
    $site_description = setting('core::site-description') ? setting('core::site-description') : 'Cryperr Trading';
@endphp

<!DOCTYPE html>
<html>

<head lang="{{ $lang }}">
    <meta charset="UTF-8">
    @section('meta')
        <meta name="description" content="{{ $site_description }}" />
    @show
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="pusher-key" content={{ config('broadcasting.connections.pusher.key') }}>
    <meta name="cluster" content={{ config('broadcasting.connections.pusher.options.cluster') }}>
    <meta name="app-url" content={{ config('app.url') }}>

    <title>
        @section('title') {{ $site_name }} @show
    </title>
    @if (isset($alternate))
        @foreach ($alternate as $alternateLocale => $alternateSlug)
            <link rel="alternate" hreflang="{{ $alternateLocale }}"
                href="{{ url($alternateLocale . '/' . $alternateSlug) }}">
        @endforeach
    @endif
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="shortcut icon" href="{{ $favicon }}">
    <script>
        window.translations = {
            'auth' : @json(trans('auth')),
            'wallet' : @json(trans('wallet')),
            'warning' : @json(trans('warning')),
            'loyalty' : @json(trans('loyalty')),
            'kyc' : @json(trans('kyc')),
        }
    </script>

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">


    {{-- Jquery --}}
    <script src="/libs/jquery/jquery-3.7.0.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> --}}

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    {{-- Date --}}
    <link rel="stylesheet" type="text/css" href="/libs/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    {{-- select 2 --}}
    {{-- <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script> --}}

    {{-- QR code --}}
    <script src="/libs/qrcodejs/qrcode.min.js"></script>
    @include('partials.custom-style')

    <link href="/libs/acuasafe/css/animate.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/libs/acuasafe/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/libs/acuasafe/css/color.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/libs/acuasafe/css/flaticon.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/libs/acuasafe/css/font-awesome-all.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/libs/acuasafe/css/jquery-ui.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/libs/acuasafe/css/rtl.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/libs/acuasafe/css/jquery.fancybox.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/libs/acuasafe/css/nice-select.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/libs/acuasafe/css/jquery.bootstrap-touchspin.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/libs/acuasafe/css/owl.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/libs/acuasafe/css/style.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/libs/acuasafe/css/responsive.css" rel="stylesheet" crossorigin="anonymous">
    
    {{-- Other --}}
    {!! Theme::style('css/main.css') !!}

    @stack('css-stack')
</head>

<body>
    <div class="box_wrapper">
        @include('partials.private-nav')
        <br>
        <div class="private-layout">
            <div class="private-layout-body p-15 p-lg-0">
                @include('partials.menu-panel')
                <div class="app-content" id="app">
                    @yield('content')
                </div>
            </div>
        </div>
        @if (auth()->guard('customer')->check())
            @include('partials.navigator')
        @endif

        @include('partials.footer')
    </div>

    {!! Theme::script('app/app.js') !!}
    {!! Theme::script('js/lib.js') !!}

    @yield('scripts')

    <?php if (Setting::has('core::analytics-script')): ?>
    {!! Setting::get('core::analytics-script') !!}
    <?php endif; ?>

    @stack('js-stack')

    {{-- Toast --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/libs/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="/libs/acuasafe/js/jquery.js"></script>
    <script type="text/javascript" src="/libs/acuasafe/js/popper.min.js"></script>
    <script type="text/javascript" src="/libs/acuasafe/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/libs/acuasafe/js/owl.js"></script>
    <script type="text/javascript" src="/libs/acuasafe/js/wow.js"></script>
    <script type="text/javascript" src="/libs/acuasafe/js/validation.js"></script>
    <script type="text/javascript" src="/libs/acuasafe/js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="/libs/acuasafe/js/appear.js"></script>
    <script type="text/javascript" src="/libs/acuasafe/js/scrollbar.js"></script>
    <script type="text/javascript" src="/libs/acuasafe/js/jquery-ui.js"></script>
    <script type="text/javascript" src="/libs/acuasafe/js/jquery.nice-select.min.js"></script>
    <script type="text/javascript" src="/libs/acuasafe/js/jquery.bootstrap-touchspin.js"></script>
    <script type="text/javascript" src="/libs/acuasafe/js/map-helper.js"></script>
    <script type="text/javascript" src="/libs/acuasafe/js/pagenav.js"></script>

    <script type="text/javascript" src="/libs/acuasafe/js/script.js"></script>

    {{-- Date --}}
    <script type="text/javascript" src="/libs/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="/libs/daterangepicker/daterangepicker.js"></script>
    {!! Theme::script('js/script.js') !!}
    {{-- Others --}}
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}")
        @endif
        @if (session('errors'))
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
        @if (session('warning'))
            toastr.warning("{{ session('warning') }}")
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
