<div class="{{ $col }}" id="{{ $id }}-hidden mb-10" {{ $hidden ? 'hidden' : '' }}>
    <div class="form-group mt-4">
        @if(!empty($label))
            <label for="{{ $id }}">{{ trans($label) }} @if($required)<span class="text-danger">*</span>@endif</label>
        @endif
        <input type="{{ $type }}" name="{{ $name }}" {{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }} id="kt_{{ $id }}" autofocus class="form-control @error(!empty($invalid) ? $invalid : $name) is-invalid @enderror" value="{{ old(!empty($invalid) ? $invalid : $name, $value) }}">
        @error(!empty($invalid) ? $invalid : $name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<x-slot:scripts>
    <script type="text/javascript">
        @foreach(getLanguages() as $language)
            var name = "kt_{{ $idname }}_{{ $language->code }}";
            var input= document.querySelector('#' + name);
            new Tagify(input);
        @endforeach
    </script>
</x-slot>