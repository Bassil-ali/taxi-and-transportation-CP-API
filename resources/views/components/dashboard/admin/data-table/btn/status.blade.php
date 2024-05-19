@if($permissions['status'])
    <div class="form-group ml-3">
        <div class="form-check form-switch">
            <input class="form-check-input checkbox status" data-type="{{ 'status' }}" id="status-{{ (bool) $models->id }}" data-id="{{ $models->id }}" type="checkbox" name="id" value="{{ $models->id }}" {{ $models->status ? 'checked' : '' }}>
        </div>
    </div>
@endif