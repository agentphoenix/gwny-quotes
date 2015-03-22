<?php namespace Quote\Data\Presenters;

use Markdown;
use Laracasts\Presenter\Presenter;

class QuoteItemPresenter extends Presenter {

	public function address()
	{
		if ( ! empty($this->entity->hotel_id))
			return nl2br($this->entity->hotel->present()->address);

		if ( ! empty($this->entity->course_id))
			return nl2br($this->entity->course->present()->address);
	}

	public function hotel()
	{
		return $this->entity->hotel->present()->name;
	}

	public function course()
	{
		return $this->entity->course->present()->name;
	}

	public function gm()
	{
		if ( ! empty($this->entity->hotel_id))
			return nl2br($this->entity->hotel->present()->general_manager);

		if ( ! empty($this->entity->course_id))
			return nl2br($this->entity->course->present()->general_manager);
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

	public function peopleRaw()
	{
		if ($this->entity->people) return $this->entity->people;

		return false;
	}

	public function phone()
	{
		if ( ! empty($this->entity->hotel_id))
			return nl2br($this->entity->hotel->present()->phone);

		if ( ! empty($this->entity->course_id))
			return nl2br($this->entity->course->present()->phone);
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

	public function holesRaw()
	{
		return $this->entity->holes;
	}

	public function totalRounds()
	{
		return $this->peopleRaw() * ($this->entity->holes / 18);
	}

}