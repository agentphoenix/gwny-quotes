<?php namespace Quote\Controllers\Admin;

use View,
	Event,
	Flash,
	Input,
	Redirect,
	HotelRepositoryInterface,
	RegionRepositoryInterface,
	HotelValidator as Validator;
use Quote\Controllers\BaseController;

class HotelController extends BaseController {

	protected $hotels;
	protected $regions;
	protected $validator;

	public function __construct(HotelRepositoryInterface $hotels, 
			RegionRepositoryInterface $regions, Validator $validator)
	{
		parent::__construct();
		
		$this->hotels = $hotels;
		$this->regions = $regions;
		$this->validator = $validator;
	}

	public function index()
	{
		return View::make('pages.admin.hotels.index')
			->withHotels($this->hotels->all());
	}

	public function create()
	{
		return View::make('pages.admin.hotels.create')
			->withRegions($this->regions->listAll('name', 'id'));
	}

	public function store()
	{
		// Validate
		$this->validator->validate(Input::all());

		// Create the hotel
		$hotel = $this->hotels->create(Input::all());

		// Fire the event
		Event::fire('hotel.created', [$hotel]);

		// Set the flash message
		Flash::success('Hotel was successfully created.');

		return Redirect::route('admin.hotels.index');
	}

	public function edit($id)
	{
		return View::make('pages.admin.hotels.edit')
			->withHotel($this->hotels->getById($id))
			->withRegions($this->regions->listAll('name', 'id'));
	}

	public function update($id)
	{
		// Validate
		$this->validator->validate(Input::all());

		// Update the hotel
		$hotel = $this->hotels->update($id, Input::all());

		// Fire the event
		Event::fire('hotel.updated', [$hotel]);

		// Set the flash message
		Flash::success('Hotel was successfully updated.');

		return Redirect::route('admin.hotels.index');
	}

	public function remove($id)
	{
		// Get the hotel
		$hotel = $this->hotels->getById($id);

		return partial('modal_content', [
			'modalHeader'	=> "Remove Hotel",
			'modalBody'		=> View::make('pages.admin.hotels.remove')->withHotel($hotel),
			'modalFooter'	=> false,
		]);
	}

	public function destroy($id)
	{
		// Delete the hotel
		$hotel = $this->hotels->delete($id);

		// Fire the event
		Event::fire('hotel.deleted', [$hotel]);

		// Set the flash message
		Flash::success('Hotel was successfully removed.');

		return Redirect::route('admin.hotels.index');
	}

}