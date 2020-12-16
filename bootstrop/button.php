<?php
use Rainsens\Widget\Widgets\Buttons\Button;
use Rainsens\Widget\Widgets\Buttons\GroupButton;

if (! function_exists('_button')) {
	/**
	 * @return Button
	 */
	function _button() {
		return app(Button::class);
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
