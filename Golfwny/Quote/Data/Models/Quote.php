<?php namespace Quote\Data\Models;

use Str, Eloquent;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Quote extends Eloquent {

	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'quotes';

	protected $fillable = ['region_id', 'code', 'status', 'name', 'email',
		'phone', 'city', 'people', 'arrival', 'departure', 'deposit', 'total',
		'paid_deposit', 'paid_total', 'notes', 'comments'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at', 'arrival',
		'departure'];

	protected $presenter = 'Quote\Data\Presenters\QuotePresenter';

	/*
	|---------------------------------------------------------------------------
	| Relationships
	|---------------------------------------------------------------------------
	*/

	public function region()
	{
		return $this->belongsTo('Region', 'region_id');
	}

	public function items()
	{
		return $this->hasMany('QuoteItem', 'quote_id');
	}

	/*
	|---------------------------------------------------------------------------
	| Model Accessors/Mutators
	|---------------------------------------------------------------------------
	*/

	public function setCodeAttribute($value)
	{
		$this->attributes['code'] = ( ! empty($value)) 
			? $value 
			: Str::quoteCode(12);
	}

	/*
	|---------------------------------------------------------------------------
	| Model Methods
	|---------------------------------------------------------------------------
	*/

	public function getCourses()
	{
		return $this->items->filter(function($i)
		{
			return $i->course_id !== null;
		});
	}

	public function getHotel()
	{
		return $this->items->filter(function($i)
		{
			return $i->hotel_id !== null;
		})->first();
	}

}