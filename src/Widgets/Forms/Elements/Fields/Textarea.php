<?php
namespace Rainsens\Widget\Widgets\Forms\Elements\Fields;

use Rainsens\Widget\Widgets\Forms\Elements\Element;

class Textarea extends Element
{
	protected $rows = 5;
	
	public function rows(int $rows = null)
	{
		if (is_null($rows)) {
			return $this->rows;
		}
		$this->rows = $rows;
		return $this;
	}
}
