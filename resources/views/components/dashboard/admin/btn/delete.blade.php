<button onclick="confirm('confirm delete ?') || event.stopImmediatePropagation()"
        wire:click="delete({{ $id }})" class="btn btn-icon btn-danger btn-sm">
    <i class="fa fa-trash fa-sm"></i>
</button>