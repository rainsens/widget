<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

class ElementHelp
{
	/**
	 * @var Element
	 */
	protected $element;
	
	protected $icon = 'fa-info-circle';
	protected $desc = '';
	
	public function __construct(Element $element)
	{
		$this->element = $element;
	}
	
	public function has()
	{
		return (bool)$this->desc;
	}
	
	public function icon(string $icon = null)
	{
		if (is_null($icon)) {
			return $this->icon;
		}
		$this->icon = $icon;
		return $this->element;
	}
	
	public function desc(string $text = null)
	{
		if (is_null($text)) {
			return $this->desc;
		}
		$this->desc = $text;
		return $this->element;
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
