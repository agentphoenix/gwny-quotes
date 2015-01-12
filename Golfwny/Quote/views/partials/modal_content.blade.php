<div class="header">
	{{ $modalHeader }}
</div>

<div class="content">
	<div class="description">{{ $modalBody }}</div>
</div>

@if ($modalFooter)
	<div class="actions">
		{{ $modalFooter }}
	</div>
@endif