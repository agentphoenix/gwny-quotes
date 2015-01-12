<?php namespace Quote\Data\Validators;

class RegionValidator extends FormValidator {

	protected $rules = [
		'name' => 'required',
	];

	protected $messages = [
		'name.required' => "Please enter a region name",
	];

}