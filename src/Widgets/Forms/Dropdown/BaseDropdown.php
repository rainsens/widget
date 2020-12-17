<?php
namespace Rainsens\Widget\Widgets\Forms\Dropdown;

abstract class BaseDropdown
{
	const DROPDOWN_SELECT2 = 'select2';
	const DROPDOWN_BOOTSTRAP = 'bootstrap';
	
	public static $dropdowns = [
		self::DROPDOWN_SELECT2,
		self::DROPDOWN_BOOTSTRAP,
	];
	
	protected $name = '';
	protected $label = '';
	protected $items = [];
	protected $isMultiple = false;
	protected $color = '';
	protected $placeholder = '';
	protected $help = '';
	protected $required = false;
	
	public function __construct(string $name, array $items, string $textColumn)
	{
		$this->name = $name;
		$this->items = $this->items($items, $textColumn);
	}
	
	public function isMultiple(bool $isMultiple = true)
	{
		$this->isMultiple = $isMultiple;
		return $this;
	}
	
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
	
	public function placeholder(string $placeholder = '')
	{
		$this->placeholder = $placeholder;
		return $this;
	}
	
	public function help(string $help = '')
	{
		$this->help = $help;
		return $this;
	}
	
	public function required(bool $required = true)
	{
		$this->required = $required;
		return $this;
	}
	
	public function items(array $items, string $textColumn) {
		
		$originalData = _recursive($items, 'parent_id');
		
		$items[0] = ['id' => 0, 'text' => 'ROOT', 'html' => '┝ ROOT', 'title' => ''];
		
		foreach ($originalData as $value) {
			$prefix = '';
			for ($i = $value['level']; $i > 0; $i--) {
				$prefix .= '&nbsp;&nbsp;&nbsp;&nbsp;';
			}
			$text = $value[$textColumn];
			$html = $prefix.'┝ '.$text;
			$items[] = ['id' => $value['id'], 'text' => $text, 'html' => $html, 'title' => ''];
		}
		
		$this->items = $items;
		
		return $items;
	}
	
	protected function getAttributes()
	{
		$attributes['name'] = $this->name;
		$attributes['items'] = $this->items;
		$attributes['label'] = $this->label;
		$attributes['color'] = $this->color;
		$attributes['placeholder'] = $this->placeholder;
		$attributes['help'] = $this->help;
		$attributes['required'] = $this->required;
		
		return $attributes;
	}
	
	abstract protected function render();
	
	public function __toString()
	{
		return $this->render();
	}
}
