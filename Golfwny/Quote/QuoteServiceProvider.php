<?php namespace Golfwny\Quote;

use App,
	Auth,
	View,
	Event,
	Config;
use Parsedown;
use Ikimea\Browser\Browser;
use Illuminate\Support\ServiceProvider;

class QuoteServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->setupMarkdown();
		$this->setupBrowser();
		$this->setupMacros();
		$this->setupFlashNotifier();
	}

	public function boot()
	{
		$this->browserCheck();
		$this->setupBindings();
		$this->setupEventListeners();
	}

	protected function setupMarkdown()
	{
		$this->app['markdown'] = $this->app->share(function($app)
		{
			return new Services\MarkdownService(new Parsedown);
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
		$a = Config::get('app.aliases');

		// Bind the repositories to any calls to their interfaces
		App::bind($a['RegionRepositoryInterface'], $a['RegionRepository']);

		// Make sure we some variables available on all views
		View::share('_currentUser', Auth::user());
		View::share('_icons', Config::get('icons'));
	}

	protected function setupEventListeners()
	{
		//
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
		\Str::macro('quoteCode', function($length)
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