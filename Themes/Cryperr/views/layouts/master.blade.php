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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
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
            'auth': @json(trans('auth'))
        }
    </script>
    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    {{-- Jquery --}}
    <script src="/libs/jquery/jquery-3.7.0.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> --}}
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- <link href="/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> --}}
    <script src="https://d3js.org/d3.v4.min.js"></script>

    {{-- Date --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" type="text/css" href="/libs/daterangepicker/daterangepicker.css" />

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
    {!! Theme::style('css/main.css') !!}
    <link href="/libs/acuasafe/css/responsive.css" rel="stylesheet" crossorigin="anonymous">


    @stack('css-stack')

    <script>
        const apiQuickBuy = "{{ route('fe.shoppingcart.quickBuy') }}";
        const apiAddToCart = "{{ route('fe.shoppingcart.addToCart') }}";
        const apiDeleteItem = "{{ route('fe.shoppingcart.deleteItem') }}";
        const apiLoadCart = "{{ route('fe.shoppingcart.loadCart') }}";
        const apiUpdateQty = "{{ route('fe.shoppingcart.updateQty') }}";
    </script>
</head>

<body>
    <div class="box_wrapper">
        @include('partials.loading')

        @include('partials.nav')

        <div id="app">
            @yield('content')
        </div>

        @include('partials.footer')

        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    <script type="text/javascript" src="/libs/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="/libs/daterangepicker/daterangepicker.js"></script>

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

    {{-- <script type="text/javascript" src="/libs/acuasafe/js/script.js"></script> --}}
    {!! Theme::script('js/lib.js') !!}
    @yield('scripts')

    <?php if (Setting::has('core::analytics-script')): ?>
    {!! Setting::get('core::analytics-script') !!}
    <?php endif; ?>
    @stack('js')
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    {{-- Toast --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {!! Theme::script('app/app.js') !!}
    {!! Theme::script('js/script.js') !!}

    {{-- Others --}}
    <script>
        var a2a_config = a2a_config || {};
        a2a_config.locale = "vi";
    </script>
</body>

</html>
