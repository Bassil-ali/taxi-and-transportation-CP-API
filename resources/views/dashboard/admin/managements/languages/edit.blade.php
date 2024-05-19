<x-dashboard.admin.layouts.app>

    <x-slot name="title">
        {{ trans('admin.global.edit') . ' - ' . $language->name }}
    </x-slot>

    <div class="card card-flush shadow-sm">

        <div class="card-header">
            <h3 class="card-title">{{ trans('admin.global.Edit', ['name' => $language->name]) }}</h3>
            <div class="card-toolbar">
                
                {{--btn back--}}
                <x-dashboard.admin.btn.back route="dashboard.admin.management.languages.index"/>

            </div>
        </div>

        <div class="card-body py-5">

            <form method="post" action="{{ route('dashboard.admin.management.languages.update', $language->id) }}" enctype="multipart/form-data">

                @csrf
                @method('put')

                <div class="row">

                    <div class="col-md-8">
                        
                        <div class="row">
                            {{--name--}}
                            <x-dashboard.admin.input.text required="true" name="name" label="admin.global.name" col="col-md-6" :value='$language->name'/>

                            {{--code--}}
                            <x-dashboard.admin.input.text required="true" name="code" label="admin.global.code" col="col-md-6" :value='$language->code'/>

                            {{--dir--}}
                            <x-dashboard.admin.input.option required="true" name="dir" label="admin.managements.languages.dir" :lists="$types" col="col-md-6" :value='$language->dir'/>

                            {{--status--}}
                            <x-dashboard.admin.input.checkbox name="status" label="admin.global.status" col="col-md-6" :value="$language->status"/>

                        </div>  {{-- row --}}

                    </div>{{-- col-md-8 --}}

                    <div class="col-md-4">
                        
                        {{--flag--}}
                        <div class="mx-auto">
                            <x-dashboard.admin.input.image-preview name="flag" label="admin.global.flag" image="{{ $language->image_path }}"/>
                        </div>

                    </div>{{-- col-md-4 --}}

                </div>{{-- row --}}

                {{--btn save--}}
                <x-dashboard.admin.btn.save />

            </form>{{-- form --}}

        </div>{{-- card-body --}}

    </div>{{-- card --}}

</x-dashboard.admin.layouts.app>