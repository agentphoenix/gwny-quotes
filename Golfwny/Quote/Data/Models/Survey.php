<?php namespace Quote\Data\Models;

use Eloquent;
use Laracasts\Presenter\PresentableTrait;

class Survey extends Eloquent {

	use PresentableTrait;

	protected $table = 'surveys';

	protected $fillable = ['quote_id', 'hotel_rating', 'hotel_comments',
		'golf_comments', 'overall_rating', 'overall_comments', 'recommend',
		'use_comments'];

	protected $dates = ['created_at', 'updated_at'];

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