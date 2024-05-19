@extends('parent')

@section('page-title', __('cms.financial_movements'))
@section('main-title', __('cms.financial_movements'))
@section('sub-title', __('cms.index'))

@section('styles')

@endsection


@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">




                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">


                            <div class="d-flex ">
                                <!--begin::Input group-->


                                <div class="position-relative col-sm-12 col-md-12  me-md-2">


                                    <!--begin::Trigger-->
                                    <button type="button" class="btn btn-primary" data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-start">
                                        {{ __('cms.financial_movements') .' - ' .  __('cms.filter')  }}
                                    </button>
                                    <!--end::Trigger-->

                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('financial_movements.index') }}" class="menu-link px-3">
                                                {{ __('cms.all') }}
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('financial_movements.index', 'type=1') }}"
                                                class="menu-link px-3">
                                                {{ __('cms.pay_to_ad') }}
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('financial_movements.index', 'type=2') }}"
                                                class="menu-link px-3">
                                                {{ __('cms.trip_dues') }}
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('financial_movements.index', 'type=3') }}"
                                                class="menu-link px-3">
                                                {{ __('cms.deposit') }}
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('financial_movements.index', 'type=4') }}"
                                                class="menu-link px-3">
                                                {{ __('cms.withdraw') }}
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('financial_movements.index', 'type=5') }}"
                                                class="menu-link px-3">
                                                {{ __('cms.system_commission') }}
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->



                                </div>


                            </div>




                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">


                                {{-- <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
												<span class="svg-icon svg-icon-1 position-absolute ms-6">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacategory="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="{{__('cms.search')}}" /> --}}
                            </div>
                            <!--end::Search-->
                        </div>

                        <!--begin::Card title-->

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
                                            <a href="#"
                                                class="text-gray-800 text-hover-primary mb-1">{{ $movement->transaction_number }}</a>
                                        </td>

                                        <td>
                                            <a href="{{route('user-financialMovements' ,  $movement->wallet->user_id)}}"
                                                class="text-gray-800 text-hover-primary mb-1">{{ $movement->wallet->user?->name ?? $movement->wallet?->name }}</a>
                                        </td>
                                        <td>
                                            @if ($movement->type == 1)
                                                <span class="badge badge-light-primary">{{ $movement->type_name }}</span>
                                            @elseif($movement->type == 2)
                                                <span class="badge badge-light-warning">{{ $movement->type_name }}</span>
                                            @elseif($movement->type == 3)
                                                <span class="badge badge-light-success">{{ $movement->type_name }}</span>
                                            @elseif($movement->type == 4)
                                                <span class="badge badge-light-danger">{{ $movement->type_name }}</span>
                                            @elseif($movement->type == 5)
                                                <span class="badge badge-light-info">{{ $movement->type_name }}</span>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary mb-1">{{ $movement->amount . $movement->impact }}</a>
                                        </td>


                                        <td>
                                            <a href="{{$movement->admin_id ? route('admin-financialMovements' ,  $movement->admin_id) : '#'}}"
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
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('scripts')


    <script>
        function performDestroy(id, reference) {
            confirmDestroy('/cms/cities', id, reference);
        }
    </script>


@endsection
