<?php namespace Quote\Data\Models;

use Hash, Eloquent;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements RemindableInterface {

	use RemindableTrait;
	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'users';

	protected $fillable = ['name', 'email', 'password'];

	protected $hidden = ['password'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	protected $presenter = 'Quote\Data\Presenters\UserPresenter';

	/*
	|--------------------------------------------------------------------------
	| Accessors/Mutators
	|--------------------------------------------------------------------------
	*/

	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

}