@extends('parent')

@section('page-title' , __('cms.admins') .' | '. __('cms.edit_password'))
@section('main-title' , __('cms.admins') )
@section('sub-title' ,  __('cms.edit_profile'))

@section('styles')

@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">

            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title fw-bolder" ><span> {{__('cms.edit_password')}} </span> </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->



                <form class="form-horizontal " id="create-form">
                    @csrf
                  <div class="card-body">


                    <div class="form-group ">  <!-- row -->
                      <label for="current_password" class="col-sm-2 col-form-label">{{__('cms.current_password')}}</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="current_password"   >
                      </div>
                    </div>

                    <div class="form-group ">  <!-- row -->
                        <label for="password" class="col-sm-2 col-form-label">{{__('cms.new_password')}}</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password"   placeholder="">
                        </div>
                    </div>

                    <div class="form-group ">  <!-- row -->
                        <label for="password_confirmation" class="col-sm-2 col-form-label">{{__('cms.new_password_confirmation')}}</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password_confirmation"  >
                        </div>
                    </div>




                </div>


                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="button" onclick="store()" class="btn btn-info">{{__('cms.update')}}</button>
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


<script>
</script>

<script>


    function store(){
        let data = {
            current_password: document.getElementById('current_password').value,
            password: document.getElementById('password').value,
            password_confirmation: document.getElementById('password_confirmation').value,
        }
        axios.put('/cms/auth/update-password',data).then(function (response) {
                // handle success
                 console.log(response);
                 toastr.success(response.data.message);
            })
            .catch(function (error) {
                // handle error
                 toastr.error(error.response.data.message);
                 console.log(error.response.data.message);
            })
    }

    </script>


@endsection
