<?php namespace Quote\Mailers;

use HTML, View, Quote;

class CustomerMailer extends BaseMailer {

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
