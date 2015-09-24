<?php namespace Quote\Data\Models;

use Str, Status, Eloquent;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Quote extends Eloquent {

	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'quotes';

	protected $fillable = ['region_id', 'code', 'status', 'name', 'email',
		'phone', 'city', 'people', 'arrival', 'departure', 'deposit', 'total',
		'paid_deposit', 'paid_total', 'notes', 'comments', 'percent_package',
		'percent_deposit', 'estimate_accepted', 'estimate_rejected',
		'estimate_initials', 'contract_accepted', 'contract_rejected',
		'contract_initials', 'square_receipt_number', 'estimate_sent',
		'contract_sent'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at', 'arrival',
		'departure', 'estimate_accepted', 'estimate_rejected', 'contract_accepted',
		'contract_rejected', 'estimate_sent', 'contract_sent'];

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

	public function surveys()
	{
		return $this->hasMany('Survey', 'quote_id');
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

	public function setPercentPackageAttribute($value)
	{
		$this->attributes['percent_package'] = ( ! empty($value))
			? $value * .01
			: 0.00;
	}

	public function setPercentDepositAttribute($value)
	{
		$this->attributes['percent_deposit'] = ( ! empty($value))
			? $value * .01
			: 0.00;
	}

	/*
	|---------------------------------------------------------------------------
	| Model Methods
	|---------------------------------------------------------------------------
	*/

	public static function boot()
	{
		parent::boot();

		Quote::updated(function($quote)
		{
			if ( ! empty($quote->contract_initials) and $quote->status != Status::AWAITING_ARRIVAL and (bool) $quote->paid_total == true)
			{
				$quote->fill(['status' => Status::AWAITING_ARRIVAL])->save();
			}
		});
	}

	public function getCourses($withTrashed = false)
	{
		$items = ($withTrashed) ? $this->items->withTrashed() : $this->items;

		return $items->filter(function($i)
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