<?php

if (! function_exists('_widget_recursive')) {
	
	function _widget_recursive(array $data, $parentField, $parentId = 0, $level = 0) {
		static $orderedData = [];
		foreach ($data as $key => $value) {
			if ($value[$parentField] === $parentId) {
				$value['level'] = $level;
				$orderedData[] = $value;
				unset($data[$key]);
				_widget_recursive($data, $parentField, $value['id'], $level+1);
			}
		}
		return $orderedData;
	}
}

if (! function_exists('widget_base_path')) {
	function widget_base_path(string $path = '') {
		return dirname(__DIR__) . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('widget_resource_path')) {
	function widget_resource_path(string $path = '')
	{
		return widget_base_path('resources') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('widget_view_path')) {
	function widget_view_path(string $path = '') {
		return widget_resource_path('views') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}
