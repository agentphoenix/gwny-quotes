<div id="{{ $modalId }}" class="ui basic modal">
	<i class="close icon"></i>
	<div class="header">{{ $modalHeader }}</div>

	<div class="content">
		@if ($modalIcon)
			<div class="image">
				{{ $modalIcon }}
			</div>
		@endif

		<div class="description">
			{{ $modalBody }}
		</div>
	</div>

	@if ($modalFooter)
		<div class="actions">
			{{ $modalFooter }}
		</div>
	@endif
</div>