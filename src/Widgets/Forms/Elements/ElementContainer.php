<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

class ElementContainer
{
	protected $element;
	
	protected $sizeClass;
	
	protected $errorClass;
	
	protected $class = 'form-group';
	
	public function __construct(Element $element)
	{
		$this->element = $element;
		$this->sizeClass = $element->sizing()->size()['form.group'];
		$this->errorClass = $element->error()->class();
	}
	
	public function disableSizeClass()
	{
		$this->sizeClass = null;
	}
	
	public function sizeClass()
	{
		return $this->sizeClass;
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
	
	public function start($disableSizeClass = true)
	{
		if ($disableSizeClass) $this->disableSizeClass();
		$html = "<div class='{$this->class()}'>";
		return $html;
	}
	
	public function end()
	{
		return "</div>";
	}
}
