<x-dashboard.admin.layouts.app>

    <x-slot name="title">
        {{ trans('admin.menu.app') . ' - ' . trans('admin.menu.users') . ' - ' . trans('admin.menu.employees') . ' - ' . trans('admin.global.Show', ['name' => $employee->name]) }}
    </x-slot>

    <div class="card card-flush shadow-sm">

        <div class="card-header">
            <h3 class="card-title">
                {{ trans('admin.menu.app') . ' - ' . trans('admin.menu.users') . ' - ' . trans('admin.menu.employees') . ' - ' . trans('admin.global.Show', ['name' => $employee->name]) }}
            </h3>
            <div class="card-toolbar">
                
                {{--btn back--}}
                <x-dashboard.admin.btn.back route="dashboard.admin.app.users.employees.index"/>

            </div>
        </div>

        <div class="card-body py-5">

            <div class="row">

                <div class="col-md-8">
                    
                    <div class="row">
                        {{--name--}}
                        <x-dashboard.admin.input.text required="true" name="name" label="admin.global.name" col="col-md-6" :value='$employee->name' :disabled='true' :readonly='true'/>

                        {{--email--}}
                        <x-dashboard.admin.input.text required="true" name="email" label="admin.global.email" col="col-md-6" type="email" :value='$employee->email' :disabled='true' :readonly='true'/>

                        {{--phone--}}
                        <x-dashboard.admin.input.text required="true" name="phone" label="admin.global.phone" col="col-md-6" type="number" :value='$employee->mobile' :disabled='true' :readonly='true'/>

                        {{--roles--}}
                        <x-dashboard.admin.input.option required="false" name="type" label="admin.menu.roles" :lists="$types" col="col-md-6" :value="$employee->type" :disabled='true' :readonly='true'/>

                        {{--status--}}
                        <x-dashboard.admin.input.checkbox name="status" label="admin.global.status" col="col-md-6" :value='$employee->status' :disabled='true' :readonly='true'/>

                    </div>  {{-- row --}}

                </div>{{-- col-md-8 --}}

                <div class="col-md-4">
                    
                    {{--phone--}}
                    <div class="mx-auto">
                        <x-dashboard.admin.input.image-preview name="image" label="admin.global.image" image="{{ $employee->image_path }}" :disabled='true' :readonly='true'/>
                    </div>

                </div>{{-- col-md-4 --}}

            </div>{{-- row --}}

        </div>{{-- card-body --}}

    </div>{{-- card --}}

</x-dashboard.admin.layouts.app>