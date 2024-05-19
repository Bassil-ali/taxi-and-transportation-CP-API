<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">


@if (app()->getLocale() == 'en')

    @if(session('them-mode') == 'dark')

        <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/css/style.dark.bundle.css') }}" rel="stylesheet" type="text/css" />
    
    @else

        <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    @endif

@else

    @if(session('them-mode') == 'dark')

        <link href="{{ asset('assets/plugins/global/plugins.dark.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/css/style.dark.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />

    @else

        <link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />

    @endif
    
@endif

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:400,600&display=swap">

{{--noty--}}
<link rel="stylesheet" href="{{ asset('assets/plugins/noty/noty.css') }}">
<script src="{{ asset('assets/plugins/noty/noty.min.js') }}"></script>

<link href="{{ asset('assets/css/new_style.css') }}" rel="stylesheet" type="text/css" />