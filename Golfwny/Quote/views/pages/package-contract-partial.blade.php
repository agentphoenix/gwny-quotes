<h2>Contract</h2>

@if ($quote->status == Status::CONTRACT_ACCEPTED)
	<p><strong class="text-success">Contract Accepted:</strong> {{ $quote->present()->contractAccepted }}</p>
@endif

@if ($quote->status == Status::CONTRACT_REJECTED)
	<p><strong class="text-danger">Contract Rejected:</strong> {{ $quote->present()->contractRejected }}</p>
@endif