<?php namespace Golfwny\Quote\Data\Models\Eloquent;

use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class QuoteModel extends \Eloquent {

	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'quotes';

	protected $fillable = ['region_id', 'code', 'status', 'name', 'email',
		'phone', 'city', 'people', 'arrival', 'departure', 'deposit', 'total',
		'paid_deposit', 'paid_total', 'notes'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at', 'arrival',
		'departure'];

	protected $presenter = 'Golfwny\Quote\Data\Presenters\QuotePresenter';

	public function region()
	{
		return $this->belongsTo('RegionModel', 'region_id');
	}

	public function items()
	{
		return $this->hasMany('QuoteItemModel', 'quote_id');
	}

}