<?php namespace Quote\Data\Models;

use Eloquent;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class QuoteItem extends Eloquent {

	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'quotes_items';

	protected $fillable = ['quote_id', 'hotel_id', 'course_id', 'people', 'rate',
		'confirmation', 'arrival', 'departure', 'time', 'time2', 'time_preference',
		'holes', 'replay_rate'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at', 'arrival',
		'departure'];

	protected $presenter = 'Quote\Data\Presenters\QuoteItemPresenter';

	/*
	|---------------------------------------------------------------------------
	| Relationships
	|---------------------------------------------------------------------------
	*/

	public function quote()
	{
		return $this->belongsTo('Quote', 'quote_id');
	}

	public function course()
	{
		return $this->belongsTo('Course', 'course_id');
	}

	public function hotel()
	{
		return $this->belongsTo('Hotel', 'hotel_id');
	}

}