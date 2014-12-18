<?php namespace Quote\Data\Repositories;

use Course,
	CourseRepositoryInterface;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface {

	protected $model;

	public function __construct(Course $model)
	{
		$this->model = $model;
	}
	
}