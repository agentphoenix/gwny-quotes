<?php namespace Quote\Data\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

	public function name()
	{
		return $this->entity->name;
	}

	public function email()
	{
		return $this->entity->email;
	}

}