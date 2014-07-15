<?php namespace Golfwny\Quote\Data\Presenters;

use Markdown;
use Laracasts\Presenter\Presenter;

class HotelPresenter extends Presenter {

	public function name()
	{
		return $this->entity->name;
	}

	public function rate()
	{
		return '$'.$this->entity->rate;
	}

	public function region()
	{
		return $this->entity->region->present()->name;
	}

}