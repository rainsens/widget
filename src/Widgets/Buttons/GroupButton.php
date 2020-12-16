<?php
namespace Rainsens\Widget\Widgets\Buttons;

class GroupButton extends BaseButton
{
	protected $buttons;
	
	public function push(...$buttons)
	{
		foreach ($buttons as $button) {
			$this->buttons .= $button;
		}
		return $this;
	}
	
	public function render()
	{
		return $this->buttons;
	}
}
