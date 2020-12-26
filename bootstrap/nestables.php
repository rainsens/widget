<?php
use Rainsens\Widget\Widgets\Nestables\Nestable;

if (! function_exists('_widget_nestable')) {
	function _widget_nestable(array $data = [], string $textField = 'name', string $parentField = 'parent_id', array $urls = []) {
		return app(Nestable::class, ['data' => $data, 'textField' => $textField, 'parentField' => $parentField, 'urls' => $urls]);
	}
}
