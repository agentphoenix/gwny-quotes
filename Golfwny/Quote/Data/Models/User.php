<?php namespace Quote\Data\Models;

use Eloquent;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent {

	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'users';

	protected $fillable = ['name', 'email', 'password'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	protected $presenter = 'Quote\Data\Presenters\UserPresenter';

}