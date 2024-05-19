@extends('parent')

@section('page-title', __('cms.permissions'))
@section('main-title', __('cms.permissions'))
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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title fw-bolder"> {{ $role->name . ' - ' . __('cms.permissions') }} </span>
                            </h3>
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
                                    <th class="min-w-125px"> {{ __('cms.name') }}</th>
                                    <th class="min-w-125px">{{ __('cms.assigned') }}</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($permissions as $permission)
                                    <tr>

                                        <td>
                                            <a href="#"
                                                class="text-gray-800 text-hover-primary mb-1">{{ $permission->id }}</a>
                                        </td>

                                        <td>
                                            <a href="#"
                                                class="text-gray-800 text-hover-primary mb-1">{{ $permission->name }}</a>
                                        </td>


                                        <td>
                                            <div class="form-group">
                                                <div class="checkbox-inline">
                                                    {{-- <label class="checkbox checkbox-lg">
                                                        <input id="permission_{{ $permission->id }}"
                                                            onchange="assignePermission('{{ $role->id }}' , '{{ $permission->id }}')"
                                                            type="checkbox" @checked($permission->assigned == true)
                                                            name="Checkboxes3_1" />

                                                    </label> --}}


                                                    <div
                                                        class="form-check form-check-larg form-check-custom form-check-solid">
                                                        <input id="permission_{{ $permission->id }}"
                                                            class="form-check-input" type="checkbox" @checked($permission->assigned == true)
                                                            onchange="assignePermission('{{ $role->id }}' , '{{ $permission->id }}')">
                                                    </div>

                                                </div>
                                            </div>
                                        </td>


                                    </tr>
                                @endforeach


                            </tbody>
                            <!--end::Table body-->
                        </table>
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
        function assignePermission(roleId, permissionId) {
            axios.put("/cms/role/" + roleId + "/permissions", {

                    permission_id: permissionId
                })
                .then(function(response) {
                    // handle success 2xx
                    toastr.success(response.data.message);
                })
                .catch(function(error) {
                    // handle error 4xx - 5xx
                    toastr.error(error.response.data.message);
                });

        }
    </script>


@endsection
