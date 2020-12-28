<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

class ElementContainer
{
	protected $element;
	
	protected $class = 'form-group';
	
	public function __construct(Element $element)
	{
		$this->element = $element;
	}
	
	public function sizeClass()
	{
		return $this->element->sizing()->size()['form.group'];
	}
	
	public function errorClass()
	{
		return $this->element->error()->class();
	}
	
	public function class(string $class = null)
	{
		if (is_null($class)) {
			return "{$this->class} {$this->sizeClass()} {$this->errorClass()}";
		}
		$this->class .= " {$class}";
		return $this->element;
	}
	
	public function start()
	{
		$html = "<div class='{$this->class()}'>";
		return $html;
	}
	
	public function end()
	{
		return "</div>";
	}
}
