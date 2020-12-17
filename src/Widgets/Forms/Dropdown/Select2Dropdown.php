<?php
namespace Rainsens\Widget\Widgets\Forms\Dropdown;

class Select2Dropdown extends BaseDropdown
{
	protected function render()
	{
		$attributes = $this->getAttributes();
		return view('widget::forms.select2dropdown', $attributes)->render();
	}
}
