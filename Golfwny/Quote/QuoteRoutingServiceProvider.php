<?php namespace Quote;

use Route;
use Illuminate\Support\ServiceProvider;

class QuoteRoutingServiceProvider extends ServiceProvider {

	public function register() {}

	public function boot()
	{
		$this->routeProtections();

		//$this->sessionsRoutes();
		$this->debugRoutes();
		$this->adminRoutes();
		$this->pagesRoutes();
	}

	protected function routeProtections()
	{
		// Make sure CSRF protection is in place
		Route::when('*', 'csrf', ['post', 'put', 'patch']);
	}

	protected function sessionsRoutes()
	{
		Route::get('login', [
			'as'	=> 'login',
			'uses'	=> 'Xtras\Controllers\HomeController@login']);
		Route::post('login', [
			'as'	=> 'login.do',
			'uses'	=> 'Xtras\Controllers\HomeController@doLogin']);
		Route::get('logout', [
			'as'	=> 'logout',
			'uses'	=> 'Xtras\Controllers\HomeController@logout']);

		Route::group(['prefix' => 'password', 'namespace' => 'Xtras\Controllers'], function()
		{
			Route::get('remind', [
				'as'	=> 'password.remind',
				'uses'	=> 'RemindersController@remind']);
			Route::post('remind', [
				'as'	=> 'password.remind.do',
				'uses'	=> 'RemindersController@doRemind']);
			Route::get('reset/{token}', [
				'as'	=> 'password.reset',
				'uses'	=> 'RemindersController@reset']);
			Route::post('reset', [
				'as'	=> 'password.reset.do',
				'uses'	=> 'RemindersController@doReset']);
		});
	}

	protected function pagesRoutes()
	{
		Route::group(['namespace' => 'Quote\Controllers'], function()
		{
			Route::get('check-status', [
				'as'	=> 'checkStatus',
				'uses'	=> 'HomeController@checkStatus']);
			Route::post('check-status', [
				'as'	=> 'doCheckStatus',
				'uses'	=> 'HomeController@doCheckStatus']);

			Route::get('package/{code}', [
				'as'	=> 'package',
				'uses'	=> 'HomeController@packageDetails']);

			Route::get('thank-you', [
				'as'	=> 'thank-you',
				'uses'	=> 'HomeController@thankYou']);

			Route::post('/{location}/info', [
				'as'	=> 'storeInfo',
				'uses'	=> 'HomeController@storeInfo']);
			Route::post('/{location}/courses', [
				'as'	=> 'storeCourses',
				'uses'	=> 'HomeController@storeCourses']);
			Route::post('/{location}/confirm', [
				'as'	=> 'storeConfirm',
				'uses'	=> 'HomeController@storeConfirm']);

			Route::get('/{location?}/{step?}', [
				'as'	=> 'home',
				'uses'	=> 'HomeController@index']);
		});
	}

	protected function adminRoutes()
	{
		$groupOptions = [
			//'before'	=> 'auth',
			'prefix'	=> 'admin',
			'namespace' => 'Quote\Controllers'
		];

		Route::group($groupOptions, function()
		{
			Route::get('/', [
				'as'	=> 'admin',
				'uses'	=> 'AdminController@index']);

			Route::get('quote/get/hotel/{id}', 'QuoteController@getHotel');
			Route::get('quote/get/course/{id}', 'QuoteController@getCourse');
			Route::get('quote/recalculate/{id}', 'QuoteController@recalculatePrice');

			Route::resource('quote', 'QuoteController');
		});
	}

	protected function debugRoutes()
	{
		Route::get('calculate', function()
		{
			$item = \Quote::find(6);

			$calculator = new \Quote\Services\QuoteCalculatorService($item);
			s($calculator->getTotal());
			s($calculator->getDeposit());

			$calculator->setPackagePercentage(0.18);
			$calculator->setDepositPercentage(0.35);

			s($calculator->getTotal());
			s($calculator->getDeposit());
		});
	}

}