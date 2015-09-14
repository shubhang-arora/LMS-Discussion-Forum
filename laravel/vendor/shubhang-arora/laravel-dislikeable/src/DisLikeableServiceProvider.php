<?php namespace Shubhang\DisLikeable;

use Illuminate\Support\ServiceProvider;

/**
 * Copyright (C) 2015 Shubhang-arora
 */
class DisLikeableServiceProvider extends ServiceProvider {

	protected $defer = true;
	
	public function boot() {
		$this->publishes([
			__DIR__.'/../migrations/2015_09_10_065447_create_dislikeable_tables.php' => database_path('migrations/2015_09_10_065447_create_dislikeable_tables.php'),
		]);
	}
	
	public function register() {}

	public function when() {
		return array('artisan.start');
	}
	
}