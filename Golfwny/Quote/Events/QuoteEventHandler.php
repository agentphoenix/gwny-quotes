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
			$this->customerEmail->estimateAvailable($quote);
		}

		if ($quote->status == Status::ESTIMATE_ACCEPTED)
		{
			$this->adminEmail->estimateAccepted($quote);
			$this->customerEmail->estimateAccepted($quote);
		}

		if ($quote->status == Status::ESTIMATE_REJECTED)
		{
			$this->adminEmail->estimateRejected($quote);
			$this->customerEmail->estimateRejected($quote);
		}

		if ($quote->status == Status::CONTRACT)
		{
			$this->customerEmail->contractAvailable($quote);
		}

		if ($quote->status == Status::CONTRACT_ACCEPTED)
		{
			$this->adminEmail->contractAccepted($quote);
			$this->customerEmail->contractAccepted($quote);
		}

		if ($quote->status == Status::CONTRACT_REJECTED)
		{
			$this->adminEmail->contractRejected($quote);
			$this->customerEmail->contractRejected($quote);
		}
	}

	public function onUpdate($quote)
	{
		//
	}

}