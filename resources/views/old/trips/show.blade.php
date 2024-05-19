@extends('parent')

@section('page-title', __('cms.trips') . ' | ' . __('cms.show'))
@section('main-title', __('cms.trips'))
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
                <h3 class="fw-bolder m-0"> {{ __('cms.trip_details') }}</h3>
            </div>
            <!--end::Card title-->
            <!--begin::Action-->
            <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-primary align-self-center">{{ __('cms.edit') }}</a>
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

                    <span class="fw-bolder fs-6 text-gray-800"><a href="{{route('users.show' , $trip->customer_id)}}">{{$trip->customer?->name}}</a></span>


                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.company') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    @if ( $trip->company_id)

                    <span class="fw-bolder fs-6 text-gray-800"> <a href="{{route('users.show' , $trip->company_id)}}">{{$trip->company?->name}}</a> </span>
                    @endif
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.driver') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    @if ( $trip->driver_id)
                    <span class="fw-bolder fs-6 text-gray-800"> <a href="{{route('users.show' , $trip->driver_id)}}">{{$trip->driver?->name}}</a> </span>
                    @endif
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
                    <span class="fw-bolder fs-6 text-gray-800">{{ $trip->price }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.dues')}}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $trip->dues }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.date') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $trip->date }}</span>
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
                    <span class="fw-bolder fs-6 text-gray-800">{{ $trip->go_time }}</span>
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
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.ad_id') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">
                        @if ($trip->ad_id)
                        <a href="{{route('ads.show' , $trip->ad_id)}}" class="text-gray-800 text-hover-primary" >{{$trip->ad_id}} </a>
                        @else
                        <a href="#" class="text-gray-800 text-hover-primary ">{{__('cms.add_by_admin')}}</a>
                        @endif
                    </span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('cms.created_at') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $trip->created_at }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->


        </div>
        <!--end::Card body-->
    </div>

@endsection

@section('scripts')



@endsection
