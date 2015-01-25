<?php namespace Quote\Services;

class StatusService {

	const PENDING				= 1;
	const SUBMITTED				= 2;
	const ESTIMATE				= 3;
	const ESTIMATE_ACCEPTED		= 4;
	const ESTIMATE_REJECTED		= 5;
	const BOOKED				= 6;
	const CONTRACT_ACCEPTED		= 7;
	const CONTRACT_REJECTED		= 8;
	const WITHDRAWN				= 9;
	const CLOSED				= 10;

	public static function toCode($value)
	{
		switch ($value)
		{
			case 'accepted':
				return static::ESTIMATE_ACCEPTED;
			break;

			case 'contract-accepted':
				return static::CONTRACT_ACCEPTED;
			break;

			case 'contract-rejected':
				return static::CONTRACT_REJECTED;
			break;

			case 'closed':
				return static::CLOSED;
			break;

			case 'estimate':
				return static::ESTIMATE;
			break;

			case 'rejected':
				return static::ESTIMATE_REJECTED;
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

			case static::ESTIMATE_ACCEPTED:
				return "Estimate Accepted";
			break;

			case static::ESTIMATE_REJECTED:
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