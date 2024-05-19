@extends('parent')

@section('page-title', __('cms.admins') . ' | ' . __('cms.edit'))
@section('main-title', __('cms.admins'))
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
                    <h3 class="card-title fw-bolder"> {{ __('cms.edit_admin') }} </span></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->



                <form class="form-horizontal " id="create-form">
                    @csrf
                    <div class="card-body">



                        <div class="form-group ">
                            <!-- row -->
                            <label for="name" class="col-sm-2 col-form-label">{{ __('cms.name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" value="{{ $admin->name }}"
                                    placeholder="">
                            </div>
                        </div>

                        <div class="form-group ">
                            <!-- row -->
                            <label for="email" class="col-sm-2 col-form-label">{{ __('cms.email') }}</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" value="{{ $admin->email }}"
                                    placeholder="">
                            </div>
                        </div>

                        <div class="form-group ">
                            <!-- row -->
                            <label for="mobile" class="col-sm-2 col-form-label">{{ __('cms.mobile') }}</label>
                            <div class="col-sm-10">
                                <input type="phone" class="form-control" id="mobile" value="{{ $admin->mobile }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group ">
                            <!-- row -->
                            <label for="password" class="col-sm-2 col-form-label">{{ __('cms.password') }}</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" placeholder="">
                            </div>
                        </div>
                        <div class="form-group ">
                            <!-- row -->
                            <label for="password_confirmation"
                                class="col-sm-2 col-form-label">{{ __('cms.password_confirmation') }}</label>
                            <div class="col-sm-10">
                                <input type="password_confirmation" class="form-control" id="password_confirmation"
                                    placeholder="">
                            </div>
                        </div>

                        <div class="form-group ">
                            <!-- row -->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label for="role_id" class="col-sm-2 col-form-label">{{ __('cms.role') }}</label>

                                <!--end::Label-->
                                <!--begin::Select-->
                                <select name="role_id" id="role_id" data-control="select2"
                                    data-placeholder="Select a role..." class="form-select form-select-solid">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" @selected($admin->roles()->exists() ? $admin->roles[0]->id == $role->id : '')>
                                            {{ $role->name }} </option>
                                    @endforeach
                                </select>
                                <!--end::Select-->
                            </div>
                        </div>



                        <div class="form-group ">
                            <!-- row -->
                            <label for="status" class="col-sm-2 col-form-label">{{ __('cms.status') }}</label>
                            <div class="col-sm-10">
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" id="status"
                                        name="status" {{ $admin->status ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold text-gray-400 ms-3"
                                        for="status">{{ __('cms.active') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" onclick="update({{ $admin->id }})"
                            class="btn btn-info">{{ __('cms.save') }}</button>
                        {{-- <button type="submit" class="btn btn-default float-right">Cancel</button> --}}
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->


        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')


    <script></script>

    <script>
        function update(id) {
            axios.put('/cms/admins/' + id, {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    mobile: document.getElementById('mobile').value,
                    password: document.getElementById('password').value,
                    password_confirmation: document.getElementById('password_confirmation').value,
                    role_id: document.getElementById('role_id').value,
                    status: document.getElementById('status').checked,
                })
                .then(function(response) {
                    // handle success

                    console.log(response);
                    window.location.href = "/cms/admins";

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
