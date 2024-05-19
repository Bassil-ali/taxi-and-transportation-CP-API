<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>@yield('page-title')</title>
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    {{-- <link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" /> --}}
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    @if (App::getLocale() == 'en')
        <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @elseif (App::getLocale() == 'ar')
        <link href="{{ asset('assets/css/style.bundle.rtl.css" rel="stylesheet') }}" type="text/css" />

        <!--end::Global Stylesheets Bundle-->

        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css') }}" rel="stylesheet"
            type="text/css" />
        <!--end::Page Vendor Stylesheets-->

        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->

        <html direction="rtl" dir="rtl" style="direction: rtl">
    @endif

    <style>
        .custom-menu-item {
            font-size: 16px;
        }
    </style>
    @yield('styles')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true"
                data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <!--begin::Brand-->
                <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                    <!--begin::Logo-->
                    <a href="#">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo-1-dark.svg') }}"
                            class="h-25px logo" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Aside toggler-->
                    <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                        data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                        data-kt-toggle-name="aside-minimize">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                        <span class="svg-icon svg-icon-1 rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path opacity="0.5"
                                    d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                    fill="black" />
                                <path
                                    d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Aside toggler-->
                </div>
                <!--end::Brand-->
                <!--begin::Aside menu-->
                <div class="aside-menu flex-column-fluid">
                    <!--begin::Aside Menu-->
                    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
                        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                        data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">

                        <!--begin::Menu-->
                        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                            id="#kt_aside_menu" data-kt-menu="true">
                            <div class="menu-item">
                                <div class="menu-content pb-2">
                                    <span
                                        class="menu-section text-muted text-uppercase fs-8 ls-1">{{ __('cms.dashboard') }}</span>
                                </div>

                                <div class="menu-item">
                                    <a class="menu-link " href="{{ route('main.statistics.index') }}"
                                        id="main-statistics">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect x="2" y="2" width="9"
                                                        height="9" rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="2"
                                                        width="9" height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="13" y="13"
                                                        width="9" height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="2" y="13"
                                                        width="9" height="9" rx="2" fill="black">
                                                    </rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title custom-menu-item">{{ __('cms.main') }}</span>
                                    </a>
                                </div>

                            </div>


                            @can('FincialMovement-Show')
                                <div class="menu-item">
                                    <a class="menu-link " href="{{ route('financial_movements.index') }}"
                                        id="financial_movements">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect x="2" y="2" width="9" height="9"
                                                        rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="2" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="13" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="2" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span
                                            class="menu-title custom-menu-item">{{ __('cms.financial_movements') }}</span>
                                    </a>
                                </div>
                            @endcan
                            @canAny(['TransportTypes-Show', 'Cities-Show', 'Regions-Show', 'Categories-Show'])
                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-3">
                                        <span
                                            class="menu-section text-muted text-uppercase fs-8 ls-1">{{ __('cms.cms') }}</span>
                                    </div>
                                </div>
                            @endcanAny
                            @can('Cities-Show')
                                <div class="menu-item">
                                    <a class="menu-link " href="{{ route('cities.index') }}" id="cities">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect x="2" y="2" width="9" height="9"
                                                        rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="2" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="13" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="2" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title custom-menu-item">{{ __('cms.cities') }}</span>
                                    </a>
                                </div>
                            @endcan
                            @can('Regions-Show')
                                <div class="menu-item">
                                    <a class="menu-link " href="{{ route('regions.index') }}" id="regions">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect x="2" y="2" width="9" height="9"
                                                        rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="2" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="13" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="2" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title custom-menu-item">{{ __('cms.regions') }}</span>
                                    </a>
                                </div>
                            @endcan
                            @can('Categories-Show')
                                <div class="menu-item">
                                    <a class="menu-link " href="{{ route('categories.index') }}" id="categories">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect x="2" y="2" width="9" height="9"
                                                        rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="2" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="13" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="2" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title custom-menu-item">{{ __('cms.categories') }}</span>
                                    </a>
                                </div>
                            @endcan
                            @can('TransportTypes-Show')
                                <div class="menu-item">
                                    <a class="menu-link " href="{{ route('transport-types.index') }}"
                                        id="transport-types">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect x="2" y="2" width="9" height="9"
                                                        rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="2" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="13" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="2" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title custom-menu-item">{{ __('cms.transport_types') }}</span>
                                    </a>
                                </div>
                            @endcan
                            {{-- @can('TransportTypes-Show') --}}

                            @canAny(['Users-Show', 'Admins-Show'])
                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-3">
                                        <span
                                            class="menu-section text-muted text-uppercase fs-8 ls-1">{{ __('cms.users') }}</span>
                                    </div>
                                </div>
                            @endcanAny
                            @can('Admins-Show')
                                <div class="menu-item">
                                    <a class="menu-link " href="{{ route('admins.index') }}" id="admins">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect x="2" y="2" width="9" height="9"
                                                        rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="2" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="13" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="2" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title custom-menu-item">{{ __('cms.admins') }}</span>
                                    </a>
                                </div>
                            @endcan
                            @can('Users-Show')
                                <div class="menu-item">
                                    <a class="menu-link " href="{{ route('users.index') }}" id="users">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect x="2" y="2" width="9" height="9"
                                                        rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="2" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="13" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="2" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title custom-menu-item">{{ __('cms.users') }}</span>
                                    </a>
                                </div>
                            @endcan
                            @can('Roles-Show')
                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-3">
                                        <span
                                            class="menu-section text-muted text-uppercase fs-8 ls-1">{{ __('cms.roles') . ' & ' . __('cms.permissions') }}</span>
                                    </div>
                                </div>



                                <div class="menu-item">
                                    <a class="menu-link " href="{{ route('roles.index') }}" id="roles">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect x="2" y="2" width="9" height="9"
                                                        rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="2" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="13" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="2" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title custom-menu-item">{{ __('cms.roles') }}</span>
                                    </a>
                                </div>
                            @endcan


                            @canAny(['Ads-Show', 'Trips-Show'])
                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-3 ">
                                        <span
                                            class="menu-section text-muted text-uppercase fs-8 ls-1">{{ __('cms.ads') . ' & ' . __('cms.trips') }}</span>
                                    </div>
                                </div>
                            @endcanAny
                            @can('Ads-Show')
                                <div class="menu-item">
                                    <a class="menu-link " href="{{ route('ads.index') }}" id="ads">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect x="2" y="2" width="9" height="9"
                                                        rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="2" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="13" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="2" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title custom-menu-item">{{ __('cms.ads') }}</span>
                                    </a>
                                </div>
                            @endcan
                            @can('Trips-Show')
                                <div class="menu-item">
                                    <a class="menu-link " href="{{ route('trips.index') }}" id="trips">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect x="2" y="2" width="9" height="9"
                                                        rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="2" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="13" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                    <rect opacity="0.3" x="2" y="13" width="9"
                                                        height="9" rx="2" fill="black">
                                                    </rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title custom-menu-item">{{ __('cms.trips') }}</span>
                                    </a>
                                </div>
                            @endcan


                            @canAny(['Settings-Update', 'ContactUs-Show'])

                            <div class="menu-item">
                                <div class="menu-content pt-8 pb-3">
                                    <span
                                        class="menu-section text-muted text-uppercase fs-8 ls-1">{{ __('cms.settings') }}</span>
                                </div>
                            </div>
                            @endcanAny
                            @can('Settings-Update')
                            <div class="menu-item">
                                <a class="menu-link " href="{{ route('system_settings.edit') }}"
                                    id="system/settings">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect x="2" y="2" width="9" height="9"
                                                    rx="2" fill="black"></rect>
                                                <rect opacity="0.3" x="13" y="2" width="9"
                                                    height="9" rx="2" fill="black"></rect>
                                                <rect opacity="0.3" x="13" y="13" width="9"
                                                    height="9" rx="2" fill="black"></rect>
                                                <rect opacity="0.3" x="2" y="13" width="9"
                                                    height="9" rx="2" fill="black"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title custom-menu-item">{{ __('cms.edit_settings') }}</span>
                                </a>
                            </div>
                            @endcan

                            @can('ContactUs-Show')

                            <div class="menu-item">
                                <a class="menu-link " href="{{ route('contact-us.index') }}" id="contact-us">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect x="2" y="2" width="9" height="9"
                                                    rx="2" fill="black"></rect>
                                                <rect opacity="0.3" x="13" y="2" width="9"
                                                    height="9" rx="2" fill="black">
                                                </rect>
                                                <rect opacity="0.3" x="13" y="13" width="9"
                                                    height="9" rx="2" fill="black">
                                                </rect>
                                                <rect opacity="0.3" x="2" y="13" width="9"
                                                    height="9" rx="2" fill="black">
                                                </rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title custom-menu-item">{{ __('cms.contact_us') }}</span>
                                </a>
                            </div>
                            @endcan





                            <div class="menu-item">
                                <div class="menu-content pt-8 pb-3">
                                    <span
                                        class="menu-section text-muted text-uppercase fs-8 ls-1">{{ __('cms.settings') }}</span>
                                </div>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link " href="{{ route('admin.edit-profile') }}"
                                    id="auth/edit-profile">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect x="2" y="2" width="9" height="9"
                                                    rx="2" fill="black"></rect>
                                                <rect opacity="0.3" x="13" y="2" width="9"
                                                    height="9" rx="2" fill="black"></rect>
                                                <rect opacity="0.3" x="13" y="13" width="9"
                                                    height="9" rx="2" fill="black"></rect>
                                                <rect opacity="0.3" x="2" y="13" width="9"
                                                    height="9" rx="2" fill="black"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title custom-menu-item">{{ __('cms.edit_profile') }}</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link " href="{{ route('admin.edit-password') }}"
                                    id="auth/edit-password">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect x="2" y="2" width="9" height="9"
                                                    rx="2" fill="black"></rect>
                                                <rect opacity="0.3" x="13" y="2" width="9"
                                                    height="9" rx="2" fill="black"></rect>
                                                <rect opacity="0.3" x="13" y="13" width="9"
                                                    height="9" rx="2" fill="black"></rect>
                                                <rect opacity="0.3" x="2" y="13" width="9"
                                                    height="9" rx="2" fill="black"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title custom-menu-item">{{ __('cms.edit_password') }}</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link " href="{{ route('admin-logout') }}">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect x="2" y="2" width="9" height="9"
                                                    rx="2" fill="black"></rect>
                                                <rect opacity="0.3" x="13" y="2" width="9"
                                                    height="9" rx="2" fill="black"></rect>
                                                <rect opacity="0.3" x="13" y="13" width="9"
                                                    height="9" rx="2" fill="black"></rect>
                                                <rect opacity="0.3" x="2" y="13" width="9"
                                                    height="9" rx="2" fill="black"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title custom-menu-item">{{ __('cms.sign_out') }}</span>
                                </a>
                            </div>




                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Aside Menu-->
                </div>
                <!--end::Aside menu-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" style="" class="header align-items-stretch">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <!--begin::Aside mobile toggle-->
                        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                id="kt_aside_mobile_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-2x mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <!--end::Aside mobile toggle-->
                        <!--begin::Mobile logo-->
                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                            <a href="../../demo1/dist/index.html" class="d-lg-none">
                                <img alt="Logo" src="{{ asset('assets/media/logos/logo-2.svg') }}"
                                    class="h-30px" />
                            </a>
                        </div>
                        <!--end::Mobile logo-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                            <!--begin::Navbar-->
                            <div class="d-flex align-items-stretch" id="kt_header_nav">
                            </div>
                            <!--end::Navbar-->
                            <!--begin::Topbar-->
                            <div class="d-flex align-items-stretch flex-shrink-0">
                                <!--begin::Toolbar wrapper-->
                                <div class="d-flex align-items-stretch flex-shrink-0">


                                    <!--begin::User-->
                                    <div class="d-flex align-items-center ms-1 ms-lg-3"
                                        id="kt_header_user_menu_toggle">
                                        <!--begin::Menu wrapper-->
                                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                            data-kt-menu-placement="bottom-end">
                                            <img src="{{ asset('assets/media/avatars/150-26.jpg') }}"
                                                alt="user" />
                                        </div>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content d-flex align-items-center px-3">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-50px me-5">
                                                        <img alt="Logo"
                                                            src="{{ asset('assets/media/avatars/150-26.jpg') }}" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Username-->
                                                    <div class="d-flex flex-column">
                                                        <div class="fw-bolder d-flex align-items-center fs-5">
                                                            {{ auth()->user()->name }}

                                                            <span
                                                                class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Admin</span>
                                                        </div>
                                                        <a href="#"
                                                            class="fw-bold text-muted text-hover-primary fs-7">
                                                            {{ auth()->user()->email }}</a>
                                                    </div>
                                                    <!--end::Username-->
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->

                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5" data-kt-menu-trigger="hover"
                                                data-kt-menu-placement="left-start">
                                                <a href="#" class="menu-link px-5">
                                                    <span class="menu-title position-relative">{{ __('cms.lang') }}
                                                        @if (App::getLocale() == 'en')
                                                            <span
                                                                class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{ __('cms.english') }}
                                                                <img class="w-15px h-15px rounded-1 ms-2"
                                                                    src="{{ asset('assets/media/flags/united-states.svg') }}"
                                                                    alt="" /></span>
                                                    </span>
                                                @else
                                                    <span
                                                        class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{ __('cms.arabic') }}
                                                        <img class="w-15px h-15px rounded-1 ms-2"
                                                            src="{{ asset('assets/media/flags/saudi-arabia.svg') }}"
                                                            alt="" /></span></span>
                                                    @endif
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href={{ route('dashboard.languge', 'en') }}
                                                            onclick="localStorage.setItem('local_lang', 'en')"
                                                            class="menu-link d-flex px-5 active">
                                                            <span class="symbol symbol-20px me-4">
                                                                <img class="rounded-1"
                                                                    src="{{ asset('assets/media/flags/united-states.svg') }}"
                                                                    alt="" />
                                                            </span>English</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href={{ route('dashboard.languge', 'ar') }}
                                                            onclick="localStorage.setItem('local_lang', 'ar')"
                                                            class="menu-link d-flex px-5 active">
                                                            <span class="symbol symbol-20px me-4">
                                                                <img class="rounded-1"
                                                                    src="{{ asset('assets/media/flags/saudi-arabia.svg') }}"
                                                                    alt="" />
                                                            </span>Arabic</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5 my-1">
                                                <a href="{{ route('admin.edit-profile') }}"
                                                    class="menu-link px-5">{{ __('cms.edit_profile') }} </a>
                                            </div>
                                            <div class="menu-item px-5 my-1">
                                                <a href="{{ route('admin.edit-password') }}"
                                                    class="menu-link px-5">{{ __('cms.edit_password') }} </a>
                                            </div>

                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5">
                                                <a href="{{ route('admin-logout') }}"
                                                    class="menu-link px-5">{{ __('cms.sign_out') }} </a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->

                                        </div>
                                        <!--end::Menu-->
                                        <!--end::Menu wrapper-->
                                    </div>
                                    <!--end::User -->

                                </div>
                                <!--end::Toolbar wrapper-->
                            </div>
                            <!--end::Topbar-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Toolbar-->
                    <div class="toolbar" id="kt_toolbar">
                        <!--begin::Container-->
                        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                            <!--begin::Page title-->
                            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                <!--begin::Title-->
                                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('main-title')
                                    <!--begin::Separator-->
                                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                                    <!--end::Separator-->
                                    <!--begin::Description-->
                                    <small class="text-muted fs-7 fw-bold my-1 ms-1">@yield('sub-title')</small>
                                    <!--end::Description-->
                                </h1>
                                <!--end::Title-->
                            </div>

                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container-xxl">

                            @yield('content')
                        </div>
                    </div>

                    <!--end::Post-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">{{ now()->year }}©</span>
                            <a href="#" target="_blank" class="text-gray-800 text-hover-primary">Taxi
                                App</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                            <li class="menu-item">
                                <a href="#" target="_blank" class="menu-link px-2">About</a>
                            </li>

                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    <!--begin::Modals-->



    <!--end::Modals-->

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--end::Main-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    <script src={{ asset('js/axios.js') }}></script>
    <script src={{ asset('js/sweetalert.js') }}></script>
    <script src={{ asset('js/crud.js') }}></script>



    <!--begin::Javascript-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/js/custom/apps/customers/list/export.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/customers/list/list.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/customers/add.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    <script>
        let path = window.location.pathname;
        let element = null;
        if (path == "/cms") {
            element = document.getElementById('main-statistics')

        } else {
            path = path.split("/cms/").pop();
            element = document.getElementById(path);
        }



        element.classList.add("active");
    </script>
    @yield('scripts')





</body>
<!--end::Body-->

</html>
