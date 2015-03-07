<?php namespace Quote\Mailers;

use HTML, View, Quote;

class AdminMailer extends BaseMailer {

	public function contractAccepted(Quote $quote)
	{
		$data = [
			'subject' => "Contract Accepted",
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.contract-accepted', $data);
	}

	public function contractRejected(Quote $quote)
	{
		$data = [
			'subject' => "Contract Rejected",
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.contract-rejected', $data);
	}

	public function estimateAccepted(Quote $quote)
	{
		$data = [
			'subject' => "Quote Accepted",
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.estimate-accepted', $data);
	}

	public function estimateRejected(Quote $quote)
	{
		$data = [
			'subject' => "Quote Rejected",
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.estimate-rejected', $data);
	}

	public function newQuote(Quote $quote)
	{
		$data = [
			'subject' => "New Quote Requested",
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.new-quote', $data);
	}

}
