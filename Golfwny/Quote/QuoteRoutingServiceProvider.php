<?php namespace Golfwny\Quote;

use Route;
use Illuminate\Support\ServiceProvider;

class QuoteRoutingServiceProvider extends ServiceProvider {

	public function register() {}

	public function boot()
	{
		$this->routeProtections();

		$this->sessionsRoutes();
		$this->pagesRoutes();
		$this->adminRoutes();
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
		Route::group(['namespace' => 'Golfwny\Quote\Controllers'], function()
		{
			Route::get('/', [
				'as'	=> 'home',
				'uses'	=> 'HomeController@index']);

			Route::get('new/{slug}', [
				'as'	=> 'new',
				'uses'	=> 'HomeController@newQuote']);
		});
	}

	protected function adminRoutes()
	{
		$groupOptions = [
			'before'	=> 'auth',
			'prefix'	=> 'admin',
			'namespace' => 'Xtras\Controllers\Admin'
		];

		Route::group($groupOptions, function()
		{
			Route::get('/', [
				'as'	=> 'admin',
				'uses'	=> 'AdminController@index']);

			Route::get('products/{id}/remove', 'ProductsController@remove');
			Route::get('types/{id}/remove', 'TypesController@remove');

			Route::resource('users', 'UsersController', ['except' => ['show']]);
			Route::resource('products', 'ProductsController', ['except' => ['show']]);
			Route::resource('types', 'TypesController', ['except' => ['show']]);
			Route::resource('items', 'ItemsController', ['except' => ['show']]);
		});
	}

}