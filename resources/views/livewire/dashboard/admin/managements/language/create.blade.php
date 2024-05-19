<div>

    <x-dashboard.admin.layout.includes.toolbar :breadcrumb='$breadcrumb'/>

    <div class="card card-flush shadow-sm">

        <div class="card-header">
            <h3 class="card-title">Create Language</h3>
            <div class="card-toolbar">
                <a href="{{ route('dashboard.admin.management.admins.index') }}" class="btn btn-primary" wire:navigate.hover>
                    <i class="bi bi-plus fs-4"></i>
                    Back
                </a>
            </div>
        </div>

        <div class="card-body py-5">

            <div class="mb-5 hover-scroll-x">
                <div class="d-grid">
                    <ul class="nav nav-tabs flex-nowrap text-nowrap">
                        <li class="nav-item">
                            <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0" data-bs-toggle="tab" href="#kt_tab_pane_1">Long Link 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0" data-bs-toggle="tab" href="#kt_tab_pane_2">Long Link 2</a>
                        </li>
                        ...
                    </ul>
                </div>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                    ...aaaaaaaaaaaaaaa
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                    ...fffffffffff
                </div>
            </div>


        </div>{{-- card-body --}}


    </div>{{-- card --}}

</div>
