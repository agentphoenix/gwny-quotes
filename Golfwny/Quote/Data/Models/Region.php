<?php namespace Quote\Data\Models;

use Str, Eloquent;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Region extends Eloquent {

	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'regions';

	protected $fillable = ['name', 'slug'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	protected $presenter = 'Quote\Data\Presenters\RegionPresenter';

	/*
	|---------------------------------------------------------------------------
	| Relationships
	|---------------------------------------------------------------------------
	*/

	public function courses()
	{
		return $this->hasMany('Course', 'region_id');
	}

	public function hotels()
	{
		return $this->hasMany('Hotel', 'region_id');
	}

	public function quotes()
	{
		return $this->hasMany('Quote', 'region_id');
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