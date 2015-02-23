<?php namespace Quote\Events;

use Status;
use Quote\Mailers\AdminMailer,
	Quote\Mailers\CustomerMailer;

class QuoteEventHandler {

	protected $adminEmail;
	protected $customerEmail;

	public function __construct(CustomerMailer $customerMailer,
			AdminMailer $adminMailer)
	{
		$this->adminEmail = $adminMailer;
		$this->customerEmail = $customerMailer;
	}

	public function onCalculate($quote)
	{
		# code...
	}

	public function onCreate($quote)
	{
		// Send the confirmation email to the customer
		$this->customerEmail->submitted($quote);

		// Send the email to the admins
		$this->adminEmail->newQuote($quote);
	}

	public function onDelete($quote)
	{
		//
	}

	public function onStatusChange($quote)
	{
		if ($quote->status == Status::ESTIMATE)
		{
			$this->customerEmail->sendEstimate($quote);
		}

		if ($quote->status == Status::ESTIMATE_ACCEPTED)
		{
			$this->adminEmail->acceptedEstimate($quote);
			$this->customerEmail->acceptedEstimate($quote);
		}

		if ($quote->status == Status::ESTIMATE_REJECTED)
		{
			$this->adminEmail->rejectedEstimate($quote);
			$this->customerEmail->rejectedEstimate($quote);
		}

		if ($quote->status == Status::CONTRACT)
		{
			$this->customerEmail->packageContract($quote);
		}

		if ($quote->status == Status::CONTRACT_ACCEPTED)
		{
			$this->adminEmail->acceptedContract($quote);
			$this->customerEmail->acceptedContract($quote);
		}

		if ($quote->status == Status::CONTRACT_REJECTED)
		{
			$this->adminEmail->rejectedContract($quote);
			$this->customerEmail->rejectedContract($quote);
		}

		if ($quote->status == Status::WITHDRAWN)
		{
			$this->adminEmail->withdrawnQuote($quote);
		}
	}

	public function onUpdate($quote)
	{
		//
	}

}