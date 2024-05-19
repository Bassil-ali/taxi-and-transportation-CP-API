@extends('parent')

@section('page-title' , __('cms.settings') .' | '. __('cms.edit'))
@section('main-title' , __('cms.settings') )
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
                  <h3 class="card-title fw-bolder" > {{__('cms.edit_settings')}} </span></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->



                <form class="form-horizontal " id="create-form">
                    @csrf
                  <div class="card-body">


                    <div class="form-group ">  <!-- row -->
                      <label for="commission" class="col-sm-2 col-form-label">{{__('cms.system_commission')}}</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="commission" value="{{$settings[0]['value']}}"   placeholder="" >
                      </div>
                    </div>

                    <div class="form-group ">  <!-- row -->
                        <label for="currency" class="col-sm-2 col-form-label">{{__('cms.currency')}}</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="currency"   value="{{$settings[1]['value']}}"  placeholder="" >
                        </div>
                      </div>




                </div>


                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="button" onclick="update()" class="btn btn-info">{{__('cms.save')}}</button>
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

function update(id){
    axios.put('/cms/system/settings',{
           commission: document.getElementById('commission').value,
           currency: document.getElementById('currency').value,
        })
        .then(function (response) {
            // handle success

            console.log(response);
           window.location.href = "/cms";

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
