<?php namespace Golfwny\Quote\Facades;

use Illuminate\Support\Facades\Facade;

class MarkdownFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'markdown'; }

}