<?php namespace Quote\Data\Presenters;

use Markdown;
use Laracasts\Presenter\Presenter;

class CoursePresenter extends Presenter {

	public function name()
	{
		return $this->entity->name;
	}

	public function rate()
	{
		return '$'.$this->entity->rate;
	}

	public function replayRate()
	{
		return '$'.$this->entity->replay_rate;
	}

	public function region()
	{
		return $this->entity->region->present()->name;
	}

}