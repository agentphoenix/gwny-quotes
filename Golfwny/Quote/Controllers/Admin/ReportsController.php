<?php namespace Quote\Controllers\Admin;

use Date, View;
use ReportRepositoryInterface;
use Quote\Controllers\BaseController;

class ReportsController extends BaseController {

	protected $years;
	protected $reports;

	public function __construct(ReportRepositoryInterface $reports)
	{
		parent::__construct();

		$this->reports = $reports;

		// Build the list of years to report on
		for ($y = Date::now()->year; $y >= 2015; $y--)
		{
			$this->years[] = $y;
		}
	}

	public function courses($year = false)
	{
		// Get the year to pull reports for
		$year = ($year) ?: Date::now()->year;

		// Get the data for the year
		$revenue = $this->reports->getCourseRevenue($year);

		return View::make('pages.admin.reports.courses')
			->withYears($this->years)
			->withYear($year)
			->withRevenue($revenue);
	}

	public function hotels($year = false)
	{
		// Get the year to pull reports for
		$year = ($year) ?: Date::now()->year;

		// Get the data for the year
		$revenue = $this->reports->getHotelRevenue($year);

		return View::make('pages.admin.reports.hotels')
			->withYears($this->years)
			->withYear($year)
			->withRevenue($revenue);
	}

	public function revenue($year = false)
	{
		// Get the year to pull reports for
		$year = ($year) ?: Date::now()->year;

		// Get the data for the year
		$revenue = $this->reports->getTotalRevenue($year);

		return View::make('pages.admin.reports.revenue')
			->withYears($this->years)
			->withYear($year)
			->withRevenue($revenue);
	}

}
