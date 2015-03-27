{{ View::make('pages.package-details-partial')->withQuote($quote) }}

{{ Form::open(['route' => ['storeConfirm', $location]]) }}
	{{ Form::hidden('code', $quote->code) }}
	
	<div class="visible-xs visible-sm">
		<p>{{ Form::button('Submit Request', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block']) }}</p>
		<p><a href="{{ route('home') }}" class="btn btn-lg btn-default btn-block">Start Over</a></p>
	</div>
	<div class="visible-md visible-lg">
		<div class="btn-toolbar">
			<div class="btn-group">
				{{ Form::button('Submit Request', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary']) }}
			</div>
			<div class="btn-group">
				<a href="{{ route('home') }}" class="btn btn-lg btn-default">Start Over</a>
			</div>
		</div>
	</div>
{{ Form::close() }}