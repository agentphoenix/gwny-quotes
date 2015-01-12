<?php namespace Quote\Data\Interfaces;

interface RegionRepositoryInterface extends BaseRepositoryInterface {

	public function create(array $data);
	public function delete($id);
	public function findBySlug($slug);
	public function update($id, array $data);
	
}