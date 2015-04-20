<?php namespace Quote\Services;

class StatusService {

	const INVALID				= 0;
	const PENDING				= 1;
	const SUBMITTED				= 2;
	const ESTIMATE				= 3;
	const ESTIMATE_ACCEPTED		= 4;
	const ESTIMATE_REJECTED		= 5;
	const CONTRACT				= 6;
	const CONTRACT_ACCEPTED		= 7;
	const CONTRACT_REJECTED		= 8;
	const AWAITING_ARRIVAL		= 9;
	const WITHDRAWN				= 10;
	const CLOSED				= 11;
	const COMPLETED				= 12;

	public static function toCode($value)
	{
		switch ($value)
		{
			case 'accepted':
				return static::ESTIMATE_ACCEPTED;
			break;

			case 'contract':
				return static::CONTRACT;
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

			case 'completed':
				return static::COMPLETED;
			break;

			case 'awaiting-arrival':
				return static::AWAITING_ARRIVAL;
			break;
		}
	}

	public static function toString($value)
	{
		switch ($value)
		{
			case static::INVALID:
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

			case static::CONTRACT:
				return "Contract Sent";
			break;

			case static::CONTRACT_ACCEPTED:
				return "Contract Accepted";
			break;

			case static::CONTRACT_REJECTED:
				return "Contract Rejected";
			break;

			case static::WITHDRAWN:
				return "Withdrawn";
			break;

			case static::COMPLETED:
				return "Completed";
			break;

			case static::AWAITING_ARRIVAL:
				return "Awaiting Arrival";
			break;
		}
	}

}