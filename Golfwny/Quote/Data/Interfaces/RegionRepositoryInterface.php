<?php namespace Golfwny\Quote\Data\Interfaces;

interface RegionRepositoryInterface {

	public function all();
	public function findBySlug($slug);
	
}