<?php
namespace Rainsens\Widget\Widgets\Forms\Elements\Fields;

use Rainsens\Widget\Widgets\Forms\Elements\Element;

class Hidden extends Element
{
	public function attr()
	{
		$this->type('hidden');
		return parent::attr();
	}
}
