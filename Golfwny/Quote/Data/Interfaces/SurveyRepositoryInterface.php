<?php namespace Quote\Data\Interfaces;

interface SurveyRepositoryInterface extends BaseRepositoryInterface {

	public function create(array $data);
	public function findBySlug($slug);
	
}