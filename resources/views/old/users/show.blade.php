@extends('parent')

@section('page-title', __('cms.users'))
@section('main-title', __('cms.users'))
@section('sub-title', __('cms.view'))

@section('styles')

@endsection


@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="card mb-5 mb-xxl-8">
            <div class="card-body pt-9 pb-0">
                <!--begin::Details-->
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <!--begin: Pic-->
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                            @if ($user->image)
                                <img src="{{ $user->profile_image }}" alt="image" />
                            @else
                                <img src="{{ asset('assets/media/avatars/150-26.jpg') }}" alt="image" />
                            @endif
                            @if ($user->status == 1)
                                <div
                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px">
                                </div>
                            @else
                                <div
                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-danger rounded-circle border border-4 border-white h-20px w-20px">
                                </div>
                            @endif
                        </div>
                    </div>
                    <!--end::Pic-->
                    <!--begin::Info-->
                    <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <!--begin::User-->
                            <div class="d-flex flex-column">
                                <!--begin::Name-->
                                <div class="d-flex align-items-center mb-2">
                                    <a href="#"
                                        class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ $user->name }}</a>
                                    <a href="#">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                        @if ($user->email_verified_at)
                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                        fill="#00A3FF" />
                                                    <path class="permanent"
                                                        d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                        fill="white" />
                                                </svg>
                                            </span>
                                        @endif
                                        <!--end::Svg Icon-->
                                    </a>
                                </div>
                                <!--end::Name-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                    <a href="{{ $user->type == 4 ? route('users.show', $user->parent->id) : '' }}"
                                        style="margin-left: 5px; margin-right:5px"
                                        class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                    fill="black" />
                                                <path
                                                    d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->{{ $user->type_name }}
                                        @if ($user->type == 4)
                                            - {{ $user->parent->name }}
                                        @endif
                                    </a>
                                    <a href="#" style="margin-left: 5px; margin-right:5px"
                                        class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                    fill="black" />
                                                <path
                                                    d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->{{ $user->email }}
                                    </a>

                                    <a href="#" style="margin-left: 5px; margin-right:5px"
                                        class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <i class="fas fa-phone-square-alt"></i>
                                        </span>
                                        <!--end::Svg Icon-->{{ $user->mobile }}
                                    </a>

                                    <a href="#"
                                        class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <span class="svg-icon svg-icon-secoundery svg-icon-2x">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Devices/Phone.svg-->
                                                <i class="far fa-id-card"></i>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <!--end::Svg Icon-->{{ $user->id_number }}
                                    </a>

                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->
                            <!--begin::Actions-->



                            <div class="d-flex my-4">
                                                {{-- @can('FincialMovement-Create') --}}
                                <a href="{{ route('users.edit', $user->id) }}" id="modal-button" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_new_target"
                                    class="btn btn-sm me-3 btn-warning">{{ __('cms.new_financial_movements') }}</a>
                                                {{-- @endcan --}}
                                <a href="#" onclick="performToggleStatus('{{ $user->id }}')"
                                    class="btn btn-sm  {{ $user->status ? 'btn-danger' : 'btn-success' }} me-3"
                                    data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_offer_a_deal">{{ $user->status ? __('cms.deactivate') : __('cms.activate') }}</a>
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="btn btn-sm me-3 btn-primary">{{ __('cms.edit') }}</a>
                                <!--begin::Menu-->

                                <!--end::Menu-->
                            </div>
                            <!--end::Actions-->

                        </div>
                        <!--end::Title-->
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap flex-stack">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap">
                                    <!--begin::Stat-->

                                    <!--end::Stat-->

                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="13" y="6" width="13"
                                                        height="2" rx="1" transform="rotate(90 13 6)"
                                                        fill="black" />
                                                    <path
                                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                data-kt-countup-value="{{ $trips->count() }}" data-kt-countup-prefix="">0
                                            </div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-6 text-gray-400">{{ __('cms.trips') }}</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->




                                    <!--end::Stat-->
                                    @if ($user->type == 1)
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6"
                                                            width="13" height="2" rx="1"
                                                            transform="rotate(90 13 6)" fill="black" />
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $ads->count() }}"
                                                    data-kt-countup-prefix="">0
                                                </div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">{{ __('cms.ads') }}</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    @endif






                                    <!--end::Stat-->
                                    @if ($user->type == 2 || $user->type == 3)
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6"
                                                            width="13" height="2" rx="1"
                                                            transform="rotate(90 13 6)" fill="black" />
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $proposals->count() }}"
                                                    data-kt-countup-prefix="">0
                                                </div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">{{ __('cms.proposals') }}</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    @endif



                                    @if ($user->type == 3)
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $employee_count }}"
                                                    data-kt-countup-prefix="">0 <a
                                                        href='{{ $user->type == 3 ? route('users.index', "parent_id=$user->id") : '' }}'>
                                                </div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">{{ __('cms.employees') }}</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <path
                                                                d="M12,2 C13.8385982,2 15.5193947,3.03878936 16.3416408,4.68328157 L19,10 C20.365323,12.730646 19.25851,16.0510849 16.527864,17.4164079 C15.7602901,17.8001948 14.9139019,18 14.0557281,18 L9.94427191,18 C6.8913169,18 4.41640786,15.525091 4.41640786,12.472136 C4.41640786,11.6139622 4.61621302,10.767574 5,10 L7.65835921,4.68328157 C8.48060532,3.03878936 10.1614018,2 12,2 Z M7.55,13.6 C9.00633458,14.6922509 10.4936654,15.25 12,15.25 C13.5063346,15.25 14.9936654,14.6922509 16.45,13.6 L15.55,12.4 C14.3396679,13.3077491 13.1603321,13.75 12,13.75 C10.8396679,13.75 9.66033208,13.3077491 8.45,12.4 L7.55,13.6 Z"
                                                                fill="#000000" />
                                                            <path
                                                                d="M6.15999985,21.0604779 L8.15999985,17.5963763 C8.43614222,17.1180837 9.04773263,16.9542085 9.52602525,17.2303509 C10.0043179,17.5064933 10.168193,18.1180837 9.89205065,18.5963763 L7.89205065,22.0604779 C7.61590828,22.5387706 7.00431787,22.7026457 6.52602525,22.4265033 C6.04773263,22.150361 5.88385747,21.5387706 6.15999985,21.0604779 Z M17.8320512,21.0301278 C18.1081936,21.5084204 17.9443184,22.1200108 17.4660258,22.3961532 C16.9877332,22.6722956 16.3761428,22.5084204 16.1000004,22.0301278 L14.1000004,18.5660262 C13.823858,18.0877335 13.9877332,17.4761431 14.4660258,17.2000008 C14.9443184,16.9238584 15.5559088,17.0877335 15.8320512,17.5660262 L17.8320512,21.0301278 Z"
                                                                fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $user->seats_numbers }}"
                                                    data-kt-countup-prefix="">0 <a href='#'></div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">{{ __('cms.seates_numbers') }}</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    @endif

                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Money.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24" />
                                                        <path
                                                            d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z"
                                                            fill="#000000" opacity="0.3"
                                                            transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) " />
                                                        <path
                                                            d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z"
                                                            fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <!--end::Svg Icon-->
                                            <div class="fs-2 fw-bolder" data-kt-countup="false"
                                                data-kt-countup-value="{{ $wallet->balance }}" data-kt-countup-prefix="">
                                                {{ $wallet->balance }} <a href='#'>
                                            </div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-6 text-gray-400">{{ __('cms.balance') }}</div>
                                        <!--end::Label-->
                                    </div>
                                </div>


                            </div>
                            <!--end::Wrapper-->

                        </div>
                        <!--end::Stats-->
                        @if ($user->type == 2 || $user->type == 4)
                            <!--begin::secound Stats -->
                            <div class="d-flex flex-wrap flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">

                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <i class="fas fa-car"></i>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <div class="fs-2 fw-bolder">{{ $user->vehicle_type }}</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">{{ __('cms.vehicle_type') }}</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 icon-success me-2">
                                                    <i class="fas fa-car  text-warning"></i>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <div class="fs-2 fw-bolder">{{ $user->vehicle_color }}</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">{{ __('cms.vehicle_color') }}</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 icon-success me-2">
                                                    <i class="las la-barcode"></i>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <div class="fs-2 fw-bolder">{{ $user->plate_number }}</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">{{ __('cms.plate_number') }}</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->

                                    </div>

                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end:: secound Stats-->
                        @endif

                    </div>


                    <!--end::Info-->
                </div>

            </div>

        </div>


    </div>

    @if ($user->type != 4)

        <div id="kt_content_container" class="container-xxl mb-10">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0"> {{ __('cms.financial_movements') }}</h3>
                    </div>
                    <!--end::Card title-->

                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="table-responsive p-10">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-4" id="">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                {{-- <th class="w-10px pe-2">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                                                </div>
                                            </th> --}}
                                <th class="min-w-125px">#</th>
                                <th class="min-w-125px">{{ __('cms.trans_number') }}</th>
                                <th class="min-w-125px"> {{ __('cms.user') }}</th>
                                <th class="min-w-125px">{{ __('cms.type') }}</th>
                                <th class="min-w-125px"> {{ __('cms.amount') }}</th>
                                <th class="min-w-125px">{{ __('cms.admin') }}</th>
                                <th class="min-w-125px">{{ __('cms.ad') }}</th>
                                <th class="min-w-125px">{{ __('cms.trip_id') }}</th>
                                <th class="min-w-125px">{{ __('cms.created_at') }}</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($financial_movements as $movement)
                                <tr>
                                    <!--begin::Checkbox-->
                                    {{-- <td>
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="1" />
                                                </div>
                                            </td> --}}
                                    <!--end::Checkbox-->
                                    <!--begin::Name=-->
                                    <td>
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $movement->id }}</a>
                                    </td>
                                    <td>
                                        <a href="{{route('user-financialMovements' ,  $movement->wallet->user_id)}}"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $movement->transaction_number }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-gray-800 text-hover-dange mb-1">{{ $movement->wallet->user?->name ?? $movement->wallet?->name }}</a>
                                    </td>
                                    <td>
                                        @if ($movement->type == 1)
                                            <span class="badge badge-light-success">{{ $movement->type_name }}</span>
                                        @elseif($movement->type == 2)
                                            <span class="badge badge-light-danger">{{ $movement->type_name }}</span>
                                        @elseif($movement->type == 3)
                                            <span class="badge badge-light-success">{{ $movement->type_name }}</span>
                                        @elseif($movement->type == 4)
                                            <span class="badge badge-light-danger">{{ $movement->type_name }}</span>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary mb-1">{{ $movement->amount . $movement->impact }}</a>
                                    </td>


                                    <td>
                                        <a href="{{$movement->admin ? route('admin-financialMovements' ,  $movement->admin_id) : '#'}}"
                                            class="text-gray-600 text-hover-primary mb-1">{{ $movement->admin?->name ?? 'None' }}</a>
                                    </td>




                                    <td>
                                        <a href="{{ $movement->ad_id ? route('ads.show', $movement->ad_id) : '#' }}"
                                            class="text-gray-600 text-hover-primary mb-1">{{ $movement->ad_id }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ $movement->trip_id ? route('trips.show', $movement->trip_id) : '#' }}"
                                            class="text-gray-600 text-hover-primary mb-1">{{ $movement->trip_id }}</a>
                                    </td>



                                    <td>{{ $movement->created_at }}</td>

                                    <!--end::Date=-->

                                </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    {{ $financial_movements->links() }}
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>

    @endif

    @if ($user->type == 1)

        <div id="kt_content_container" class="container-xxl mb-10">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0"> {{ __('cms.ads') }}</h3>
                    </div>
                    <!--end::Card title-->

                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="table-responsive p-10">
                    <!--begin::Table-->
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-4" id="">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->

                            <th class="min-w-125px">#</th>
                            <th class="min-w-125px">{{ __('cms.title') }}</th>
                            <th class="min-w-125px">{{ __('cms.customer') }}</th>
                            <th class="min-w-125px">{{ __('cms.categorty') }}</th>
                            <th class="min-w-125px">{{ __('cms.price') }}</th>
                            <th class="min-w-125px">{{ __('cms.status') }}</th>
                            <th class="min-w-125px">{{ __('cms.created_at') }}</th>
                            <th class="text-end min-w-70px">{{ __('cms.actions') }}</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($ads as $ad)
                                <tr>
                                    <!--end::Checkbox-->
                                    <!--begin::Name=-->
                                    <td>
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary ">{{ $ad->id }}</a>
                                    </td>


                                    <!--end::Name=-->
                                    <!--begin::Email=-->
                                    <td>
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary ">{{ $ad->title }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary ">{{ $ad->user?->name }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary ">{{ $ad->category?->name_lang }}</a>
                                    </td>

                                    <td>
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary">{{ $ad->price }}</a>
                                    </td>


                                    <!--end::Email=-->

                                    <!--begin::Date=-->
                                    <td>
                                        @if ($ad->status == 1)
                                            <span class="badge badge-light-primary">{{ $ad->status_name }}</span>
                                        @elseif ($ad->status == 2)
                                            <span class="badge badge-light-success">{{ $ad->status_name }}</span>
                                        @else
                                            <span class="badge badge-light-danger">{{ $ad->status_name }}</span>
                                        @endif
                                    </td>

                                    <td>{{ $ad->created_at }}</td>


                                    <!--end::Date=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                            data-kt-menu-trigger="click"
                                            data-kt-menu-placement="bottom-end">{{ __('cms.actions') }}
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('ads.show', $ad->id) }}"
                                                    class="menu-link px-3">{{ __('cms.show') }}</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('ads.edit', $ad->id) }}"
                                                    class="menu-link px-3">{{ __('cms.edit') }}</a>
                                            </div>
                                            <!--end::Menu item-->

                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                    {{ $ads->links() }}
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>



    @endif

    @if ($user->type == 2 || $user->type == 3)
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header cursor-pointer">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0"> {{ __('cms.proposals') }}</h3>
                            </div>
                            <!--end::Card title-->

                        </div>
                        <!--begin::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            {{-- <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table"> --}}
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">#</th>
                                        <th class="min-w-125px">{{ __('cms.user') }}</th>
                                        <th class="min-w-125px">{{ __('cms.type') }}</th>
                                        <th class="min-w-125px">{{ __('cms.price') }}</th>
                                        <th class="min-w-125px">{{ __('cms.commission') }}</th>
                                        <th class="min-w-125px">{{ __('cms.dues') }}</th>
                                        <th class="min-w-125px">{{ __('cms.details') }}</th>
                                        <th class="min-w-125px">{{ __('cms.created_at') }}</th>
                                        <th class="text-end min-w-70px">{{ __('cms.actions') }}</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                    @foreach ($proposals as $proposal)
                                        <tr>
                                            <td>
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary ">{{ $proposal->id }}</a>
                                            </td>


                                            <!--end::Name=-->
                                            <td>
                                                <a href="#"
                                                    class="text-gray-600 text-hover-primary ">{{ $proposal->user?->name }}</a>
                                            </td>
                                            <td>
                                                <a href="#"
                                                    class="text-gray-600 text-hover-primary ">{{ $proposal->user->type_name }}</a>
                                            </td>

                                            <td>
                                                <a href="#"
                                                    class="text-gray-600 text-hover-primary">{{ $proposal->price }}</a>
                                            </td>
                                            <td>
                                                <a href="#"
                                                    class="text-gray-600 text-hover-primary ">{{ $proposal->commission }}</a>
                                            </td>


                                            <td>
                                                <a href="#"
                                                    class="text-gray-600 text-hover-primary ">{{ $proposal->dues }}</a>
                                            </td>

                                            <td>
                                                <a href="#"
                                                    class="text-gray-600 text-hover-primary">{{ $proposal->details }}</a>
                                            </td>



                                            <td>{{ $proposal->created_at }}</td>


                                            <!--end::Date=-->
                                            <!--begin::Action=-->
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">{{ __('cms.actions') }}
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                    <span class="svg-icon svg-icon-5 m-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('ads.show', $proposal->id) }}"
                                                            class="menu-link px-3">{{ __('cms.show') }}</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('ads.edit', $proposal->id) }}"
                                                            class="menu-link px-3">{{ __('cms.edit') }}</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    {{-- <div class="menu-item px-3">
                                                <a href="#" onclick="performDestroy('{{$ad->id}}', this)" class="menu-link px-3" data-kt-customer-table-filter="delete_row">{{__('cms.delete')}}</a>
                                            </div> --}}
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                            <!--end::Action=-->
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                            {{ $proposals->links() }}
                        </div>

                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>

    @endif



    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0"> {{ __('cms.trips') }}</h3>
                    </div>
                    <!--end::Card title-->

                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="table-responsive p-10">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-4" id="">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

                                <th class="min-w-125px">#</th>

                                <th class="min-w-125px">{{ __('cms.price') }}</th>
                                <th class="min-w-125px">{{ __('cms.dues') }}</th>
                                <th class="min-w-125px">{{ __('cms.date') }}</th>
                                <th class="min-w-125px">{{ __('cms.go_time') }}</th>

                                <th class="min-w-125px">{{ __('cms.status') }}</th>
                                <th class="min-w-125px"> {{ __('cms.ad_id') }}</th>

                                <th class="text-end min-w-70px">{{ __('cms.actions') }}</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($trips as $trip)
                                <tr>
                                    <td>
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary ">{{ $trip->id }}</a>
                                    </td>


                                    <!--end::Name=-->
                                    <!--begin::Email=-->
                                    {{-- @if ($user->type != 1)
                                <td>
                                    <a href="#" class="text-gray-600 text-hover-primary ">{{$trip->customer->name}}</a>
                                </td>
                                @endif


                                @if ($user->type == 1 || $user->type == 4)
                                <td>
                                    <a href="#" class="text-gray-600 text-hover-primary ">{{$trip->company?->name}}</a>
                                </td>
                                @endif

                                @if ($user->type == 1 || $user->type == 3)
                                <td>
                                    <a href="#" class="text-gray-600 text-hover-primary ">{{$trip->driver?->name}}</a>
                                </td>
                                @endif --}}




                                    <td>
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary">{{ $trip->price }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary">{{ $trip->dues }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary">{{ $trip->date }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary ">{{ $trip->go_time }}</a>
                                    </td>
                                    <!--end::Email=-->

                                    <!--begin::Date=-->

                                    <td>
                                        @if ($trip->status == 0)
                                            <span class="badge badge-light-danger">{{ $trip->status_name }}</span>
                                        @elseif ($trip->status == 1)
                                            <span class="badge badge-light-primary">{{ $trip->status_name }}</span>
                                        @elseif ($trip->status == 2)
                                            <span class="badge badge-light-info">{{ $trip->status_name }}</span>
                                        @elseif ($trip->status == 3)
                                            <span class="badge badge-light-warning">{{ $trip->status_name }}</span>
                                        @elseif ($trip->status == 4)
                                            <span class="badge badge-light-success">{{ $trip->status_name }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($trip->ad_id)
                                            <a href="{{ route('ads.show', $trip->ad_id) }}"
                                                class="text-gray-800 text-hover-primary">{{ $trip->ad_id }} </a>
                                        @else
                                            <a href="#" class="text-gray-800 text-hover-primary ">Added by Admin</a>
                                        @endif
                                    </td>


                                    <!--end::Date=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                            data-kt-menu-trigger="click"
                                            data-kt-menu-placement="bottom-end">{{ __('cms.actions') }}
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('trips.show', $trip->id) }}"
                                                    class="menu-link px-3">{{ __('cms.show') }}</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('trips.edit', $trip->id) }}"
                                                    class="menu-link px-3">{{ __('cms.edit') }}</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" onclick="performDestroy('{{ $trip->id }}', this)"
                                                    class="menu-link px-3"
                                                    data-kt-customer-table-filter="delete_row">{{ __('cms.delete') }}</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                    {{ $trips->links() }}
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>





    <!--begin::Modal - New Target-->
    <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form id="kt_modal_new_target_form" class="form" action="#" onsubmit="event.preventDefault()">
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">{{ __('cms.new_financial_movements') }}</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-bold fs-5"> {{ __('cms.current_balance') . ': ' }} <span
                                    class="text-danger">{{ $user->wallet->balance }}</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Heading-->

                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_new_card_form" class="form" action="#">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-7 fv-row">

                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                <span class="required">{{ __('cms.amount') }}</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a card holder's name"></i>
                                            </label>

                                            <!--end::Label-->
                                            <!--begin::Input wrapper-->
                                            <div class="position-relative">
                                                <!--begin::Input-->
                                                <input type="number" class="form-control form-control-solid"
                                                    placeholder="Enter amount" name="movement_amount"
                                                    id="movement_amount" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input wrapper-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->


                                        <div class="row mb-10">
                                            <!--begin::Col-->
                                            <div class="col-md-12 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                    <span class="required">{{ __('cms.movement_type') }}</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                        data-bs-toggle="tooltip" title="Specify a card holder's name"></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Row-->
                                                <div class="row fv-row">
                                                    <!--begin::Col-->
                                                    <div class="col-12">
                                                        <select name="card_expiry_month"
                                                            class="form-select form-select-solid" data-control="select2"
                                                            data-hide-search="true" id="movement_type">
                                                            <option value="3">{{ __('cms.deposit') }}</option>
                                                            <option value="4">{{ __('cms.withdraw') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->


                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                            <div class="text-center">
                                <button type="reset" id="kt_modal_new_target_cancel"
                                    class="btn btn-light me-3">Cancel</button>
                                <button type="submit" id="days_submit" class="btn btn-primary"
                                    onclick="new_movement()">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </div>
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Target-->






@endsection

@section('scripts')
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/js/custom/pages/projects/settings/settings.js') }}"></script>
    {{-- <script src="{{asset('assets/js/custom/modals/users-search.js')}}"></script>
		<script src="{{asset('assets/js/custom/modals/new-target.js')}}"></script> --}}


    <script>
        $("#days_submit").click(function() {
            $('#kt_modal_new_target').modal('toggle');

        })
        $("#duration").change(function() {
            if (this.value == 2 || this.value == 3) {
                document.getElementById("modal-button").click();
                $("#modal-button").show();;

            } else {
                $("#modal-button").hide();;
            }

        })
    </script>



    <script>
        function performDestroy(id, reference) {
            confirmDestroy('/cms/users', id, reference);
        }

        function performToggleStatus(id) {
            confirmToggleStatus('/cms/users/toggle-status', id);
        }
    </script>


    <script>
        function new_movement() {

            let data = {

                amount: document.getElementById('movement_amount').value,
                type: document.getElementById('movement_type').value,
                wallet_id: '{{ $user->wallet->id }}',

            }
            axios.post('/cms/financial_movements', data).then(function(response) {
                    toastr.success(response.data.message);
                    document.getElementById('kt_modal_new_target_form').reset();
                    location.reload();
                })
                .catch(function(error) {
                    // handle error
                    toastr.error(error.response.data.message);
                    console.log(error);
                })
        }
    </script>



@endsection
