<?php namespace Quote\Data\Interfaces;

interface CourseRepositoryInterface extends BaseRepositoryInterface {

	public function allWithTrashed();
	public function create(array $data);
	public function delete($id);
	public function update($id, array $data);

}