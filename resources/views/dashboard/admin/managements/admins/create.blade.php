<x-dashboard.admin.layouts.app>

    <x-slot name="title">
        {{ trans('admin.global.create') . ' - ' . trans('admin.menu.admin') }}
    </x-slot>

    <div class="card card-flush shadow-sm">

        <div class="card-header">
            <h3 class="card-title">{{ trans('admin.global.create_new', ['name' => trans('admin.global.admin')]) }}</h3>
            <div class="card-toolbar">
                
                {{--btn back--}}
                <x-dashboard.admin.btn.back route="dashboard.admin.management.admins.index"/>

            </div>
        </div>

        <div class="card-body py-5">

            <form method="post" action="{{ route('dashboard.admin.management.admins.store') }}" enctype="multipart/form-data">

                @csrf
                @method('post')

                <div class="row">

                    <div class="col-md-8">
                        
                        <div class="row">
                            {{--name--}}
                            <x-dashboard.admin.input.text required="true" name="name" label="admin.global.name" col="col-md-6"/>

                            {{--email--}}
                            <x-dashboard.admin.input.text required="true" name="email" label="admin.global.email" col="col-md-6" type="email"/>

                            {{--password--}}
                            <x-dashboard.admin.input.text required="true" name="password" label="admin.global.password" col="col-md-6" type="password"/>

                            {{--phone--}}
                            <x-dashboard.admin.input.text required="true" name="phone" label="admin.global.phone" col="col-md-6" type="number"/>

                            {{--roles--}}
                            <x-dashboard.admin.input.option required="false" name="roles[]" label="admin.menu.roles" :lists="$roles" :multiple="true" col="col-md-6"/>

                            {{--status--}}
                            <x-dashboard.admin.input.checkbox name="status" label="admin.global.status" col="col-md-6"/>

                        </div>  {{-- row --}}

                    </div>{{-- col-md-8 --}}

                    <div class="col-md-4">
                        
                        {{--phone--}}
                        <div class="mx-auto">
                            <x-dashboard.admin.input.image-preview name="image" label="admin.global.image"/>
                        </div>

                    </div>{{-- col-md-4 --}}

                </div>{{-- row --}}

                {{--btn save--}}
                <x-dashboard.admin.btn.save />

            </form>{{-- form --}}

        </div>{{-- card-body --}}

    </div>{{-- card --}}

</x-dashboard.admin.layouts.app>