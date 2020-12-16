<?php
use Rainsens\Widget\Widgets\Buttons\Button;
use Rainsens\Widget\Widgets\Buttons\IconButton;
use Rainsens\Widget\Widgets\Buttons\GroupButton;
use Rainsens\Widget\Widgets\Buttons\LoadingButton;
use Rainsens\Widget\Widgets\Buttons\DropdownButton;

if (! function_exists('_button')) {
	/**
	 * @return Button
	 */
	function _button() {
		return app(Button::class);
	}
}

if (! function_exists('_dropdown_button')) {
	function _dropdown_button() {
		return app(DropdownButton::class);
	}
}

if (! function_exists('_icon_button')) {
	function _icon_button() {
		return app(IconButton::class);
	}
}

if (! function_exists('_loading_button')) {
	function _loading_button() {
		return app(LoadingButton::class);
	}
}

if (! function_exists('_group_button')) {
	/**
	 * @param mixed ...$buttons
	 * @return mixed
	 */
	function _group_button(...$buttons) {
		return app(GroupButton::class)->push($buttons);
	}
}
