<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

class ElementLabel
{
	/**
	 * @var Element
	 */
	protected $element;
	
	protected $name = '';
	
	protected $width;
	
	/**
	 * Classes customized by end user.
	 *
	 * @var string
	 */
	protected $class = '';
	
	/**
	 * Customized attributes.
	 *
	 * @var array
	 */
	protected $attributes = [];
	
	public function __construct(Element $element, $label = '')
	{
		$this->element = $element;
		$this->name = $this->formatLabel($label);
	}
	
	protected function formatLabel($labelName = '')
	{
		$fieldName = $this->element->field()->name();
		$fieldName = is_array($fieldName) ? current($fieldName) : $fieldName;
		$labelName = $labelName ?? ucfirst($fieldName);
		return str_replace(['.', '_', '->'], '', $labelName);
	}
	
	public function name()
	{
		return $this->name;
	}
	
	public function for()
	{
		return $this->element->field()->name();
	}
	
	/**
	 * Set or get label width.
	 *
	 * @param int|null $width
	 * @return int|Element
	 */
	public function width(int $width = null)
	{
		if (is_null($width)) {
			if (is_null($this->width)) {
				return $this->element->form()->layout()->width()['label'];
			}
			return $this->width;
		}
		$this->width = $width;
		return $this->element;
	}
	
	/**
	 * Set or get label class.
	 *
	 * @param null $class
	 * @return string|Element
	 */
	public function class($class = null)
	{
		if (is_null($class)) {
			return $this->class;
		}
		$this->class = $class;
		return $this->element;
	}
	
	public function attributes($name = null, $value = null)
	{
		if (is_null($value)) {
			if (is_null($name)) {
				return $this->attributes;
			}
			return $this->attributes[$name];
		}
		$this->attributes[$name] = $value;
		return $this->element;
	}
	
	protected function getClass()
	{
		$class = 'control-label';
		
		// Only horizontal layout has col class.
		if ($this->element->layout()->horizon()) {
			$class .= ' col-md-' . $this->width();
		}
		// Add custom class.
		$class .= ' ' . $this->class();
		return $class;
	}
	
	/**
	 * Assemble label attributes as html string.
	 *
	 * @param array $attributes
	 * @return string
	 */
	protected function assemble(array $attributes)
	{
		$attr = "";
		foreach ($attributes as $k => $v) {
			$attr .= " {$k}='{$v}'";
		}
		$customAttr = implode(' ', $this->attributes);
		$html = "<label{$attr}{$customAttr}>{$this->name}</label>";
		return $html;
	}
	
	public function render(): string
	{
		$html = $this->assemble([
			"for"   => $this->for(),
			"class" => $this->getClass(),
		]);
		return $html;
	}
}
