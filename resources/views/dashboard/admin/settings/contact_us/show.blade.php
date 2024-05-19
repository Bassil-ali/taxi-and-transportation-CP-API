<x-dashboard.admin.layouts.app>

    <x-slot name="title">
        {{ trans('admin.menu.settings') . ' - ' . trans('admin.settings.contact') }}
    </x-slot>

    <div class="card card-flush shadow-sm">

        <div class="card-header">
            
            <h3 class="card-title">{{ trans('admin.menu.settings') . ' - ' . trans('admin.settings.contact') . ' => ' . $contact->title }}</h3>

            <div class="card-toolbar">
                
                {{--btn back--}}
                <x-dashboard.admin.btn.back route="dashboard.admin.setting.contact.index"/>

            </div>
        </div>

        <div class="card-body py-5">
        
            <div class="row">
                {{--title--}}
                <x-dashboard.admin.input.text name="title" label="admin.global.title" col="col-md-6" :value="$contact->title" :required='true' :disabled='true'/>

                {{--email--}}
                <x-dashboard.admin.input.text name="email" label="admin.global.email" col="col-md-6" :value="$contact->email" :required='true' :disabled='true'/>

            	{{--name--}}
                <x-dashboard.admin.input.textarea name="description" label="admin.global.description" col="col-md-12" :value="$contact->description" :required='true' :disabled='true' row="6"/>

                {{--status--}}
                <x-dashboard.admin.input.checkbox name="status" label="admin.global.status" col="col-md-6" :value="$contact->status" :required='true' :disabled='true'/>

            </div>  {{-- row --}}

        </div>{{-- card-body --}}

    </div>{{-- card --}}

</x-dashboard.admin.layouts.app>