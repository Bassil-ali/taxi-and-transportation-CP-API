@extends('parent')

@section('page-title' , __('cms.admins') .' | '. __('cms.edit_profile'))
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
                  <h3 class="card-title fw-bolder" ><span> {{__('cms.edit_profile')}} </span> </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->



                <form class="form-horizontal " id="create-form">
                    @csrf
                  <div class="card-body">


                    <div class="form-group ">  <!-- row -->
                      <label for="name" class="col-sm-2 col-form-label">{{__('cms.name')}}</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name"   placeholder="" value="{{$user->name}}" >
                      </div>
                    </div>

                    <div class="form-group ">  <!-- row -->
                        <label for="email" class="col-sm-2 col-form-label">{{__('cms.email')}}</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email"   placeholder="" value="{{$user->email}}">
                        </div>
                    </div>

                    <div class="form-group ">  <!-- row -->
                        <label for="mobile" class="col-sm-2 col-form-label">{{__('cms.mobile')}}</label>
                        <div class="col-sm-10">
                          <input type="phone" class="form-control" id="mobile"   placeholder="" value="{{$user->mobile}}">
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
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            mobile: document.getElementById('mobile').value,
        }
        axios.put('/cms/auth/update-profile',data).then(function (response) {
                // handle success

                 console.log(response);
                 toastr.success(response.data.message);
            })
            .catch(function (error) {
                // handle error
                 toastr.error(error.response.data.message);
                 console.log(error);
            })
    }

    </script>


@endsection
