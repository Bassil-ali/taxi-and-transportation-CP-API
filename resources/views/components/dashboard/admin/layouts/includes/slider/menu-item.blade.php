@if(permissionAdmin($permission))
    <div class="menu-item">
        <a class="menu-link {{ request()->routeIs($active) ? 'active' : '' }}" href="{{ route($route) }}">
            @if($svg)
                <span class="menu-icon">
                    {!! $svg !!}
                </span>
            @else
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
            @endif
            <span class="menu-title">{{ trans($trans) }}</span>
        </a>
    </div>
@endif