<?php namespace Quote;

use App,
	Str,
	Auth,
	View,
	Event,
	Config,
	Schema,
	Status;
use Ikimea\Browser\Browser;
use Illuminate\Support\ServiceProvider;
use League\CommonMark\CommonMarkConverter as MarkdownParser;

class QuoteServiceProvider extends ServiceProvider {

	public function register()
	{
		//
	}

	public function boot()
	{
		$this->setupMarkdown();
		$this->setupBrowser();
		$this->setupMacros();
		$this->setupFlashNotifier();

		$this->browserCheck();
		$this->setupBindings();
		$this->setupEventListeners();
	}

	protected function setupMarkdown()
	{
		$this->app['markdown'] = $this->app->share(function($app)
		{
			return new Services\MarkdownService(new MarkdownParser);
		});
	}

	protected function setupBrowser()
	{
		$this->app['browser'] = $this->app->share(function($app)
		{
			return new Browser;
		});
	}

	protected function setupBindings()
	{
		// Get the aliases from the app config
		$a = $this->app['config']->get('app.aliases');

		// Bind the repositories to any calls to their interfaces
		$this->app->bind($a['CourseRepositoryInterface'], $a['CourseRepository']);
		$this->app->bind($a['HotelRepositoryInterface'], $a['HotelRepository']);
		$this->app->bind($a['QuoteRepositoryInterface'], $a['QuoteRepository']);
		$this->app->bind($a['QuoteItemRepositoryInterface'], $a['QuoteItemRepository']);
		$this->app->bind($a['RegionRepositoryInterface'], $a['RegionRepository']);
		$this->app->bind($a['SurveyRepositoryInterface'], $a['SurveyRepository']);
		$this->app->bind($a['UserRepositoryInterface'], $a['UserRepository']);

		$quoteRepo = $this->app->make('QuoteRepository');

		// Make sure we some variables available on all views
		View::share('_currentUser', Auth::user());
		View::share('_icons', $this->app['config']->get('icons'));

		if (Schema::hasTable('quotes'))
		{
			View::share('_countSubmitted', $quoteRepo->countBy('status', Status::SUBMITTED));
			View::share('_countAccepted', $quoteRepo->countBy('status', Status::ESTIMATE_ACCEPTED));
			View::share('_countRejected', $quoteRepo->countBy('status', Status::ESTIMATE_REJECTED));
			View::share('_countActive', $quoteRepo->countActive());
		}
	}

	protected function setupEventListeners()
	{
		Event::listen('region.created', 'Quote\Events\RegionEventHandler@onCreate');
		Event::listen('region.deleted', 'Quote\Events\RegionEventHandler@onDelete');
		Event::listen('region.updated', 'Quote\Events\RegionEventHandler@onUpdate');

		Event::listen('hotel.created', 'Quote\Events\HotelEventHandler@onCreate');
		Event::listen('hotel.deleted', 'Quote\Events\HotelEventHandler@onDelete');
		Event::listen('hotel.updated', 'Quote\Events\HotelEventHandler@onUpdate');

		Event::listen('course.created', 'Quote\Events\CourseEventHandler@onCreate');
		Event::listen('course.deleted', 'Quote\Events\CourseEventHandler@onDelete');
		Event::listen('course.updated', 'Quote\Events\CourseEventHandler@onUpdate');

		Event::listen('user.created', 'Quote\Events\UserEventHandler@onCreate');
		Event::listen('user.deleted', 'Quote\Events\UserEventHandler@onDelete');
		Event::listen('user.updated', 'Quote\Events\UserEventHandler@onUpdate');

		Event::listen('quote.created', 'Quote\Events\QuoteEventHandler@onCreate');
		Event::listen('quote.deleted', 'Quote\Events\QuoteEventHandler@onDelete');
		Event::listen('quote.updated', 'Quote\Events\QuoteEventHandler@onUpdate');
		Event::listen('quote.calculated', 'Quote\Events\QuoteEventHandler@onCalculate');
		Event::listen('quote.status', 'Quote\Events\QuoteEventHandler@onStatusChange');
	}

	protected function browserCheck()
	{
		$this->app->before(function($request)
		{
			// Get the browser object
			$browser = App::make('browser');

			$supported = array(
				Browser::BROWSER_IE			=> 9,
				Browser::BROWSER_CHROME		=> 26,
				Browser::BROWSER_FIREFOX	=> 20,
			);

			if (array_key_exists($browser->getBrowser(), $supported)
					and $browser->getVersion() < $supported[$browser->getBrowser()])
			{
				header("Location: browser.php");
				die();
			}
		});
	}

	protected function setupMacros()
	{
		Str::macro('quoteCode', function($length)
		{
			$pool = '123456789abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';

			return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
		});
	}

	protected function setupFlashNotifier()
	{
		$this->app['flash'] = $this->app->share(function($app)
		{
			return new Services\FlashNotifierService($app['session.store']);
		});
	}

}