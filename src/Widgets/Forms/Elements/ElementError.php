<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

class ElementError
{
	/**
	 * @var Element
	 */
	protected $element;
	
	protected $fieldName;
	
	protected $class;
	
	protected $icon = 'fa-info-circle';
	
	protected $desc = '';
	
	public function __construct(Element $element)
	{
		$this->element = $element;
		$this->fieldName = $element->field()->name();
	}
	
	public function has()
	{
		if (session('errors')) {
			return session('errors')->exists($this->fieldName);
		}
		return false;
	}
	
	public function class(string $class = null)
	{
		if (is_null($class)) {
			return $this->has() ? 'has-error' : null;
		}
		$this->class = $class;
		return $this;
	}
	
	public function icon(string $icon = null)
	{
		if (is_null($icon)) {
			return $this->has() ? $this->icon : null;
		}
		$this->icon = $icon;
		return $this;
	}
	
	public function desc(string $text = null)
	{
		if (is_null($text)) {
			return $this->has() ? $this->desc : null;
		}
		$this->desc = $text;
		return $this;
	}
	
	public function render()
	{
		if ($this->has()) {
			$html  = "<span class='help-block mt5'>";
			$html .= "<i class='fa {$this->icon()}'></i> {$this->desc()}";
			$html .= "</span>";
			return $html;
		}
		return null;
	}
}
