<?php namespace Quote\Data\Repositories;

use Survey,
	SurveyRepositoryInterface;

class SurveyRepository extends BaseRepository implements SurveyRepositoryInterface {

	protected $model;

	public function __construct(Survey $model)
	{
		$this->model = $model;
	}

	public function create(array $data)
	{
		return $this->model->create($data);
	}

	public function findBySlug($slug)
	{
		return $this->getFirstBy('slug', $slug);
	}
	
}