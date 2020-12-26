<?php
namespace Rainsens\Widget\Widgets\Forms\Elements\Fields;

use Rainsens\Widget\Widgets\Forms\Elements\Element;

class Divider extends Element
{
	protected $title = '';
	
	public function __construct($title = '')
	{
		$this->title = $title;
	}
	
	public function title()
	{
		return $this->title;
	}
}
