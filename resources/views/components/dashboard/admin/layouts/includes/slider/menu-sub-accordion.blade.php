<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs($show) ? 'hover show' : '' }}">
    <span class="menu-link">
        @if($svg)
            <span class="menu-icon">
                {!! $svg !!}
            </span>
        @else
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
        @endif
        <span class="menu-title">@lang($trans)</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg {{ request()->routeIs($show) ? 'show' : '' }}">

        {{ $slot }}

    </div>
</div>