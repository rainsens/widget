<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

use Illuminate\Support\Str;

class ElementField
{
	/**
	 * @var Element
	 */
	protected $element;
	
	/**
	 * Name of field, string or array.
	 *
	 * @var string
	 */
	protected $name;
	
	/**
	 * The default value.
	 *
	 * @var
	 */
	protected $default = '';
	
	/**
	 * The original value.
	 *
	 * @var
	 */
	protected $original = '';
	
	/**
	 * The new value.
	 *
	 * @var
	 */
	protected $value = '';
	
	protected $isJsonField = false;
	
	
	public function __construct(Element $element, $field = '')
	{
		$this->element = $element;
		$this->name = $this->formatFieldName($field);
	}
	
	/**
	 * Name of field.
	 *
	 * @param string $fieldName
	 * @return mixed|string
	 */
	protected function formatFieldName(string $fieldName = '')
	{
		if (Str::contains($fieldName, '->')) {
			$this->isJsonField = true;
			$fieldName = str_replace('->', '.', $fieldName);
		}
		return $fieldName;
	}
	
	public function name()
	{
		return $this->name;
	}
	
	public function default($value = null)
	{
		if (is_null($value)) {
			return $this->default;
		}
		$this->default = $value;
		return $this->element;
	}
	
	public function original($value = null)
	{
		if (is_null($value)) {
			return $this->original;
		}
		$this->original = $value;
		return $this->element;
	}
	
	public function value($value = null)
	{
		if (is_null($value)) {
			if ($this->value) {
				return $this->value;
			}
			if ($oldValue = old($this->name())) {
				return $oldValue;
			}
			if ($this->original()) {
				return $this->original();
			}
			return $this->default();
		}
		$this->value = $value;
		return $this->element;
	}
	
}
