<?php
namespace Rainsens\Widget\Widgets\Buttons;

class DropdownButton extends BaseButton
{
	protected $split = false;
	
	protected $items = [
		["icon" => 'fa-coffee', "text" => 'Example text 1', 'url' => ''],
		["icon" => 'fa-coffee', "text" => 'Example text 2', 'url' => ''],
		["icon" => 'fa-coffee', "text" => 'Example text 3', 'url' => '', 'divide' => true],
	];
	
	public function dropdown(...$dropdown)
	{
		$this->split = $dropdown['split'] ?? $this->split;
		$this->items = $dropdown['items'] ?? $this->items;
	}
	
	protected function render()
	{
		$attributes = $this->getAttributes();
		$attributes['split'] = $this->split;
		$attributes['items'] = $this->items;
		
		return view('widget::buttons.dropdown', $attributes)->render();
	
	}
}
