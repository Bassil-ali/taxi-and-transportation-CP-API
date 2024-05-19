@if(!empty($actions['edit']['permissions']) && !empty($actions['edit']['route']))
    <a href="{{ $actions['edit']['route'] }}" class="btn btn-warning btn-sm">
        <i class="fa fa-edit"></i> 
        {{-- @lang('admin.global.edit') --}}
    </a>
@endif

@if(!empty($actions['delete']['permissions']) && !empty($actions['delete']['route']))
    <form action="{{ $actions['delete']['route'] }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
        @csrf
        @method('delete')

        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> 
            {{-- @lang('admin.global.delete') --}}
        </button>
    </form>
@endif

@if(!empty($actions['show']['permissions']) && !empty($actions['show']['route']))
    <a href="{{ $actions['show']['route'] }}" class="btn btn-info btn-sm">
        <i class="fa fa-eye"></i>
         {{-- @lang('admin.global.show') --}}
    </a>
@endif