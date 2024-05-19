<x-dashboard.admin.layouts.app>

    <x-slot name="title">
        {{ trans('admin.global.create') . ' - ' . trans('admin.menu.region') }}
    </x-slot>

    <div class="card card-flush shadow-sm">

        <div class="card-header">
            <h3 class="card-title">{{ trans('admin.global.create_new', ['name' => trans('admin.menu.region')]) }}</h3>
            <div class="card-toolbar">
                
                {{--btn back--}}
                <x-dashboard.admin.btn.back route="dashboard.admin.app.locations.regions.index"/>

            </div>
        </div>

        <div class="card-body py-5">

            <form method="post" action="{{ route('dashboard.admin.app.locations.regions.store') }}">

                @csrf
                @method('post')

                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                	@foreach(getLanguages() as $language)
					    <li class="nav-item">
					        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab" href="#{{ $language->code }}">
					        	{{ $language?->name }}
					        </a>
					    </li>
				    @endforeach
				</ul>

				<div class="tab-content" id="myTabContent">
					@foreach(getLanguages() as $language)
				    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $language->code }}" role="tabpanel">
				        
				        <x-dashboard.admin.input.text required="true" 
				                                      name="name[{{ $language->code }}]" 
				                                      label="admin.global.name"
				                                      invalid="{{ 'name.' . $language->code }}" />
				    </div>
				    @endforeach
				</div>

				<div class="row mt-5">
					{{--cities--}}
	                <x-dashboard.admin.input.option required="true" name="city_id" label="admin.menu.cities" :lists="$cities" col="col-md-6"/>
					
	                {{--status--}}
	                <x-dashboard.admin.input.checkbox :required="true" name="status" label="admin.global.status" col="col-md-6"/>

				</div>

                <div class="mt-5">
	                {{--btn save--}}
	                <x-dashboard.admin.btn.save />
	            </div>

            </form>{{-- form --}}

        </div>{{-- card-body --}}

    </div>{{-- card --}}

</x-dashboard.admin.layouts.app>