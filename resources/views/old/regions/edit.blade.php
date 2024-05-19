@extends('parent')

@section('page-title' , __('cms.regions') .' | '. __('cms.edit'))
@section('main-title' , __('cms.regions') )
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
                  <h3 class="card-title fw-bolder" > {{__('cms.edit_region')}} </span></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->



                <form class="form-horizontal " id="create-form">
                    @csrf
                  <div class="card-body">


                    <div class="form-group ">  <!-- row -->
                      <label for="name_ar" class="col-sm-2 col-form-label">{{__('cms.name_ar')}}</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name_ar"   value="{{$region->name_ar}}"    placeholder="" >
                      </div>
                    </div>

                    <div class="form-group ">  <!-- row -->
                        <label for="name_en" class="col-sm-2 col-form-label">{{__('cms.name_en')}}</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name_en"  value="{{$region->name_en}}"  placeholder="" >
                        </div>
                      </div>


                    <div class="form-group ">  <!-- row -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label for="city_id" class="col-sm-2 col-form-label">{{__('cms.city')}}</label>

                            <!--end::Label-->
                            <!--begin::Select-->
                            <select name="city_id"  id = "city_id" data-control="select2" data-placeholder="Select a position..." class="form-select form-select-solid">
                                @foreach ($cities as $city)
                                <option value="{{$city->id}}"  @if($region->city_id == $city->id) selected @endif  >{{$city->name_lang}} </option>
                                @endforeach
                                {{-- <option   selected>2</option> --}}
                            </select>
                            <!--end::Select-->
                        </div>
                    </div>
                    <div class="form-group ">  <!-- row -->
                        <label for="status" class="col-sm-2 col-form-label">{{__('cms.status')}}</label>
                        <div class="col-sm-10">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="" id="status" name="status" {{$region->status ? 'checked' : ''}} >
                                <label class="form-check-label fw-bold text-gray-400 ms-3" for="status">{{__('cms.active')}}</label>
                            </div>
                        </div>
                      </div>




                </div>


                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="button" onclick="update({{$region->id}})" class="btn btn-info">{{__('cms.save')}}</button>
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
    axios.put('/cms/regions/'+id,{
           name_ar: document.getElementById('name_ar').value,
           name_en: document.getElementById('name_en').value,
           city_id: document.getElementById('city_id').value,
           status: document.getElementById('status').checked,
        })
        .then(function (response) {
            // handle success

            console.log(response);
           window.location.href = "/cms/regions";

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