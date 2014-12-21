<?php namespace Quote\Data\Presenters;

use Markdown;
use Laracasts\Presenter\Presenter;

class QuotePresenter extends Presenter {

	public function code()
	{
		return $this->entity->code;
	}

	public function dates()
	{
		return $this->entity->arrival->format('m/d/Y')." - ".$this->entity->departure->format('m/d/Y');
	}

	public function status()
	{
		return $this->entity->status;
	}

	public function name()
	{
		return $this->entity->name;
	}

	public function email()
	{
		return $this->entity->email;
	}

	public function phone()
	{
		return $this->entity->phone;
	}

	public function city()
	{
		return $this->entity->city;
	}

	public function region()
	{
		return $this->entity->region->present()->name;
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

	public function arrival($full = false)
	{
		return $this->entity->arrival->format('D M jS, Y');
	}

	public function departure($full = false)
	{
		return $this->entity->departure->format('D M jS, Y');
	}

	public function deposit()
	{
		return '$'.number_format($this->entity->deposit);
	}

	public function paidTotal()
	{
		return (bool) $this->entity->paid_total;
	}

	public function paidDeposit()
	{
		return (bool) $this->entity->paid_deposit;
	}

	public function notes()
	{
		return Markdown::parse($this->entity->notes);
	}

	public function pricePerPerson()
	{
		return '$'.number_format(round($this->entity->total / $this->entity->people, 2), 2);
	}

	public function price()
	{
		return '$'.number_format($this->entity->total);
	}

}