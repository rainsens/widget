<?php
use Rainsens\Widget\Widgets\Buttons\Button;
use Rainsens\Widget\Widgets\Buttons\IconButton;
use Rainsens\Widget\Widgets\Buttons\GroupButton;
use Rainsens\Widget\Widgets\Buttons\LoadingButton;
use Rainsens\Widget\Widgets\Buttons\DropdownButton;
use Rainsens\Widget\Widgets\Buttons\ResetButton;
use Rainsens\Widget\Widgets\Buttons\SubmitButton;

if (! function_exists('_widget_button')) {
	/**
	 * @param mixed ...$button
	 * @return Button
	 */
	function _widget_button(array $button = []) {
		return app(Button::class, ['button' => $button]);
	}
}

if (! function_exists('_widget_dropdown_button')) {
	function _widget_dropdown_button(array $button = []) {
		return app(DropdownButton::class, ['button' => $button]);
	}
}

if (! function_exists('_widget_icon_button')) {
	function _widget_icon_button(array $button = []) {
		return app(IconButton::class, ['button' => $button]);
	}
}

if (! function_exists('_widget_loading_button')) {
	function _widget_loading_button(array $button = []) {
		return app(LoadingButton::class, ['button' => $button]);
	}
}

if (! function_exists('_widget_reset_button')) {
	function _widget_reset_button(array $button = []) {
		return app(ResetButton::class, ['button' => $button]);
	}
}

if (! function_exists('_widget_submit_button')) {
	function _widget_submit_button(array $button = []) {
		return app(SubmitButton::class, ['button' => $button]);
	}
}

if (! function_exists('_widget_group_button')) {
	/**
	 * @param mixed ...$buttons
	 * @return mixed
	 */
	function _widget_group_button(array $buttons = []) {
		return app(GroupButton::class)->push($buttons);
	}
}
