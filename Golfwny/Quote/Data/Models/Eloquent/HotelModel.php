<?php namespace Golfwny\Quote\Data\Models\Eloquent;

use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class HotelModel extends \Eloquent {

	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'hotels';

	protected $fillable = ['region_id', 'name', 'rate', 'default'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	protected $presenter = 'Golfwny\Quote\Data\Presenters\HotelPresenter';

	public function region()
	{
		return $this->belongsTo('RegionModel', 'region_id');
	}

}