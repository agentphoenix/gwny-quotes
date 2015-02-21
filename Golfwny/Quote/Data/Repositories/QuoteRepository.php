<?php namespace Quote\Data\Repositories;

use Date,
	Quote,
	Status,
	QuoteRepositoryInterface,
	CourseRepositoryInterface,
	QuoteItemRepositoryInterface;

class QuoteRepository extends BaseRepository implements QuoteRepositoryInterface {

	protected $model;
	protected $items;
	protected $courses;

	public function __construct(Quote $model, QuoteItemRepositoryInterface $items,
			CourseRepositoryInterface $courses)
	{
		$this->model = $model;
		$this->items = $items;
		$this->courses = $courses;
	}

	public function all()
	{
		return $this->model->orderBy('arrival', 'desc')->get();
	}

	public function countActive()
	{
		return $this->model->whereIn('status', [
			Status::SUBMITTED,
			Status::ESTIMATE,
			Status::ESTIMATE_ACCEPTED,
			Status::BOOKED,
			Status::CONTRACT_ACCEPTED,
		])->count();
	}

	public function create(array $data)
	{
		if (array_key_exists('arrival_submit', $data))
			$data['arrival'] = Date::createFromFormat('m/d/Y', $data['arrival_submit']);

		if (array_key_exists('departure_submit', $data))
			$data['departure'] = Date::createFromFormat('m/d/Y', $data['departure_submit']);

		return $this->model->create($data);
	}

	public function createHotelQuote(Quote $quote)
	{
		$hotel = $quote->region->hotels->filter(function($h)
		{
			return $h->default == (int) true;
		})->first();

		return $this->items->create([
			'quote_id'	=> $quote->id,
			'hotel_id'	=> $hotel->id,
			'people'	=> $quote->people,
			'rate'		=> $hotel->rate,
			'arrival'	=> $quote->arrival,
			'departure'	=> $quote->departure,
			'time'		=> "11:00 AM",
		]);
	}

	public function createGolfQuote(Quote $quote, array $data)
	{
		foreach ($data['courses']['id'] as $key => $value)
		{
			// Find the course
			$course = $this->courses->getById($value);

			// Create the quote item
			$this->items->create([
				'quote_id'			=> $quote->id,
				'course_id'			=> $course->id,
				'people'			=> $data['courses']['people'][$key],
				'holes'				=> $data['courses']['holes'][$key],
				'time_preference'	=> $data['courses']['time_preference'][$key],
				'rate'				=> $course->rate,
				'replay_rate'		=> $course->replay_rate,
			]);
		}
	}

	public function getActive()
	{
		return $this->make(['items'])->whereIn('status', [
			Status::SUBMITTED,
			Status::ESTIMATE,
			Status::ESTIMATE_ACCEPTED,
			Status::BOOKED,
			Status::CONTRACT_ACCEPTED,
		])->orderBy('arrival', 'desc')->get();
	}

	public function getByCode($code)
	{
		return $this->getFirstBy('code', $code);
	}

	public function getByStatus($status)
	{
		return $this->make(['items'])
			->where('status', Status::toCode($status))
			->orderBy('arrival', 'desc')
			->get();
	}

	public function update($id, array $data)
	{
		// Get the quote
		$quote = $this->getById($id);

		if ($quote)
		{
			$item = $quote->fill($data);

			$item->save();

			return $item;
		}

		return false;
	}
	
}