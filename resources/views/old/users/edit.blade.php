@extends('parent')

@section('page-title', __('cms.users') . ' | ' . __('cms.create'))
@section('main-title', __('cms.users'))
@section('sub-title', __('cms.create'))

@section('styles')

@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title fw-bolder"><span> {{ __('cms.add_user') . ' | ' . __('cms.main_info') }} </span>
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->



                <form class="form-horizontal " id="create-form" autocomplete="off">
                    @csrf
                    <div class="card-body">


                        <div class="form-group ">
                            <!-- row -->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label for="type" class=" required col-sm-2 col-form-label">{{ __('cms.type') }}</label>

                                <!--end::Label-->
                                <!--begin::Select-->
                                <select name="type" id="type" data-control="select2"
                                    data-placeholder="Select a position..." class=" form-select form-select-solid">
                                    <option value="1" @if ($user->type == 1) selected @endif>
                                        {{ __('cms.customer') }} </option>
                                    <option value="2" @if ($user->type == 2) selected @endif>
                                        {{ __('cms.driver') }} </option>
                                    <option value="3" @if ($user->type == 3) selected @endif>
                                        {{ __('cms.company') }} </option>
                                    <option value="4" @if ($user->type == 4) selected @endif>
                                        {{ __('cms.employee') }} </option>
                                </select>
                                <!--end::Select-->
                            </div>
                        </div>

                        <div class="form-group ">
                            <!-- row -->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label for="parent_id" class="col-sm-2 col-form-label">{{ __('cms.parent_company') }}
                                </label>

                                <!--end::Label-->
                                <!--begin::Select-->

                                <select name="parent_id" id="parent_id" data-control="select2" disabled
                                    data-placeholder="Only For Employee..." class="form-select form-select-solid">
                                    <option value=""> </option>

                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            @if ($user->parent_id == $company->id) selected @endif>{{ $company->name }} </option>
                                    @endforeach
                                    {{-- <option   selected>2</option> --}}
                                </select>
                                <!--end::Select-->
                            </div>
                        </div>

                        <div class="form-group ">
                            <!-- row -->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label for="city_id" class="col-sm-2 col-form-label">{{ __('cms.city') }}</label>

                                <!--end::Label-->
                                <!--begin::Select-->

                                <select name="city_id" id="city_id" data-control="select2"
                                    data-placeholder="Select a City..." class="form-select form-select-solid">
                                    <option value=""> </option>

                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            @if ($user->city_id == $city->id) selected @endif>{{ $city->name_lang }}
                                        </option>
                                    @endforeach
                                    {{-- <option   selected>2</option> --}}
                                </select>
                                <!--end::Select-->
                            </div>
                        </div>


                        <div class="form-group ">
                            <!-- row -->
                            <label for="name" class=" required col-sm-2 col-form-label">{{ __('cms.name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" placeholder=""
                                    value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="form-group ">
                            <!-- row -->
                            <label for="email" class="required col-sm-2 col-form-label ">{{ __('cms.email') }}</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="name@example.com"
                                    value="{{ $user->email }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group ">
                            <!-- row -->
                            <label for="mobile" class="required col-sm-2 col-form-label">{{ __('cms.mobile') }}</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" id="mobile" placeholder=""
                                    value="{{ $user->mobile }}">
                            </div>
                        </div>
                        <div class="form-group ">
                            <!-- row -->
                            <label for="id_number" class="col-sm-2 col-form-label">{{ __('cms.id_number') }}</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="id_number" placeholder=""
                                    value="{{ $user->id_number }}">
                            </div>
                        </div>

                        <div class="form-group ">
                            <!-- row -->
                            <label for="password" class="  col-sm-2 col-form-label">{{ __('cms.password') }}</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" placeholder="">
                            </div>
                        </div>

                        <div class="form-group ">
                            <!-- row -->
                            <label for="password_confirmation"
                                class=" col-sm-2 col-form-label">{{ __('cms.password_confirmation') }}</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password_confirmation" placeholder="">
                            </div>
                        </div>


                        <div class="form-group ">
                            <!-- row -->
                            <label for="status" class="col-sm-2 col-form-label">{{ __('cms.status') }}</label>
                            <div class="col-sm-10">
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" id="status"
                                        name="status" {{ $user->status ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold text-gray-400 ms-3"
                                        for="status">{{ __('cms.active') }}</label>
                                </div>
                            </div>
                        </div>







                    </div>

                    <!-- /.card-body -->

                    <!-- /.card-footer -->

            </div>
            <div style="margin: 10px"></div>
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title fw-bolder"><span> {{ __('cms.add_user') . ' | ' . __('cms.other_info') }}
                        </span></h3>
                </div>

                <div class="card-body">


                    <div class="form-group ">
                        <!-- row -->
                        <label for="vehicle_type" class="col-sm-2 col-form-label">{{ __('cms.vehicle_type') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="vehicle_type" placeholder=""
                                value="{{ $user->vehicle_type }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <!-- row -->
                        <label for="vehicle_color" class="col-sm-2 col-form-label">{{ __('cms.vehicle_color') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="vehicle_color" placeholder=""
                                value="{{ $user->vehicle_color }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <!-- row -->
                        <label for="plate_number" class="col-sm-2 col-form-label">{{ __('cms.plate_number') }}</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="plate_number" placeholder=""
                                value="{{ $user->plate_number }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <!-- row -->
                        <label for="seats_numbers" class="col-sm-2 col-form-label">{{ __('cms.seates_numbers') }}</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="seats_numbers" placeholder=""
                                value="{{ $user->seats_numbers }}">
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin: 10px"></div>

            <div class="card card-info">
                <button type="button" onclick="update({{ $user->id }})"
                    class="btn btn-info">{{ __('cms.save') }}</button>
                {{-- <button type="submit" class="btn btn-default float-right">Cancel</button> --}}
            </div>
            </form>

            <!-- /.card -->


        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')


    <script>
        $("#type").change(function() {
            if (this.value == 4) {
                $("#parent_id").removeAttr("disabled");;

            } else {
                $("#parent_id").prop("disabled", true);

            }
        });
    </script>

    <script>
        function update(id) {

            var type = document.getElementById('type').value;
            let id_number = null;
            let vehicle_type = null;
            let vehicle_color = null;
            let plate_number = null;
            let seats_numbers = null;
            let parent_id = null;
            if (type == 1 || type == 2) {
                id_number = document.getElementById('id_number').value;
            }
            if (type == 2 || type == 4) {
                vehicle_type = document.getElementById('vehicle_type').value;
                vehicle_color = document.getElementById('vehicle_color').value;
                plate_number = document.getElementById('plate_number').value;

            }
            if (type == 3) {

                seats_numbers = document.getElementById('seats_numbers').value;
            }

            if (type == 4) {
                parent_id = document.getElementById('parent_id').value;
            }


            axios.put('/cms/users/' + id, {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    mobile: document.getElementById('mobile').value,
                    type: type,
                    city_id: document.getElementById('city_id').value,
                    status: document.getElementById('status').checked,
                    parent_id: parent_id,
                    id_number: id_number,
                    password: document.getElementById('password').value,
                    password_confirmation: document.getElementById('password_confirmation').value,
                    vehicle_type: vehicle_type,
                    vehicle_color: vehicle_color,
                    plate_number: plate_number,
                    seats_numbers: seats_numbers,
                })
                .then(function(response) {
                    // handle success

                    console.log(response);
                    window.location.href = "/cms/users";

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
