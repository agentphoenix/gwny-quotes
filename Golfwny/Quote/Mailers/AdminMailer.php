<?php namespace Quote\Mailers;

use HTML, View, Quote;

class AdminMailer extends BaseMailer {

	public function newQuote(Quote $quote)
	{
		$emailData = [
			'subject' => "New Package Request Received",
			'quote' => View::make('emails.package-details-partial')->withQuote($quote),
			'to' => config('gwny.email.to'),
			'fromEmail' => $quote->email,
			'fromName' => $quote->name,
		];

		return $this->send('admin.newQuote', $emailData);
	}

}
