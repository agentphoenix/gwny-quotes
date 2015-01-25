<?php namespace Quote\Mailers;

use HTML, View, Quote;

class AdminMailer extends BaseMailer {

	public function acceptedContract(Quote $quote)
	{
		# code...
	}

	public function acceptedEstimate(Quote $quote)
	{
		$emailData = [
			'subject' => "Package Estimate Accepted",
			'quote' => View::make('emails.package-details-partial')->withQuote($quote),
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.accepted', $emailData);
	}

	public function rejectedContract(Quote $quote)
	{
		# code...
	}

	public function rejectedEstimate(Quote $quote)
	{
		# code...
	}

	public function newQuote(Quote $quote)
	{
		$emailData = [
			'subject' => "New Package Request Received",
			'quote' => View::make('emails.package-details-partial')->withQuote($quote),
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.new', $emailData);
	}

	public function withdrawnQuote(Quote $quote)
	{
		$emailData = [
			'subject' => "Package Request Withdrawn",
			'quote' => View::make('emails.package-details-partial')->withQuote($quote),
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.withdrawn', $emailData);
	}

}
