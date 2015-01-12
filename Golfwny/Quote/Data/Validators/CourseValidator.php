<?php namespace Quote\Data\Validators;

class CourseValidator extends FormValidator {

	protected $rules = [
		'name' => 'required',
		'region_id' => 'required',
		'rate' => 'required|numeric',
		'replay_rate' => 'required|numeric',
	];

	protected $messages = [
		'name.required' => "Please enter a course name",
		'region_id.required' => "Please select a valid region",
		'rate.required' => "Please enter a course rate",
		'rate.numeric' => "Course rates must be numeric",
		'replay_rate.required' => "Please enter a course replay rate",
		'replay_rate.numeric' => "Course replay rates must be numeric",
	];

}