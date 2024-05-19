@extends('parent')

@section('page-title', __('cms.ads') . ' | ' . __('cms.edit'))
@section('main-title', __('cms.ads'))
@section('sub-title', __('cms.edit'))

@section('styles')

@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title fw-bolder"><span> {{ __('cms.edit_ad') }} </span>
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->



                <form class="form-horizontal " id="edit-form" autocomplete="off">
                    @csrf
                    <div class="card-body">


                        <div class="mb-10">
                            <label for="from_city_id"
                                class=" required  clo-lg-2 col-md-8  col-form-label">{{ __('cms.from') }}</label>
                            <div class="d-flex flex-row">
                                <div class="form-group" style="width: 50%">
                                    <!-- row -->
                                    <div class="col-sm-10 col-md-8">
                                        <select name="from_city_id" id="from_city_id" data-control="select2"
                                            data-placeholder="{{ __('cms.select_city') }}"
                                            class="form-select form-select-solid ">
                                            <option value=""> </option>

                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}" @selected($city->id == $ad->from_city_id)>
                                                    {{ $city->name_lang }} </option>
                                            @endforeach

                                        </select>


                                    </div>
                                </div>

                                <div class="form-group " style="width: 50%">
                                    <!-- row -->
                                    <div class="col-sm-10 col-md-8">

                                        <select name="from_region_id" id="from_region_id" data-control="select2"
                                            data-placeholder="{{ __('cms.select_region') }}"
                                            class="form-select form-select-solid ">
                                            <option value=""> </option>

                                            @foreach ($regions as $region)
                                                <option value="{{ $region->id }}" @selected($region->id == $ad->from_region_id)>
                                                    {{ $region->name_lang }} </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mb-10">
                            <label for="to_city_id"
                                class=" required  clo-lg-2 col-md-8  col-form-label">{{ __('cms.to') }}</label>
                            <div class="d-flex flex-row">
                                <div class="form-group" style="width: 50%">
                                    <!-- row -->
                                    <div class="col-sm-10 col-md-8">
                                        <select name="to_city_id" id="to_city_id" data-control="select2"
                                            data-placeholder="{{ __('cms.select_city') }}"
                                            class="form-select form-select-solid ">
                                            <option value=""> </option>

                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}" @selected($city->id == $ad->to_city_id)>
                                                    {{ $city->name_lang }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group " style="width: 50%">
                                    <!-- row -->
                                    <div class="col-sm-10 col-md-8">
                                        <select name="to_region_id" id="to_region_id" data-control="select2"
                                            data-placeholder="{{ __('cms.select_region') }}"
                                            class="form-select form-select-solid ">
                                            <option value=""> </option>

                                            @foreach ($regions as $region)
                                                <option value="{{ $region->id }}" @selected($region->id == $ad->to_region_id)>
                                                    {{ $region->name_lang }} </option>
                                            @endforeach
                                            {{-- <option   selected>2</option> --}}
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group mb-10 ">
                            <!-- row -->
                            <label for="title"
                                class=" required  clo-lg-10 col-md-8  col-form-label">{{ __('cms.title') }}</label>
                            <div class="col-sm-10 col-md-8">
                                <input type="text" class="form-control" id="title" placeholder=""
                                    value="{{ $ad->title }}">
                            </div>
                        </div>




                        <div class="form-group  mb-10">
                            <!-- row -->
                            <label for="duration"
                                class=" required  clo-lg-2 col-md-4  col-form-label">{{ __('cms.duration') }}</label>
                            <div class="d-flex flex-row">
                                <div class="col-sm-10 col-md-4">
                                    <select name="duration" id="duration" data-control="select2"
                                        data-placeholder="Select a  duration..." class="form-select  form-select-solid">
                                        <option value="1" @selected($ad->duration == 1)>{{ __('cms.immediately') }}
                                        </option>
                                        <option value="2" @selected($ad->duration == 2)> {{ __('cms.weekly') }}
                                        </option>
                                        <option value="3" @selected($ad->duration == 3)>{{ __('cms.monthly') }}
                                        </option>
                                    </select>

                                </div>
                                <a href="#" class="btn btn-primary er fs-6 px-8 "
                                    style="margin:0px 20px 0px 20px; display:none" id="modal-button" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_new_target">{{ __('cms.select_days') }} </a>
                            </div>
                        </div>






                        <div class="d-flex flex-row mb-10">

                            <div class="form-group" style="width: 50%">
                                <!-- row -->
                                <label for="user_id"
                                    class=" required  clo-lg-2 col-md-8  col-form-label">{{ __('cms.customer') }}</label>
                                <div class="col-sm-10 col-md-8">
                                    <select name="user_id" id="user_id" data-control="select2"
                                        data-placeholder="Select a customer ..." class="form-select  form-select-solid">
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}" @selected($customer->id == $ad->user_id)>
                                                {{ $customer->name }} </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="form-group " style="width: 50%">
                                <!-- row -->
                                <label for="category_id"
                                    class=" required  clo-lg-2 col-md-8  col-form-label">{{ __('cms.category') }}</label>
                                <div class="col-sm-10 col-md-8">
                                    <select name="category_id" id="category_id" data-control="select2"
                                        data-placeholder="Select a category ..." class="form-select  form-select-solid">
                                        @foreach ($categories as $categorey)
                                            <option value="{{ $categorey->id }}" @selected($categorey->id == $ad->category_id)>
                                                {{ $categorey->name_ar }} </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>





                        <div class="d-flex flex-row mb-10">
                            <div class="form-group " style="width:50%">
                                <!-- row -->
                                <label for="gender"
                                    class=" required  clo-lg-2 col-md-8  col-form-label">{{ __('cms.gender') }}</label>
                                <div class="col-sm-10 col-md-8">
                                    <select name="gender" id="gender" data-control="select2"
                                        data-placeholder="Select a  gender..." class="form-select  form-select-solid">
                                        <option value="1" @selected($ad->gender == 1)>{{ __('cms.male') }} </option>
                                        <option value="2" @selected($ad->gender == 2)>{{ __('cms.female') }}
                                        </option>
                                        <option value="3" @selected($ad->gender == 3)>{{ __('cms.both') }} </option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group " style="width:50%">

                                <label for="communication"
                                    class=" required  clo-lg-2 col-md-8  col-form-label">{{ __('cms.communication') }}</label>
                                <div class="col-sm-10 col-md-8">
                                    <select name="communication" id="communication" data-control="select2"
                                        data-placeholder="Select a  communication..."
                                        class="form-select  form-select-solid">
                                        <option value="1" @selected($ad->communication == 1)>{{ __('cms.mobile') }}
                                        </option>
                                        <option value="2" @selected($ad->communication == 2)>{{ __('cms.email') }}
                                        </option>
                                    </select>

                                </div>
                            </div>
                        </div>



                        <div class="form-group mb-10 ">
                            <!-- row -->
                            <label for="transport_type_id"
                                class=" required  clo-lg-2 col-md-4  col-form-label">{{ __('cms.transport_type') }}</label>
                            <div class="col-sm-10 col-md-4">
                                <select name="transport_type_id" id="transport_type_id" data-control="select2"
                                    data-placeholder="Select a category ..." class="form-select  form-select-solid">
                                    @foreach ($transport_types as $type)
                                        <option value="{{ $type->id }}" @selected($type->id == $ad->transport_type_id)>
                                            {{ $type->name_lang }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="card-header bg-secondary">
                            <h3 class="card-title fw-bolder "><span> {{ __('cms.times') }} </span>
                            </h3>
                        </div>



                        <div class="form-group d-flex flex-row mb-10">
                            <!-- row -->
                            <label for="time"
                                class=" required col-sm-2 col-form-label required">{{ __('cms.time') }}</label>
                            <div>
                                <label for="time"
                                    class=" required  col-md-12  col-sm-2 col-form-label required">{{ __('cms.go_time') }}</label>
                                <input type="time" class="form-control  col-md-12 col-sm-2 " id="go_time"
                                    value="{{ $ad->go_time }}" placeholder="">
                            </div>
                            <div class=" col-md-2  col-sm-2"></div>
                            <div>
                                <label for="time"
                                    class=" required  col-md-12  col-sm-2 col-form-label ">{{ __('cms.return_time') }}</label>

                                <input type="time" class="form-control  col-md-12 col-sm-2 " id="return_time"
                                    value="{{ $ad->return_time }}" placeholder="">
                            </div>
                        </div>











                        <div class="d-flex flex-row mb-10">


                            <div class="form-group " style="width:50%">
                                <!-- row -->
                                <label for="communication"
                                    class=" required  clo-lg-2 col-md-8 col-form-label">{{ __('cms.date') . ' - ' . __('cms.start_date') }}</label>
                                <div class="col-sm-10 col-md-8">
                                    <input class="form-control form-control-solid" placeholder="Pick date rage"
                                        value="{{ $ad->start_date }}" id="kt_daterangepicker_3" />

                                </div>

                            </div>


                            <div class="form-group " style="width:50%">
                                <!-- row -->
                                <label for="service_provider"
                                    class=" required  clo-lg-2 col-md-8  col-form-label">{{ __('cms.service_provider') }}</label>
                                <div class="col-sm-10 col-md-8">
                                    <select name="service_provider" id="service_provider" data-control="select2"
                                        data-placeholder="Select a service provider..."
                                        class="form-select form-select-solid">
                                        <option value=""> </option>
                                        <option value="1" @selected($ad->service_provider == 1)> {{ __('cms.company') }}
                                        </option>
                                        <option value="2" @selected($ad->service_provider == 2)>{{ __('cms.driver') }}
                                        </option>
                                    </select>

                                </div>
                            </div>

                        </div>








                        <div class="d-flex flex-row mb-10">
                            <div class="form-group " style="width:50%">
                                <!-- row -->
                                <label for="price"
                                    class=" required  clo-lg-2 col-md-8  col-form-label">{{ __('cms.price') }}</label>
                                <div class="col-sm-10 col-md-8">
                                    <input type="text" class="form-control" id="price" placeholder=""
                                        value="{{ $ad->price }}">
                                </div>
                            </div>


                            <div class="form-group " style="width:50%">
                                <!-- row -->
                                <label for="people_number"
                                class=" required  clo-lg-2 col-md-4  col-form-label">{{ __('cms.people_number') }}</label>
                                <div class="col-sm-10 col-md-8">
                                    <input type="number" class="form-control" id="people_number" placeholder=""
                                    value="{{ $ad->people_number }}">
                                </div>
                            </div>
                        </div>






                        <div class="d-flex flex-row mb-10">


                            <div class="form-group " style="width:50%">
                                <!-- row -->
                                <label for="distance"
                                    class=" required  clo-lg-2 col-md-8  col-form-label">{{ __('cms.distance') }}</label>
                                <div class="col-sm-10 col-md-8">
                                    <input type="number" class="form-control" id="distance" placeholder=""
                                        value="{{ $ad->distance }}">
                                </div>
                            </div>


                            <div class="form-group " style="width:50%">
                                <!-- row -->
                                <label for="estimated_time"
                                    class=" required  clo-lg-2 col-md-8  col-form-label">{{ __('cms.estimated_time') }}</label>
                                <div class="col-sm-10 col-md-8">
                                    <input type="text" class="form-control" id="estimated_time" placeholder=""
                                        value="{{ $ad->estimated_time }}">
                                </div>
                            </div>



                        </div>







                        <div class="form-group  mb-10">
                            <!-- row -->
                            <label for="notes"
                                class=" required  clo-lg-2 col-md-4  col-form-label">{{ __('cms.notes') }}</label>
                            <textarea class="form-control form-control-solid" rows="3" name="notes" id="notes"
                                placeholder="Type Target Details">{{ $ad->notes }}</textarea>
                        </div>


                        <div class="form-group  mb-10">
                            <!-- row -->
                            <label for="status"
                                class=" required  clo-lg-2 col-md-4  col-form-label">{{ __('cms.status') }}</label>
                            <div class="d-flex flex-row">
                                <div class="col-sm-10 col-md-4">
                                    <select name="status" id="status" data-control="select2"
                                        data-placeholder="Select a  duration..." class="form-select  form-select-solid">
                                        <option value="1" @selected($ad->status == 1)>{{ __('cms.active') }}
                                        </option>
                                        <option value="2" @selected($ad->status == 2)> {{ __('cms.finished') }}
                                        </option>
                                        <option value="3" @selected($ad->status == 3)>{{ __('cms.canceld') }}
                                        </option>
                                    </select>




                                </div>
                                <a href="#" class="btn btn-primary er fs-6 px-8 "
                                    style="margin:0px 20px 0px 20px; display:none" id="modal-button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_new_target">{{ __('cms.select_days') }} </a>
                            </div>
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div>

                    </div>

                    <div class="card-footer">
                        <button type="button" onclick="update({{ $ad->id }})"
                            class="btn btn-info">{{ __('cms.save') }}</button>
                        {{-- <button type="submit" class="btn btn-default float-right">Cancel</button> --}}
                    </div>

                    <!-- /.card-footer -->
                </form>
            </div>


            <!-- /.card -->
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16"
                                            height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                            fill="black" />
                                        <rect x="7.41422" y="6" width="16" height="2"
                                            rx="1" transform="rotate(45 7.41422 6)" fill="black" />
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
                            <form id="kt_modal_new_target_form" class="form" action="#"
                                onsubmit="event.preventDefault()">
                                <!--begin::Heading-->
                                <div class="mb-13 text-center">
                                    <!--begin::Title-->
                                    <h1 class="mb-3">{{ __('cms.days_week') }}</h1>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="text-muted fw-bold fs-5"> {{ __('cms.choose_days') }}
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->



                                    <!--begin::Input group-->
                                    <!--begin::Wrapper-->
                                    <div class="form-group ">
                                        <!--begin::Checkboxes-->
                                        <div class="d-flex flex-column">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-10 m-5">
                                                <input class="form-check-input checked_day" type="checkbox"
                                                    @checked(in_array(6, $ad->days ? json_decode($ad->days) : [])) name="days[]" value="6" />
                                                <span class="form-check-label fw-bold">{{ __('cms.saturday') }}</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid  me-10 m-5">
                                                <input class="form-check-input checked_day" type="checkbox"
                                                    @checked(in_array(7, $ad->days ? json_decode($ad->days) : [])) name="days[]" value="7" />
                                                <span class="form-check-label fw-bold">{{ __('cms.sunday') }}</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid  me-10 m-5">
                                                <input class="form-check-input checked_day" type="checkbox"
                                                    @checked(in_array(1, $ad->days ? json_decode($ad->days) : [])) name="days[]" value="1" />
                                                <span class="form-check-label fw-bold">{{ __('cms.monday') }}</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid  me-10 m-5">
                                                <input class="form-check-input checked_day" type="checkbox"
                                                    @checked(in_array(2, $ad->days ? json_decode($ad->days) : [])) name="days[]" value="2" />
                                                <span class="form-check-label fw-bold">{{ __('cms.tuesday') }}</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid  me-10 m-5">
                                                <input class="form-check-input  checked_day" type="checkbox"
                                                    @checked(in_array(3, $ad->days ? json_decode($ad->days) : [])) name="days[]" value="3" />
                                                <span class="form-check-label fw-bold">{{ __('cms.wednesday') }}</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid  me-10 m-5">
                                                <input class="form-check-input  checked_day" type="checkbox"
                                                    @checked(in_array(4, $ad->days ? json_decode($ad->days) : [])) name="days[]" value="4" />
                                                <span class="form-check-label fw-bold">{{ __('cms.thursday') }}</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid  me-10 m-5">
                                                <input class="form-check-input checked_day" type="checkbox"
                                                    @checked(in_array(5, $ad->days ? json_decode($ad->days) : [])) name="days[]" value="5" />
                                                <span class="form-check-label fw-bold">{{ __('cms.friday') }}</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Checkboxes-->

                                    </div>
                                    <!--end::Wrapper-->
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" id="kt_modal_new_target_cancel"
                                            class="btn btn-light me-3">Cancel</button>
                                        <button type="submit" id="days_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
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

        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/js/custom/pages/projects/settings/settings.js') }}"></script>
    {{-- <script src="{{asset('assets/js/custom/modals/users-search.js')}}"></script>
		<script src="{{asset('assets/js/custom/modals/new-target.js')}}"></script> --}}

    <script>
        $("#kt_daterangepicker_3").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 2022,
            locale: {
                format: "YYYY/MM/DD"
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            if ('{{ $ad->duration }}' == 2 || '{{ $ad->duration }}' == 3) {
                $("#modal-button").show();
            }
        });
    </script>
    <script>
        $("#days_submit").click(function() {
            $('#kt_modal_new_target').modal('toggle');

        })
        $("#duration").change(function() {
            if (this.value == 2 || this.value == 3) {
                document.getElementById("modal-button").click();
                $("#modal-button").show();

            } else {
                $("#modal-button").hide();
            }

        })
    </script>

    <script>
        function update(id) {

            // get checked dayes if duration weekly or monthley
            let duration = document.getElementById('duration').value;
            var checked_value = [];


            if (duration == 2 || duration == 3) {
                console.log('in if');

                $(".checked_day:checked").each(function() {
                    checked_value.push(this.value);
                });
            }
            console.log(checked_value);

            let data = {

                title: document.getElementById('title').value,
                category_id: document.getElementById('category_id').value,
                user_id: document.getElementById('user_id').value,

                from_city_id: document.getElementById('from_city_id').value,
                from_region_id: document.getElementById('from_region_id').value,
                to_city_id: document.getElementById('to_city_id').value,
                to_region_id: document.getElementById('to_region_id').value,

                people_number: document.getElementById('people_number').value,


                go_time: document.getElementById('go_time').value,
                return_time: document.getElementById('return_time').value,
                estimated_time: document.getElementById('estimated_time').value,
                gender: document.getElementById('gender').value,

                duration: duration,
                communication: document.getElementById('communication').value,
                service_provider: document.getElementById('service_provider').value,
                distance: document.getElementById('distance').value,
                price: document.getElementById('price').value,
                notes: document.getElementById('notes').value,
                transport_type_id: document.getElementById('transport_type_id').value,
                start_date: document.getElementById('kt_daterangepicker_3').value,
                status: document.getElementById('status').value,
                days: JSON.stringify(checked_value),

            }

            axios.put('/cms/ads/' + id, data).then(function(response) {
                    // handle success

                    window.location.href = "/cms/ads";

                    toastr.success(response.data.message);
                })
                .catch(function(error) {
                    // handle error
                    toastr.error(error.response.data.message);
                    console.log(error);
                })
        }
    </script>


@endsection
