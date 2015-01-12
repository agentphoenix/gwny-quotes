<?php namespace Quote\Controllers\Admin;

use View,
	Event,
	Flash,
	Input,
	Redirect,
	RegionRepositoryInterface,
	RegionValidator as Validator;
use Quote\Controllers\BaseController;

class RegionController extends BaseController {

	protected $regions;
	protected $validator;

	public function __construct(RegionRepositoryInterface $regions, Validator $validator)
	{
		parent::__construct();
		
		$this->regions = $regions;
		$this->validator = $validator;
	}

	public function index()
	{
		return View::make('pages.admin.regions.index')
			->withRegions($this->regions->all());
	}

	public function create()
	{
		return View::make('pages.admin.regions.create');
	}

	public function store()
	{
		// Validate
		$this->validator->validate(Input::all());

		// Create the region
		$region = $this->regions->create(Input::all());

		// Fire the event
		Event::fire('region.created', [$region]);

		// Set the flash message
		Flash::success('Region was successfully created.');

		return Redirect::route('admin.regions.index');
	}

	public function edit($id)
	{
		return View::make('pages.admin.regions.edit')
			->withRegion($this->regions->getById($id));
	}

	public function update($id)
	{
		// Validate
		$this->validator->validate(Input::all());

		// Update the region
		$region = $this->regions->update($id, Input::all());

		// Fire the event
		Event::fire('region.updated', [$region]);

		// Set the flash message
		Flash::success('Region was successfully updated.');

		return Redirect::route('admin.regions.index');
	}

	public function remove($id)
	{
		// Get the region
		$region = $this->regions->getById($id);

		return partial('modal_content', [
			'modalHeader'	=> "Remove Region",
			'modalBody'		=> View::make('pages.admin.regions.remove')->withRegion($region),
			'modalFooter'	=> false,
		]);
	}

	public function destroy($id)
	{
		// Delete the region
		$region = $this->regions->delete($id);

		// Fire the event
		Event::fire('region.deleted', [$region]);

		// Set the flash message
		Flash::success('Region was successfully removed.');

		return Redirect::route('admin.regions.index');
	}

}