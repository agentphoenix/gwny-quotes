<?php namespace Quote\Controllers;

use View,
	Event,
	Input,
	Redirect,
	QuoteRepositoryInterface,
	SurveyRepositoryInterface,
	SurveyValidator as Validator;

class SurveyController extends BaseController {

	protected $quotes;
	protected $surveys;
	protected $validator;

	public function __construct(SurveyRepositoryInterface $surveys,
			QuoteRepositoryInterface $quotes, Validator $validator)
	{
		parent::__construct();
		
		$this->quotes = $quotes;
		$this->surveys = $surveys;
		$this->validator = $validator;
	}

	public function index($code)
	{
		return View::make('pages.survey')
			->withQuote($this->quotes->getByCode($code));
	}

	public function store()
	{
		// Validate
		$this->validator->validate(Input::all());

		// Create the new survey
		$survey = $this->surveys->create(Input::all());

		// Fire the event
		Event::fire('survey.created', [$survey]);

		return Redirect::route('survey.thankyou');
	}

	public function thankyou()
	{
		return View::make('pages.survey-thankyou');
	}

}