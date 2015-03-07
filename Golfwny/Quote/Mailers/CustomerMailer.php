<?php namespace Quote\Mailers;

use HTML, View, Quote;

class CustomerMailer extends BaseMailer {

	public function contractAccepted(Quote $quote)
	{
		$data = [
			'subject' => "Thank You From Golf Western NY",
			'code' => $quote->present()->code,
			'to' => $quote->email,
			'name' => $quote->name,
		];

		return $this->send('customer.contract-accepted', $data);
	}

	public function contractAvailable(Quote $quote)
	{
		$data = [
			'subject' => "Your Contract Is Available For Review",
			'code' => $quote->present()->code,
			'to' => $quote->email,
			'name' => $quote->name,
		];

		return $this->send('customer.contract', $data);
	}

	public function contractRejected(Quote $quote)
	{
		$data = [
			'subject' => "Sorry You Will Not Be Visiting",
			'code' => $quote->present()->code,
			'to' => $quote->email,
			'name' => $quote->name,
		];

		return $this->send('customer.contract-rejected', $data);
	}

	public function contractReminder(Quote $quote)
	{
		$data = [
			'subject' => "Reminder - Your Contract Needs To Be Reviewed",
			'code' => $quote->present()->code,
			'to' => $quote->email,
			'name' => $quote->name,
		];

		return $this->send('customer.contract-reminder', $data);
	}

	public function estimateAccepted(Quote $quote)
	{
		$data = [
			'subject' => "Contract Will Be Sent Shortly",
			'code' => $quote->present()->code,
			'to' => $quote->email,
			'name' => $quote->name,
		];

		return $this->send('customer.estimate-accepted', $data);
	}

	public function estimateAvailable(Quote $quote)
	{
		$data = [
			'subject' => "Your Quote Is Available For Review",
			'code' => $quote->present()->code,
			'to' => $quote->email,
			'name' => $quote->name,
		];

		return $this->send('customer.estimate', $data);
	}

	public function estimateRejected(Quote $quote)
	{
		$data = [
			'subject' => "Sorry You Rejected Our Quote",
			'code' => $quote->present()->code,
			'to' => $quote->email,
			'name' => $quote->name,
		];

		return $this->send('customer.estimate-rejected', $data);
	}

	public function estimateReminder(Quote $quote)
	{
		$data = [
			'subject' => "Reminder - Your Quote Needs To Be Reviewed",
			'code' => $quote->present()->code,
			'to' => $quote->email,
			'name' => $quote->name,
		];

		return $this->send('customer.estimate-reminder', $data);
	}

	public function paymentDeposit(Quote $quote)
	{
		$data = [
			'subject' => "Reminder - Deposit Is Due",
			'code' => $quote->present()->code,
			'to' => $quote->email,
			'name' => $quote->name,
		];

		return $this->send('customer.payment-deposit', $data);
	}

	public function paymentFinal(Quote $quote)
	{
		$data = [
			'subject' => "Reminder - Final Payment Is Still Due",
			'code' => $quote->present()->code,
			'to' => $quote->email,
			'name' => $quote->name,
		];

		return $this->send('customer.payment-final', $data);
	}

	public function submitted(Quote $quote)
	{
		$data = [
			'subject' => "New Quote Will Be Sent Shortly",
			'code' => $quote->present()->code,
			'to' => $quote->email,
			'name' => $quote->name,
		];

		return $this->send('customer.submitted', $data);
	}

	public function survey(Quote $quote)
	{
		$data = [
			'subject' => "Tell Us How We Did",
			'code' => $quote->present()->code,
			'to' => $quote->email,
			'name' => $quote->name,
		];

		return $this->send('customer.survey', $data);
	}

	public function welcome(Quote $quote)
	{
		$data = [
			'subject' => "Golf Western NY Welcome Package",
			'to' => $quote->email,
			'name' => $quote->name,
		];

		return $this->send('customer.welcome', $data);
	}

}
