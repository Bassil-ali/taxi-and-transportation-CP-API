<div class="btn-group" role="group">
	<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
		 Export
	</button>
	<ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" id="datatable-export">
		@foreach($items as $item)
			<li>
				<a data-export="{{ $item }}" class="dropdown-item export-items" href="#">{{ $item }}</a>
			</li>
		@endforeach
	</ul>
</div>