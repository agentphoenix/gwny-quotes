<?php namespace Quote\Commands;

use Date,
	Status,
	QuoteRepositoryInterface;
use Quote\Mailers\CustomerMailer as Mailer;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption,
	Symfony\Component\Console\Input\InputArgument;

class SendEmailsCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'quote:emails';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Send reminder emails.';

	protected $quotes;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(QuoteRepositoryInterface $quotes, Mailer $mailer)
	{
		parent::__construct();

		$this->quotes = $quotes;
		$this->mailer = $mailer;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->info("");

		$this->sendEstimateReminders();
		$this->sendContractReminders();
		$this->sendDepositReminders();
		$this->sendPaymentReminders();
		$this->sendWelcomeMessages();
		$this->markPackagesCompleted();
		$this->sendSurveyLinks();

		$this->info("");
		$this->info("Automated reminders complete!");
		$this->info("");
	}

	protected function sendEstimateReminders()
	{
		// Get all packages that are in the estimate phase
		$packages = $this->quotes->getByStatus('estimate');

		// Only get packages that were created more than 7 days ago
		// and are an odd number of days since being created so we
		// don't send an email every single day
		$packages = $packages->filter(function($p)
		{
			$days = (int) $p->estimate_sent->startOfDay()->diffInDays(Date::now()->startOfDay());

			return $days >= 7 and ($days & 1);
		});

		if ($packages->count() > 0)
		{
			$this->info("Sending package estimate reminder emails...");

			foreach ($packages as $quote)
			{
				$this->info("Package: {$quote->code}");
				$this->mailer->estimateReminder($quote);
			}
		}
	}

	protected function sendContractReminders()
	{
		// Get all packages that are in the contract phase
		$packages = $this->quotes->getByStatus('contract');

		// Only get packages that were created more than 7 days ago
		// and are an odd number of days since being created so we
		// don't send an email every single day
		$packages = $packages->filter(function($p)
		{
			$days = (int) $p->contract_sent->startOfDay()->diffInDays(Date::now()->startOfDay());

			return $days >= 7 and ($days & 1);
		});

		if ($packages->count() > 0)
		{
			$this->info("Sending package contract reminder emails...");

			foreach ($packages as $quote)
			{
				$this->info("Package: {$quote->code}");
				$this->mailer->contractReminder($quote);
			}
		}
	}

	protected function sendDepositReminders()
	{
		// Get all packages that have been accepted
		$packages = $this->quotes->getByStatus('contract-accepted');

		// Only get packages where the contract was accepted more than
		// 7 days ago, it's been an odd number of days since the contract
		// was accepted, and they haven't been marked as paying the deposit yet
		$packages = $packages->filter(function($p)
		{
			$days = (int) $p->contract_accepted->startOfDay()->diffInDays(Date::now()->startOfDay());

			return $days >= 7 and ($days & 1) and (bool) $p->paid_deposit == false;
		});

		if ($packages->count() > 0)
		{
			$this->info("Sending package deposit reminder emails...");

			foreach ($packages as $quote)
			{
				$this->info("Package: {$quote->code}");
				$this->mailer->paymentDeposit($quote);
			}
		}
	}

	protected function sendPaymentReminders()
	{
		// Get all packages that have been completed
		$packages = $this->quotes->getByStatus('contract-accepted');

		// Only get packages where they're arriving inside of 30 days, it's
		// an even number of days to their arrival, and they haven't been
		// marked as paying the remaining total yet
		$packages = $packages->filter(function($p)
		{
			$days = (int) $p->arrival->startOfDay()->diffInDays(Date::now()->startOfDay());

			return $days <= 30 and ! ($days & 1) and (bool) $p->paid_total == false;
		});

		if ($packages->count() > 0)
		{
			$this->info("Sending payment reminder emails...");

			foreach ($packages as $quote)
			{
				$this->info("Package: {$quote->code}");
				$this->mailer->paymentFinal($quote);
			}
		}
	}

	protected function sendWelcomeMessages()
	{
		// Get all packages that have been completed
		$packages = $this->quotes->getByStatus('awaiting-arrival');

		// Only get packages where they're arriving in 7 days
		$packages = $packages->filter(function($p)
		{
			$days = (int) $p->arrival->startOfDay()->diffInDays(Date::now()->startOfDay());

			return $days == 7 and (bool) $p->paid_total == true;
		});

		if ($packages->count() > 0)
		{
			$this->info("Sending welcome emails...");

			foreach ($packages as $quote)
			{
				$this->info("Package: {$quote->code}");
				$this->mailer->welcome($quote);
			}
		}
	}

	protected function markPackagesCompleted()
	{
		// Get all packages that have been completed
		$packages = $this->quotes->getByStatus('awaiting-arrival');

		// Only get packages where yesterday was the completed date
		$packages = $packages->filter(function($p)
		{
			$days = (int) $p->departure->startOfDay()->diffInDays(Date::now()->startOfDay());

			return $days == 1;
		});

		if ($packages->count() > 0)
		{
			$this->info("Marking packages as complete...");

			foreach ($packages as $quote)
			{
				$this->info("Package: {$quote->code}");
				$quote->fill(['status' => Status::COMPLETED])->save();
			}
		}
	}

	protected function sendSurveyLinks()
	{
		// Get all packages that have been completed
		$packages = $this->quotes->getByStatus('completed');

		// Only get packages that departed 7 days ago
		$packages = $packages->filter(function($p)
		{
			$days = (int) $p->departure->endOfDay()->diffInDays(Date::now()->endOfDay());

			return $days == 7;
		});

		if ($packages->count() > 0)
		{
			$this->info("Sending survey link emails...");

			foreach ($packages as $quote)
			{
				$this->info("Package: {$quote->code}");
				$this->mailer->survey($quote);
			}
		}
	}

}
