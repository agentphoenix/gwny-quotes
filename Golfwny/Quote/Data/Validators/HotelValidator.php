<?php namespace Quote\Data\Validators;

class HotelValidator extends FormValidator {

	protected $rules = [
		'name' => 'required',
		'region_id' => 'required',
		'rate' => 'required|numeric',
	];

	protected $messages = [
		'name.required' => "Please enter a hotel name",
		'region_id.required' => "Please select a valid region",
		'rate.required' => "Please enter a hotel rate",
		'rate.numeric' => "Hotel rates must be numeric",
	];

}