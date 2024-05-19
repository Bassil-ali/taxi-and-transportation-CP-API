<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <div class="breadcrumb-bar">
                <div class="container">
                    <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                       @foreach($breadcrumb as $key=>$item)
                            @if($key == '#')
                                <li class="breadcrumb-item">
                                    {{ $item }}
                                </li>
                            @else
                                <li class="breadcrumb-item">
                                    <a href="{{ $key }}">
                                        {{ $item }}
                                    </a>
                                </li>
                            @endif
                       @endforeach
                    </ol>
                </div>
            </div>
            <!--end::Title-->
        </div>

    </div>
    <!--end::Container-->
</div>