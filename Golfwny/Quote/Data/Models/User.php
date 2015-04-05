<?php namespace Quote\Data\Models;

use Str, Hash, Eloquent;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Auth\UserTrait,
	Illuminate\Auth\UserInterface,
	Illuminate\Auth\Reminders\RemindableTrait,
	Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait;
	use RemindableTrait;
	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'users';

	protected $fillable = ['name', 'email', 'password', 'remember_token'];

	protected $hidden = ['password', 'remember_token'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	protected $presenter = 'Quote\Data\Presenters\UserPresenter';

	/*
	|--------------------------------------------------------------------------
	| Accessors/Mutators
	|--------------------------------------------------------------------------
	*/

	public function setPasswordAttribute($value)
	{
		if (Str::length($value) < 32)
		{
			$this->attributes['password'] = Hash::make($value);
		}
	}

}