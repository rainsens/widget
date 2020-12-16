<?php
namespace Rainsens\Widget\Widgets\Dropdowns;

abstract class BaseDropdown
{
	protected $label;
	/**
	 * select2-primary select2-info select2-success select-warning
	 */
	protected $color = '';
	protected $placeholder = '';
	protected $isMultiple = false;
	protected $items = [];
	
	public function label(string $label = '')
	{
		$this->label = $label;
		return $this;
	}
	
	public function color(string $color = '')
	{
		$this->color = $color;
		return $this;
	}
	
	public function multiple(bool $isMultiple = true)
	{
		$this->isMultiple = $isMultiple;
		return $this;
	}
	
	public function items(array $items = [])
	{
		$this->items = $items;
		return $this;
	}
	
	public function getAttributes()
	{
		$attributes['label'] = $this->label;
		$attributes['color'] = $this->color;
		$attributes['placeholder'] = $this->placeholder;
		$attributes['items'] = json_encode($this->items);
		
		return $attributes;
	}
	
	abstract protected function render();
	
	public function __toString()
	{
		return $this->render();
	}
}
