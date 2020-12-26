<?php
namespace Rainsens\Widget\Widgets\Forms;

use Illuminate\Support\Collection;
use Rainsens\Widget\Widgets\Forms\Elements\Element;

class FormLayoutColumn
{
	protected $width;
	
	/**
	 * @var Collection
	 */
	protected $elementFields;
	
	public function __construct(int $width = 12)
	{
		$this->width = $width;
		$this->elementFields = collect();
	}
	
	public function add(Element $elementField)
	{
		$this->elementFields->push($elementField);
	}
	
	public function width(int $width = null)
	{
		if ($width) {
			$this->width = $width;
			return $this;
		}
		return $this->width;
	}
	
	public function fields()
	{
		return $this->elementFields;
	}
}
