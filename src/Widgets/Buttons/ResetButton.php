<?php
namespace Rainsens\Widget\Widgets\Buttons;

class ResetButton extends BaseButton
{
	public function render()
	{
		$attributes = $this->getAttributes();
		$attributes['text'] = 'Reset';
		return view('widget::buttons.reset', $attributes)->render();
	}
}
