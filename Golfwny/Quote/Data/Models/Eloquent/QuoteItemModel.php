<?php namespace Golfwny\Quote\Data\Models\Eloquent;

use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class QuoteItemModel extends \Eloquent {

	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'quotes_items';

	protected $fillable = ['quote_id', 'hotel_id', 'course_id', 'people', 'rate',
		'confirmation', 'arrival', 'departure', 'tee_time'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at', 'arrival',
		'departure', 'tee_time'];

	protected $presenter = 'Golfwny\Quote\Data\Presenters\QuoteItemPresenter';

	public function quote()
	{
		return $this->belongsTo('QuoteModel', 'quote_id');
	}

}