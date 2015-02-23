<?php namespace Quote\Mailers;

use HTML, View, Quote;

class CustomerMailer extends BaseMailer {

	public function acceptedContract(Quote $quote)
	{
		$data = [
			'subject' => "Package Contract Accepted",
			'code' => $quote->present()->code,
			'to' => $quote->email,
		];

		return $this->send('customer.contract-accepted', $data);
	}

	public function acceptedEstimate(Quote $quote)
	{
		$data = [
			'subject' => "Package Estimate Accepted",
			'code' => $quote->present()->code,
			'to' => $quote->email,
		];

		return $this->send('customer.estimate-accepted', $data);
	}

	public function depositPayment(Quote $quote)
	{
		$data = [
			'subject' => "Package Deposit Due",
			'code' => $quote->present()->code,
			'to' => $quote->email,
		];

		return $this->send('customer.payment-deposit', $data);
	}

	public function finalPayment(Quote $quote)
	{
		$data = [
			'subject' => "Package Final Payment Due",
			'code' => $quote->present()->code,
			'to' => $quote->email,
		];

		return $this->send('customer.payment-final', $data);
	}

	public function packageContract(Quote $quote)
	{
		$data = [
			'subject' => "Package Contract",
			'code' => $quote->present()->code,
			'to' => $quote->email,
		];

		return $this->send('customer.contract', $data);
	}

	public function rejectedContract(Quote $quote)
	{
		$data = [
			'subject' => "Package Contract Rejected",
			'code' => $quote->present()->code,
			'to' => $quote->email,
		];

		return $this->send('customer.contract-rejected', $data);
	}

	public function rejectedEstimate(Quote $quote)
	{
		$data = [
			'subject' => "Package Estimate Rejected",
			'code' => $quote->present()->code,
			'to' => $quote->email,
		];

		return $this->send('customer.estimate-rejected', $data);
	}

	public function sendEstimate(Quote $quote)
	{
		$data = [
			'subject' => "Package Estimate",
			'quote' => View::make('emails.package-details-partial')->withQuote($quote),
			'code' => $quote->present()->code,
			'to' => $quote->email,
		];

		return $this->send('customer.estimate', $data);
	}

	public function sendEstimateReminder(Quote $quote)
	{
		$data = [
			'subject' => "Package Estimate Reminder",
			'quote' => View::make('emails.package-details-partial')->withQuote($quote),
			'code' => $quote->present()->code,
			'to' => $quote->email,
		];

		return $this->send('customer.estimate-reminder', $data);
	}

	public function sendContractReminder(Quote $quote)
	{
		$data = [
			'subject' => "Package Contract Reminder",
			'quote' => View::make('emails.package-details-partial')->withQuote($quote),
			'code' => $quote->present()->code,
			'to' => $quote->email,
		];

		return $this->send('customer.contract-reminder', $data);
	}

	public function submitted(Quote $quote)
	{
		$data = [
			'subject' => "Package Request Submitted",
			'quote' => View::make('emails.package-details-partial')->withQuote($quote),
			'code' => $quote->present()->code,
			'to' => $quote->email,
		];

		return $this->send('customer.submitted', $data);
	}

	public function survey(Quote $quote)
	{
		$data = [
			'subject' => "Package Survey",
			'to' => $quote->email,
		];

		return $this->send('customer.survey', $data);
	}

	public function welcome(Quote $quote)
	{
		$data = [
			'subject' => "Package Welcome",
			'to' => $quote->email,
		];

		return $this->send('customer.welcome', $data);
	}

}
