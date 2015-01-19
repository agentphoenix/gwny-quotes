<?php namespace Quote\Data\Models;

use Eloquent;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Hotel extends Eloquent {

	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'hotels';

	protected $fillable = ['region_id', 'name', 'rate', 'tax_rate', 'default'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	protected $presenter = 'Quote\Data\Presenters\HotelPresenter';

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
		return $this->hasMany('QuoteItem');
	}

	/*
	|---------------------------------------------------------------------------
	| Model Accessors/Mutators
	|---------------------------------------------------------------------------
	*/

	public function setTaxRateAttribute($value)
	{
		$this->attributes['tax_rate'] = ( ! empty($value)) 
			? $value * .01
			: 0.00;
	}

}