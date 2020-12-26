<?php
namespace Rainsens\Widget\Widgets\Forms;

use Closure;
use Illuminate\Support\Collection;
use Rainsens\Widget\Widgets\Forms\Elements\Element;

class FormLayout
{
	/**
	 * @var Form
	 */
	protected $form;
	
	/**
	 * Columns in form layout.
	 *
	 * @var Collection
	 */
	protected $columns;
	
	/**
	 * @var FormLayoutColumn
	 */
	protected $currentColumn;
	
	/**
	 * Direction of elements.
	 *
	 * @var bool
	 */
	protected $isElementsHorizontal = true;
	
	/**
	 * Default width for all labels and inputs in form.
	 *
	 * @var array
	 */
	protected $width = ['label' => 2, 'input' => 8];
	
	public function __construct($form)
	{
		$this->form = $form;
		$this->initColumns();
	}
	
	protected function initColumns()
	{
		$this->columns = collect();
		$this->currentColumn = app(FormLayoutColumn::class);
	}
	
	public function attachElementFieldToLayoutColumn(Element $elementField)
	{
		$this->currentColumn->add($elementField);
	}
	
	public function addColumn($width, Closure $closure)
	{
		if ($this->columns->isEmpty()) {
			$column = $this->currentColumn;
			$column->width($width);
		} else {
			$column = app(FormLayoutColumn::class, ['width' => $width]);
			$this->currentColumn = $column;
		}
		$this->columns->push($column);
		
		/**
		 * Call the closure at current layout column,
		 * add field to form and layout column.
		 */
		$closure($this->form);
	}
	
	public function columns()
	{
		if ($this->columns->isEmpty()) {
			$this->columns->push($this->currentColumn);
		}
		return $this->columns;
	}
	
	public function width(...$width)
	{
		$width = collect($width)->flatten();
		if ($width->isEmpty()) {
			return $this->width;
		}
		$this->width['label'] = $width->first();
		$this->width['input'] = $width->last();
		return $this->form;
	}
	
	/**
	 * Setting direction of elements in form.
	 *
	 * @param bool|null $isHorizontal
	 * @return bool|Form
	 */
	public function horizon(bool $isHorizontal = null)
	{
		if (is_null($isHorizontal)) {
			return $this->isElementsHorizontal;
		}
		$this->isElementsHorizontal = (bool)$isHorizontal;
		return $this->form;
	}
}
