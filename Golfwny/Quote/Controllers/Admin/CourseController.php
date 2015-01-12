<?php namespace Quote\Controllers\Admin;

use View,
	Event,
	Flash,
	Input,
	Redirect,
	CourseRepositoryInterface,
	RegionRepositoryInterface,
	CourseValidator as Validator;
use Quote\Controllers\BaseController;

class CourseController extends BaseController {

	protected $courses;
	protected $regions;
	protected $validator;

	public function __construct(CourseRepositoryInterface $courses,
			RegionRepositoryInterface $regions, Validator $validator)
	{
		parent::__construct();
		
		$this->courses = $courses;
		$this->regions = $regions;
		$this->validator = $validator;
	}

	public function index()
	{
		return View::make('pages.admin.courses.index')
			->withCourses($this->courses->all());
	}

	public function create()
	{
		return View::make('pages.admin.courses.create')
			->withRegions($this->regions->listAll('name', 'id'));
	}

	public function store()
	{
		// Validate
		$this->validator->validate(Input::all());

		// Create the course
		$course = $this->courses->create(Input::all());

		// Fire the event
		Event::fire('course.created', [$course]);

		// Set the flash message
		Flash::success('Course was successfully created.');

		return Redirect::route('admin.courses.index');
	}

	public function edit($id)
	{
		return View::make('pages.admin.courses.edit')
			->withCourse($this->courses->getById($id))
			->withRegions($this->regions->listAll('name', 'id'));
	}

	public function update($id)
	{
		// Validate
		$this->validator->validate(Input::all());

		// Update the course
		$course = $this->courses->update($id, Input::all());

		// Fire the event
		Event::fire('course.updated', [$course]);

		// Set the flash message
		Flash::success('Course was successfully updated.');

		return Redirect::route('admin.courses.index');
	}

	public function remove($id)
	{
		// Get the course
		$course = $this->courses->getById($id);

		return partial('modal_content', [
			'modalHeader'	=> "Remove Course",
			'modalBody'		=> View::make('pages.admin.courses.remove')->withCourse($course),
			'modalFooter'	=> false,
		]);
	}

	public function destroy($id)
	{
		// Delete the course
		$course = $this->courses->delete($id);

		// Fire the event
		Event::fire('course.deleted', [$course]);

		// Set the flash message
		Flash::success('Course was successfully removed.');

		return Redirect::route('admin.courses.index');
	}

}