<?php
namespace Rainsens\Widget\Widgets\Forms\Form;

use Rainsens\Widget\Widgets\Forms\Dropdown\Select2Dropdown;

class Form
{
	protected $id;
	
	protected $labelCol = 'col-md-2';
	protected $fieldCol = 'col-md-8';
	
	protected $method = 'POST';
	protected $action = '';
	protected $title = 'Form Title';
	
	protected $fields;
	
	public function __construct(array $form = [])
	{
		$this->labelCol = $dropdown['labelCol'] ?? $this->labelCol;
		$this->fieldCol = $dropdown['inputCol'] ?? $this->fieldCol;
		
		$this->title = $form['title'] ?? $this->title;
		$this->method = $form['method'] ?? $this->method;
		$this->action = $form['action'] ?? $this->action;
		
		$this->fields= collect();
	}
	
	public function setId()
	{
		$this->id = uniqid('widget-form-id-');
	}
	
	public function text(array $text = [])
	{
	
	}
	
	public function dropdown(array $dropdown = [])
	{
		$this->fields->push(
			app(Select2Dropdown::class, ['dropdown' => $dropdown])
		);
		return $this;
	}
	
	protected function getAttributes()
	{
		$attributes['labelCol'] = $this->labelCol;
		$attributes['fieldCol'] = $this->fieldCol;
		
		$attributes['title'] = $this->title;
		$attributes['method'] = $this->method;
		$attributes['action'] = $this->action;
		
		return $attributes;
	}
	
	protected function render()
	{
		return view('widget::forms.form', [
			'attributes' => $this->getAttributes(),
			'fields' => $this->fields,
		])->render();
	}
	
	public function __toString()
	{
		return $this->render();
	}
}
