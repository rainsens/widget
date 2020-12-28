<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

class ElementLayout
{
	protected $form;
	
	protected $element;
	
	protected $isHorizontal;
	
	/**
	 * Use input width as layout width.
	 *
	 * @var int|Element
	 */
	protected $inputWidth;
	
	public function __construct(Element $element)
	{
		$this->element = $element;
		$this->form = $element->form();
		$this->inputWidth = $element->input()->width();
	}
	
	public function size()
	{
		return $this->element->sizing()->size()['form.group'];
	}
	
	public function horizon(bool $isHorizontal = null)
	{
		if (is_null($isHorizontal)) {
			if (is_null($this->isHorizontal)) {
				return $this->form->layout()->horizon();
			}
			return $this->isHorizontal;
		}
		$this->isHorizontal = (bool)$isHorizontal;
		return $this->element;
	}
	
	public function start()
	{
		if ($this->horizon()) {
			$html = "<div class='col-md-{$this->inputWidth}'>";
			return $html;
		}
		return null;
	}
	
	public function end()
	{
		if ($this->horizon()) {
			return "</div>";
		}
		return null;
	}
}
