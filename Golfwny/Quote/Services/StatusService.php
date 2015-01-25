<?php namespace Quote\Services;

class StatusService {

	const PENDING		= 1;
	const SUBMITTED		= 2;
	const ESTIMATE		= 3;
	const ACCEPTED		= 4;
	const REJECTED		= 5;
	const BOOKED		= 6;
	const WITHDRAWN		= 7;

	public static function toCode($value)
	{
		switch ($value)
		{
			case 'accepted':
				return static::ACCEPTED;
			break;

			case 'estimate':
				return static::ESTIMATE;
			break;

			case 'rejected':
				return static::REJECTED;
			break;

			case 'submitted':
				return static::SUBMITTED;
			break;

			case 'withdrawn':
				return static::WITHDRAWN;
			break;
		}
	}

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
				return "Estimate Accepted";
			break;

			case static::REJECTED:
				return "Estimate Rejected";
			break;

			case static::BOOKED:
				return "Booked";
			break;

			case static::WITHDRAWN:
				return "Withdrawn";
			break;
		}
	}

}