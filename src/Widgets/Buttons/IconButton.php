<?php
namespace Rainsens\Widget\Widgets\Buttons;

class IconButton extends BaseButton
{
	public function render()
	{
		$attribute = $this->getAttributes();
		return view('widget::buttons.icon', $attribute)->render();
	
	}
}
