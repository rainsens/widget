<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

use Rainsens\Widget\Widgets\Forms\Form;

trait ElementInitializer
{
	/**
	 * @var Form
	 */
	protected $form;
	
	protected $fieldName;
	
	protected $labelName;
	
	/**
	 * Class name of element field class.
	 *
	 * example: \Forms\Elements\Fields\Text
	 *
	 * @var
	 */
	protected $class;
	
	/**
	 * Initialize class name.
	 *
	 * The class name of current field class.
	 * example: \Forms\Elements\Fields\Text
	 *
	 * @param null $name
	 * @return string
	 */
	public function class($name = null)
	{
		if (is_null($name)) {
			return $this->class ?? get_class($this);
		}
		$this->class = $name;
		return $this;
	}
	
	/**
	 * Initialize form instance.
	 *
	 * @param null $form
	 * @return $this|Form
	 */
	public function form($form = null)
	{
		if (is_null($form)) {
			return $this->form;
		}
		$this->form = $form;
		return $this;
	}
	
	/**
	 * Initialize field name.
	 *
	 * @param null $name
	 * @return $this
	 */
	public function fieldName($name = null)
	{
		if (is_null($name)) {
			return $this->fieldName;
		}
		$this->fieldName = $name;
		return $this;
	}
	
	/**
	 * Initialize label name.
	 *
	 * @param null $name
	 * @return $this
	 */
	public function labelName($name = null)
	{
		if (is_null($name)) {
			return $this->labelName;
		}
		$this->labelName = $name;
		return $this;
	}
}
