<?php namespace Quote\Data\Interfaces;

interface RegionRepositoryInterface extends BaseRepositoryInterface {

	public function findBySlug($slug);
	
}