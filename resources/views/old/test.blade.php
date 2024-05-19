@extends('parent')

@section('page-title' , 'test')
@section('main-title' , 'test')

@section('styles')

@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">

            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title"></span>{{__('cms.arabic')}}</a></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->



                <form class="form-horizontal " id="create-form">
                    @csrf
                  <div class="card-body">


                    <div class="form-group ">  <!-- row -->
                      <label for="name" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name"   placeholder="Enter Name" >
                      </div>
                    </div>

                    <div class="form-group ">  <!-- row -->
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email"   placeholder="Enter Email" >
                        </div>
                      </div>

                      <div class="form-group ">  <!-- row -->
                        <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                          <input type="tel" class="form-control" id="mobile"   placeholder="Enter Mobile" >
                        </div>
                      </div>

                </div>


                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="button" onclick="store()" class="btn btn-info">save</button>
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
//Initialize Select2 Elements
    $('#role').select2({
     theme: 'bootstrap4'
    })

</script>

<script>


    function store(){
        let data = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            mobile: document.getElementById('mobile').value,
        }
        axios.post('/cms/admin/users',data).then(function (response) {
                // handle success

                 console.log(response);
                 toastr.success(response.data.message);
                 document.getElementById('create-form').reset();
            })
            .catch(function (error) {
                // handle error
                 toastr.error(error.response.data.message);
                 console.log(error);
            })
    }

    </script>


@endsection
