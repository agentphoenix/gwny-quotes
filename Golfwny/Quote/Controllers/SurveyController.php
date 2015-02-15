<?php namespace Quote\Controllers;

use View,
	Input,
	Redirect,
	QuoteRepositoryInterface,
	SurveyRepositoryInterface;

class SurveyController extends BaseController {

	protected $quotes;
	protected $surveys;

	public function __construct(SurveyRepositoryInterface $surveys,
			QuoteRepositoryInterface $quotes)
	{
		parent::__construct();
		
		$this->quotes = $quotes;
		$this->surveys = $surveys;
	}

	public function index($code)
	{
		return View::make('pages.survey')
			->withQuote($this->quotes->getByCode($code));
	}

	public function store()
	{
		$survey = $this->surveys->create(Input::all());

		return Redirect::route('survey.thankyou');
	}

	public function thankyou()
	{
		return View::make('pages.survey-thankyou');
	}

}