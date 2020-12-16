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
	
	public function split(bool $split = false)
	{
		$this->split = $split;
		return $this;
	}
	
	public function items(array $items = [])
	{
		$this->items = $items;
		return $this;
	}
	
	public function render()
	{
		$attributes = $this->getAttributes();
		$attributes['split'] = $this->split;
		$attributes['items'] = $this->items;
		
		return view('widget::buttons.dropdown', $attributes)->render();
	
	}
}
