<?php namespace Quote\Exceptions;

use Exception;
use Illuminate\Support\MessageBag;

class FormValidationException extends Exception {

	protected $errors;

	public function __construct($message, MessageBag $errors)
	{
		$this->errors = $errors;

		parent::__construct($message);
	}

	public function getErrors()
	{
		return $this->errors;
	}

}