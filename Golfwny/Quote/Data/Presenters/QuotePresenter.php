<?php namespace Quote\Data\Presenters;

use Str, Date, Status, Markdown;
use Laracasts\Presenter\Presenter;

class QuotePresenter extends Presenter {

	public function arrival($full = true)
	{
		if ($full)
			return $this->entity->arrival->format(config('gwny.dates.dateShort'));

		return $this->entity->arrival->format(config('gwny.dates.dateFormalSlashes'));
	}

	public function city()
	{
		return $this->entity->city;
	}

	public function code()
	{
		return $this->entity->code;
	}

	public function comments()
	{
		return Markdown::parse($this->entity->comments);
	}

	public function contractAccepted()
	{
		return $this->entity->contract_accepted->format(config('gwny.dates.full'))." by ".$this->entity->contract_initials;
	}

	public function contractRejected()
	{
		return $this->entity->contract_rejected->format(config('gwny.dates.full'))." by ".$this->entity->contract_initials;
	}

	public function dates()
	{
		return $this->entity->arrival->format(config('gwny.dates.dateFormalSlashes'))." - ".$this->entity->departure->format(config('gwny.dates.dateFormalSlashes'));
	}

	public function daysOfGolf()
	{
		$days = $this->entity->getCourses()->count();
		$daysLabel = ($days == 1) ? 'day' : 'days';

		return "($days) {$daysLabel}";
	}

	public function golfContract()
	{
		$days = $this->entity->getCourses()->count();
		$daysLabel = ($days == 1) ? 'day' : 'days';
		$courses = [];

		foreach ($this->entity->getCourses() as $item)
		{
			$courses[] = $item->course->id;
		}

		// Make sure we have only unique courses
		$courses = array_unique($courses);

		if ($days == 1 or ($days > 1 and count($courses) == 1))
		{
			return "This package will also include ({$days}) {$daysLabel} of golf with cart at one of {$this->region()}'s finest golf courses: {$this->golfCoursesNice()}.";
		}

		return "This package will also include ({$days}) {$daysLabel} of golf with cart at some of {$this->region()}'s finest golf courses, including: {$this->golfCoursesNice()}.";
	}

	public function daysToPackage()
	{
		return $this->entity->arrival->diffInDays(Date::now()->startOfDay());
	}

	public function departure($full = true)
	{
		if ($full)
			return $this->entity->departure->format(config('gwny.dates.dateShort'));

		return $this->entity->departure->format(config('gwny.dates.dateFormalSlashes'));
	}

	public function deposit()
	{
		return '$'.number_format($this->entity->deposit);
	}

	public function depositDue()
	{
		if ($this->entity->arrival->diffInDays(Date::now()) < config('gwny.paymentDue'))
		{
			return "immediately";
		}

		if ($this->entity->contract_accepted)
		{
			return $this->entity->contract_accepted
				->addDays(config('gwny.depositDue'))
				->format(config('gwny.dates.dateNoDay'));
		}

		return config('gwny.depositDue')." days after accepting this contract";
	}

	public function email()
	{
		return $this->entity->email;
	}

	public function estimateAccepted()
	{
		return $this->entity->estimate_accepted->format(config('gwny.dates.full'))." by ".$this->entity->estimate_initials;
	}

	public function estimateRejected()
	{
		return $this->entity->estimate_rejected->format(config('gwny.dates.full'))." by ".$this->entity->estimate_initials;
	}

	public function firstName()
	{
		$names = explode(' ', $this->name());

		return $names[0];
	}

	public function golfCoursesNice()
	{
		$courses = $this->entity->getCourses();

		$niceList = "";

		$i = 1;

		foreach ($courses as $course)
		{
			// Make sure the list doesn't already contain this course
			if ( ! Str::contains($niceList, $course->course->present()->name))
			{
				if ($i == $courses->count() and $courses->count() > 1)
				{
					$niceList.= " and";
				}

				$niceList.= " ".$course->course->present()->name;

				if ($i < $courses->count() and $courses->count() > 2)
				{
					$niceList.= ",";
				}
			}

			++$i;
		}

		return $niceList;
	}

	public function hotel()
	{
		return $this->entity->getHotel()->hotel->present()->name;
	}

	public function hotelAmenities()
	{
		return $this->entity->getHOtel()->hotel->present()->amenities;
	}

	public function name()
	{
		return $this->entity->name;
	}

	public function notes()
	{
		return Markdown::parse($this->entity->notes);
	}

	public function numberOfNights()
	{
		return $this->entity->departure->diffInDays($this->entity->arrival);
	}

	public function numberOfRooms()
	{
		return ceil($this->entity->people / 2);
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

	public function ratingHotel()
	{
		$rating = 0.00;

		$allSurveys = $this->entity->surveys;

		foreach ($allSurveys as $survey)
		{
			$rating += $survey->hotel_rating;
		}

		return round($rating / $allSurveys->count(), 2);
	}

	public function ratingOverall()
	{
		$rating = 0.00;

		$allSurveys = $this->entity->surveys;

		foreach ($allSurveys as $survey)
		{
			$rating += $survey->overall_rating;
		}

		return round($rating / $allSurveys->count(), 2);
	}

	public function receiptNumber()
	{
		return $this->entity->square_receipt_number;
	}

	public function region()
	{
		return $this->entity->region->present()->name;
	}

	public function remaining()
	{
		return '$'.number_format($this->entity->total - $this->entity->deposit, 2);
	}

	public function remainingDue()
	{
		if ($this->entity->arrival->diffInDays(Date::now()) <= config('gwny.paymentDue'))
		{
			return "immediately";
		}

		return $this->entity->arrival
			->subDays(config('gwny.paymentDue'))
			->format(config('gwny.dates.dateNoDay'));
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
				$class = 'info';
			break;

			case Status::ESTIMATE:
			case Status::CONTRACT:
				$class = 'warning';
			break;

			case Status::ESTIMATE_REJECTED:
			case Status::CONTRACT_REJECTED:
				$class = 'danger';
			break;

			case Status::ESTIMATE_ACCEPTED:
			case Status::CONTRACT_ACCEPTED:
			case Status::AWAITING_ARRIVAL:
				$class = 'success';
			break;

			case Status::COMPLETED:
			case Status::CLOSED:
			
			default:
				$class = 'default';
			break;
		}

		return label($class, Status::toString($this->status()));
	}
}
