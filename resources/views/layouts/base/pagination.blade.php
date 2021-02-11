<div class="pagination-container">
	<div class="row {{ $class }}">
		<div class="col d-flex justify-content-start align-items-end">
			<div class="total">
				<strong class="bold">Total: </strong> {{ $collect->total() }} registros.
			</div>
		</div>

		@php
			$appends = (isset($appends) AND $appends) ? $appends : [];
			$appends = request()->only(array_keys($appends));
			$theme   = $theme ?? "pagination::bootstrap-4";
		@endphp

		<div class="col d-flex justify-content-end align-items-center">
			{{ $collect->appends($appends)->links($theme) }}
		</div>
	</div>
</div>
