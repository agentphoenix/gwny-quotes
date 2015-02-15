<?php namespace Quote\Data\Validators;

class SurveyValidator extends FormValidator {

	protected $rules = [
		'quote_id'			=> 'required|integer',
		'hotel_rating'		=> 'required|between:1,5',
		'overall_rating'	=> 'required|between:1,5',
		'recommend'			=> 'required|boolean',
		'use_comments'		=> 'required_with:hotel_comments,golf_comments,overall_comments|boolean',
	];

	protected $messages = [
		'quote_id.required' => "There must be a quote ID",
		'quote_id.integer' => "Invalid quote ID entered",
		'hotel_rating.required' => "Please rate your hotel experience",
		'hotel_rating.between' => "Invalid value entered",
		'overall_rating.required' => "Please rate your overall experience",
		'overall_rating.between' => "Invalid value entered",
		'recommend.required' => "Please select a value",
		'recommend.boolean' => "Invalid value entered",
		'use_comments.required_with' => "You have entered comments above. Can we use those comments on our website?",
		'use_comments.boolean' => "Invalid value entered",
	];

}