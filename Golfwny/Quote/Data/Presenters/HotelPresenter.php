<?php namespace Quote\Data\Presenters;

use Markdown;
use Laracasts\Presenter\Presenter;

class HotelPresenter extends Presenter {

	public function defaultMarker()
	{
		if ((bool) $this->entity->default == true)
		{
			return '<i class="small icon yellow star"></i>';
		}
	}

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