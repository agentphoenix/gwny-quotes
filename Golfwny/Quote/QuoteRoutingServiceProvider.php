<?php namespace Quote;

use Route;
use Illuminate\Support\ServiceProvider;

class QuoteRoutingServiceProvider extends ServiceProvider {

	public function register() {}

	public function boot()
	{
		$this->routeProtections();

		$this->sessionsRoutes();
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
			'uses'	=> 'Quote\Controllers\LoginController@index']);
		Route::post('login', [
			'as'	=> 'login.do',
			'uses'	=> 'Quote\Controllers\LoginController@doLogin']);
		Route::get('logout', [
			'as'	=> 'logout',
			'uses'	=> 'Quote\Controllers\LoginController@logout']);

		Route::controller('password', 'Quote\Controllers\RemindersController');
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

			Route::post('{location}/info', [
				'as'	=> 'storeInfo',
				'uses'	=> 'HomeController@storeInfo']);
			Route::post('{location}/courses', [
				'as'	=> 'storeCourses',
				'uses'	=> 'HomeController@storeCourses']);
			Route::post('{location}/confirm', [
				'as'	=> 'storeConfirm',
				'uses'	=> 'HomeController@storeConfirm']);

			Route::get('{location?}/{step?}', [
				'as'	=> 'home',
				'uses'	=> 'HomeController@index']);
		});
	}

	protected function adminRoutes()
	{
		$groupOptions = [
			//'before'	=> 'auth',
			'prefix'	=> 'admin',
			'namespace' => 'Quote\Controllers\Admin'
		];

		Route::group($groupOptions, function()
		{
			Route::get('/', [
				'as'	=> 'admin',
				'uses'	=> 'AdminController@index']);

			Route::get('quote/get/hotel/{id}', 'QuoteController@getHotel');
			Route::get('quote/get/course/{id}', 'QuoteController@getCourse');
			Route::get('quote/recalculate/{id}', 'QuoteController@recalculatePrice');

			Route::get('regions/{id}/remove', [
				'as'	=> 'admin.regions.remove',
				'uses'	=> 'RegionController@remove']);

			Route::get('hotels/{id}/remove', [
				'as'	=> 'admin.hotels.remove',
				'uses'	=> 'HotelController@remove']);

			Route::get('courses/{id}/remove', [
				'as'	=> 'admin.courses.remove',
				'uses'	=> 'CourseController@remove']);

			Route::get('users/{id}/remove', [
				'as'	=> 'admin.users.remove',
				'uses'	=> 'UserController@remove']);

			Route::resource('quote', 'QuoteController');
			Route::resource('regions', 'RegionController');
			Route::resource('hotels', 'HotelController');
			Route::resource('courses', 'CourseController');
			Route::resource('users', 'UserController');
		});
	}

	protected function debugRoutes()
	{
		//
	}

}