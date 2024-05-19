<x-dashboard.admin.layouts.app>

    <x-slot name="title">{{ trans('admin.global.home') }}</x-slot>

    {{-- <h2>Welcome Dashboard 😊</h2> --}}
    @foreach($statistics as $keyStatisticy=>$statistic)

    <div class="card shadow-sm">

        <div class="card-header">
            <h3 class="card-title">{{ trans('admin.menu.' . $keyStatisticy) }}</h3>
        </div>

        <div class="card-p position-relative">
            <!--begin::Row-->
            <div class="row g-0">

                @foreach($statistic as $keyModel=>$model)

                <div class="col {{ 'bg-light-' . $model['color'] ?? 'bg-light-warning' }} px-6 py-8 rounded-2 me-7 mb-7">
                    <span class="svg-icon svg-icon-3x svg-icon-{{ $model['color'] ?? 'warning' }} d-block my-2">
                        {!! $model['svg'] !!}
                    </span>
                    <!---->
                    <a href="#" class="text-{{ $model['color'] ?? 'warning' }} fw-bold fs-6">{{ trans($model['trans']) . ' (' . $model['count'] . ')' }}</a>
                </div>

                @endforeach

            </div>

        </div>{{-- card position --}}

    </div>{{-- card --}}

    @endforeach

</x-dashboard.admin.layouts.app>