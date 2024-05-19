<x-dashboard.admin.layouts.app>

    <x-slot name="title">
        {{ trans('admin.menu.settings') . ' - ' . trans('admin.settings.website') }}
    </x-slot>

    <div class="card card-flush shadow-sm">

        <div class="card-header">
            <h3 class="card-title">{{ trans('admin.menu.settings') . ' - ' . trans('admin.settings.website') }}</h3>
            <div class="card-toolbar">
                
                {{--btn back--}}
                <x-dashboard.admin.btn.back route="dashboard.admin.index"/>

            </div>
        </div>

        <div class="card-body py-5">

            <form method="post" action="{{ route('dashboard.admin.setting.website.store') }}" enctype="multipart/form-data">

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
						                                      name="websit_title[{{ $language->code }}]"
						                                      label="admin.global.name"
						                                      :value="old('websit_title.' . $language->code, getTransSetting('websit_title', $language->code))"
						                                      invalid="{{ 'websit_title.' . $language->code }}" />

                              	<x-dashboard.admin.input.tag required="true" 
						                                      idname="websit_keywords"
						                                      lang="{{ $language->code }}"
						                                      name="websit_keywords[{{ $language->code }}]"
						                                      label="admin.settings.keywords"
						                                      :value="old('websit_keywords.' . $language->code, getTransSetting('websit_keywords', $language->code))"
						                                      invalid="{{ 'websit_keywords.' . $language->code }}" />

								<x-dashboard.admin.input.textarea required="true" 
						                                      name="websit_description[{{ $language->code }}]"
						                                      label="admin.global.description"
						                                      :value="old('websit_description.' . $language->code, getTransSetting('websit_description', $language->code))"
						                                      invalid="{{ 'websit_description.' . $language->code }}" rows="8"/>
						    </div>
						    @endforeach
						</div>

                	</div>{{-- col-md-8 --}}

                	<div class="col-12 col-md-4">

                		<div class="m-auto">
                            <x-dashboard.admin.input.image-preview name="websit_logo" label="admin.global.image" image="{{ getImageSetting('websit_logo') }}"/>
                        </div>

                	</div>{{-- col-md-4 --}}
                	
                </div>

                <div class="mt-5">
	                {{--btn save--}}
	                <x-dashboard.admin.btn.save />
	            </div>

            </form>{{-- form --}}

        </div>{{-- card-body --}}

    </div>{{-- card --}}

</x-dashboard.admin.layouts.app>