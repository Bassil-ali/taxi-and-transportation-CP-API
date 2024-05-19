<div wire:ignore class="{{ $col }}" id="{{ $name }}-hidden" {{ $hidden ? 'hidden' : '' }}>
    <div class="form-group">
        @if(!empty($label))
            <label for="{{ $name }}">{{ trans($label) }} @if($required)<span class="text-danger">*</span>@endif</label>
        @endif
        <select {{ $readonly ? 'readonly' : '' }} {{ $multiple ? 'multiple' : '' }} data-control="select2" {{ $disabled ? 'disabled' : '' }} name="{{ $name }}" class="form-control @error(!empty($invalid) ? $invalid : $name) is-invalid @enderror" id="{{ $name }}">
            @foreach($lists as $key=>$list)
                <option value="{{ $key }}" data-column="{{ $key }}"
                @if($multiple)
                    @php($newName = str_replace('[]', '', $name))
                    @if(old($newName))
                        {{ in_array($key, is_array(old($newName)) ? old($newName) : []) ? 'selected' : '' }}
                    @else
                        {{ in_array($key, is_array($value) ? $value : []) ? 'selected' : '' }}
                    @endif
                @else
                    {{ old(!empty($invalid) ? $invalid : $name, $value) == $key ? 'selected' : '' }}
                @endif
                >{{ $list }}</option>
            @endforeach
        </select>
        @error(!empty($invalid) ? $invalid : $name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>