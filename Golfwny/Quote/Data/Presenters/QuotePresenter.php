<?php namespace Golfwny\Quote\Data\Presenters;

use Markdown;
use Laracasts\Presenter\Presenter;

class QuotePresenter extends Presenter {

	public function code()
	{
		return $this->entity->code;
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

	public function arrival()
	{
		return $this->entity->arrival->format();
	}

	public function departure()
	{
		return $this->entity->departure->format();
	}

	public function total()
	{
		# code...
	}

	public function deposit()
	{
		# code...
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

}