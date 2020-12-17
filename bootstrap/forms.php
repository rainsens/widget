<?php
use Rainsens\Widget\Widgets\Forms\Dropdown\BaseDropdown;
use Rainsens\Widget\Widgets\Forms\Dropdown\Select2Dropdown;

if (! function_exists('_form')) {
	function _form() {
	
	}
}

if (! function_exists('_form_dropdown')) {
	/**
	 * @param string $type
	 * @return Select2Dropdown
	 */
	function _form_dropdown(string $type = 'select2') {
		if ($type === BaseDropdown::DROPDOWN_SELECT2) {
			return app(Select2Dropdown::class);
		}
	}
}
