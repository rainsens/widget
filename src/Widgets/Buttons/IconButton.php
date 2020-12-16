<?php
namespace Rainsens\Widget\Widgets\Buttons;

class IconButton extends BaseButton
{
	protected function render()
	{
		$attribute = $this->getAttributes();
		return view('widget::buttons.icon', $attribute)->render();
	}
}
