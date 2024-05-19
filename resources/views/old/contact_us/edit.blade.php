@extends('parent')

@section('page-title', __('cms.contact_us') . ' | ' . __('cms.edit'))
@section('main-title', __('cms.contact_us'))
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
                    <h3 class="card-title fw-bolder"> {{ __('cms.contact_us') }} </span></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->



                <form class="form-horizontal " id="create-form">
                    @csrf
                    <div class="card-body">


                        <div class="form-group ">
                            <!-- row -->
                            <label for="title" class="col-sm-2 col-form-label">{{ __('cms.title') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" value="{{ $contact_u->title }}"
                                    placeholder="" disabled>
                            </div>
                        </div>

                        <div class="form-group ">
                            <!-- row -->
                            <label for="email" class="col-sm-2 col-form-label">{{ __('cms.email') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" value="{{ $contact_u->email }}"
                                    placeholder="" disabled>
                            </div>
                        </div>

                        <div class="form-group  mb-10">
                            <!-- row -->
                            <label for="description"
                                class=" required  clo-lg-2 col-md-4  col-form-label">{{ __('cms.description') }}</label>
                            <textarea class="form-control form-control-solid" rows="3" name="description" id="description"
                                placeholder="Type Target Details" disabled>{{ $contact_u->description }}</textarea>
                        </div>


                        <div class="form-group" style="width:25%">
                            <!-- row -->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label for="status"
                                    class="col-sm-10 col-form-label required">{{ __('cms.status') }}</label>

                                <!--end::Label-->
                                <!--begin::Select-->

                                <select name="status" id="status" data-control="select2"
                                    data-placeholder="Select a status..." class="form-select form-select-solid">
                                    <option value=""> </option>


                                    <option value="0" @selected($contact_u->status == 0)>{{ __('cms.new') }}
                                    </option>
                                    <option value="1" @selected($contact_u->status == 1)>{{ __('cms.completed') }}
                                    </option>

                                    {{-- <option   selected>2</option> --}}
                                </select>
                                <!--end::Select-->
                            </div>
                        </div>



                    </div>


                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" onclick="update({{ $contact_u->id }})"
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
            axios.put('/cms/contact-us/' + id, {
                    status: document.getElementById('status').value,
                })
                .then(function(response) {
                    // handle success

                    console.log(response);
                    window.location.href = "/cms/contact-us";

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
