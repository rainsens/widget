<?php
use Rainsens\Widget\Widgets\Nestables\Nestable;

if (! function_exists('_widget_nestable')) {
	function _widget_nestable(array $data, string $textField, string $parentField, array $urls) {
		return app(Nestable::class, [$data, $textField, $parentField, $urls]);
	}
}
