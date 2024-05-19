@extends('parent')

@section('page-title', __('cms.ads') . ' | ' . __('cms.show'))
@section('main-title', __('cms.ads'))
@section('sub-title', __('cms.show'))

@section('styles')

@endsection


@section('content')
    <!-- Main content -->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0"> {{ __('cms.da_details') }}</h3>
            </div>
            <!--end::Card title-->
            <!--begin::Action-->
            <a href="{{ route('ads.edit', $ad->id) }}" class="btn btn-primary align-self-center">{{ __('cms.edit') }}</a>
            <!--end::Action-->
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9">
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.customer') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800"><a
                            href="{{ route('users.show', $ad->user_id) }}">{{ $ad->user?->name }}</a></span>
                </div>
                <!--end::Col-->
            </div>
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.title') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->title }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.category') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->category->name_lang }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.city') . ' - ' . __('cms.from') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->from_city?->name_lang }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.regions') . ' - ' . __('cms.from') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->from_region?->name_lang }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.city') . ' - ' . __('cms.to') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->to_city?->name_lang }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.regions') . ' - ' . __('cms.to') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->to_region?->name_lang }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.people_number') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->people_number }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.gender') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->gender_name }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.go_time') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->go_time }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.return_time') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->return_time }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.duration') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->duration_name }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.days_week') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->days_name }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.date') . ' - ' . __('cms.start_date') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->start_date }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.communication') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->communication_name }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.service_provider') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->service_provider_name }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.transport_type') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->transport_type?->name_lang }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.distance') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->distance }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.estimated_time') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->estimated_time }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.price') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->price }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->


            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.notes') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $ad->notes }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.status') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">


                    @if ($ad->status == 1)
                        <span class="badge badge-light-primary">{{ $ad->status_name }}</span>
                    @elseif ($ad->status == 2)
                        <span class="badge badge-light-success">{{ $ad->status_name }}</span>
                    @else
                        <span class="badge badge-light-danger">{{ $ad->status_name }}</span>
                    @endif

                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->







        </div>
        <!--end::Card body-->
    </div>
    <!--start::ad proposals-->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">


        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0"> {{ __('cms.ad') . ' | ' . __('cms.proposals') }}</h3>
                    </div>
                    <!--end::Card title-->

                </div>
                <!--begin::Card header-->


                <!--begin::Card body-->
                <div class="table-responsive p-10">
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
                                <th class="min-w-125px">{{ __('cms.assign') }}</th>
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
                                            class="text-gray-600 text-hover-primary ">{{ $proposal->user?->type_name }}</a>
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


                                    <td>
                                        @if ($ad->proposalAcceptedAd)
                                            @if ($ad->proposalAcceptedAd->proposal_id == $proposal->id)
                                                <span class="badge badge-light-success">success</span>
                                            @else
                                                {{-- <span class="badge badge-light-danger"  > danger</span> --}}
                                            @endif
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
                                                <a href="{{ route('proposals.show', $proposal->id) }}"
                                                    class="menu-link px-3">{{ __('cms.show') }}</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            {{-- <div class="menu-item px-3">
                                                <a href="{{ route('proposals.edit', $proposal->id) }}"
                                                    class="menu-link px-3">{{ __('cms.edit') }}</a>
                                            </div> --}}
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            @can('Ads-Accept-Proposal')
                                                <div class="menu-item px-3">
                                                    <a href="#"
                                                        onclick="accept_proposal({{ $ad->id }} , {{ $proposal->id }})"
                                                        class="menu-link px-3"
                                                        data-kt-customer-table-filter="delete_row">{{ __('cms.accept') }}</a>
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
        </div>
        <!--end::Container-->

    </div>
    <!--end::ad proposals-->

    <!--start:: ad trips-->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0"> {{ __('cms.ad') . ' | ' . __('cms.trips') }}</h3>
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

                                <th class="min-w-125px"> {{ __('cms.customer') }}</th>
                                <th class="min-w-125px">{{ __('cms.price') }}</th>
                                <th class="min-w-125px">{{ __('cms.dues') }}</th>
                                <th class="min-w-125px">{{ __('cms.date') }}</th>
                                <th class="min-w-125px">{{ __('cms.go_time') }}</th>

                                <th class="min-w-125px">{{ __('cms.status') }}</th>

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
                                            class="text-gray-600 text-hover-primary ">{{ $trip->customer->name }}</a>
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
    <!--end:: ad trips-->
@endsection

@section('scripts')

    <script>
        function accept_proposal(ad_id, proposal_id) {
            let data = {
                ad_id: ad_id,
                proposal_id: proposal_id,
            }
            axios.post('/cms/proposal-accepted-ads ', data).then(function(response) {
                    // handle success
                    toastr.success(response.data.message);
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
