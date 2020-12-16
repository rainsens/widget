<?php
namespace Rainsens\Widget\Widgets\Dropdowns;

class Select2BaseDropdown extends BaseDropdown
{
	public function render()
	{
		$attributes = $this->getAttributes();
		return view('widget::dropdowns.dropdown', $attributes)->render();
	}
}
