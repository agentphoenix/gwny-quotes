<?php namespace Quote\Data\Interfaces;

interface ReportRepositoryInterface extends BaseRepositoryInterface {

	public function getCourseRevenue($year);
	public function getHotelRevenue($year);
	public function getTotalRevenue($year);

}
