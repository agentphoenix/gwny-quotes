<?php namespace Quote\Services;

use Quote,
	QuoteItem;

class QuoteCalculatorService {

	protected $quote;
	protected $total = 0.00;
	protected $packagePercentage = 0.12;
	protected $depositPercentage = 0.25;

	public function __construct(Quote $quote)
	{
		$this->quote = $quote;
	}

	public function getTotal()
	{
		// Calculate the hotel cost
		$this->total = $this->calculateHotel();

		// Calculate the golf cost
		$this->total += $this->calculateGolf();

		// Add in the package percentage
		$this->total *= (1 + $this->quote->percent_package);

		return (float) ceil($this->total);
	}

	public function getDeposit()
	{
		return (float) ceil($this->total * $this->quote->percent_deposit);
	}

	protected function calculateHotel()
	{
		// Get the hotel we're using
		$hotel = $this->quote->getHotel()->hotel;

		// How many rooms do we need?
		$rooms = ceil($this->quote->people / 2);

		// Calculate the cost for 1 night
		$total = $rooms * $hotel->rate;

		// Figure out how many nights it is
		$nights = $this->quote->arrival->diffInDays($this->quote->departure);

		// Re-calculate the total
		$total *= $nights;

		// Finally, calculate the total with tax
		$total *= (1 + $hotel->tax_rate);

		return (float) $total;
	}

	protected function calculateGolf()
	{
		$total = 0.00;

		// Get the courses
		$courses = $this->quote->getCourses();

		foreach ($courses as $item)
		{
			$total += $this->calculateGolfCourse($item);
		}

		return (float) $total;
	}

	protected function calculateGolfCourse(QuoteItem $item)
	{
		// How many times are they playing?
		$plays = $item->holes / 18;

		// How much is the first round?
		$firstPlayTotal = $item->people * $item->rate;

		if ($plays == 1)
		{
			return (float) $firstPlayTotal;
		}

		return (float) $firstPlayTotal + ($item->people * $item->replay_rate);
	}

	public function setDepositPercentage($value)
	{
		$this->depositPercentage = (float) $value;
	}

	public function setPackagePercentage($value)
	{
		$this->packagePercentage = (float) $value;
	}

}