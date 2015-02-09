<?php namespace Quote\Data\Repositories;

use Date,
	Hotel,
	Quote,
	Course,
	Status,
	QuoteItem,
	ReportRepositoryInterface;

class ReportRepository extends BaseRepository implements ReportRepositoryInterface {

	protected $courses;
	protected $hotels;
	protected $quotes;
	protected $items;
	protected $squareTransactionRate = 0.02275;

	public function __construct(Course $courses, Hotel $hotels,
			Quote $quotes, QuoteItem $items)
	{
		$this->courses = $courses;
		$this->hotels = $hotels;
		$this->quotes = $quotes;
		$this->items = $items;
	}

	public function getCourseRevenue($year)
	{
		// Get all the courses
		$allCourses = $this->courses->all();

		foreach ($allCourses as $ac)
		{
			$revenue[$ac->id] = [
				'name'		=> $ac->present()->name,
				'region'	=> $ac->present()->region,
				'revenue'	=> (float) 0.00,
				'rounds'	=> (int) 0,
			];
		}

		// Set the date objects
		$yearStart = Date::createFromFormat('Y', $year);
		$yearEnd = Date::createFromFormat('Y', $year);

		// Get all quotes
		$quotes = Quote::where('arrival', '>=', $yearStart->startOfYear())
			->where('arrival', '<=', $yearEnd->endOfYear())
			->where('status', Status::COMPLETED)
			->get();

		if ($quotes->count() > 0)
		{
			foreach ($quotes as $quote)
			{
				// Get the courses item
				$courses = $quote->getCourses();

				foreach ($courses as $course)
				{
					$total = 0.00;

					// How many times are they playing?
					$plays = $course->holes / 18;

					// How much is the first round?
					$total = $course->people * $course->rate;

					if ($plays > 1)
					{
						$total+= $course->people * $course->replay_rate;
					}

					$revenue[$course->course_id]['revenue']+= $total;
					$revenue[$course->course_id]['rounds']+= $plays * $course->people;
				}
			}
		}

		return $revenue;
	}

	public function getHotelRevenue($year)
	{
		// Get all the hotels
		$allHotels = $this->hotels->all();

		foreach ($allHotels as $ah)
		{
			$revenue[$ah->id] = [
				'name'		=> $ah->present()->name,
				'region'	=> $ah->present()->region,
				'revenue'	=> (float) 0.00,
				'tax'		=> (float) 0.00,
				'rooms'		=> (int) 0,
				'people'	=> (int) 0,
				'days'		=> (int) 0,
			];
		}

		// Set the date objects
		$yearStart = Date::createFromFormat('Y', $year);
		$yearEnd = Date::createFromFormat('Y', $year);

		// Get all quotes
		$quotes = Quote::where('arrival', '>=', $yearStart->startOfYear())
			->where('arrival', '<=', $yearEnd->endOfYear())
			->where('status', Status::COMPLETED)
			->get();

		if ($quotes->count() > 0)
		{
			foreach ($quotes as $quote)
			{
				// Get the hotel item
				$item = $quote->getHotel();

				$days = $item->arrival->diffInDays($item->departure);

				$rooms = ceil($item->people / 2);

				$total = ($rooms * $item->rate) * $days;

				$revenue[$item->hotel_id]['revenue']+= $total;
				$revenue[$item->hotel_id]['tax']+= $total * $item->hotel->tax_rate;
				$revenue[$item->hotel_id]['rooms']+= $rooms;
				$revenue[$item->hotel_id]['people']+= $quote->people;
				$revenue[$item->hotel_id]['days']+= $days;
			}
		}

		return $revenue;
	}

	public function getTotalRevenue($year)
	{
		// Set the date objects
		$yearStart = Date::createFromFormat('Y', $year);
		$yearEnd = Date::createFromFormat('Y', $year);

		// Get all quotes
		$quotes = Quote::where('arrival', '>=', $yearStart->startOfYear())
			->where('arrival', '<=', $yearEnd->endOfYear())
			->where('status', Status::COMPLETED)
			->get();

		$revenue = [
			'total'		=> (float) 0.00,
			'costs'		=> (float) 0.00,
			'profit'	=> (float) 0.00,
			'square'	=> (float) 0.00,
		];

		if ($quotes->count() > 0)
		{
			foreach ($quotes as $quote)
			{
				$revenue['total']+= $quote->total;

				foreach ($quote->items as $item)
				{
					/**
					 * Hotels
					 */
					if ( ! empty($item->hotel_id))
					{
						$days = $item->arrival->diffInDays($item->departure);

						$rooms = ceil($item->people / 2);

						$total = ($rooms * $item->rate) * $days;

						$total+= 1 + $item->hotel->tax_rate;
					}

					/**
					 * Courses
					 */
					if ( ! empty($item->course_id))
					{
						$plays = $item->holes / 18;

						// How much is the first round?
						$total = $item->people * $item->rate;

						if ($plays > 1)
						{
							$total+= $item->people * $item->replay_rate;
						}
					}

					$revenue['costs']+= round($total, 2);
				}
			}

			$revenue['square'] = round($revenue['total'] * $this->squareTransactionRate, 2);
			$revenue['profit'] = round($revenue['total'] - $revenue['costs'] - $revenue['square'], 2);
		}

		return $revenue;
	}
	
}
