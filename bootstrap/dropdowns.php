<?php

use Rainsens\Widget\Widgets\Dropdowns\Select2Dropdown;
use Rainsens\Widget\Widgets\Dropdowns\BootstrapDropdown;

if (! function_exists('_widget_dropdown')) {
	function _widget_dropdown(array $dropdown = []) {
		$type = empty($dropdown['type']) ? Select2Dropdown::DROPDOWN_SELECT2 : $dropdown['type'];
		if ($type === Select2Dropdown::DROPDOWN_SELECT2) {
			return app(Select2Dropdown::class, ['dropdown' => $dropdown]);
		} else {
			return app(BootstrapDropdown::class, ['dropdown' => $dropdown]);
		}
	}
}
