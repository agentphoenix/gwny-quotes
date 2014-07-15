<?php namespace Golfwny\Quote\Data\Models\Eloquent;

use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class CourseModel extends \Eloquent {

	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'courses';

	protected $fillable = ['region_id', 'name', 'rate'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	protected $presenter = 'Golfwny\Quote\Data\Presenters\CoursePresenter';

	public function region()
	{
		return $this->belongsTo('RegionModel', 'region_id');
	}

}