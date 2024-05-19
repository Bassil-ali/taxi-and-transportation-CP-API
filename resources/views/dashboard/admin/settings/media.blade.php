<x-dashboard.admin.layouts.app>

    <x-slot name="title">
        {{ trans('admin.menu.settings') . ' - ' . trans('admin.settings.media') }}
    </x-slot>

    <div class="card card-flush shadow-sm">

        <div class="card-header">
            <h3 class="card-title">{{ trans('admin.menu.settings') . ' - ' . trans('admin.settings.media') }}</h3>
            <div class="card-toolbar">
                
                {{--btn back--}}
                <x-dashboard.admin.btn.back route="dashboard.admin.index"/>

            </div>
        </div>

        <div class="card-body py-5">

            <form method="post" action="{{ route('dashboard.admin.setting.media.store') }}" enctype="multipart/form-data">

                @csrf
                @method('post')

                <div class="row">

                    @php($items = ['facebook', 'twitter', 'instagram', 'video_links', 'google_play', 'apple_store'])

                    @foreach($items as $item)

	                	{{--phone--}}
	                    <x-dashboard.admin.input.text required="true" :name="'media_' . $item" :label="'admin.settings.linkes.' . $item" :value="getSetting('media_' . $item)" col="col-md-6"/>

                    @endforeach

            	</div>{{-- end of row --}}

                <div class="mt-5">
	                {{--btn save--}}
	                <x-dashboard.admin.btn.save />
	            </div>

            </form>{{-- form --}}

        </div>{{-- card-body --}}

    </div>{{-- card --}}

</x-dashboard.admin.layouts.app>