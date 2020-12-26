<?php
namespace Rainsens\Widget\Widgets\Forms;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Rainsens\Widget\Exceptions\FieldMethodDoesNotExistException;

class Form
{
	use FormShortcut;
	
	protected $model;
	
	/**
	 * @var FormBuilder
	 */
	protected $builder;
	
	/**
	 * @var FormElement
	 */
	protected $element;
	
	/**
	 * Store update destroy...
	 *
	 * @var FormControl
	 */
	protected $control;
	
	/**
	 * Reset or submit the form.
	 *
	 * @var FormHandler
	 */
	protected $handler;
	
	/**
	 * @var FormView
	 */
	protected $view;
	
	/**
	 * @var FormLayout
	 */
	protected $layout;
	
	public function __construct(Model $model)
	{
		$this->model = $model;
		
		$this->builder  = app(FormBuilder::class, ['form' => $this]);
		$this->control  = app(FormControl::class, ['form' => $this]);
		$this->handler  = app(FormHandler::class, ['form' => $this]);
		$this->view     = app(FormView::class, ['form' => $this]);
		$this->layout   = app(FormLayout::class, ['form' => $this]);
		$this->element  = app(FormElement::class, ['form' => $this]);
	}
	
	public function model()
	{
		return $this->model;
	}
	
	public function builder()
	{
		return $this->builder;
	}
	
	public function control()
	{
		return $this->control;
	}
	
	public function view()
	{
		return $this->view;
	}
	
	public function layout()
	{
		return $this->layout;
	}
	
	public function __call($method, $arguments)
	{
		if ($elementFieldClassName = $this->element->getElementFieldClassName($method)) {
			
			$argFirst = Arr::get($arguments, 0, '');
			$argSecond = Arr::get($arguments, 1, '');
			$argThird = Arr::get($arguments, 2, '');
			
			// Initialize a new element field.
			$elementFieldInstance = new $elementFieldClassName($argFirst, $argSecond, $argThird);
			$elementFieldInstance->form($this)->fieldName($argFirst)->labelName($argSecond)->boot();
			
			$this->element->attachElementFieldToForm($elementFieldInstance);
			$this->layout->attachElementFieldToLayoutColumn($elementFieldInstance);
			return $elementFieldInstance;
		}
		
		throw new FieldMethodDoesNotExistException("Expected element field does not exist.");
	}
	
	public function __toString()
	{
		return $this->builder->build();
	}
}
