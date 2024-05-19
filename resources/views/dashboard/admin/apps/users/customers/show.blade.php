<x-dashboard.admin.layouts.app>

    <x-slot name="title">
        {{ trans('admin.menu.app') . ' - ' . trans('admin.menu.users') . ' - ' . trans('admin.menu.customers') . ' - ' . trans('admin.global.Show', ['name' => $customer->name]) }}
    </x-slot>

    <div class="card card-flush shadow-sm">

        <div class="card-header">
            <h3 class="card-title">
                {{ trans('admin.menu.app') . ' - ' . trans('admin.menu.users') . ' - ' . trans('admin.menu.customers') . ' - ' . trans('admin.global.Show', ['name' => $customer->name]) }}
            </h3>
            <div class="card-toolbar">
                
                {{--btn back--}}
                <x-dashboard.admin.btn.back route="dashboard.admin.app.users.customers.index"/>

            </div>
        </div>

        <div class="card-body py-5">

            <div class="row">

                <div class="col-md-8">
                    
                    <div class="row">
                        {{--name--}}
                        <x-dashboard.admin.input.text required="true" name="name" label="admin.global.name" col="col-md-6" :value='$customer->name' :disabled='true' :readonly='true'/>

                        {{--email--}}
                        <x-dashboard.admin.input.text required="true" name="email" label="admin.global.email" col="col-md-6" type="email" :value='$customer->email' :disabled='true' :readonly='true'/>

                        {{--phone--}}
                        <x-dashboard.admin.input.text required="true" name="phone" label="admin.global.phone" col="col-md-6" type="number" :value='$customer->mobile' :disabled='true' :readonly='true'/>

                        {{--roles--}}
                        <x-dashboard.admin.input.option required="false" name="type" label="admin.menu.roles" :lists="$types" col="col-md-6" :value="$customer->type" :disabled='true' :readonly='true'/>

                        {{--status--}}
                        <x-dashboard.admin.input.checkbox name="status" label="admin.global.status" col="col-md-6" :value='$customer->status' :disabled='true' :readonly='true'/>

                    </div>  {{-- row --}}

                </div>{{-- col-md-8 --}}

                <div class="col-md-4">
                    
                    {{--phone--}}
                    <div class="mx-auto">
                        <x-dashboard.admin.input.image-preview name="image" label="admin.global.image" image="{{ $customer->image_path }}" :disabled='true' :readonly='true'/>
                    </div>

                </div>{{-- col-md-4 --}}

            </div>{{-- row --}}

        </div>{{-- card-body --}}

    </div>{{-- card --}}

    <div class="card card-flush shadow-sm mt-5">

    	<div class="card-header">
            <h3 class="card-title">{{ trans('admin.menu.trips') }}</h3>
        </div>

        <div class="card-header">
            <x-dashboard.admin.data-table.input.visible name="columns" :datatable="$datatables" :multiple="true" col="col-md-6"/>
        </div>

        <div class="card-header">

            <x-dashboard.admin.data-table.input.search/>

            <div class="card-toolbar">
            	<div class="m-2">
                    <x-dashboard.admin.data-table.input.export/>
                </div>
                @if(permissionAdmin('delete-users'))
                    <x-dashboard.admin.data-table.btn.bulk-delete route="dashboard.admin.app.trips.all.bulk_delete"/>
                @endif
            </div>

        </div>{{-- card-header --}}

    	<div class="card-body">

            <div class="col-md-12">

                <div class="table-responsive">

                    <table class="table datatable" id="data-table">
                        <x-dashboard.admin.data-table.header :columns='$datatables["header"]'/>
                    </table>

                </div><!-- end of table responsive -->

            </div><!-- end of col -->

        </div>{{-- card-body --}}

    </div>{{-- card --}}

    <x-slot name="scripts">
        <x-dashboard.admin.datatable.script :datatables='$datatables'/>
    </x-slot>

</x-dashboard.admin.layouts.app>