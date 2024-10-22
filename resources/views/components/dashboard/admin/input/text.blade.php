<div class="{{ $col }}" id="{{ $name }}-hidden" {{ $hidden ? 'hidden' : '' }}>
    <div class="form-group mt-4">
        @if(!empty($label))
            <label for="{{ $id }}">{{ trans($label) }} @if($required)<span class="text-danger">*</span>@endif</label>
        @endif
        <input type="{{ $type }}" name="{{ $name }}" {{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }} id="{{ $id }}" autofocus class="form-control @error(!empty($invalid) ? $invalid : $name) is-invalid @enderror" value="{{ old(!empty($invalid) ? $invalid : $name, $value) }}">
        @error(!empty($invalid) ? $invalid : $name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>