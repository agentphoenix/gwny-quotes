<?php namespace Quote\Data\Presenters;

use Markdown;
use Laracasts\Presenter\Presenter;

class QuoteItemPresenter extends Presenter {

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

	public function replayRate()
	{
		return '$'.$this->entity->replay_rate;
	}

	public function confirmation()
	{
		return $this->entity->confirmation;
	}

	public function arrival($full = true)
	{
		if ($this->entity->arrival)
		{
			if ($full)
				return $this->entity->arrival->format(config('gwny.dates.dateShort'));

			return $this->entity->arrival->format(config('gwny.dates.dateFormalSlashes'));
		}

		return false;
	}

	public function departure($full = true)
	{
		if ($full)
			return $this->entity->departure->format(config('gwny.dates.dateShort'));

		return $this->entity->departure->format(config('gwny.dates.dateFormalSlashes'));
	}

	public function time($full = true)
	{
		return $this->entity->time;
	}

	public function time2($full = true)
	{
		return $this->entity->time2;
	}

	public function timePreference()
	{
		return $this->entity->time_preference;
	}

	public function holes()
	{
		return $this->entity->holes." holes";
	}

}