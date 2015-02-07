<?php namespace Quote\Controllers;

use Auth,
	View,
	Flash,
	Input,
	Session,
	Redirect,
	Validator;

class LoginController extends BaseController {

	public function index()
	{
		return View::make('pages.login.index');
	}

	public function doLogin()
	{
		// Validate
		$validator = Validator::make(Input::all(), [
			'email'		=> 'required',
			'password'	=> 'required',
		], [
			'email.required' => "Please enter your email address",
			'password.required' => "Please enter your password",
			]);

			if ( ! $validator->passes())
			{
				// Set the flash message
				Flash::error("Please enter your email address and password and try again.");

				return Redirect::route('login')->withErrors($validator->errors());
			}

			// Grab the values and trim them
			$email = trim(Input::get('email'));
			$password = trim(Input::get('password'));

			if (Auth::attempt(['email' => $email, 'password' => $password], true))
			{
				if (Session::has('url.intended'))
				{
					return Redirect::intended('home');
				}

				// Set a flash message
				Flash::success("You've successfully logged in!");

				return Redirect::route('admin.quotes.active');
			}

			// Set a flash message
			Flash::error("Either your email address or password were incorrect. Please try again.");

			return Redirect::route('login');
	}

	public function logout()
	{
		Auth::logout();

		if (Session::has('url.intended'))
		{
			return Redirect::intended('home');
		}

		// Set a flash message
		Flash::success("You've successfully logged out!");

		return Redirect::route('home');
	}

}