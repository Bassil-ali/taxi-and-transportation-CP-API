@extends('parent')

@section('page-title', __('cms.dashboard'))
@section('main-title', __('cms.statistics'))

@section('styles')

@endsection


@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                @can('Statistics-Users')

                <div class="row g-5 g-xl-8 pb-10">
                    <h1>{{ __('cms.users') }}</h1>
                </div>
                <!--begin::Row-->
                <div class="row g-5 g-xl-8 ">
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 2-->
                        <div class="card card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center pt-3 pb-0">
                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                    <a href="{{ route('users.index' , 'type=1') }}"
                                        class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">{{ $customer_count }}</a>
                                    <span class="fw-bold text-muted fs-5">{{ __('cms.customers') }}</span>

                                </div>

                                <img src="assets/media/svg/avatars/029-boy-11.svg" alt=""
                                    class="align-self-end h-100px" />
                                <div class=" fw-bolder fs-2 mb-2 mt-5">{{ $customer_wallet_balance }}</div>

                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 2-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 2-->
                        <div class="card card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center pt-3 pb-0">
                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                    <a href="{{ route('users.index' , 'type=2') }}"
                                        class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">{{ $driver_count }}</a>
                                    <span class="fw-bold text-muted fs-5">{{ __('cms.drivers') }}</span>
                                </div>
                                <img src="assets/media/svg/avatars/014-girl-7.svg" alt=""
                                    class="align-self-end h-100px" />
                                <div class=" fw-bolder fs-2 mb-2 mt-5">{{ $driver_wallet_balance }}</div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 2-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 2-->
                        <div class="card card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center pt-3 pb-0">
                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                    <a href="{{ route('users.index' ,  'type=3') }}"
                                        class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">{{ $company_count }}</a>
                                    <span class="fw-bold text-muted fs-5">{{ __('cms.companies') }}</span>
                                </div>
                                <img src="assets/media/svg/avatars/014-girl-7.svg" alt=""
                                    class="align-self-end h-100px" />
                                <div class=" fw-bolder fs-2 mb-2 mt-5">{{ $company_wallet_balance }}</div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 2-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 2-->
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center pt-3 pb-0">
                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                    <a href="{{ route('users.index' , 'type=4') }}"
                                        class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">{{ $employee_count }}</a>
                                    <span class="fw-bold text-muted fs-5">{{ __('cms.employees') }}</span>
                                </div>
                                <img src="assets/media/svg/avatars/004-boy-1.svg" alt=""
                                    class="align-self-end h-100px" />

                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 2-->
                    </div>
                </div>
                <!--end::Row-->

                @endcan

                @can('Statistics-Trips-Ads')
                <div class="row g-5 g-xl-8  pb-10">
                    <h1>{{ __('cms.ads') . ' & ' . __('cms.trips') }}</h1>
                </div>
                <!--begin::Row-->
                <div class="row g-5 g-xl-8">

                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M14 12V21H10V12C10 11.4 10.4 11 11 11H13C13.6 11 14 11.4 14 12ZM7 2H5C4.4 2 4 2.4 4 3V21H8V3C8 2.4 7.6 2 7 2Z"
                                            fill="black" />
                                        <path
                                            d="M21 20H20V16C20 15.4 19.6 15 19 15H17C16.4 15 16 15.4 16 16V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $ads_count }}</div>
                                <div class="fw-bold text-white">{{ __('cms.ads') }}</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-warning hoverable card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M14 12V21H10V12C10 11.4 10.4 11 11 11H13C13.6 11 14 11.4 14 12ZM7 2H5C4.4 2 4 2.4 4 3V21H8V3C8 2.4 7.6 2 7 2Z"
                                            fill="black" />
                                        <path
                                            d="M21 20H20V16C20 15.4 19.6 15 19 15H17C16.4 15 16 15.4 16 16V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $completed_ads_count }}</div>
                                <div class="fw-bold text-white">{{ __('cms.completed_ads') }}</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>

                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-info hoverablecard-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M14 12V21H10V12C10 11.4 10.4 11 11 11H13C13.6 11 14 11.4 14 12ZM7 2H5C4.4 2 4 2.4 4 3V21H8V3C8 2.4 7.6 2 7 2Z"
                                            fill="black" />
                                        <path
                                            d="M21 20H20V16C20 15.4 19.6 15 19 15H17C16.4 15 16 15.4 16 16V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $trips_count }}</div>
                                <div class="fw-bold text-white">{{ __('cms.trips') }}</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M14 12V21H10V12C10 11.4 10.4 11 11 11H13C13.6 11 14 11.4 14 12ZM7 2H5C4.4 2 4 2.4 4 3V21H8V3C8 2.4 7.6 2 7 2Z"
                                            fill="black" />
                                        <path
                                            d="M21 20H20V16C20 15.4 19.6 15 19 15H17C16.4 15 16 15.4 16 16V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $completed_trips_count }}</div>
                                <div class="fw-bold text-white">{{ __('cms.completed_trips') }}</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                </div>
                <!--end::Row-->
                @endcan
                @can('Statistics-FinancialInformation')

                <div class="row g-5 g-xl-8  pb-10">
                    <h1>{{ __('cms.financial_information') }}</h1>
                </div>


                <!--begin::Row-->
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-6">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect x="8" y="9" width="3" height="10"
                                            rx="1.5" fill="black" />
                                        <rect opacity="0.5" x="13" y="5" width="3"
                                            height="14" rx="1.5" fill="black" />
                                        <rect x="18" y="11" width="3" height="8"
                                            rx="1.5" fill="black" />
                                        <rect x="3" y="13" width="3" height="6"
                                            rx="1.5" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{ $system_wallet_balance }}</div>
                                <div class="fw-bold text-gray-400">{{ __('cms.pending_balance') }}</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-xl-6">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect x="8" y="9" width="3" height="10"
                                            rx="1.5" fill="black" />
                                        <rect opacity="0.5" x="13" y="5" width="3"
                                            height="14" rx="1.5" fill="black" />
                                        <rect x="18" y="11" width="3" height="8"
                                            rx="1.5" fill="black" />
                                        <rect x="3" y="13" width="3" height="6"
                                            rx="1.5" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">{{ $system_commission_balance }}</div>
                                <div class="fw-bold text-gray-100">{{ __('cms.profits') }}</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>

                </div>
                <!--end::Row-->
                @endcan






            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

@section('scripts')





    <script>
        function
        performDestroy(id, reference) {
            confirmDestroy('/cms/users', id, reference);
        }
    </script>



@endsection
