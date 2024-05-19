<x-dashboard.admin.layouts.app>

    <x-slot name="title">
        {{ trans('admin.global.create') . ' - ' . trans('admin.menu.role') }}
    </x-slot>

    <div class="card card-flush shadow-sm">

        <div class="card-header">
            <h3 class="card-title">{{ trans('admin.global.create_new', ['name' => trans('admin.menu.role')]) }}</h3>
            <div class="card-toolbar">
                
                {{--btn back--}}
                <x-dashboard.admin.btn.back route="dashboard.admin.management.roles.index"/>

            </div>
        </div>

        <div class="card-body py-5">

            <form method="post" action="{{ route('dashboard.admin.management.roles.store') }}" enctype="multipart/form-data">

                @csrf
                @method('post')

                {{--name--}}
                <x-dashboard.admin.input.text required="true" name="name" label="admin.global.name"/>

                <h5 class="mt-4">@lang('admin.menu.permissions') <span class="text-danger">*</span></h5>

                <table class="table">
                    <thead>
                    <tr>
                        <th>@lang('admin.global.model')</th>
                        <th>@lang('admin.menu.permissions')</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($permissions as $name=>$permission)
                            <tr>
                                <td>@lang($name)</td>
                                <td>
                                    <div class="animated-checkbox mx-2 form-check form-switch" style="display:inline-block;">
                                        <label class="m-0">
                                            <input type="checkbox" value="{{ $name }}" name="all[{{ $name }}]" class="all-roles form-check-input" {{ old('all.' . $name) == $name ? 'checked' : '' }}>
                                            <span class="label-text">@lang('admin.global.all')</span>
                                        </label>
                                    </div>

                                    @foreach ($permission as $items)
                                        <div class="animated-checkbox mx-2 form-check form-switch" style="display:inline-block;">
                                            <label class="m-0">
                                                <input type="checkbox" value="{{ $items['name'] }}" name="permissions[{{ $items['name'] }}]" class="role form-check-input" {{ old('permissions.' . $items['name']) == $items['name'] ? 'checked' : '' }}>
                                                <span class="label-text">{{ $items['name'] }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table><!-- end of table -->

                {{--btn save--}}
                <x-dashboard.admin.btn.save />

            </form>{{-- form --}}

        </div>{{-- card-body --}}

    </div>{{-- card --}}

</x-dashboard.admin.layouts.app>