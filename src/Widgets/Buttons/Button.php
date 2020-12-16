<?php
namespace Rainsens\Widget\Widgets\Buttons;

class Button extends BaseButton
{
	public function render()
	{
		$attributes = $this->getAttributes();
		return view('widget::buttons.button', $attributes)->render();
	}
}
