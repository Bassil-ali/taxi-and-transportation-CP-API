<x-dashboard.admin.layouts.app>

    <x-slot name="title">
        {{ trans('admin.menu.settings') . ' - ' . trans('admin.settings.meta') }}
    </x-slot>

    <div class="card card-flush shadow-sm">

        <div class="card-header">
            <h3 class="card-title">{{ trans('admin.menu.settings') . ' - ' . trans('admin.settings.meta') }}</h3>
            <div class="card-toolbar">
                
                {{--btn back--}}
                <x-dashboard.admin.btn.back route="dashboard.admin.index"/>

            </div>
        </div>

        <div class="card-body py-5">

            <form method="post" action="{{ route('dashboard.admin.setting.meta.store') }}" enctype="multipart/form-data">

                @csrf
                @method('post')

                <div class="row">

                	<div class="col-12 col-md-8">
                		
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
						                                      name="meta_title[{{ $language->code }}]"
						                                      label="admin.global.title"
						                                      :value="old('meta_title.' . $language->code, getTransSetting('meta_title', $language->code))"
						                                      invalid="{{ 'meta_title.' . $language->code }}" />

								<x-dashboard.admin.input.textarea required="true" 
						                                      name="meta_description[{{ $language->code }}]"
						                                      label="admin.global.description"
						                                      :value="old('meta_description.' . $language->code, getTransSetting('meta_description', $language->code))"
						                                      invalid="{{ 'meta_description.' . $language->code }}" />
						    </div>
						    @endforeach
						</div>

					</div>{{-- col-md-8 --}}

					<div class="col-12 col-md-4">

                		{{--phone--}}
                        <div class="m-auto">
                            <x-dashboard.admin.input.image-preview name="meta_logo" label="admin.global.image" image="{{ getImageSetting('meta_logo') }}"/>
                        </div>
                		
                	</div>{{-- col-md-4 --}}
                	
                </div>{{-- row --}}

                <div class="mt-5">
	                {{--btn save--}}
	                <x-dashboard.admin.btn.save />
	            </div>

            </form>{{-- form --}}

        </div>{{-- card-body --}}

    </div>{{-- card --}}

</x-dashboard.admin.layouts.app>