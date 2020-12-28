<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

/**
 * Class for common part of input elements,
 * such as: input, select, checkbox, radiobox, fileupload etc.
 *
 * Class ElementInput
 * @package Rainsens\Widget\Widgets\Forms\Elements
 */
class ElementInput
{
	protected $element;
	
	protected $width;
	
	protected $id;
	
	protected $name;
	
	/**
	 * Classes customized by end user.
	 *
	 * @var string
	 */
	protected $class = '';
	
	protected $disabled = false;
	
	protected $autofocus = false;
	
	protected $placeholder = 'Please enter';
	
	protected $required = ['require' => false, 'asterisk' => false];
	
	protected $readonly = false;
	
	protected $value;
	
	/**
	 * Custom attributes of input.
	 *
	 * @var array
	 */
	protected $attributes = [];
	
	public function __construct(Element $element, $field = '')
	{
		$this->element = $element;
		$this->id = $this->formatInputId($field);
	}
	
	protected function formatInputId(string $fieldName)
	{
		return str_replace('.', '_', $fieldName);
	}
	
	public function id()
	{
		return $this->id;
	}
	
	public function size()
	{
		return $this->element->sizing()->size()['input'];
	}
	
	/**
	 * Set or get label width.
	 *
	 * @param int|null $width
	 * @return int|Element
	 */
	public function width(int $width = null)
	{
		if (is_null($width)) {
			if (is_null($this->width)) {
				return $this->element->form()->layout()->width()['input'];
			}
			return $this->width;
		}
		$this->width = $width;
		return $this->element;
	}
	
	public function class(string $inputClass = null)
	{
		if (is_null($inputClass)) {
			return $this->class;
		}
		$this->class = $inputClass;
		return $this->element;
	}
	
	public function disabled(bool $disabled = null)
	{
		if (is_null($disabled)) {
			return $this->disabled;
		}
		$this->disabled = $disabled;
		return $this->element;
	}
	
	public function autofocus(bool $autofocus = null)
	{
		if (is_null($autofocus)) {
			return $this->autofocus;
		}
		$this->autofocus = $autofocus;
		return $this->element;
	}
	
	public function placeholder(string $text = null)
	{
		if (is_null($text)) {
			return $this->placeholder;
		}
		$this->placeholder = $text;
		return $this->element;
	}
	
	public function required(...$required)
	{
		$required = collect($required)->flatten();
		if ($required->isEmpty()) {
			return $this->required;
		}
		$this->required['require'] = $required->first();
		$this->required['asterisk'] = $required->last();
		return $this->element;
	}
	
	public function readonly(bool $readonly = null)
	{
		if (is_null($readonly)) {
			return $this->readonly;
		}
		$this->readonly = $readonly;
		return $this->element;
	}
	
	public function value($value = null)
	{
		if (is_null($value)) {
			return $this->value;
		}
		$this->value = $value;
		return $this->element;
	}
	
	/**
	 * Custom attributes of input.
	 *
	 * @param string $attribute
	 * @param string|null $value
	 * @return $this|mixed
	 */
	public function attributes($attribute = null, $value = null)
	{
		if (is_null($value)) {
			// Get one.
			if ($attribute) {
				return $this->attributes[$attribute];
			}
			// Get all.
			else {
				return $this->attributes;
			}
		}
		// Set unique item.
		if (! array_key_exists($attribute, $this->attributes)) {
			$this->attributes[$attribute] = $value;
		}
		return $this;
	}
}
