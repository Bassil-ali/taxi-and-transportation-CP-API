@extends('parent')

@section('page-title' , __('cms.roles') .' | '. __('cms.edit'))
@section('main-title' , __('cms.roles') )
@section('sub-title' ,  __('cms.edit'))

@section('styles')

@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">

            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title fw-bolder" > {{__('cms.edit_role') . ' - ' . $role->name}} </span></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->



                <form class="form-horizontal " id="create-form">
                    @csrf
                  <div class="card-body">

                    <div class="form-group ">  <!-- row -->
                        <label for="name" class="col-sm-2 col-form-label">{{__('cms.name')}}</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name" value="{{$role->name}}"   placeholder="" >
                        </div>
                      </div>

                </div>


                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="button" onclick="update({{$role->id}})" class="btn btn-info">{{__('cms.save')}}</button>
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


function update(id){
    axios.put('/cms/roles/'+id,{
        name: document.getElementById('name').value,
        })
        .then(function (response) {
            // handle success

            console.log(response);
           window.location.href = "/cms/roles";

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
