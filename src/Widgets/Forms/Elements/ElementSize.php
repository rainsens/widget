<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

class ElementSize
{
	protected $element;
	
	protected $groupSize;
	
	protected $addonSize;
	
	protected $inputSize;
	
	public function __construct(Element $element)
	{
		$this->element = $element;
	}
	
	public function group(string $size = null)
	{
	
	}
	
	public function addon(string $size = null)
	{
	
	}
	
	public function input(string $size = null)
	{
	
	}
}
