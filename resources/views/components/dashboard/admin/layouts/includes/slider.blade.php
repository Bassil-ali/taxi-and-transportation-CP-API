<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
        data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">

        <!--begin::Menu-->
        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">

            <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.global.dashboard" active="dashboard.admin.index" route="dashboard.admin.index" svg="dashboard" permission="read-home"/>

            {{-- managements --}}
            @if(permissionAdmin('read-admins') || permissionAdmin('read-roles') || permissionAdmin('read-languages'))
            <x-dashboard.admin.layouts.includes.slider.menu-sub-accordion trans="admin.menu.managements" svg="managements" show="dashboard.admin.management.*">
            
                <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.admins" active="dashboard.admin.management.admins.*" route="dashboard.admin.management.admins.index" permission="read-admins" svg="admins"/>

                <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.roles" active="dashboard.admin.management.roles.*" route="dashboard.admin.management.roles.index" permission="read-roles" svg="roles"/>

                <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.languages" active="dashboard.admin.management.languages.*" route="dashboard.admin.management.languages.index" permission="read-languages" svg="languages"/>

            </x-dashboard.admin.layouts.includes.slider.menu-sub-accordion>
            @endif

            {{-- apps --}}
            @if(permissionAdmin('read-users') || permissionAdmin('read-trips') || permissionAdmin('read-cities') || permissionAdmin('read-cities') || permissionAdmin('read-regions') || permissionAdmin('read-categories'))
            <x-dashboard.admin.layouts.includes.slider.menu-sub-accordion trans="admin.menu.app" svg="app" show="dashboard.admin.app.*">
                    {{-- users --}}
                    @if(permissionAdmin('read-users'))
                    <x-dashboard.admin.layouts.includes.slider.menu-sub-accordion trans="admin.menu.users" show="dashboard.admin.app.users*" svg="users">

                        <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.global.all" active="dashboard.admin.app.users.all.*" route="dashboard.admin.app.users.all.index" permission="read-users"/>
                        
                        <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.customers" active="dashboard.admin.app.users.customers.*" route="dashboard.admin.app.users.customers.index" permission="read-users"/>

                        <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.drivers" active="dashboard.admin.app.users.drivers.*" route="dashboard.admin.app.users.drivers.index" permission="read-users"/>
                        
                        <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.companys" active="dashboard.admin.app.users.companys.*" route="dashboard.admin.app.users.companys.index" permission="read-users"/>

                        <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.employees" active="dashboard.admin.app.users.employees.*" route="dashboard.admin.app.users.employees.index" permission="read-users"/>

                    </x-dashboard.admin.layouts.includes.slider.menu-sub-accordion>
                    @endif

                    {{-- trips --}}
                    @if(permissionAdmin('read-trips'))
                    <x-dashboard.admin.layouts.includes.slider.menu-sub-accordion trans="admin.menu.trips" show="dashboard.admin.app.trips*" svg="trips">
                    
                        <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.global.all" active="dashboard.admin.app.trips.all.*" route="dashboard.admin.app.trips.all.index" permission="read-trips"/>

                        <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.ads" active="dashboard.admin.app.trips.ads.*" route="dashboard.admin.app.trips.ads.index" permission="read-trips"/>

                        <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.customers" active="dashboard.admin.app.trips.customers.*" route="dashboard.admin.app.trips.customers.index" permission="read-trips"/>

                        <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.drivers" active="dashboard.admin.app.trips.drivers.*" route="dashboard.admin.app.trips.drivers.index" permission="read-trips"/>

                        <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.companys" active="dashboard.admin.app.trips.companys.*" route="dashboard.admin.app.trips.companys.index" permission="read-trips"/>

                    </x-dashboard.admin.layouts.includes.slider.menu-sub-accordion>
                    @endif

                    {{-- locations --}}
                    @if(permissionAdmin('read-cities') || permissionAdmin('read-regions'))
                    <x-dashboard.admin.layouts.includes.slider.menu-sub-accordion trans="admin.menu.locations" show="dashboard.admin.app.locations*" svg="locations">

                        <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.cities" active="dashboard.admin.app.locations.cities.*" route="dashboard.admin.app.locations.cities.index" permission="read-cities"/>

                        <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.regions" active="dashboard.admin.app.locations.regions.*" route="dashboard.admin.app.locations.regions.index" permission="read-regions"/>

                    </x-dashboard.admin.layouts.includes.slider.menu-sub-accordion>
                    @endif

                    {{-- categories --}}
                    <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.categories" active="dashboard.admin.app.categories.*" route="dashboard.admin.app.categories.index" permission="read-categories"/>

                    {{-- transport_types --}}
                    <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.menu.transport_types" active="dashboard.admin.app.transport_types.*" route="dashboard.admin.app.transport_types.index" permission="read-transport_types"/>

            </x-dashboard.admin.layouts.includes.slider.menu-sub-accordion>
            @endif

            @if(permissionAdmin('read-settings'))

                <x-dashboard.admin.layouts.includes.slider.menu-sub-accordion trans="admin.menu.settings" svg="settings" show="dashboard.admin.setting.*" svg="settings">

                    <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.settings.website" active="*website*" route="dashboard.admin.setting.website.index" permission="read-settings"/>

                    <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.settings.meta" active="*meta*" route="dashboard.admin.setting.meta.index" permission="read-settings"/>

                    <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.settings.media" active="*media*" route="dashboard.admin.setting.media.index" permission="read-settings"/>

                    <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.settings.contact" active="*contact*" route="dashboard.admin.setting.contact.index" permission="read-settings"/>

                </x-dashboard.admin.layouts.includes.slider.menu-sub-accordion>

            @endif

            {{-- settings --}}

            {{-- accounts --}}
            
            <x-dashboard.admin.layouts.includes.slider.menu-sub-accordion trans="admin.auth.account" svg="account" show="dashboard.admin.accounts.*" svg="accounts">
            
                <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.auth.edit_profile" active="*profile*" route="dashboard.admin.accounts.profile.edit" permission="read-home"/>

                <x-dashboard.admin.layouts.includes.slider.menu-item trans="admin.auth.edit_password" active="*password*" route="dashboard.admin.accounts.password.edit" permission="read-home"/>

                <div class="menu-item">
                    <a class="menu-link {{ request()->is('*logout*') ? 'active' : '' }}" href="{{ route('dashboard.admin.logout') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ trans('admin.auth.logout') }}</span>
                    </a>
                </div>

            </x-dashboard.admin.layouts.includes.slider.menu-sub-accordion>

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
</div>