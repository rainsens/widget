<?php
namespace Rainsens\Widget\Widgets\Forms;

class FormView
{
	/**
	 * @var Form
	 */
	protected $form;
	
	/**
	 * Name of view file.
	 *
	 * @var
	 */
	protected $name = 'widget::forms.form';
	
	public function __construct(Form $form)
	{
		$this->form = $form;
	}
	
	/**
	 * Set or get view name,
	 * if the name does not exist,
	 * uses Field class name as the view file name.
	 *
	 * @param string|null $viewName
	 * @return $this|string
	 */
	public function name(string $viewName = null)
	{
		if (is_null($viewName)) {
			return $this->name;
		}
		$this->name = $viewName;
		return $this->form;
	}
	
	public function render()
	{
		return view($this->name, [
			'view'      => $this,
			'layout'    => $this->form->layout(),
			'builder'   => $this->form->builder(),
			'control'   => $this->form->control(),
		])->render();
	}

}
