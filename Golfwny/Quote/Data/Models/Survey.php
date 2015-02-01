<?php namespace Quote\Data\Models;

use Eloquent;
use Laracasts\Presenter\PresentableTrait;

class Survey extends Eloquent {

	use PresentableTrait;

	protected $table = 'surveys';

	protected $fillable = [];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	protected $presenter = 'Quote\Data\Presenters\SurveyPresenter';

	/*
	|---------------------------------------------------------------------------
	| Relationships
	|---------------------------------------------------------------------------
	*/

	public function quote()
	{
		return $this->belongsTo('Quote');
	}

}