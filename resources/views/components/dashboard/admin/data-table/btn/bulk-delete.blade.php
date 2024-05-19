<form method="post" action="{{ route($route) }}" style="display: inline-block; cursor: pointer;">
    @csrf
    @method('delete')

    <input type="hidden" name="record_ids" id="record-ids">
    <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> @lang('admin.global.bulk_delete')</button>
</form><!-- end of form -->