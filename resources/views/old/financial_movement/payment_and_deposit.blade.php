@extends('parent')

@section('page-title', __('cms.cities'))
@section('main-title', __('cms.cities'))
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

                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <a class="btn btn-primary" href="{{ route('cities.create') }}">{{ __('cms.add_city') }}</a>
                                <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->
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
                                    <th class="min-w-125px"> {{ __('cms.user') }}</th>
                                    <th class="min-w-125px"> {{ __('cms.amount') }}</th>
                                    <th class="min-w-125px">{{ __('cms.type') }}</th>
                                    <th class="min-w-125px">{{ __('cms.admin') }}</th>
                                    <th class="min-w-125px">{{ __('cms.created_at') }}</th>
                                    <th class="text-end min-w-70px">{{ __('cms.actions') }}</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($financial_movements as $movement)
                                    <tr>

                                        <td>
                                            <a href="#"
                                                class="text-gray-800 text-hover-primary mb-1">{{ $movement->id }}</a>
                                        </td>

                                        <td>
                                            <a href="#"
                                                class="text-gray-800 text-hover-primary mb-1">{{ $movement->wallet->user?->name ?? $movement->wallet->name  }}</a>
                                        </td>
                                        <!--end::Name=-->
                                        <!--begin::Email=-->
                                        <td>
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary mb-1">{{ $movement->amount }}</a>
                                        </td>

                                        <td>
                                            @if ($movement->type == 1)
                                            <span class="badge badge-light-danger">{{ $movement->type_name }}</span>
                                            @elseif($movement->type == 2)
                                            <span class="badge badge-light-success">{{ $movement->type_name }}</span>
                                            @endif

                                        </td>


                                        <td>
                                            <a href="{{ $movement->admin_id ? route('admins.show' , $movement->admin_id) : '#'}}"
                                                class="text-gray-600 text-hover-primary mb-1">{{ $movement->admin?->name }}</a>
                                        </td>


                                        <td>{{ $movement->created_at }}</td>

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
                                                    <a href="{{ route('cities.edit', $movement->id) }}"
                                                        class="menu-link px-3">{{ __('cms.edit') }}</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" onclick="performDestroy('{{ $movement->id }}', this)"
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
