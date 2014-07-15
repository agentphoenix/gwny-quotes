<?php namespace Golfwny\Quote\Data\Presenters;

use Laracasts\Presenter\Presenter;

class RegionPresenter extends Presenter {

	public function name()
	{
		return $this->entity->name;
	}

}