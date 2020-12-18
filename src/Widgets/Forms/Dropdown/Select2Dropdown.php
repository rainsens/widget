<?php
namespace Rainsens\Widget\Widgets\Forms\Dropdown;

use Rainsens\Widget\Widgets\Dropdowns\BaseDropdown;

class Select2Dropdown extends BaseDropdown
{
	protected $labelCol = 'col-md-2';
	protected $fieldCol = 'col-md-8';
	
	protected $name = '';
	protected $label = 'Dropdown Label';
	protected $help = '';
	protected $required = false;
	
	public function __construct(array $dropdown = [])
	{
		parent::__construct($dropdown);
		
		$this->labelCol = $dropdown['labelCol'] ?? $this->labelCol;
		$this->fieldCol = $dropdown['inputCol'] ?? $this->fieldCol;
		
		$this->name = $dropdown['name'] ?? $this->name;
		$this->label = $dropdown['label'] ?? $this->label;
		$this->help = $dropdown['help'] ?? $this->help;
		$this->required = $dropdown['required'] ?? $this->required;
	}
	
	protected function render()
	{
		$attributes = $this->getAttributes();
		
		$attributes['labelCol'] = $this->labelCol;
		$attributes['fieldCol'] = $this->fieldCol;
		
		$attributes['name'] = $this->name;
		$attributes['label'] = $this->label;
		$attributes['help'] = $this->help;
		$attributes['required'] = $this->required;
		
		return view('widget::forms.select2dropdown', $attributes)->render();
	}
}
