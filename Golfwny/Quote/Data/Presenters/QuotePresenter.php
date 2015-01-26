<?php namespace Quote\Data\Presenters;

use Status, Markdown;
use Laracasts\Presenter\Presenter;

class QuotePresenter extends Presenter {

	public function arrival($full = true)
	{
		if ($full)
			return $this->entity->arrival->format('D M jS, Y');

		return $this->entity->arrival->format('m/d/Y');
	}

	public function city()
	{
		return $this->entity->city;
	}

	public function code()
	{
		return $this->entity->code;
	}

	public function contractAccepted()
	{
		return $this->entity->contract_accepted->format(config('gwny.dates.full'));
	}

	public function contractRejected()
	{
		return $this->entity->contract_rejected->format(config('gwny.dates.full'));
	}

	public function dates()
	{
		return $this->entity->arrival->format('m/d/Y')." - ".$this->entity->departure->format('m/d/Y');
	}

	public function departure($full = true)
	{
		if ($full)
			return $this->entity->departure->format('D M jS, Y');

		return $this->entity->departure->format('m/d/Y');
	}

	public function deposit()
	{
		return '$'.number_format($this->entity->deposit);
	}

	public function email()
	{
		return $this->entity->email;
	}

	public function estimateAccepted()
	{
		return $this->entity->estimate_accepted->format(config('gwny.dates.full'));
	}

	public function estimateRejected()
	{
		return $this->entity->estimate_rejected->format(config('gwny.dates.full'));
	}

	public function name()
	{
		return $this->entity->name;
	}

	public function notes()
	{
		return Markdown::parse($this->entity->notes);
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

	public function paidDeposit()
	{
		return (bool) $this->entity->paid_deposit;
	}

	public function paidTotal()
	{
		return (bool) $this->entity->paid_total;
	}

	public function percentDeposit()
	{
		return round($this->entity->percent_deposit, 5) * 100;
	}

	public function percentDepositRaw()
	{
		return round($this->entity->percent_deposit, 5);
	}

	public function percentPackage()
	{
		return round($this->entity->percent_package, 5) * 100;
	}

	public function percentPackageRaw()
	{
		return round($this->entity->percent_package, 5);
	}

	public function phone()
	{
		return $this->entity->phone;
	}

	public function price()
	{
		return '$'.number_format($this->entity->total);
	}

	public function pricePerPerson()
	{
		return '$'.number_format(round($this->entity->total / $this->entity->people, 2), 2);
	}

	public function region()
	{
		return $this->entity->region->present()->name;
	}

	public function status()
	{
		return $this->entity->status;
	}

	public function statusAsLabel()
	{
		switch ($this->status())
		{
			case Status::SUBMITTED:
				$class = 'blue';
			break;

			case Status::ESTIMATE:
			case Status::BOOKED:
				$class = 'yellow';
			break;

			case Status::ESTIMATE_REJECTED:
			case Status::CONTRACT_REJECTED:
				$class = 'red';
			break;

			case Status::ESTIMATE_ACCEPTED:
			case Status::CONTRACT_ACCEPTED:
				$class = 'green';
			break;
		}

		return label($class, Status::toString($this->status()));
	}
}