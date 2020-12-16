<?php

use Rainsens\Widget\Widgets\Dropdowns\Select2Dropdown;
use Rainsens\Widget\Widgets\Dropdowns\BootstrapDropdown;

if (! function_exists('_dropdown')) {
	function _dropdown(string $type = 'select2') {
		if ($type === 'select2') {
			return app(Select2Dropdown::class);
		} else {
			return app(BootstrapDropdown::class);
		}
	}
}
