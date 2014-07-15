<?php namespace Golfwny\Quote\Data\Models\Eloquent;

use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class UserModel extends \Eloquent {

	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'users';

	protected $fillable = ['name', 'email', 'password'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	protected $presenter = 'Golfwny\Quote\Data\Presenters\UserPresenter';

}