<x-dashboard.admin.layouts.app>

    <x-slot name="title">{{ trans('admin.auth.edit_password') }}</x-slot>

    <div class="card card-flush shadow-sm">

        <div class="card-header">
            <h3 class="card-title">{{ trans('admin.global.Edit', ['name' => auth('admin')->user()->name]) }}</h3>
            <div class="card-toolbar">
                
                {{--btn back--}}
                <x-dashboard.admin.btn.back route="dashboard.admin.index"/>

            </div>
        </div>

        <div class="card-body py-5">

            <form method="post" action="{{ route('dashboard.admin.accounts.password.update') }}">

                @csrf
                @method('post')

                <div class="row">
                        
                    <div class="row">
                        {{--name--}}
                        <x-dashboard.admin.input.text required="true" name="current_password" label="admin.auth.current_password" col="col-md-6" type="password"/>

                        {{--email--}}
                        <x-dashboard.admin.input.text required="true" name="new_password" label="admin.auth.new_password" col="col-md-6" type="password"/>

                        {{--password--}}
                        <x-dashboard.admin.input.text required="true" name="password_confirmation" label="admin.auth.password_confirmation" col="col-md-6" type="password"/>

                    </div>  {{-- row --}}

                </div>{{-- row --}}

                {{--btn save--}}
                <x-dashboard.admin.btn.save />

            </form>{{-- form --}}

        </div>{{-- card-body --}}

    </div>{{-- card --}}

</x-dashboard.admin.layouts.app>