<?php namespace Quote\Data\Validators;

class UserValidator extends FormValidator {

    protected $rules = [
        'name' => 'required',
    ];

    protected $messages = [
        'name.required' => "Please enter a user name",
    ];

}