<div class="ui icon {{ $type }} message">
	@if (isset($icon))
		<i class="{{ $icon }} icon"></i>
	@endif
	<div class="content">
		@if (isset($header))
			<div class="header">{{ $header }}</div>
		@endif

		<p>{{ $content }}</p>
	</div>
</div>