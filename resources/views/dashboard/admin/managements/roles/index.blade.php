<x-dashboard.admin.layouts.app>

    <x-slot name="title">{{ trans('admin.menu.roles') }}</x-slot>

    <div class="card shadow-sm">

        <div class="card-header">
            <h3 class="card-title">{{ trans('admin.menu.roles') }}</h3>
        </div>

        <div class="card-header">
            <x-dashboard.admin.data-table.input.visible name="columns" :datatable="$datatables" :multiple="true" col="col-md-6"/>
        </div>

        <div class="card-header">

            <x-dashboard.admin.data-table.input.search/>

            <div class="card-toolbar">
                @if(permissionAdmin('create-roles'))
                    <div class="m-2">
                        <x-dashboard.admin.data-table.input.export/>
                        <x-dashboard.admin.btn.add route="dashboard.admin.management.roles.create"/>
                    </div>
                @endif

                @if(permissionAdmin('delete-roles'))
                    <x-dashboard.admin.data-table.btn.bulk-delete route="dashboard.admin.management.roles.bulk_delete"/>
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

    <x-slot:scripts>
        <x-dashboard.admin.data-table.script :datatables='$datatables'/>
    </x-slot>

</x-dashboard.admin.layouts.app>