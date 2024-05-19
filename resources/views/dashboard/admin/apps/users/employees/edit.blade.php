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

            <form method="post" action="{{ route('dashboard.admin.app.users.employees.update', $employee->id) }}" enctype="multipart/form-data">

                @csrf
                @method('put')

                <div class="row">

                    <div class="col-md-8">
                        
                        <div class="row">
                            {{--name--}}
                            <x-dashboard.admin.input.text required="true" name="name" label="admin.global.name" col="col-md-6" :value='$employee->name'/>

                            {{--email--}}
                            <x-dashboard.admin.input.text required="true" name="email" label="admin.global.email" col="col-md-6" type="email" :value='$employee->email'/>

                            {{--phone--}}
                            <x-dashboard.admin.input.text required="true" name="phone" label="admin.global.phone" col="col-md-6" type="number" :value='$employee->phone'/>

                            {{--roles--}}
                            <x-dashboard.admin.input.option required="false" name="type" label="admin.menu.roles" :lists="$types" col="col-md-6" :value="$employee->typeName"/>

                            {{--status--}}
                            <x-dashboard.admin.input.checkbox name="status" label="admin.global.status" col="col-md-6" :value='$employee->status'/>

                        </div>  {{-- row --}}

                    </div>{{-- col-md-8 --}}

                    <div class="col-md-4">
                        
                        {{--phone--}}
                        <div class="mx-auto">
                            <x-dashboard.admin.input.image-preview name="image" label="admin.global.image" image="{{ $employee->image_path }}"/>
                        </div>

                    </div>{{-- col-md-4 --}}

                </div>{{-- row --}}

                {{--btn save--}}
                <x-dashboard.admin.btn.save />

            </form>{{-- form --}}

        </div>{{-- card-body --}}

    </div>{{-- card --}}

</x-dashboard.admin.layouts.app>