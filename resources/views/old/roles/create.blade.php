@extends('parent')

@section('page-title' , __('cms.roles') .' | '. __('cms.create'))
@section('main-title' , __('cms.roles') )
@section('sub-title' ,  __('cms.create'))

@section('styles')

@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">

            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title fw-bolder" > {{__('cms.create_new_role')}} </span></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->



                <form class="form-horizontal " id="create-form">
                    @csrf
                  <div class="card-body">

                    <div class="form-group ">  <!-- row -->
                        <label for="name" class="col-sm-2 col-form-label">{{__('cms.name')}}</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name"   placeholder="" >
                        </div>
                      </div>

                </div>


                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="button" onclick="store()" class="btn btn-info">{{__('cms.save')}}</button>
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
        }
        axios.post('/cms/roles',data).then(function (response) {
                // handle success
                 toastr.success(response.data.message); 
                 document.getElementById('create-form').reset();
                 window.location.href ='/cms/roles'
            })
            .catch(function (error) {
                // handle error
                 toastr.error(error.response.data.message); 
            })
    }

    </script>


@endsection
