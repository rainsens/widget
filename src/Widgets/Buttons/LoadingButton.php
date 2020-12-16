<?php
namespace Rainsens\Widget\Widgets\Buttons;

class LoadingButton extends BaseButton
{
	public function render()
	{
		$attributes = $this->getAttributes();
		return view('widget::buttons.loading', $attributes)->render();
	}
}
