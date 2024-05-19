<x-slot name="style">
    <style type="text/css">
        .select2-selection__choice {
            display: none !important;
        }
    </style>
</x-slot>
<div wire:ignore class="{{ $col }}" id="{{ $name }}-hidden" {{ $hidden ? 'hidden' : '' }}>
    <div class="form-group">
        @if(!empty($label))
            <label for="{{ $name }}">{{ trans($label) }} @if($required)<span class="text-danger">*</span>@endif</label>
        @endif
        <select {{ $readonly ? 'readonly' : '' }} {{ $multiple ? 'multiple' : '' }} data-control="select2" {{ $disabled ? 'disabled' : '' }} name="{{ $name }}" class="form-control" id="{{ $name }}">
            @foreach($lists as $key=>$list)
                <option value="{{ $key }}" selected>{{ $list }}</option>
            @endforeach
        </select>
    </div>
</div>