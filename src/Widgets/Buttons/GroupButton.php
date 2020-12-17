<?php
namespace Rainsens\Widget\Widgets\Buttons;

class GroupButton extends BaseButton
{
	protected $buttons = [];
	
	public function push(array $buttons)
	{
		$this->buttons = $buttons;
		return $this;
	}
	
	protected function render()
	{
		$buttons = ['buttons' => $this->buttons];
		return view('widget::buttons.group', $buttons)->render();
	}
}
