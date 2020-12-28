<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

/**
 * Element & ElementInput
 *
 * Class Element
 * @package Rainsens\Widget\Widgets\Forms\Elements
 */
class Element
{
	use ElementInitializer;
	use ElementInput;
	use ElementShortcut;
	
	/**
	 * @var ElementField
	 */
	protected $field;
	
	/**
	 * @var ElementLabel
	 */
	protected $label;
	
	/**
	 * @var ElementAddon
	 */
	protected $addon;
	
	/**
	 * @var ElementHelp
	 */
	protected $help;
	
	/**
	 * @var ElementError
	 */
	protected $error;
	
	/**
	 * @var ElementView
	 */
	protected $view;
	
	/**
	 * @var ElementLayout
	 */
	protected $layout;
	
	/**
	 * @var ElementSizing;
	 */
	protected $sizing;
	
	/**
	 * @var ElementContainer
	 */
	protected $container;
	
	public function boot()
	{
		$this->formatInputId($this->fieldName());
		
		$this->field        = app(ElementField::class,  ['element' => $this, 'field' => $this->fieldName()]);
		$this->label        = app(ElementLabel::class,  ['element' => $this, 'label' => $this->labelName()]);
		$this->addon        = app(ElementAddon::class,  ['element' => $this]);
		$this->help         = app(ElementHelp::class,   ['element' => $this]);
		$this->error        = app(ElementError::class,  ['element' => $this]);
		$this->view         = app(ElementView::class,   ['element' => $this]);
		$this->layout       = app(ElementLayout::class, ['element' => $this]);
		$this->sizing       = app(ElementSizing::class, ['element' => $this]);
		$this->container    = app(ElementContainer::class, ['element' => $this]);
		return $this;
	}
	
	public function field()
	{
		return $this->field;
	}
	
	public function label()
	{
		return $this->label;
	}
	
	public function addon()
	{
		return $this->addon;
	}
	
	public function help()
	{
		return $this->help;
	}
	
	public function error()
	{
		return $this->error;
	}
	
	public function view()
	{
		return $this->view;
	}
	
	public function layout()
	{
		return $this->layout;
	}
	
	public function sizing()
	{
		return $this->sizing;
	}
	
	public function container()
	{
		return $this->container;
	}
	
	public function __toString()
	{
		return $this->view->render();
	}
}
