<?php
namespace Rainsens\Widget\Widgets\Forms\Elements\Fields;

use Rainsens\Widget\Widgets\Forms\Elements\Element;

class Text extends Element
{
	protected $maskcode;
	
	public function inputmask(string $maskcode = null)
	{
		if (is_null($maskcode)) {
			return $this->maskcode;
		}
		$this->maskcode = $maskcode;
		return $this;
	}
}
