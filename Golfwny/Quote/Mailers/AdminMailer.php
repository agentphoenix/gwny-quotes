<?php namespace Quote\Mailers;

use HTML, View, Quote;

class AdminMailer extends BaseMailer {

	public function acceptedContract(Quote $quote)
	{
		$data = [
			'subject' => "Package Contract Accepted",
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.contract-accepted', $data);
	}

	public function acceptedEstimate(Quote $quote)
	{
		$data = [
			'subject' => "Package Estimate Accepted",
			'quote' => View::make('emails.package-details-partial')->withQuote($quote),
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.estimate-accepted', $data);
	}

	public function rejectedContract(Quote $quote)
	{
		$data = [
			'subject' => "Package Contract Rejected",
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.contract-rejected', $data);
	}

	public function rejectedEstimate(Quote $quote)
	{
		$data = [
			'subject' => "Package Estimate Rejected",
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.estimate-rejected', $data);
	}

	public function newQuote(Quote $quote)
	{
		$data = [
			'subject' => "New Package Request Received",
			'quote' => View::make('emails.package-details-partial')->withQuote($quote),
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.new-quote', $data);
	}

	public function withdrawnQuote(Quote $quote)
	{
		$data = [
			'subject' => "Package Request Withdrawn",
			'quote' => View::make('emails.package-details-partial')->withQuote($quote),
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.withdrawn-quote', $data);
	}

}
