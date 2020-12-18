<?php
namespace Rainsens\Widget\Widgets\Buttons;

class SubmitButton extends BaseButton
{
	public function render()
	{
		$attributes = $this->getAttributes();
		$attributes['color'] = 'btn-system';
		$attributes['text'] = 'Submit';
		return view('widget::buttons.submit', $attributes)->render();
	}
}
