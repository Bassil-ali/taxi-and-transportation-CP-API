@if(!empty($columns))
    <thead>
    <tr class="fw-bold fs-6 text-gray-800">
        <th>
            <div class="animated-checkbox">
                <label class="m-0">
                    <input type="checkbox" id="record__select-all" class="form-check-input">
                    <span class="label-text"></span>
                </label>
            </div>
        </th>
        @foreach($columns as $column)
            <th>{{ trans($column) }}</th>
        @endforeach
        <th>{{ trans('admin.global.created_at') }}</th>
        <th>{{ trans('admin.global.action') }}</th>
    </tr>
    </thead>
@endif