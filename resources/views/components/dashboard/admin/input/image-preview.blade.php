<!--begin::Image input placeholder-->
<style>
    .image-input-placeholder {
        background-image: url('svg/avatars/blank.svg');
    }

    [data-bs-theme="dark"] .image-input-placeholder {
        background-image: url('svg/avatars/blank-dark.svg');
    }
    .image-input [data-kt-image-input-action=change] {
        top: 4px;
    }
</style>
<!--end::Image input placeholder-->

<!--begin::Image input-->
<div wire:ignore id="{{ $name }}-hidden" class="mt-4 image-input image-input-outline" {{ $hidden ? 'hidden' : '' }} data-kt-image-input="true" style="background-image: url(/assets/media/svg/avatars/blank.svg)">

    @if($label)
        <label class="form-check-label">@lang($label)</label>
    @endif
    <!--begin::Image preview wrapper-->
    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ $image }}')"></div>
    <!--end::Image preview wrapper-->
    @if(!$disabled || !$readonly)
        <!--begin::Edit button-->
        <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="change"
                data-bs-toggle="tooltip"
                data-bs-dismiss="click"
                title="Change avatar">
            <i class="fa fa-plus text-danger fs-5"></i><span class="path1"></span><span class="path2"></span></i>

            <!--begin::Inputs-->
            <input type="file" name="{{ $name }}" accept="{{ $accept }}" {{ $required ? 'required' : '' }}/>
            {{-- <input type="hidden" name="{{ $name }}" accept="{{ $accept }}" {{ $required ? 'required' : '' }}/> --}}
            <!--end::Inputs-->
        </label>
        <!--end::Edit button-->
    @endif

    @if(!$disabled || !$readonly)

        <!--begin::Cancel button-->
        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="cancel"
                data-bs-toggle="tooltip"
                data-bs-dismiss="click"
                title="Cancel avatar">
            <i class="fa fa-trash text-danger fs-5"></i>
        </span>
        <!--end::Cancel button-->

        <!--begin::Remove button-->
        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="remove"
                data-bs-toggle="tooltip"
                data-bs-dismiss="click"
                title="Remove avatar">
            <i class="fa fa-trash text-danger fs-5"></i>
        </span>
        <!--end::Remove button-->
    @endif
    
</div>
<!--end::Image input-->
<div class="mt-3">
    @error($name) <span class="error text-danger">{{ $message }}</span> @enderror
</div>