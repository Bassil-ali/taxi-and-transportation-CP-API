<x-dashboard.admin.layouts.app>

    <x-slot name="title">
    	{{ trans('admin.menu.app') . ' - ' . trans('admin.global.Edit', ['name' => $transportType->name]) }}
    </x-slot>

    <div class="card card-flush shadow-sm">

        <div class="card-header">
            <h3 class="card-title">{{ trans('admin.global.Edit', ['name' => $transportType->name]) }}</h3>
            <div class="card-toolbar">
                
                {{--btn back--}}
                <x-dashboard.admin.btn.back route="dashboard.admin.app.transport_types.index"/>

            </div>
        </div>

        <div class="card-body py-5">

            <form method="post" action="{{ route('dashboard.admin.app.transport_types.update', $transportType->id) }}">

                @csrf
                @method('put')

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
				                                      value="{{ $transportType->getTranslations('name')[$language->code] ?? '' }}"
				                                      invalid="{{ 'name.' . $language->code }}" />
				    </div>
				    @endforeach
				</div>

				<div class="mt-5">
	                {{--status--}}
	                <x-dashboard.admin.input.checkbox :required="true" name="status" label="admin.global.status" :value="$transportType->status"/>
                </div>

                <div class="mt-5">
	                {{--btn save--}}
	                <x-dashboard.admin.btn.save />
	            </div>

            </form>{{-- form --}}

        </div>{{-- card-body --}}

    </div>{{-- card --}}

</x-dashboard.admin.layouts.app>