<?php namespace Golfwny\Quote\Data\Models\Eloquent;

use Str;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class RegionModel extends \Eloquent {

	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'regions';

	protected $fillable = ['name', 'slug'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	protected $presenter = 'Golfwny\Quote\Data\Presenters\RegionPresenter';

	/*
	|---------------------------------------------------------------------------
	| Relationships
	|---------------------------------------------------------------------------
	*/

	public function courses()
	{
		return $this->hasMany('CourseModel', 'region_id');
	}

	public function hotels()
	{
		return $this->hasMany('HotelModel', 'region_id');
	}

	public function quotes()
	{
		return $this->hasMany('QuoteModel', 'region_id');
	}

	/*
	|---------------------------------------------------------------------------
	| Model Accessors/Mutators
	|---------------------------------------------------------------------------
	*/

	public function setSlugAttribute($value)
	{
		$this->attributes['slug'] = ( ! empty($value)) 
			? $value 
			: Str::slug(Str::lower($this->attributes['name']));
	}

}