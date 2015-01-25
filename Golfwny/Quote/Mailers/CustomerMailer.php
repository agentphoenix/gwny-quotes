<?php namespace Quote\Mailers;

use HTML, View, Quote;

class CustomerMailer extends BaseMailer {

	public function acceptedContract(Quote $quote)
	{
		# code...
	}

	public function acceptedEstimate(Quote $quote)
	{
		# code...
	}

	public function packageContract(Quote $quote)
	{
		# code...
	}

	public function rejectedContract(Quote $quote)
	{
		# code...
	}

	public function rejectedEstimate(Quote $quote)
	{
		# code...
	}

	public function sendEstimate(Quote $quote)
	{
		$emailData = [
			'subject' => "Package Estimate",
			'quote' => View::make('emails.package-details-partial')->withQuote($quote),
			'code' => $quote->present()->code,
			'to' => $quote->email,
		];

		return $this->send('customer.estimate', $emailData);
	}

	public function submitted(Quote $quote)
	{
		$emailData = [
			'subject' => "Package Request Submitted",
			'quote' => View::make('emails.package-details-partial')->withQuote($quote),
			'code' => $quote->present()->code,
			'to' => $quote->email,
		];

		return $this->send('customer.submitted', $emailData);
	}

}
