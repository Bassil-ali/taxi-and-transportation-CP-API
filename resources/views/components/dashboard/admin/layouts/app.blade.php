<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}" dir="{{ session('dir') }}" data-bs-theme-mode="dark">

<head>

    <title>{{ getTransSetting('websit_title', app()->getLocale()) . ' - ' . $title ?? '' }}</title>

    <meta content="{{ getTransSetting('websit_description', app()->getLocale()) }}" name="description">
    <meta content="{{ getTagsSetting('websit_keywords', app()->getLocale()) }}" name="keywords">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8"/>
    <meta property="og:locale" content="{{ app()->getLocale() }}_US" />
    <meta property="og:type" content="App"/>
    <meta property="og:title" content="{{ getTransSetting('websit_title', app()->getLocale()) . ' - ' . $title ?? '' }}" />
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:site_name" content="{{ getTransSetting('websit_title', app()->getLocale()) }}" />

    <link rel="canonical" href="{{ request()->url() }}" />
    <link rel="shortcut icon" href="{{ getImageSetting('websit_logo') }}" />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
            
    <x-dashboard.admin.layouts.includes.styles/>

    {{ $style ?? '' }}

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row">
            <!--begin::Aside-->
            <x-dashboard.admin.layouts.includes.aside/>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <x-dashboard.admin.layouts.includes.header/>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    
                    <!--begin::Toolbar-->
                    {{-- <x-dashboard.admin.layouts.includes.toolbar/> --}}
                    <!--end::Toolbar-->

                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container-xxl">
                            
                            {{ $slot }}

                        </div>
                    </div>

                    <!--end::Post-->
                </div>
                <!--end::Content-->

                <!--begin::Footer-->
                {{-- <x-dashboard.admin.layouts.includes.footer/> --}}
                <!--end::Footer-->
                
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    <!--begin::Scrolltop-->
    <x-dashboard.admin.layouts.includes.scrolltop/>
    <!--end::Scrolltop-->

    <!--begin::Scrolltop-->
    <x-dashboard.admin.layouts.includes.scripts/>
    <!--end::Scrolltop-->

    {{ $scripts ?? '' }}

</body>
<!--end::Body-->
</html>