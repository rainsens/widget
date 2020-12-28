<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

class ElementContainer
{
	protected $element;
	
	protected $useSizeClass = true;
	
	protected $class = 'form-group';
	
	public function __construct(Element $element)
	{
		$this->element = $element;
	}
	
	public function sizeClass()
	{
		return $this->useSizeClass ? $this->element->sizing()->size()['form.group'] : null;
	}
	
	public function errorClass()
	{
		return $this->element->error()->class();
	}
	
	public function class(string $class = null)
	{
		if (is_null($class)) {
			if ($this->useSizeClass) {
				return "{$this->class} {$this->sizeClass()} {$this->errorClass()}";
			}
			return "{$this->class} {$this->errorClass()}";
		}
		$this->class .= " {$class}";
		return $this->element;
	}
	
	public function start($useSizeClass = true)
	{
		$this->useSizeClass = $useSizeClass;
		$html = "<div class='{$this->class()}'>";
		return $html;
	}
	
	public function end()
	{
		return "</div>";
	}
}
