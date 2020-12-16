<?php
namespace Rainsens\Widget\Providers;

use Illuminate\Support\ServiceProvider;

class WidgetServiceProvider extends ServiceProvider
{
	public function register()
	{
	
	}
	
	public function boot()
	{
		$this->loadViewsFrom(widget_view_path(), 'widget');
	}
}
