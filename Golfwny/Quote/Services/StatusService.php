<?php namespace Quote\Services;

class StatusService {

	const PENDING		= 1;
	const SUBMITTED		= 2;
	const ESTIMATE		= 3;
	const ACCEPTED		= 4;
	const REJECTED		= 5;
	const BOOKED		= 6;

	public static function toString($value)
	{
		switch ($value)
		{
			case static::PENDING:
				return "Incomplete";
			break;

			case static::SUBMITTED:
				return "Awaiting Review";
			break;

			case static::ESTIMATE:
				return "Estimate Sent";
			break;

			case static::ACCEPTED:
				return "Estimate accepted";
			break;

			case static::REJECTED:
				return "Estimate rejected";
			break;

			case static::BOOKED:
				return "Booked";
			break;
		}
	}

}