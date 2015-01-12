<div class="ui icon {{ $type }} message">
	@if ($icon)
		<i class="{{ $icon }} icon"></i>
	@endif
	<div class="content">
		@if ($header)
			<div class="header">{{ $header }}</div>
		@endif
		<p>{{ $content }}</p>
	</div>
</div>