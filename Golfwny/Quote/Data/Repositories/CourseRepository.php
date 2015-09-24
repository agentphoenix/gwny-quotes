<?php namespace Quote\Data\Repositories;

use Course,
	CourseRepositoryInterface;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface {

	protected $model;

	public function __construct(Course $model)
	{
		$this->model = $model;
	}

	public function all()
	{
		return $this->model->orderBy('region_id', 'asc')
			->orderBy('name', 'asc')->get();
	}

	public function allWithTrashed()
	{
		return $this->model->withTrashed()->orderBy('region_id', 'asc')
			->orderBy('name', 'asc')->get();
	}

	public function create(array $data)
	{
		return $this->model->create($data);
	}

	public function delete($id)
	{
		// Get the course
		$course = $this->getById($id);

		if ($course)
		{
			$course->delete();

			return $course;
		}

		return false;
	}

	public function update($id, array $data)
	{
		// Get the course
		$course = $this->getById($id);

		if ($course)
		{
			$item = $course->fill($data);

			$item->save();

			return $item;
		}

		return false;
	}

}