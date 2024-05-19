@extends('parent')

@section('page-title', __('cms.trips'))
@section('main-title', __('cms.trips'))
@section('sub-title', __('cms.view'))

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


                            <form class='filter_form' method="GET" action="{{ route('trips.index') }}">
                                <div class="d-flex align-items-center">
                                    <!--begin::Input group-->
                                    <div class="position-relative w-md-400px me-md-2">
                                        <div class="row g-8" data-select2-id="select2-data-81-ehjt">
                                            <!--begin::Col-->
                                            <div class="col-lg-6" data-select2-id="select2-data-80-83gi">
                                                <!--begin::Select-->
                                                {{-- <select class="form-select form-select-solid select2-hidden-accessible" data-control="select2" data-placeholder="trip type" data-hide-search="true" data-select2-id="select2-data-10-1cz0" tabindex="-1" aria-hidden="true" name="type">
                                                                <option value="">{{__('cms.all')}}</option>
                                                                <option value="1" >{{__('cms.trips')}} </option>
                                                                <option value="2" >{{__('cms.drivers')}} </option>
                                                                <option value="3" >{{__('cms.companies')}}</option>
                                                                <option value="4" >{{__('cms.employees')}}</option>

                                                            </select> --}}

                                                <!--end::Select-->
                                            </div>
                                            <!--end::Col-->
                                        </div>

                                    </div>

                                    <!--end::Input group-->
                                    <!--begin:Action-->
                                    <div class="d-flex justify-content-center">
                                        {{-- <button type="submit" class="btn btn-primary me-5">{{__('cms.search')}}</button> --}}

                                    </div>
                                    <!--end:Action-->

                                </div>
                            </form>



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
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->


                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                @can('Trips-Create')
                                    <a class="btn btn-primary" href="{{ route('trips.create') }}">{{ __('cms.add') }}</a>
                                @endcan
                                <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-customer-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-customer-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
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
                                    <th class="min-w-125px">{{ __('cms.customer') }}</th>
                                    <th class="min-w-125px">{{ __('cms.company') }}</th>
                                    <th class="min-w-125px">{{ __('cms.driver') }}</th>
                                    <th class="min-w-125px">{{ __('cms.price') }}</th>
                                    <th class="min-w-125px">{{ __('cms.dues') }}</th>
                                    <th class="min-w-125px">{{ __('cms.date') }}</th>
                                    <th class="min-w-125px">{{ __('cms.go_time') }}</th>

                                    <th class="min-w-125px">{{ __('cms.status') }}</th>
                                    <th class="min-w-125px"> {{ __('cms.ad_id') }}</th>
                                    <th class="min-w-125px">{{ __('cms.created_at') }}</th>

                                    <th class="text-end min-w-70px">{{ __('cms.actions') }}</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($trips as $trip)
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
                                                class="text-gray-800 text-hover-primary ">{{ $trip->id }}</a>
                                        </td>


                                        <!--end::Name=-->
                                        <!--begin::Email=-->
                                        <td>
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary ">{{ $trip->customer?->name }}</a>
                                        </td>
                                        <td>
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary ">{{ $trip->company?->name }}</a>
                                        </td>
                                        <td>
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary ">{{ $trip->driver?->name }}</a>
                                        </td>

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
                                                <a href="{{ route('trips.show', $trip->ad_id) }}"
                                                    class="text-gray-800 text-hover-primary">{{ $trip->ad_id }} </a>
                                            @else
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary ">{{ __('cms.add_by_admin') }}</a>
                                            @endif
                                        </td>
                                        <td>{{ $trip->created_at }}</td>


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
                                                @can('Trips-Update')
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('trips.edit', $trip->id) }}"
                                                            class="menu-link px-3">{{ __('cms.edit') }}</a>
                                                    </div>
                                                @endcan

                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                @can('Trips-Delete')
                                                    <div class="menu-item px-3">
                                                        <a href="#" onclick="performDestroy('{{ $trip->id }}', this)"
                                                            class="menu-link px-3"
                                                            data-kt-customer-table-filter="delete_row">{{ __('cms.delete') }}</a>
                                                    </div>
                                                @endcan
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
        <!--end::Post-->
    </div>
@endsection

@section('scripts')





    <script>
        function
        performDestroy(id, reference) {
            confirmDestroy('/cms/trips', id, reference);
        }
    </script>



@endsection
