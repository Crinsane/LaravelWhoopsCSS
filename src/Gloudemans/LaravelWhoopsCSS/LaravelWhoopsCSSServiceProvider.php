<?php namespace Gloudemans\LaravelWhoopsCSS;

use Illuminate\Support\ServiceProvider;

class LaravelWhoopsCSSServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->commands('Gloudemans\LaravelWhoopsCSS\WhoopsCSSCopyCommand');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
