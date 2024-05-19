@if($permissions['status'])
    @empty($type)
        @php($type = 'status')
    @endempty

    <div style="margin-left: 2pc!important;">
        <div class="form-group">
            <div class="form-check form-switch">
                <input class="form-check-input checkbox" 
                data-type="{{ $type }}" id="status-{{ $models->id }}" 
                data-id="{{ $models->id }}" 
                type="checkbox" name="id" 
                value="{{ (int) $models->id }}" 
                {{ $models[$type] ? 'checked' : '' }}>
            </div>
        </div>
    </div>
@endif