<?php
namespace Rainsens\Widget\Widgets\Forms\Elements;

use Closure;

/**
 * Trait ElementInput for main class Element
 *
 * Trait for common part of input elements,
 * such as: input, select, checkbox, radiobox, fileupload etc.
 *
 * @package Rainsens\Widget\Widgets\Forms\Elements
 */
trait ElementInput
{
	/**
	 * col-md-8
	 *
	 * @var
	 */
	protected $width;
	
	protected $type = 'text';
	
	protected $id;
	
	/**
	 * Classes customized by end user.
	 *
	 * @var string
	 */
	protected $class = 'form-control';
	
	protected $placeholder = 'Please enter';
	
	protected $disabled = false;
	
	protected $autofocus = false;
	
	protected $readonly = false;
	
	protected $required = ['require' => false, 'asterisk' => false];
	
	/**
	 * Custom attributes of input.
	 *
	 * @var array
	 */
	protected $attributes = [];
	
	/**
	 * Render attributes for input.
	 *
	 * @var array
	 */
	protected $variables = [];
	
	/**
	 * @var Closure
	 */
	protected $closure;
	
	protected function formatInputId(string $fieldName)
	{
		$this->id = str_replace('.', '_', $fieldName);
	}
	
	public function type(string $type = null)
	{
		if (is_null($type)) {
			return $this->type;
		}
		$this->type = $type;
		return $this;
	}
	
	public function id()
	{
		return $this->id;
	}
	
	public function name()
	{
		return $this->field()->name();
	}
	
	public function size()
	{
		return $this->sizing()->size()['input'];
	}
	
	/**
	 * Set or get label width.
	 *
	 * @param int|null $width
	 * @return int|$this
	 */
	public function width(int $width = null)
	{
		if (is_null($width)) {
			if (is_null($this->width)) {
				return $this->form()->layout()->width()['input'];
			}
			return $this->width;
		}
		$this->width = $width;
		return $this;
	}
	
	public function class(string $cssClass = null)
	{
		if (is_null($cssClass)) {
			return "{$this->class} {$this->size()}";
		}
		$this->class .= " $cssClass";
		return $this;
	}
	
	public function disabled(bool $disabled = null)
	{
		if (is_null($disabled)) {
			return $this->disabled;
		}
		$this->disabled = $disabled;
		return $this;
	}
	
	public function autofocus(bool $autofocus = null)
	{
		if (is_null($autofocus)) {
			return $this->autofocus;
		}
		$this->autofocus = $autofocus;
		return $this;
	}
	
	public function placeholder(string $text = null)
	{
		if (is_null($text)) {
			return $this->placeholder;
		}
		$this->placeholder = $text;
		return $this;
	}
	
	public function required(...$required)
	{
		$required = collect($required)->flatten();
		if ($required->isEmpty()) {
			return $this->required;
		}
		$this->required['require'] = (bool)$required->shift();
		$this->required['asterisk'] = (bool)$required->pop();
		return $this;
	}
	
	public function readonly(bool $readonly = null)
	{
		if (is_null($readonly)) {
			return $this->readonly;
		}
		$this->readonly = (bool)$readonly;
		return $this;
	}
	
	public function value()
	{
		return $this->field()->value();
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
	
	public function with(Closure $closure)
	{
		$this->closure = $closure;
		return $this;
	}
	
	public function variables($name = null, $value = null)
	{
		if (is_null($value)) {
			$variables = array_merge($this->variables, $this->attributes);
			if (is_null($name)) {
				return $variables;
			}
			return $variables[$name];
		}
		$this->variables[$name] = $value;
		return $this;
	}
	
	public function attr()
	{
		$this->variables('type', $this->type())
			->variables('id', $this->id())
			->variables('name', $this->name())
			->variables('value', $this->value())
			->variables('class', $this->class())
			->variables('placeholder', $this->placeholder());
		
		if ($this->autofocus()) {
			$this->variables('autofocus', $this->autofocus());
		}
		if ($this->disabled()) {
			$this->variables('disabled', $this->disabled());
		}
		if ($this->readonly()) {
			$this->variables('readonly', $this->readonly());
		}
		if ($this->required['require']) {
			$this->variables('required', $this->required()['require']);
		}
		$attr = '';
		foreach ($this->variables() as $k => $v) {
			if ($v) {
				$attr .= " {$k}='{$v}'";
			} else {
				$attr .= " {$k}";
			}
		}
		return $attr;
	}
}
