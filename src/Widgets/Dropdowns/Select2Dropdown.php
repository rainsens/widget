<?php
namespace Rainsens\Widget\Widgets\Dropdowns;

class Select2Dropdown extends BaseDropdown
{
	protected function render()
	{
		$attributes = $this->getAttributes();
		return view('widget::dropdowns.dropdown', $attributes)->render();
	}
}
