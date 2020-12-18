<?php
namespace Rainsens\Widget\Widgets\Dropdowns;

use Illuminate\Support\Arr;

abstract class BaseDropdown
{
	protected $id;
	
	const DROPDOWN_SELECT2 = 'select2';
	const DROPDOWN_BOOTSTRAP = 'bootstrap';
	
	public static $dropdowns = [
		self::DROPDOWN_SELECT2,
		self::DROPDOWN_BOOTSTRAP,
	];
	
	/**
	 * select2-primary select2-info select2-success select-warning
	 */
	protected $color = '';
	protected $placeholder = 'Please Select';
	protected $isMultiple = false;
	protected $items = [
		['id' => 1, 'text' => 'Example Text 1', 'html' => 'Example Text 1', 'title' => ''],
		['id' => 2, 'text' => 'Example Text 2', 'html' => 'Example Text 2', 'title' => ''],
		['id' => 3, 'text' => 'Example Text 3', 'html' => 'Example Text 3', 'title' => ''],
	];
	
	public function __construct(array $dropdown = [])
	{
		$this->setId();
		
		$this->color = $dropdown['color'] ?? $this->color;
		$this->placeholder = $dropdown['placeholder'] ?? $this->placeholder;
		$this->isMultiple = $dropdown['isMultiple'] ?? $this->isMultiple;
		$this->items = $dropdown['items'] ?? $this->items;
		
		$this->addPlaceholderForSingleSelect();
	}
	
	protected function setId()
	{
		$this->id = uniqid('widget-form-dropdown-id-');
	}
	
	protected function addPlaceholderForSingleSelect()
	{
		if (! $this->isMultiple) {
			$this->items = Arr::prepend($this->items, [
				'id'    => 0,
				'text'  => $this->placeholder,
				'html'  => $this->placeholder,
				'title' => ''
			]);
		}
	}
	
	public function getAttributes()
	{
		$attributes['id'] = $this->id;
		$attributes['color'] = $this->color;
		$attributes['placeholder'] = $this->placeholder;
		$attributes['isMultiple'] = $this->isMultiple;
		$attributes['items'] = $this->items;
		
		return $attributes;
	}
	
	abstract protected function render();
	
	public function __toString()
	{
		return $this->render();
	}
}
