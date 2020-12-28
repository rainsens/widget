<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

class ElementView
{
	/**
	 * @var Element
	 */
	protected $element;
	
	protected $namePrefix = 'widget::forms.';
	
	/**
	 * Name of view file.
	 *
	 * @var
	 */
	protected $name;
	
	public function __construct(Element $element)
	{
		$this->element = $element;
	}
	
	/**
	 * Set or get element view name,
	 * if the name does not exist,
	 * uses Field class name as the view file name.
	 *
	 * @param string|null $viewName
	 * @return $this|string
	 */
	public function name(string $viewName = null)
	{
		if (is_null($viewName)) {
			if (! empty($this->name)) {
				return $this->name;
			}
			$classParts = explode('\\', $this->element->class());
			return $this->namePrefix . strtolower(end($classParts));
		}
		$this->name = $viewName;
		return $this->element;
	}
	
	public function render()
	{
		return view($this->name(), [
			'element'   => $this->element,
			'field'     => $this->element->field(),
			'label'     => $this->element->label(),
			'input'     => $this->element->input(),
			'addon'     => $this->element->addon(),
			'help'      => $this->element->help(),
			'error'     => $this->element->error(),
			'layout'    => $this->element->layout(),
			'sizing'    => $this->element->sizing(),
			'view'      => $this,
		])->render();
	}
}
