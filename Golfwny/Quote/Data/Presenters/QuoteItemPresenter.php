<?php namespace Golfwny\Quote\Data\Presenters;

use Markdown;
use Laracasts\Presenter\Presenter;

class QuotePresenter extends Presenter {

	public function hotel()
	{
		return $this->entity->hotel->present()->name;
	}

	public function course()
	{
		return $this->entity->course->present()->name;
	}

	public function people()
	{
		$people = (int) $this->entity->people;

		if ($people === 1)
		{
			return "{$people} person";
		}

		return "{$people} people";
	}

	public function rate()
	{
		return '$'.$this->entity->rate;
	}

	public function confirmation()
	{
		return $this->entity->confirmation;
	}

	public function arrival()
	{
		return $this->entity->arrival->format();
	}

	public function departure()
	{
		return $this->entity->departure->format();
	}

	public function teeTime()
	{
		return $this->entity->tee_time->format();
	}

}