<?php namespace Quote\Data\Validators;

class QuoteInfoValidator extends FormValidator {

	protected $rules = [
		'name'		=> 'required',
		'email'		=> 'required|email',
		'city'		=> 'required',
		'phone'		=> 'required',
		'people'	=> 'required|numeric',
		'arrival'	=> 'required',
		'departure'	=> 'required',
	];

	protected $messages = [
		'name.required' => "Please enter your name",
		'email.required' => "Please enter your email address",
		'email.email' => "Please enter a valid email address",
		'city.required' => "Please enter where you live",
		'phone.required' => "Please enter your phone number",
		'people.required' => "Please enter the number of people you're bringing",
		'people.numeric' => "The number of people can only be a number",
		'arrival.required' => "Please enter the date you'll arrive",
		'departure.required' => "Please enter the date you'll leave",
	];

}