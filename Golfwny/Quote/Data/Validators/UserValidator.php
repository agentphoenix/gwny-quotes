<?php namespace Quote\Data\Validators;

class UserValidator extends FormValidator {

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
    ];

    protected $messages = [
        'name.required' => "Please enter a user name",
        'email.required' => "Please enter an email address",
        'email.email' => "Please enter a valid email address",
    ];

}